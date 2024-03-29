<?php

namespace Recca0120\Twzipcode;

class Zipcode
{
    /**
     * $attributes.
     *
     * @var array
     */
    public $attributes = [
        'zip3' => null,
        'zip5' => null,
        'county' => null,
        'district' => null,
        'address' => null,
        'shortAddress' => null,
    ];

    /**
     * $address.
     *
     * @var Address
     */
    private $address;

    /**
     * __construct.
     *
     * @param  string  $address
     * @param  Rules  $rules
     */
    public function __construct($address, Rules $rules = null)
    {
        $rules = $rules ?: new Rules();
        $this->address = new Address($address);
        $zip = (string) $rules->match($this->address);

        $this->attributes['zip3'] = strlen($zip) === 5 ? substr($zip, 0, 3) : $zip;
        $this->attributes['zip5'] = $zip;

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

    /**
     * parse.
     *
     * @return static
     */
    public static function parse($address, Rules $rules = null)
    {
        return new static($address, $rules);
    }

    /**
     * zip3.
     *
     * @return string
     */
    public function zip3()
    {
        return $this->attributes['zip3'];
    }

    /**
     * zip5.
     *
     * @return string
     */
    public function zip5()
    {
        return $this->attributes['zip5'];
    }

    /**
     * county.
     *
     * @return string
     */
    public function county()
    {
        return $this->attributes['county'];
    }

    /**
     * district.
     *
     * @return string
     */
    public function district()
    {
        return $this->attributes['district'];
    }

    /**
     * address.
     *
     * @return string
     */
    public function address()
    {
        return $this->attributes['address'];
    }

    /**
     * shortAddress.
     *
     * @return string
     */
    public function shortAddress()
    {
        return $this->attributes['shortAddress'];
    }
}
