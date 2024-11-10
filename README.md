# TWZIPCODE 3 + 2

[![StyleCI](https://styleci.io/repos/60471045/shield?style=flat)](https://styleci.io/repos/60471045)
[![Build Status](https://travis-ci.org/recca0120/twzipcode.svg)](https://travis-ci.org/recca0120/twzipcode)
[![Total Downloads](https://poser.pugx.org/recca0120/twzipcode/d/total.svg)](https://packagist.org/packages/recca0120/twzipcode)
[![Latest Stable Version](https://poser.pugx.org/recca0120/twzipcode/v/stable.svg)](https://packagist.org/packages/recca0120/twzipcode)
[![Latest Unstable Version](https://poser.pugx.org/recca0120/twzipcode/v/unstable.svg)](https://packagist.org/packages/recca0120/twzipcode)
[![License](https://poser.pugx.org/recca0120/twzipcode/license.svg)](https://packagist.org/packages/recca0120/twzipcode)
[![Monthly Downloads](https://poser.pugx.org/recca0120/twzipcode/d/monthly)](https://packagist.org/packages/recca0120/twzipcode)
[![Daily Downloads](https://poser.pugx.org/recca0120/twzipcode/d/daily)](https://packagist.org/packages/recca0120/twzipcode)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/recca0120/twzipcode/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/recca0120/twzipcode/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/recca0120/twzipcode/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/recca0120/twzipcode/?branch=master)

```php
require __DIR__.'/vendor/autoload.php';

use Recca0120\Twzipcode\Zipcode;

$zipcode = Zipcode::parse('台北市中正區中華路１段25號');
echo $zipcode->zip3(); // 100
echo $zipcode->zip5(); // 10043;
echo $zipcode->county(); // 臺北市
echo $zipcode->district(); // 中正區
echo $zipcode->address(); // 臺北市中正區中華路1段25號
echo $zipcode->shortAddress(); //中華路1段25號
```
