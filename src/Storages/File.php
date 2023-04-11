<?php

namespace Recca0120\Twzipcode\Storages;

use ArrayObject;
use Closure;
use Recca0120\Lodash\JArray;
use Recca0120\Twzipcode\Address;
use Recca0120\Twzipcode\Contracts\Storage;
use Recca0120\Twzipcode\Rule;
use ZipArchive;

class File implements Storage
{
    /**
     * cached.
     *
     * @var array
     */
    public static $cached = [
        'zip3' => null,
        'zip5' => null,
    ];

    /**
     * $path.
     *
     * @var string
     */
    public $path;

    /**
     * $suffix.
     *
     * @var string
     */
    public $suffix = '.rules';

    /**
     * __construct.
     *
     * @param  string  $path
     */
    public function __construct($path = null)
    {
        $this->path = ($path ?: dirname(dirname(__DIR__)).'/resources/data').'/';
    }

    /**
     * zip3.
     *
     * @return JString
     */
    public function zip3(Address $address)
    {
        $this->restore('zip3');
        $flat = $address->flat(2);

        return isset(self::$cached['zip3'][$flat]) ? self::$cached['zip3'][$flat] : null;
    }

    /**
     * load.
     *
     * @param  string  $source
     * @return $this
     */
    public function load($source)
    {
        $zip5 = new ArrayObject();
        $zip3 = new ArrayObject();
        $this->each($this->prepareSource($source), function ($zipcode, $county, $district, $rules) use ($zip5, $zip3) {
            $zip5[$zipcode] = $this->compress(array_map(function ($rule) {
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
     * rules.
     *
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
     * loadFile.
     *
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
     * flush.
     *
     * @return $this
     */
    public function flush()
    {
        static::$cached = [
            'zip3' => null,
            'zip5' => null,
        ];

        return $this;
    }

    /**
     * restore.
     *
     * @param  string  $filename
     * @return mixed
     */
    protected function restore($filename)
    {
        if (self::$cached[$filename] !== null) {
            return self::$cached[$filename];
        }

        if (file_exists($this->path.$filename.$this->suffix) === false) {
            return false;
        }

        return self::$cached[$filename] = new JArray($this->decompress(
            file_get_contents($this->path.$filename.$this->suffix)
        ));
    }

    /**
     * getSource.
     *
     * @param  string  $file
     * @return string
     */
    protected function getSource($file)
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
     * prepareSource.
     *
     * @param  string  $source
     * @return array
     */
    protected function prepareSource($source)
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
                [$zipcode, $county, $district] = explode(',', $rule);
                $zip3 = isset($tricks[$county.$district]) === true
                    ? $tricks[$county.$district]
                    : substr($zipcode, 0, 3);
                $results[$county][$district][$zip3][] = $rule;
            }
        }

        return $results;
    }

    /**
     * each.
     *
     * @param  array  $ruleGroup
     * @param  Closure  $callback
     */
    protected function each($ruleGroup, $callback)
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
     * compress.
     *
     * @param  array  $array
     * @return string
     */
    protected function compress($array)
    {
        return gzcompress(serialize($array));
    }

    /**
     * decompress.
     *
     * @param  string  $compressed
     * @return array
     */
    protected function decompress($compressed)
    {
        return unserialize(gzuncompress($compressed));
    }

    /**
     * store.
     *
     * @param  string  $filename
     * @param  JArray  $data
     * @return $this
     */
    protected function store($filename, $data)
    {
        file_put_contents(
            $this->path.$filename.$this->suffix,
            $this->compress($data)
        );

        return $this;
    }
}
