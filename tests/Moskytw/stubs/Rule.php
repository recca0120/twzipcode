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
        return $this->rule->tokens();
    }

    public function tokens()
    {
        return $this->rule->address->tokens();
    }

    public function match(Address $address)
    {
        return $this->rule->match((string) $address);
    }
}
