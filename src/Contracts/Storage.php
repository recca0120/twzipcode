<?php

namespace Recca0120\Twzipcode\Contracts;

use Recca0120\Lodash\JString;
use Recca0120\Twzipcode\Address;

interface Storage
{
    /**
     * zip3.
     *
     * @return string
     */
    public function zip3(Address $address);

    /**
     * rules.
     *
     * @param  string  $zip3
     * @return JString
     */
    public function rules($zip3);

    /**
     * @return $this
     */
    public function flush();

    /**
     * load.
     *
     * @param  Source  $source
     * @return $this
     */
    public function load($source);
}
