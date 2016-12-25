<?php
/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/
require __DIR__.'/../vendor/autoload.php';

use Carbon\Carbon;
use Recca0120\Twzipcode\Address;
use Recca0120\Twzipcode\Rule;

/*
|--------------------------------------------------------------------------
| Set The Default Timezone
|--------------------------------------------------------------------------
|
| Here we will set the default timezone for PHP. PHP is notoriously mean
| if the timezone is not explicitly set. This will be used by each of
| the PHP date and date-time functions throughout the application.
|
*/
date_default_timezone_set('UTC');
Carbon::setTestNow(Carbon::now());

function dump($value)
{
    echo mb_convert_encoding(var_export($value, true), 'big5', 'utf8')."\n";
}

class MoskytwAddress
{
    protected $address;

    protected $tokens = [];

    public function __construct($address)
    {
        $this->address = new Address($address);
        $this->tokens = $this->address->getTokens();
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

class MoskytwRule
{
    public function __construct($rule)
    {
        $this->rule = new Rule($rule);
    }

    public function ruleTokens()
    {
        return $this->rule->getTokens();
    }

    public function tokens()
    {
        return $this->rule->address->getTokens();
    }

    public function match(MoskytwAddress $address)
    {
        return $this->rule->match((string) $address);
    }
}

class_alias('MoskytwAddress', 'Recca0120\Twzipcode\Moskytw\Address');
class_alias('MoskytwRule', 'Recca0120\Twzipcode\Moskytw\Rule');
