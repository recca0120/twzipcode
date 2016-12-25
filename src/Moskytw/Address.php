<?php

namespace Recca0120\Twzipcode\Moskytw;

class Address
{
    const NO = 0;
    const SUBNO = 1;
    const NAME = 2;
    const UNIT = 3;

    public static $tokenRe = [
        '(?:(?P<no>\d+)(?P<subno>之\d+)?(?=[巷弄號樓]|$)|(?P<name>.+?))',
        '(?:(?P<unit>[縣市鄉鎮市區村里鄰路街段巷弄號樓])|(?=\d+(?:之\d+)?[巷弄號樓]|$))',
    ];

    protected $address;

    protected $tokens = [];

    public function __construct($address)
    {
        $this->address = $address;
        $this->tokens = $this->parseTokens($address);
    }

    public function tokens()
    {
        if (empty($this->tokens) === false) {
            return $this->tokens;
        }

        return $this->tokens = $this->parseTokens();
    }

    protected function parseTokens()
    {
        $address = Helper::normalizeAddress($this->address);
        $tokens = [];
        $units = [
            static::NO => 'no',
            static::SUBNO => 'subno',
            static::NAME => 'name',
            static::UNIT => 'unit',
        ];

        if (preg_match_all('/'.implode('', static::$tokenRe).'/u', $address, $matches, PREG_SET_ORDER) !== false) {
            foreach ($matches as $value) {
                $temp = [];
                foreach ($units as $key => $unit) {
                    $temp[$key] = isset($value[$unit]) === true ? $value[$unit] : '';
                }
                $tokens[] = $temp;
            }
        }

        return $tokens;
    }

    protected function getTokenPoint($index)
    {
        $tokens = $this->tokens();
        if (isset($tokens[$index]) === false) {
            return [0, 0];
        }

        $token = $tokens[$index];

        return [
            isset($token[static::NO]) === true ? (int) $token[static::NO] : 0,
            isset($token[static::SUBNO]) === true ? (int) str_replace('之', '', $token[static::SUBNO]) : 0,
        ];
    }
}
