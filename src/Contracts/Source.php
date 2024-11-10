<?php

namespace Recca0120\Twzipcode\Contracts;

interface Source
{
    public function each(callable $callback);
}
