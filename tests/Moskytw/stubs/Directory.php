<?php

namespace Moskytw;

use Recca0120\Twzipcode\Rules;
use Recca0120\Twzipcode\Storages\File;

class Directory
{
    public function __construct($root)
    {
        $this->storage = new File($root);
        $this->rules = new Rules($this->storage);
    }

    public function __call($method, $argments)
    {
        return call_user_func_array([$this->rules, $method], $argments);
    }

    public function load($source)
    {
        $this->storage->flush()->load($source);

        return $this;
    }

    public function find($address)
    {
        return $this->rules->match($address);
    }
}
