<?php

namespace Recca0120\Twzipcode;

use Recca0120\Lodash\JArray;

class Address
{
    /**
     * NO.
     *
     * @var int
     */
    const NO = 0;

    /**
     * SUBNO.
     *
     * @var int
     */
    const SUBNO = 1;

    /**
     * NAME.
     *
     * @var int
     */
    const NAME = 2;

    /**
     * UNIT.
     *
     * @var int
     */
    const UNIT = 3;

    /**
     * $normalizer.
     *
     * @var Normalizer
     */
    public $normalizer;

    /**
     * @var Tricky
     */
    public $tricky;

    /**
     * $tokens.
     *
     * @var JArray
     */
    public $tokens = [];

    /**
     * __construct.
     *
     * @param  static|array  $address
     */
    public function __construct($address = '')
    {
        $this->tricky = new Tricky();
        if (empty($address) === false) {
            $this->set($address);
        }
    }

    /**
     * set.
     *
     * @param  static|string  $address
     * @return $this
     */
    public function set($address)
    {
        $this->normalizer = (new Normalizer($address))->normalize()->normalizeAddress();
        $this->tokens = $this->tokenize();

        return $this;
    }

    /**
     * tokenize.
     *
     * @return JArray
     */
    private function tokenize()
    {
        $units = [static::NO => 'no', static::SUBNO => 'subno', static::NAME => 'name', static::UNIT => 'unit'];

        $patterns = implode('', [
            '(?:(?P<no>\d+)(?P<subno>之\d+)?(?=[巷弄號樓]|$)|(?P<name>.+?))',
            '(?:(?P<unit>([島縣市鄉鎮市區村里道鄰路街段巷弄號樓]|魚臺))|(?=\d+(?:之\d+)?[巷弄號樓]|$))',
        ]);

        $tokens = [];
        $address = $this->tricky->hash($this->normalizer)->value();
        if (preg_match_all('/'.$patterns.'/u', $address, $matches, PREG_SET_ORDER) !== false) {
            foreach ($matches as $values) {
                $token = array_map(static function ($unit) use ($values) {
                    return isset($values[$unit]) === true ? $values[$unit] : '';
                }, $units);
                $token[static::NAME] = $this->tricky->flip($token[static::NAME]);
                $tokens[] = $token;
            }
        }

        return new JArray($tokens);
    }

    /**
     * __toString.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->normalizer->value();
    }

    /**
     * tokens.
     *
     * @return JArray
     */
    public function tokens()
    {
        return $this->tokens;
    }

    /**
     * getPoint.
     *
     * @param  string  $index
     * @return Point
     */
    public function getPoint($index)
    {
        if (isset($this->tokens[$index]) === false) {
            return new Point(0, 0);
        }
        $token = $this->tokens[$index];

        return new Point(
            (int) $token[static::NO] ?: 0,
            (int) str_replace('之', '', $token[static::SUBNO] ?: '0')
        );
    }

    /**
     * flat.
     *
     * @param  int  $length
     * @param  int  $offset
     * @return string
     */
    public function flat($length = null, $offset = 0)
    {
        $length = $length ?: $this->tokens->length();
        $end = $offset + $length;

        return (string) $this->tokens->slice($offset, $end)->map(function ($token) {
            return implode('', $token);
        })->join('');
    }
}
