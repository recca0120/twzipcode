<?php

namespace Recca0120\Twzipcode;

use BadMethodCallException;

class Twzipcode
{
    protected $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function token()
    {
        $pattern = str_replace(["\n", ' '], '', '/
            (?:
                (?P<no>\d+)
                (?P<subno>之\d+)?
                (?=[巷弄號樓]|$)
                |
                (?P<name>.+?)
            )
            (?:
                (?P<unit>[縣市鄉鎮市區村里鄰路街段巷弄號樓])
                |
                (?=\d+(?:之\d+)?[巷弄號樓]|$)
            )
        /u');

        $token = [];
        $units = ['no', 'subno', 'name', 'unit'];
        if (preg_match_all($pattern, $this->address, $matches, PREG_SET_ORDER) !== false) {
            foreach ($matches as $value) {
                $temp = [];
                foreach ($units as $unit) {
                    $temp[$unit] = isset($value[$unit]) === true ? $value[$unit] : '';
                }
                $token[] = $temp;
            }
        }

        return $token;
    }
}
