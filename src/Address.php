<?php

namespace Recca0120\Twzipcode;

class Address
{
    const NO = 0;
    const SUBNO = 1;
    const NAME = 2;
    const UNIT = 3;

    public $address;

    public $tokens = [];

    public function __construct($address = '')
    {
        if (empty($address) === false) {
            $this->set($address);
        }
    }

    public function set($address)
    {
        $this->address = Normalizer::make($address)
            ->regularize()
            ->digitize()
            ->value();

        $this->tokens = $this->tokenize();

        return $this;
    }

    public function value()
    {
        return $this->address;
    }

    public function getTokens()
    {
        return $this->tokens;
    }

    public function getPoint($index)
    {
        if (isset($this->tokens[$index]) === false) {
            return new Point(0, 0);
        }

        $token = $this->tokens[$index];

        return new Point(
            isset($token[static::NO]) === true ? (int) $token[static::NO] : 0,
            isset($token[static::SUBNO]) === true ? (int) str_replace('之', '', $token[static::SUBNO]) : 0
        );
    }

    public function flat($length = null)
    {
        $length = is_null($length) === true ? count($length) : $length;

        return implode('', array_map(function ($token) {
            return implode('', $token);
        }, array_slice($this->tokens, 0, $length)));
    }

    protected function tokenize()
    {
        $tokens = [];

        $units = [
            static::NO => 'no',
            static::SUBNO => 'subno',
            static::NAME => 'name',
            static::UNIT => 'unit',
        ];

        $pattern = implode('', [
            '(?:(?P<no>\d+)(?P<subno>之\d+)?(?=[巷弄號樓]|$)|(?P<name>.+?))',
            '(?:(?P<unit>[縣市鄉鎮市區村里鄰路街段巷弄號樓])|(?=\d+(?:之\d+)?[巷弄號樓]|$))',
        ]);

        if (preg_match_all('/'.$pattern.'/u', $this->address, $matches, PREG_SET_ORDER) !== false) {
            foreach ($matches as $values) {
                $temp = [];
                foreach ($units as $key => $unit) {
                    $temp[$key] = isset($values[$unit]) === true ? $values[$unit] : '';
                }
                $tokens[] = $temp;
            }
        }

        return $tokens;
    }

    public function __toString()
    {
        return $this->value();
    }
}
