<?php

namespace Recca0120\Twzipcode;

use Recca0120\Twzipcode\Storages\File;
use Recca0120\Twzipcode\Contracts\Storage;

class Rules
{
    /**
     * __construct.
     *
     * @param Recca0120\Twzipcode\Contracts\Storage $storage
     */
    public function __construct(Storage $storage = null)
    {
        $this->storage = $storage ?: new File();
    }

    /**
     * match.
     *
     * @param string $address
     * @return string
     */
    public function match($address)
    {
        $address = is_a($address, Address::class) === true ? $address : new Address($address);
        $zip3 = $this->storage->zip3($address);

        if (empty($zip3) === true) {
            return;
        }

        $rule = $this->storage->rules($zip3)->find(function ($rule) use ($address) {
            return $rule->match($address);
        });

        return is_null($rule) === false ? $rule->zip5() : $zip3;
    }
}
