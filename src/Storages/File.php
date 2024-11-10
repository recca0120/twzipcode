<?php

namespace Recca0120\Twzipcode\Storages;

use Recca0120\Lodash\JArray;
use Recca0120\Lodash\JString;
use Recca0120\Twzipcode\Address;
use Recca0120\Twzipcode\Contracts\Source;
use Recca0120\Twzipcode\Contracts\Storage;
use Recca0120\Twzipcode\Rule;

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
            if (! empty(self::$cached['zip3'][$flat])) {
                return self::$cached['zip3'][$flat];
            }
        }

        return null;
    }

    /**
     * @param  string  $zip3
     * @return JArray
     */
    public function rules($zip3)
    {
        $this->restore('zip5');

        return ! empty(self::$cached['zip5'][$zip3])
            ? new JArray($this->decompress(self::$cached['zip5'][$zip3]))
            : new JArray([]);
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
     * @param  Source  $source
     * @return $this
     */
    public function load($source)
    {
        $zip5 = [];
        $zip3 = [];
        $source->each(function ($zipcode, $county, $district, $rules) use (&$zip5, &$zip3) {
            $zip5[$zipcode] = $this->compress(array_map(static function ($rule) {
                return new Rule($rule);
            }, $rules));

            if (empty($zip3[$county])) {
                $zip3[$county] = substr($zipcode, 0, 1);
            }

            if (empty($zip3[$county.$district])) {
                $zip3[$county.$district] = substr($zipcode, 0, 3);
            }
        });

        $this->store('zip3', $zip3);
        $this->store('zip5', $zip5);

        return $this;
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
}
