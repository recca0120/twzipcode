<?php

namespace Recca0120\Twzipcode;

use Recca0120\Lodash\JArray;

class Address
{
    /** @var int */
    const NO = 0;

    /** @var int */
    const SUBNO = 1;

    /** @var int */
    const NAME = 2;

    /** @var int */
    const UNIT = 3;

    /** @var Normalizer */
    public $normalizer;

    /** @var JArray */
    public $tokens = [];

    /**
     * @param  static|string  $address
     */
    public function __construct($address = '')
    {
        if (empty($address) === false) {
            $this->set($address);
        }
    }

    /**
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
     * @return array
     */
    private function tokenize()
    {
        $units = [static::NO => 'no', static::SUBNO => 'subno', static::NAME => 'name', static::UNIT => 'unit'];

        $patterns = implode('', [
            '(?:(?P<no>\d+)(?P<subno>之\d+)?(?=[巷弄號樓]|$)|(?P<name>.+?))',
            '(?:(?P<unit>([島縣市鄉鎮市區村里道鄰路街段巷弄號樓]|魚臺))|(?=\d+(?:之\d+)?[巷弄號樓]|$))',
        ]);

        $tricky = Tricky::instance();
        $address = $tricky->hash($this->normalizer)->value();
        $tokens = [];
        if (preg_match_all('/'.$patterns.'/u', $address, $matches, PREG_SET_ORDER) !== false) {
            foreach ($matches as $values) {
                $token = array_map(static function ($unit) use ($values) {
                    return isset($values[$unit]) === true ? $values[$unit] : '';
                }, $units);
                $token[static::NAME] = $tricky->flip($token[static::NAME]);
                $tokens[] = $token;
            }
        }

        return $tokens;
    }

    /**
     * @return JArray
     */
    public function tokens()
    {
        return new JArray($this->tokens);
    }

    /**
     * @param  string  $index
     * @return Point
     */
    public function point($index)
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
     * @param  int  $length
     * @param  int  $offset
     * @return string
     */
    public function flat($length = null, $offset = 0)
    {
        $tokens = $this->tokens();
        $length = $length ?: $tokens->length();
        $end = $offset + $length;

        return (string) $tokens->slice($offset, $end)->map(function ($token) {
            return implode('', $token);
        })->join('');
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->normalizer->value();
    }
}
