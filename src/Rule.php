<?php

namespace Recca0120\Twzipcode;

use ArrayObject;
use Closure;

class Rule{
    public $zipcode;

    public $address;

    public $tokens;

    public function __construct($rule) {
        if (preg_match('/^(\d+),?(.*)/', $rule, $m)) {
            $this->zipcode = $m[1];
            $rule = $m[2];
        }

        $this->tokens = $this->tokenize(
            Normalizer::make($rule)
                ->regularize()
                ->digitize()
                ->value(),
            function($address) {
                $this->address = new Address($address);
            }
        );
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function getTokens()
    {
        return $this->tokens;
    }

    public function match($address)
    {
        $address = is_a($address, Address::class) === true ? $address : new Address($address);

        $addrTokens = $address->getTokens();

        $tokens = $this->address->getTokens();
        $cur = count($tokens)-1;
        $cur -= count($this->tokens) > 0 && in_array('全', $this->tokens, true) === false;
        $cur -= in_array('至', $this->tokens, true);

        if ($cur >= count($addrTokens)) {
            return false;
        }

        $i = $cur;
        while ($i >= 0) {
            if ($tokens[$i] !== $addrTokens[$i]) {
                return false;
            }
            $i -= 1;
        }

        $addrPoint = $address->getPoint($cur+1);

        if (count($this->tokens) > 0 && $addrPoint->isEmpty() === true) {
            return false;
        }

        $left = $this->address->getPoint(count($tokens) - 1);
        $right = $this->address->getPoint(count($tokens) - 2);

        foreach ($this->tokens as $token) {
            if (
                ($token === '單' && (bool) (($addrPoint->x & 1) === 1) === false) ||
                ($token === '雙' && (bool) (($addrPoint->x & 1) === 0) === false) ||
                ($token === '以上' && $addrPoint->compare($left, '>=') === false) ||
                ($token === '以下' && $addrPoint->compare($left, '<=') === false) ||
                ($token === '至' && (
                    $right->compare($addrPoint, '<=') && $addrPoint->compare($left, '<=') ||
                    in_array('含附號全', $this->tokens, true) === true && ($addrPoint->x == $left->x)
                ) === false) ||
                ($token == '含附號' && ($addrPoint->x === $left->x) === false) ||
                ($token == '附號全' && ($addrPoint->x === $left->x && $addrPoint->y > 0) === false) ||
                ($token == '及以上附號' && $addrPoint->compare($left, '>=') === false) ||
                ($token == '含附號以下' && (
                    $addrPoint->compare($left, '<=') ||
                    $addrPoint->x === $left->x
                ) === false)
            ) {
                return false;
            }
        }

        return true;
    }

    protected function tokenize($rule, Closure $addressResolver)
    {
        $tokens = new ArrayObject;

        $pattern = [
            '及以上附號|含附號以下|含附號全|含附號',
            '以下|以上',
            '附號全',
            '[連至單雙全](?=[\d全]|$)',
        ];

        $addressResolver(preg_replace_callback('/'.implode('|', $pattern).'/u', function($m) use ($tokens) {
            $token =& $m[0];
            if ($token === '連') {
                return;
            }

            $tokens->append($token);

            return $token === '附號全' ? '號' : '';
        }, $rule));

        return $tokens->getArrayCopy();
    }
}
