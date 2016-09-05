# TWZIPCODE

[![StyleCI](https://styleci.io/repos/60471045/shield?style=flat)](https://styleci.io/repos/60471045)
[![Build Status](https://travis-ci.org/recca0120/twzipcode.svg)](https://travis-ci.org/recca0120/twzipcode)
[![Total Downloads](https://poser.pugx.org/recca0120/twzipcode/d/total.svg)](https://packagist.org/packages/recca0120/twzipcode)
[![Latest Stable Version](https://poser.pugx.org/recca0120/twzipcode/v/stable.svg)](https://packagist.org/packages/recca0120/twzipcode)
[![Latest Unstable Version](https://poser.pugx.org/recca0120/twzipcode/v/unstable.svg)](https://packagist.org/packages/recca0120/twzipcode)
[![License](https://poser.pugx.org/recca0120/twzipcode/license.svg)](https://packagist.org/packages/recca0120/twzipcode)
[![Monthly Downloads](https://poser.pugx.org/recca0120/twzipcode/d/monthly)](https://packagist.org/packages/recca0120/twzipcode)
[![Daily Downloads](https://poser.pugx.org/recca0120/twzipcode/d/daily)](https://packagist.org/packages/recca0120/twzipcode)

用來獲取台灣的區碼

```php
$twzipcode = new Twzipcode('北 縣　萬里鄉中正路100號');
$twzipcode->getZipcode(); // 207
$twzipcode->getCounty(); // 新北市
$twzipcode->getDistrict(); // 萬里區
$twzipcode->getAddress(); // 新北市萬里區中正路100號
$twzipcode->getShortAddress(); // 中正路100號

# 取得全形字串
$twzipcode->getZipcode(true); // '２０７'
$twzipcode->getCounty(true); // '新北市'
$twzipcode->getDistrict(true); // '萬里區'
$twzipcode->getAddress(true); // '新北市萬里區龜港村中正路１００號'
$twzipcode->getShortAddress(true); // '龜港村中正路１００號'
```


# To Do

Zipcode 3 + 2
