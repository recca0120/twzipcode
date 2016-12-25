<?php

include __DIR__.'/../vendor/autoload.php';

use Recca0120\Twzipcode\Rule;
use Recca0120\Twzipcode\Compresser;

function dump($value)
{
    echo mb_convert_encoding(var_export($value, true), 'big5', 'utf8')."\n";
}

class Converter
{
    public $items = [];

    public function __construct()
    {
        $path = __DIR__.'/../src/data';
        if (is_dir($path) === false) {
            mkdir($path, 0777, true);
        }

        $this->path = realpath($path).'/';
        $this->source = __DIR__.'/Zip32_utf8_10501_1.csv';
        $this->items = $this->prepare();
    }

    protected function prepare()
    {
        $items = [];
        $fp = fopen($this->source, 'r');
        while (($rule = fgets($fp)) !== false) {
            list($zipcode, $county, $district) = explode(',', $rule);
            $items[$county][$district][substr($zipcode, 0, 3)][] = $rule;
        }

        return $items;
    }

    public function generate()
    {
        $this->each($this->items, function($rows, $county) {
            $this->each($rows, function($rows, $district) {
                $this->each($rows, function($rules, $zipcode) {
                    file_put_contents(
                        $this->path.$zipcode.'.rules',
                        Compresser::compress($this->generateRules($rules))
                    );
                });
            });
        });
    }

    protected function generateRules($rules) {
        return serialize(array_map(function ($rule) {
            return new Rule($rule);
        }, $rules));
    }

    protected function each($data, $callback) {
        foreach ($data as $key => $value) {
            $callback($value, $key);
        }
    }
}

$start = microtime(true);

(new Converter())
    ->generate();

echo 'benchmark: '.(microtime(true) - $start)."\n";
// function e() {
//     $path = __DIR__.'/../src/data/';

//     if (is_dir($path) === false) {
//         mkdir($path, 0777, true);
//     }

//     $map = [];
//     $results = [];
//     $fp = fopen(__DIR__.'/Zip32_utf8_10501_1.csv', 'r');
//     while (($rule = fgets($fp)) !== false) {
//         list($zipcode, $county, $district) = explode(',', $rule);
//         $results[$county][$district][substr($zipcode, 0, 3)][] = $rule;
//     }

//     foreach ($results as $county => $rows) {
//         foreach ($rows as $district => $rows2) {
//             foreach ($rows2 as $zipcode => $rules) {
//                 $map[$county][$district] = $zipcode;

//                 $serializeRules = serialize(array_map(function ($rule) {
//                     return new Rule($rule);
//                 }, $rules));

//                 file_put_contents($path.$zipcode.'.rules', $serializeRules);
//                 echo 'create: '.$path.$zipcode.'.rules'."\n";
//             }
//         }
//     }
//     file_put_contents($path.'map.php', '<?php '."\n return ".str_replace(['array (', ')'], ['[', ']'], var_export($map, true)));
// }

// e();
