<?php

namespace Moskytw;

use Recca0120\Twzipcode\Rules;
use Recca0120\Twzipcode\Storages\File;

class Directory
{
    public function __construct($root)
    {
        $this->storage = new Rules(new File($root));
    }

    public function find($address) {
        return $this->storage->match($address);
    }

    public function __call($method, $argments)
    {
        return call_user_func_array([$this->storage, $method], $argments);
    }
}
