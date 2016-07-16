<?php

namespace Recca0120\Twzipcode;

use BadMethodCallException;

class Twzipcode
{
    /**
     * $twzipcodeData.
     *
     * @var array
     */
    private static $twzipcodeData = null;

    /**
     * $attributes.
     *
     * @var array
     */
    public $attributes = [];

    /**
     * __construct.
     *
     * @param string $address
     * @param bool   $normalize (false: 不用轉為新5都)
     */
    public function __construct($address)
    {
        self::loadTwzipcodeData();
        $this->attributes = $this->parse($address);
    }

    /**
     * normalizeAddress.
     *
     * @param string $address
     * @param bool   $normalize
     *
     * @return string
     */
    public function normalizeAddress($address, $normalize = true)
    {
        $address = preg_replace('/^\d+/', '', Converter::toHalf($address));
        if ($normalize === false) {
            return $address;
        }
        $normalizer = new Normalizer($address);

        return $normalizer->getAddress();
    }

    /**
     * parse description.
     *
     * @param string $address
     *
     * @return string
     */
    private function parse($address)
    {
        $normalizer = new Normalizer(preg_replace('/^\d+/', '', Converter::toHalf($address)));
        $data = $normalizer->toArray();

        if ($data['county'] === null) {
            return;
        }

        $shortAddress = implode('', [
            $data['town'],
            $data['lin'],
            $data['road'],
            $data['sec'],
            $data['len'],
            $data['non'],
            $data['no'],
            $data['floor'],
            $data['at'],
        ]);
        $address = implode($data);

        return array_merge($data, [
            'zipcode'      => self::$twzipcodeData[$data['county']][$data['district']]['zipcode'],
            'shortAddress' => $shortAddress,
            'address'      => $address,
        ]);
    }

    /**
     * loadTwzipcodeData.
     *
     * @return array
     */
    private static function loadTwzipcodeData()
    {
        if (is_null(self::$twzipcodeData) === true) {
            self::$twzipcodeData = unserialize(gzuncompress(file_get_contents(__DIR__.'/../data/twzipcode.gz')));
        }

        return self::$twzipcodeData;
    }

    /**
     * getAttribute.
     *
     * @param string $attribute
     * @param bool   $fullWidth
     *
     * @return string
     */
    public function getAttribute($attribute, $fullWidth = false)
    {
        if (isset($this->attributes[$attribute]) === false) {
            return;
        }

        $result = $this->attributes[$attribute];
        if ($fullWidth === true) {
            $result = Converter::toFull($result);
        }

        return $result;
    }

    /**
     * toArray.
     *
     * @param bool $fullWidth
     *
     * @return array
     */
    public function toArray($fullWidth = false)
    {
        $attributes = $this->attributes;
        if ($fullWidth === true) {
            foreach ($attributes as $key => $attribute) {
                $attributes[$key] = Converter::toFull($attribute);
            }
        }

        return $attributes;
    }

    /**
     * toJson.
     *
     * @param bool $fullWidth
     *
     * @return string
     */
    public function toJson($fullWidth = false)
    {
        return json_encode($this->toArray($fullWidth));
    }

    /**
     * __call.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (strpos($method, 'get') !== false) {
            $attribute = lcfirst(str_replace('get', '', $method));
            if (array_key_exists($attribute, $this->attributes) == true) {
                return call_user_func_array([$this, 'getAttribute'], array_merge([$attribute], $parameters));
            }
        }

        throw new BadMethodCallException('Call to undefined method '.static::class.'::'.$method.'()');
    }

    /**
     * __toString.
     *
     * @method __toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getAttribute('address');
    }
}
