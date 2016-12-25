<?php

namespace Moskytw;

use Recca0120\Twzipcode\Storage as BaseStorage;

class Directory
{
    public function __construct($root)
    {
        $this->storage = new BaseStorage($root);
    }

    public function __call($method, $argments)
    {
        return call_user_func_array([$this->storage, $method], $argments);
    }
}
