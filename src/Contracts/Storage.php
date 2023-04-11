<?php

namespace Recca0120\Twzipcode\Contracts;

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
     * load.
     *
     * @param  string  $source
     * @return $this
     */
    public function load($source);

    /**
     * loadFile.
     *
     * @param  string  $file
     * @return $this
     */
    public function loadFile($file = null);

    /**
     * flush.
     *
     * @return $this
     */
    public function flush();
}
