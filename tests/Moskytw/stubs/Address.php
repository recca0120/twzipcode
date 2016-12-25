<?php

namespace Moskytw;

use Recca0120\Twzipcode\Address as BaseAddress;

class Address
{
    protected $address;

    protected $tokens = [];

    public function __construct($address)
    {
        $this->address = new BaseAddress($address);
        $this->tokens = $this->address->getTokens();
    }

    public function normalize()
    {
        return $this->flat();
    }

    public function flat($length = null)
    {
        if (is_null($length) === true) {
            $length = count($this->tokens);
        } elseif ($length < 0) {
            $length = count($this->tokens) + $length;
        }

        return implode('', array_map(function ($token) {
            return implode('', $token);
        }, array_slice($this->tokens, 0, $length)));
    }

    public function tokens()
    {
        return $this->tokens;
    }

    protected function getTokenPoint($index)
    {
        $point = $this->address->getPoint($index);

        return [$point->x, $point->y];
    }

    public function __toString()
    {
        return (string) $this->address;
    }
}
