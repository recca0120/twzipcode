<?php

namespace Recca0120\Twzipcode;

use Closure;
use Recca0120\Lodash\JArray;

class Rule
{
    /**
     * $zip3.
     *
     * @var string
     */
    public $zip3;

    /**
     * $zip5.
     *
     * @var string
     */
    public $zip5;

    /**
     * $address.
     *
     * @var Address
     */
    public $address;

    /**
     * $tokens.
     *
     * @var array
     */
    public $tokens;

    /**
     * __construct.
     *
     * @param  string  $rule
     */
    public function __construct($rule)
    {
        if (preg_match('/^(\d+),?(.*)/', $rule, $m)) {
            $this->zip5 = $m[1];
            $this->zip3 = substr($this->zip5, 0, 3);
            $rule = $m[2];
        }

        $this->tokens = $this->tokenize($rule, function ($address) {
            $this->address = new Address($address);
        });
    }

    /**
     * zip5.
     *
     * @return string
     */
    public function zip5()
    {
        return $this->zip5;
    }

    /**
     * zip.
     *
     * @return string
     */
    public function zip()
    {
        return $this->zip3();
    }

    /**
     * zip3.
     *
     * @return string
     */
    public function zip3()
    {
        return $this->zip3;
    }

    /**
     * match.
     *
     * @param  Address|string  $address
     * @return bool
     */
    public function match($address)
    {
        $ruleAddressTokens = $this->address->tokens();
        $address = $this->normalizeAddress(
            is_a($address, Address::class) === true ? $address : new Address($address),
            $ruleAddressTokens
        );
        $addressTokens = $address->tokens();
        $currentTokens = $this->tokens();

        $cur = $ruleAddressTokens->length() - 1;
        $cur -= $currentTokens->length() > 0 && $currentTokens->includes('全') === false;
        $cur -= $currentTokens->includes('至');

        if ($this->equalsToken($ruleAddressTokens, $addressTokens, $cur) === false) {
            return false;
        }

        $addressPoint = $address->getPoint($cur + 1);

        if ($currentTokens->length() > 0 && $addressPoint->isEmpty() === true) {
            return false;
        }

        $left = $this->address->getPoint($ruleAddressTokens->length() - 1);
        $right = $this->address->getPoint($ruleAddressTokens->length() - 2);

        foreach ($this->tokens as $token) {
            if (
                ($token === '單' && (bool) (($addressPoint->x & 1) === 1) === false) ||
                ($token === '雙' && (bool) (($addressPoint->x & 1) === 0) === false) ||
                ($token === '以上' && $addressPoint->compare($left, '>=') === false) ||
                ($token === '以下' && $addressPoint->compare($left, '<=') === false) ||
                ($token === '至' && (
                    ($right->compare($addressPoint, '<=') && $addressPoint->compare($left, '<=')) ||
                    ($currentTokens->includes('含附號全') === true && ($addressPoint->x === $left->x))
                ) === false) ||
                ($token === '含附號' && ($addressPoint->x === $left->x) === false) ||
                ($token === '附號全' && ($addressPoint->x === $left->x && $addressPoint->y > 0) === false) ||
                ($token === '及以上附號' && $addressPoint->compare($left, '>=') === false) ||
                ($token === '含附號以下' && (
                    $addressPoint->compare($left, '<=') ||
                    $addressPoint->x === $left->x
                ) === false)
            ) {
                return false;
            }
        }

        return true;
    }

    /**
     * tokens.
     *
     * @return JArray
     */
    public function tokens()
    {
        return new JArray($this->tokens);
    }

    /**
     * tokenize.
     *
     * @param  string  $rule
     * @return array
     */
    private function tokenize($rule, Closure $addressResolver)
    {
        $tokens = [];

        $pattern = [
            '及以上附號|含附號以下|含附號全|含附號',
            '以下|以上',
            '附號全',
            '[連至單雙全](?=[\d全]|$)',
        ];

        $addressResolver($this->normalize($rule)->replace('/'.implode('|', $pattern).'/u', function ($m) use (&$tokens) {
            $token = &$m[0];
            if ($token === '連') {
                return '';
            }

            $tokens[] = $token;

            return $token === '附號全' ? '號' : '';
        }));

        return $tokens;
    }

    /**
     * normalize.
     *
     * @param  string  $rule
     * @return Normalizer
     */
    private function normalize($rule)
    {
        $pattern = '((?P<no>\d+)之)?\s*(?P<left>\d+)至之?\s*(?P<right>\d+)(?P<unit>\w)';

        return (new Normalizer($rule))->normalize()->replace('/'.$pattern.'/u', function ($m) {
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
        });
    }

    /**
     * normalizeAddress.
     *
     * @return Address
     */
    private function normalizeAddress(Address $address, JArray $ruleAddressTokens)
    {
        $removeUnits = array_diff(['里', '鄰', '巷', '弄'], (array) $ruleAddressTokens->map(function ($token) {
            return isset($token[Address::UNIT]) === true ? $token[Address::UNIT] : '';
        })->values());

        return new Address(
            new JArray($address->tokens()->filter(function ($token) use ($removeUnits) {
                return isset($token[Address::UNIT]) === true && in_array($token[Address::UNIT], $removeUnits, true) === false;
            })->map(function ($token) {
                return implode('', $token);
            }))
        );
    }

    /**
     * equalsToken.
     *
     * @param  JArray  $ruleAddressTokens
     * @param  JArray  $addressTokens
     * @param  int  $cur
     * @return bool
     */
    private function equalsToken($ruleAddressTokens, $addressTokens, $cur)
    {
        if ($cur >= $addressTokens->length()) {
            return false;
        }

        $i = $cur;
        while ($i >= 0) {
            if ($ruleAddressTokens[$i] !== $addressTokens[$i]) {
                return false;
            }
            $i--;
        }

        return true;
    }
}
