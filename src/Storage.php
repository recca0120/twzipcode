<?php

namespace Recca0120\Twzipcode;

use ArrayObject;

class Storage
{
    public $path;

    public static $zipcode;

    public function __construct($path = null)
    {
        $this->path = is_null($path) === true ?
            realpath(__DIR__.'/../resources/data') :
            $path;

        $this->path .= '/';
    }

    public function find($address)
    {
        $zipcode = '';
        $address = is_a($address, Address::class) === true ? $address : new Address($address);
        $zipcodes = $this->loadZipcodes();
        $tokens = $address->getTokens();

        $district = $address->flat(2);
        if (isset($zipcodes[$district]) === true) {
            $zipcode = $zipcodes[$district];
            $rules = $this->loadRules($zipcode);
            foreach ($rules as $rule) {
                if ($rule->match($address) === true) {
                    return $rule->getZipcode();
                }
            }
        }

        return $zipcode;
    }


    protected function loadZipcodes()
    {
        if (is_null(self::$zipcode) === true) {
            self::$zipcode = unserialize(file_get_contents($this->path.'zipcode.php'));
        }

        return self::$zipcode;
    }

    protected function loadRules($zipcode)
    {
        if (file_exists($this->path.$zipcode.'.rules') === false) {
            return [];
        }

        return unserialize(Helper::decompress(file_get_contents($this->path.$zipcode.'.rules')));
    }

    public function generate($source)
    {
        if (is_dir($this->path) === false) {
            mkdir($this->path, 0777, true);
        }

        $rules = $this->prepareSource($source);

        $this
            ->generateRules($rules)
            ->generateZip3($rules);
    }

    protected function generateRules($rules)
    {
        $this->each($rules, function ($county, $district, $zipcode, $rules) {
            $serializeRules = serialize(array_map(function ($rule) {
                return new Rule($rule);
            }, $rules));

            file_put_contents(
                $this->path.$zipcode.'.rules',
                Helper::compress($serializeRules)
            );
        });

        return $this;
    }

    protected function generateZip3($rules)
    {
        $arrayObject = new ArrayObject;
        $this->each($rules, function ($county, $district, $zipcode, $rules) use ($arrayObject) {
            $arrayObject[$county] = substr($zipcode, 0, 1);
            $arrayObject[$county.$district] = substr($zipcode, 0, 3);
        });

        file_put_contents(
            $this->path.'zipcode.php',
            serialize($arrayObject->getArrayCopy())
        );
    }

    protected function prepareSource($source)
    {
        $results = [];
        $rules = preg_split('/\n|\r\r$/', $source);
        foreach ($rules as $rule) {
            if (empty(trim($rule)) === false) {
                list($zipcode, $county, $district) = explode(',', $rule);
                $results[$county][$district][substr($zipcode, 0, 3)][] = $rule;
            }
        }

        return $results;
    }

    protected function each($rules, $callback)
    {
        foreach ($rules as $county => $temp) {
            foreach ($temp as $district => $temp2) {
                foreach ($temp2 as $zipcode => $rules) {
                    $callback($county, $district, $zipcode, $rules);
                }
            }
        }
    }
}
