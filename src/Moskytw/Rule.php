<?php

namespace Recca0120\Twzipcode\Moskytw;

class Rule extends Address
{
    public static $ruleTokenRe = [
        '及以上附號|含附號以下|含附號全|含附號',
        '|',
        '以下|以上',
        '|',
        '附號全',
        '|',
        '[連至單雙全](?=[\d全]|$)',
    ];

    public $zipcode;

    public $ruleTokens = [];

    public function __construct($rule, $zipcode = null)
    {
        $this->zipcode = $zipcode;
        $address = $this->parseRule($rule);
        parent::__construct($address);
    }

    public function ruleTokens()
    {
        return $this->ruleTokens;
    }

    public function match(Address $address)
    {
        $addressTokens = $address->tokens();
        $tokens = $this->tokens();

        $lastestTokenPoint = count($tokens) - 1;
        $lastestTokenPoint -= count($this->ruleTokens) > 0 && in_array('全', $this->ruleTokens, true) === false;
        $lastestTokenPoint -= in_array('至', $this->ruleTokens, true);

        if ($lastestTokenPoint >= count($addressTokens)) {
            return false;
        }

        $i = $lastestTokenPoint;
        while ($i >= 0) {
            if ($tokens[$i] !== $addressTokens[$i]) {
                return false;
            }
            $i -= 1;
        }

        $addressTokenPoint = $address->getTokenPoint($lastestTokenPoint + 1);

        if (count($this->ruleTokens) > 0 && $addressTokenPoint === [0, 0]) {
            return false;
        }

        $rangeStartPoint = $this->getTokenPoint(count($tokens) - 1);
        $rangeEndPoint = $this->getTokenPoint(count($tokens) - 2);

        foreach ($this->ruleTokens as $ruleToken) {
            if (
                ($ruleToken === '單' && (bool) (($addressTokenPoint[0] & 1) === 1) === false) ||
                ($ruleToken === '雙' && (bool) (($addressTokenPoint[0] & 1) === 0) === false) ||
                ($ruleToken === '以上' && $this->comparePoint($addressTokenPoint, $rangeStartPoint, '>=') === false) ||
                ($ruleToken === '以下' && $this->comparePoint($addressTokenPoint, $rangeStartPoint, '<=') === false) ||
                ($ruleToken === '至' && (
                    $this->comparePoint($rangeEndPoint, $addressTokenPoint, '<=') && $this->comparePoint($addressTokenPoint, $rangeStartPoint, '<=') ||
                    in_array('含附號全', $this->ruleTokens, true) === true && ($addressTokenPoint[0] == $rangeStartPoint[0])
                ) === false) ||
                ($ruleToken == '含附號' && ($addressTokenPoint[0] === $rangeStartPoint[0]) === false) ||
                ($ruleToken == '附號全' && ($addressTokenPoint[0] === $rangeStartPoint[0] && $addressTokenPoint[1] > 0) === false) ||
                ($ruleToken == '及以上附號' && $this->comparePoint($addressTokenPoint, $rangeStartPoint, '>=') === false) ||
                ($ruleToken == '含附號以下' && (
                    $this->comparePoint($addressTokenPoint, $rangeStartPoint, '<=') ||
                    $addressTokenPoint[0] === $rangeStartPoint[0]
                ) === false)
            ) {
                return false;
            }
        }

        return true;
    }

    protected function parseRule($rule)
    {
        $rule = Helper::normalizeAddress($rule);

        return preg_replace_callback('/'.implode('', static::$ruleTokenRe).'/u', function ($m) {
            $token = &$m[0];
            $retval = '';

            if ($token === '連') {
                $token = '';
            } elseif ($token === '附號全') {
                $retval = '號';
            }

            if (empty($token) === false) {
                $this->ruleTokens[] = $token;
            }

            return $retval;
        }, $rule);
    }

    protected function comparePoint($originPoint, $targetPoint, $operator = '=')
    {
        switch ($operator) {
            case '>':
                return $originPoint[0] > $targetPoint[0] || ($originPoint[0] == $targetPoint[0] && $originPoint[1] > $targetPoint[1]);
                break;
            case '>=':
                return $originPoint[0] > $targetPoint[0] || ($originPoint[0] == $targetPoint[0] && $originPoint[1] >= $targetPoint[1]);
                break;
            case '<':
                return $originPoint[0] < $targetPoint[0] || ($originPoint[0] == $targetPoint[0] && $originPoint[1] < $targetPoint[1]);
                break;
            case '<=':
                return $originPoint[0] < $targetPoint[0] || ($originPoint[0] == $targetPoint[0] && $originPoint[1] <= $targetPoint[1]);
                break;
        }

        return $originPoint[0] == $targetPoint[0] && $originPoint[1] == $targetPoint[1];
    }
}
