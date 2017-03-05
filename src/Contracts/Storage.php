<?php

namespace Recca0120\Twzipcode\Contracts;

use Recca0120\Twzipcode\Address;

interface Storage
{
    /**
     * zip3.
     *
     * @param \Recca0120\Twzipcode\Address $address
     * @return string
     */
    public function zip3(Address $address);

    /**
     * rules.
     *
     * @param string $zip
     * @return string
     */
    public function rules($zip3);

    /**
     * load.
     *
     * @param stromg $source
     * @return static
     */
    public function load($source);

    /**
     * loadFile.
     *
     * @param stromg $file
     * @return static
     */
    public function loadFile($file = null);

    /**
     * flush.
     *
     * @return static
     */
    public function flush();
}
