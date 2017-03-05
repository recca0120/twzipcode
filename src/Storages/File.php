<?php

namespace Recca0120\Twzipcode\Storages;

use ZipArchive;
use Recca0120\LoDash\JArray;
use Recca0120\Twzipcode\Rule;
use Recca0120\Twzipcode\Address;
use Recca0120\Twzipcode\Contracts\Storage;

class File implements Storage
{
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
     * cached.
     *
     * @var array
     */
    public static $cached = [
        'zip3' => null,
        'zip5' => null,
    ];

    /**
     * __construct.
     *
     * @param string $path
     */
    public function __construct($path = null)
    {
        $this->path = ($path ?: realpath(__DIR__.'/../../resources/data')).'/';
    }

    /**
     * zip3.
     *
     * @param \Recca0120\Twzipcode\Address $address
     * @return string
     */
    public function zip3(Address $address)
    {
        $this->restore('zip3');
        $flat = $address->flat(2);

        return isset(self::$cached['zip3'][$flat]) === true ? self::$cached['zip3'][$flat] : null;
    }

    /**
     * rules.
     *
     * @param string $zip
     * @return \Recca0120\LoDash\JArray
     */
    public function rules($zip3)
    {
        $this->restore('zip5');

        return isset(self::$cached['zip5'][$zip3]) === true
            ? $this->decompress(self::$cached['zip5'][$zip3])
            : new JArray([]);
    }

    /**
     * load.
     *
     * @param string $source
     * @return static
     */
    public function load($source)
    {
        $zip5 = new JArray;
        $zip3 = new JArray;
        $this->each($this->prepareSource($source), function ($zipcode, $county, $district, $rules) use ($zip5, $zip3) {
            $zip5[$zipcode] = $this->compress(
                (new JArray($rules))->map(function ($rule) {
                    return new Rule($rule);
                })
            );

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
     * loadFile.
     *
     * @param stromg $file
     * @return static
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
     * @return static
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
     * getSource.
     *
     * @param string $file
     * @return string
     */
    protected function getSource($file)
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        if ($extension === 'zip') {
            $zip = new ZipArchive;
            $zip->open($file);
            $content = $zip->getFromIndex(0);
            $zip->close();
        } else {
            $content = file_get_contents($file);
        }

        $content = mb_convert_encoding($content, 'UTF-8', 'UCS-2LE');
        $content = preg_replace("/^\xEF\xBB\xBF/", '', $content);

        return $content;
    }

    /**
     * prepareSource.
     *
     * @param string $source
     * @return array
     */
    protected function prepareSource($source)
    {
        $tickies = [
            '宜蘭縣壯圍鄉' => '263',
            '新竹縣寶山鄉' => '308',
            '臺南市新市區' => '744',
        ];
        $results = [];
        $rules = preg_split('/\n|\r\n$/', $source);
        foreach ($rules as $rule) {
            if (empty(trim($rule)) === false) {
                list($zipcode, $county, $district) = explode(',', $rule);
                $zip3 = isset($tickies[$county.$district]) === true
                    ? $tickies[$county.$district]
                    : substr($zipcode, 0, 3);
                $results[$county][$district][$zip3][] = $rule;
            }
        }

        return $results;
    }

    /**
     * each.
     *
     * @param array $rules
     * @param \Closure $callback
     */
    protected function each($rules, $callback)
    {
        foreach ($rules as $county => $temp) {
            foreach ($temp as $district => $temp2) {
                foreach ($temp2 as $zipcode => $rules) {
                    $callback($zipcode, $county, $district, $rules);
                }
            }
        }
    }

    /**
     * compress.
     *
     * @param \Recca0120\LoDash\JArray $plainText
     * @return string
     */
    protected function compress($plainText)
    {
        $plainText = serialize($plainText);
        $method = 'gzcompress';
        if (function_exists($method) === true) {
            $plainText = call_user_func($method, $plainText);
        }

        return $plainText;
    }

    /**
     * decompress.
     *
     * @param string $compressed
     * @return mix
     */
    protected function decompress($compressed)
    {
        $method = 'gzuncompress';
        if (function_exists($method) === true) {
            $compressed = call_user_func($method, $compressed);
        }

        return unserialize($compressed);
    }

    /**
     * store.
     *
     * @param string $filename
     * @param \Recca0120\LoDash\JArray $data
     * @return static
     */
    protected function store($filename, $data)
    {
        file_put_contents(
            $this->path.$filename.$this->suffix,
            $this->compress($data)
        );

        return $this;
    }

    /**
     * restore.
     *
     * @param string $filename
     * @return mix
     */
    protected function restore($filename)
    {
        if (file_exists($this->path.$filename.$this->suffix) === false) {
            return false;
        }

        if (is_null(self::$cached[$filename]) === false) {
            return self::$cached[$filename];
        }

        return self::$cached[$filename] = $this->decompress(
            file_get_contents($this->path.$filename.$this->suffix)
        );
    }
}
