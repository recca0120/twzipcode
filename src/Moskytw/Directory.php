<?php

namespace Recca0120\Twzipcode\Moskytw;

class Directory
{
    public static $rules = [];

    public function __construct()
    {
        self::loadRules();
    }

    public function find($address) {
        $address = new Address($address);
        // $addressTokens = $address->tokens();

        // $rules = array_filter(self::$rules, function($rule) use ($address) {
        //     return $rule->match($address);
        // });

        // var_dump($rules);
    }

    protected static function loadRules()
    {
        // $file = __DIR__.'/../data/rules.php';
        // $csv = __DIR__.'/../data/Zip32_utf8_10501_1.csv';
        // $data = [];
        // $fp = fopen($csv, 'r');
        // while (($line = fgets($fp)) !== false) {
        //     $data[] = trim($line);
        // }

        // $result = [];
        // $data = array_chunk($data, 1000);
        // foreach ($data as $chunks) {
        //     $rules = [];
        //     foreach ($chunks as $line) {
        //         list($zipcode, $county, $district, $street, $rule) = explode(',', $line);
        //         $rules[] = new Rule(implode(',', [
        //             $county,
        //             $district,
        //             $street,
        //             $rule
        //         ]), $zipcode);
        //     }
        //     $result[] = $rules;
        // }

        // if (empty(self::$rules) && file_exists($file) === true) {
        //     self::$rules = unserialize(file_get_contents($file));

        //     return;
        // }

        // $csv = __DIR__.'/../data/Zip32_utf8_10501_1.csv';
        // $rules = [];
        // $fp = fopen($csv, 'r');
        // while (($line = fgets($fp)) !== false) {
        //     list($zipcode, $county, $district, $street, $rule) = explode(',', trim($line));
        //     $rules[] = new Rule(implode(',', [
        //         $county,
        //         $district,
        //         $street,
        //         $rule
        //     ]), $zipcode);

        // }
        // file_put_contents($file, serialize($rules));
        // self::$rules = $rules;
    }
}
