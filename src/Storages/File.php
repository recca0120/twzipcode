<?php

namespace Recca0120\Twzipcode\Storages;

use Closure;
use Recca0120\Lodash\JArray;
use Recca0120\Lodash\JString;
use Recca0120\Twzipcode\Address;
use Recca0120\Twzipcode\Contracts\Storage;
use Recca0120\Twzipcode\Rule;
use ZipArchive;

class File implements Storage
{
    /** @var array */
    public static $cached = ['zip3' => null, 'zip5' => null];

    /** @var string */
    public $path;

    /**
     * $suffix.
     *
     * @var string
     */
    private $suffix = '.rules';

    /**
     * @param  string  $path
     */
    public function __construct($path = null)
    {
        $this->path = ($path ?: dirname(dirname(__DIR__)).'/resources/data').'/';
    }

    /**
     * @return JString
     */
    public function zip3(Address $address)
    {
        $this->restore('zip3');

        foreach ([2, 1] as $value) {
            $flat = $address->flat($value);
            if (isset(self::$cached['zip3'][$flat])) {
                return self::$cached['zip3'][$flat];
            }
        }

        return null;
    }

    /**
     * @param  string  $source
     * @return $this
     */
    public function load($source)
    {
        $zip5 = [];
        $zip3 = [];
        $this->each(
            $this->prepareSource($source),
            function ($zipcode, $county, $district, $rules) use (&$zip5, &$zip3) {
                $zip5[$zipcode] = $this->compress(array_map(static function ($rule) {
                    return new Rule($rule);
                }, $rules));

                if (isset($zip3[$county]) === false) {
                    $zip3[$county] = substr($zipcode, 0, 1);
                }

                if (isset($zip3[$county.$district]) === false) {
                    $zip3[$county.$district] = substr($zipcode, 0, 3);
                }
            });

        $this->store('zip3', $zip3);
        $this->store('zip5', $zip5);

        return $this;
    }

    /**
     * @param  string  $zip3
     * @return JArray
     */
    public function rules($zip3)
    {
        $this->restore('zip5');

        return isset(self::$cached['zip5'][$zip3]) === true
            ? new JArray($this->decompress(self::$cached['zip5'][$zip3]))
            : new JArray([]);
    }

    /**
     * @param  string  $file
     * @return $this
     */
    public function loadFile($file = null)
    {
        $file = $file ?: $this->path.'../Zip32_utf8_10501_1.csv';
        $this->load($this->getSource($file));

        return $this;
    }

    /**
     * @return $this
     */
    public function flush()
    {
        static::$cached = ['zip3' => null, 'zip5' => null];

        return $this;
    }

    /**
     * @param  string  $filename
     * @return void
     */
    private function restore($filename)
    {
        if (self::$cached[$filename] !== null) {
            return;
        }

        if (file_exists($this->path.$filename.$this->suffix) === false) {
            return;
        }

        self::$cached[$filename] = new JArray($this->decompress(
            file_get_contents($this->path.$filename.$this->suffix)
        ));
    }

    /**
     * @param  string  $file
     * @return string
     */
    private function getSource($file)
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        if ($extension === 'zip') {
            $zip = new ZipArchive;
            $zip->open($file);
            $contents = $zip->getFromIndex(0);
            $zip->close();
        } else {
            $contents = file_get_contents($file);
        }

        return $contents;
    }

    /**
     * @param  string  $source
     * @return array
     */
    private function prepareSource($source)
    {
        $tricks = [
            '宜蘭縣壯圍鄉' => '263',
            '新竹縣寶山鄉' => '308',
            '臺南市新市區' => '744',
        ];
        $results = [];
        $rules = preg_split('/\n|\r\n$/', $source);
        foreach ($rules as $rule) {
            if (empty(trim($rule)) === false) {
                list($zipcode, $county, $district) = explode(',', $rule);
                $zip3 = isset($tricks[$county.$district]) === true
                    ? $tricks[$county.$district]
                    : substr($zipcode, 0, 3);
                $results[$county][$district][$zip3][] = $rule;
            }
        }

        return $results;
    }

    /**
     * @param  array  $ruleGroup
     * @param  Closure  $callback
     */
    private function each($ruleGroup, $callback)
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
     * @param  array  $array
     * @return string
     */
    private function compress($array)
    {
        return gzcompress(serialize($array));
    }

    /**
     * @param  string  $compressed
     * @return array
     */
    private function decompress($compressed)
    {
        return unserialize(gzuncompress($compressed));
    }

    /**
     * @param  string  $filename
     * @param  array  $data
     * @return void
     */
    private function store($filename, $data)
    {
        file_put_contents($this->path.$filename.$this->suffix, $this->compress($data));
    }
}
