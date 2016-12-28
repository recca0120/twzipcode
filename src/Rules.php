<?php

namespace Recca0120\Twzipcode;

use Recca0120\Twzipcode\Storages\File;
use Recca0120\Twzipcode\Contracts\Storage;

class Rules
{
    public function __construct(Storage $storage = null)
    {
        $this->storage = is_null($storage) === true ? new File() : $storage;
    }

    public function match($address)
    {
        $address = is_a($address, Address::class) === true ? $address : new Address($address);

        $zip3 = $this->storage->zip3($address);

        if (is_null($zip3) === false) {
            $rules = $this->storage->rules($zip3);
            foreach ($rules as $rule) {
                if ($rule->match($address) === true) {
                    return $rule->zip5();
                }
            }
        }

        return $zip3;
    }

    public function load($source)
    {
        return $this->storage->load($source);
    }

    public function loadFile($file)
    {
        return $this->storage->loadFile($file);
    }
}
