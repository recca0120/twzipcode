<?php

namespace Recca0120\Twzipcode;

use Recca0120\Twzipcode\Contracts\Storage;
use Recca0120\Twzipcode\Storages\File;

class Rules
{
    /**
     * $storage.
     *
     * @var Storage
     */
    private $storage;

    /**
     * __construct.
     *
     * @param  Storage  $storage
     */
    public function __construct(Storage $storage = null)
    {
        $this->storage = $storage ?: new File();
    }

    /**
     * match.
     *
     * @param  Address|string  $address
     * @return string|void
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

        return $rule !== null ? $rule->zip5() : $zip3;
    }
}
