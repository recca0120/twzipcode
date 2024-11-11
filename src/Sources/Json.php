<?php

namespace Recca0120\Twzipcode\Sources;

class Json extends Csv
{
    /**
     * @return array{array{zipcode: string, county: string, district: string, text: string}} $rows
     */
    protected function rows()
    {
        return array_map(static function ($data) {
            return [
                'zipcode' => $data['郵遞區號'],
                'county' => $data['縣市名稱'],
                'district' => $data['鄉鎮市區'],
                'rule' => implode(',', $data),
            ];
        }, json_decode($this->contents(), true));
    }
}
