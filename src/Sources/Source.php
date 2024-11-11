<?php

namespace Recca0120\Twzipcode\Sources;

use Recca0120\Twzipcode\Contracts\Source as SourceContract;
use ZipArchive;

abstract class Source implements SourceContract
{
    protected static $tricks = [
        '宜蘭縣壯圍鄉' => '263',
        '新竹縣寶山鄉' => '308',
        '臺南市新市區' => '744',
    ];

    public function each(callable $callback)
    {
        static::eachGroup(static::prepare($this->rows()), $callback);
    }

    /**
     * @return string
     */
    abstract protected function contents();

    /**
     * @return array{array{zipcode: string, county: string, district: string, text: string}} $rows
     */
    protected function rows()
    {
        $lines = preg_split('/\n|\r\n$/', $this->contents());
        $lines = array_filter($lines, static function ($line) {
            return ! empty(trim($line));
        });

        return array_map(static function ($rule) {
            $data = explode(',', $rule);

            return [
                'zipcode' => $data[0],
                'county' => $data[1],
                'district' => $data[2],
                'rule' => $rule,
            ];
        }, $lines);
    }

    /**
     * @param  array{array{zipcode: string, county: string, district: string, text: string}}  $rows
     * @return array
     */
    protected static function prepare($rows)
    {
        return array_reduce($rows, static function ($results, $row) {
            $zip3 = ! empty(self::$tricks[$row['county'].$row['district']])
                ? self::$tricks[$row['county'].$row['district']]
                : substr($row['zipcode'], 0, 3);

            $results[$row['county']][$row['district']][$zip3][] = $row['rule'];

            return $results;
        }, []);
    }

    protected static function eachGroup($ruleGroup, $callback)
    {
        foreach ($ruleGroup as $county => $districts) {
            foreach ($districts as $district => $addresses) {
                foreach ($addresses as $zipcode => $rule) {
                    $callback($zipcode, $county, $district, $rule);
                }
            }
        }
    }

    /**
     * @param  string  $file
     * @return string
     */
    protected static function unzip($file)
    {
        $zip = new ZipArchive;
        $zip->open($file);
        $contents = $zip->getFromIndex(0);
        $zip->close();

        return $contents;
    }
}
