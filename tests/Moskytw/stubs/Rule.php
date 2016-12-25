<?php

namespace Moskytw;

use Recca0120\Twzipcode\Rule as BaseRule;

class Rule
{
    public function __construct($rule)
    {
        $this->rule = new BaseRule($rule);
    }

    public function ruleTokens()
    {
        return $this->rule->getTokens();
    }

    public function tokens()
    {
        return $this->rule->address->getTokens();
    }

    public function match(Address $address)
    {
        return $this->rule->match((string) $address);
    }
}
