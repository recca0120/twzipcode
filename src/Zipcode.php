<?php

namespace Recca0120\Twzipcode;

class Zipcode
{
    public $attributes = [
        'zip3' => null,
        'zip5' => null,
        'county' => null,
        'district' => null,
        'address' => null,
        'shortAddress' => null,
    ];

    public function __construct($address, Rules $rules = null)
    {
        $rules = $rules ?: new Rules();
        $this->address = new Address($address);
        $zip = $rules->match($this->address);

        if (strlen($zip) === 5) {
            $this->attributes['zip3'] = substr($zip, 0, 3);
            $this->attributes['zip5'] = $zip;
        } else {
            $this->attributes['zip3'] = $zip;
            $this->attributes['zip5'] = $zip;
        }

        $this->attributes['county'] = empty($this->attributes['zip3']) === false
            ? $this->address->flat(1, 0)
            : null;

        $this->attributes['district'] = empty($this->attributes['zip3']) === false
            ? $this->address->flat(1, 1)
            : null;

        $this->attributes['shortAddress'] = empty($this->attributes['zip3']) === false
            ? $this->address->flat(null, 2)
            : $this->address->flat();

        $this->attributes['address'] = $this->address->flat();
    }

    public function zip3()
    {
        return $this->attributes['zip3'];
    }

    public function zip5()
    {
        return $this->attributes['zip5'];
    }

    public function county()
    {
        return $this->attributes['county'];
    }

    public function district()
    {
        return $this->attributes['district'];
    }

    public function address()
    {
        return $this->attributes['address'];
    }

    public function shortAddress()
    {
        return $this->attributes['shortAddress'];
    }

    public static function parse($address, Rules $rules = null)
    {
        return new static($address, $rules);
    }
}
