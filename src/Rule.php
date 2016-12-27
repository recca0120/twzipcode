<?php

namespace Recca0120\Twzipcode;

use Closure;
use ArrayObject;

class Rule
{
    public $zipcode;

    public $address;

    public $tokens;

    public function __construct($rule)
    {
        if (preg_match('/^(\d+),?(.*)/', $rule, $m)) {
            $this->zipcode = $m[1];
            $rule = $m[2];
        }

        $this->tokens = $this->tokenize(
            $this->normalize($rule),
            function ($address) {
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

        $addressTokens = $address->getTokens();
        $ruleAddressTokens = $this->address->getTokens();

        $cur = count($ruleAddressTokens) - 1;
        $cur -= count($this->tokens) > 0 && in_array('全', $this->tokens, true) === false;
        $cur -= in_array('至', $this->tokens, true);

        if ($this->equalsToken($ruleAddressTokens, $addressTokens, $cur) === false) {
            return false;
        }

        $addressPoint = $address->getPoint($cur + 1);

        if (count($this->tokens) > 0 && $addressPoint->isEmpty() === true) {
            return false;
        }

        $left = $this->address->getPoint(count($ruleAddressTokens) - 1);
        $right = $this->address->getPoint(count($ruleAddressTokens) - 2);

        foreach ($this->tokens as $token) {
            if (
                ($token === '單' && (bool) (($addressPoint->x & 1) === 1) === false) ||
                ($token === '雙' && (bool) (($addressPoint->x & 1) === 0) === false) ||
                ($token === '以上' && $addressPoint->compare($left, '>=') === false) ||
                ($token === '以下' && $addressPoint->compare($left, '<=') === false) ||
                ($token === '至' && (
                    $right->compare($addressPoint, '<=') && $addressPoint->compare($left, '<=') ||
                    in_array('含附號全', $this->tokens, true) === true && ($addressPoint->x == $left->x)
                ) === false) ||
                ($token == '含附號' && ($addressPoint->x === $left->x) === false) ||
                ($token == '附號全' && ($addressPoint->x === $left->x && $addressPoint->y > 0) === false) ||
                ($token == '及以上附號' && $addressPoint->compare($left, '>=') === false) ||
                ($token == '含附號以下' && (
                    $addressPoint->compare($left, '<=') ||
                    $addressPoint->x === $left->x
                ) === false)
            ) {
                return false;
            }
        }

        return true;
    }

    protected function equalsToken($ruleAddressTokens, $addressTokens, $cur)
    {
        if ($cur >= count($addressTokens)) {
            return false;
        }

        $i = $cur;
        while ($i >= 0) {
            if ($ruleAddressTokens[$i] !== $addressTokens[$i]) {
                return false;
            }
            $i -= 1;
        }

        return true;
    }

    protected function normalize($rule)
    {
        $rule = Normalizer::make($rule, true)->value();

        $pattern = '((?P<no>\d+)之)?\s*(?P<left>\d+)至之?\s*(?P<right>\d+)(?P<unit>\w)';

        return preg_replace_callback('/'.$pattern.'/u', function ($m) {
            $prefix = ':left:unit至:right:unit';
            if (empty($m['no']) === false) {
                $prefix = ':no之:left:unit至:no之:right:unit';
            }

            return strtr($prefix, [
                ':no' => $m['no'],
                ':left' => $m['left'],
                ':right' => $m['right'],
                ':unit' => $m['unit'],
            ]);
        }, $rule);
    }

    protected function tokenize($rule, Closure $addressResolver)
    {
        $tokens = new ArrayObject();

        $pattern = [
            '及以上附號|含附號以下|含附號全|含附號',
            '以下|以上',
            '附號全',
            '[連至單雙全](?=[\d全]|$)',
        ];

        $addressResolver(preg_replace_callback('/'.implode('|', $pattern).'/u', function ($m) use ($tokens) {
            $token = &$m[0];
            if ($token === '連') {
                return;
            }

            $tokens->append($token);

            return $token === '附號全' ? '號' : '';
        }, $rule));

        return $tokens->getArrayCopy();
    }
}
