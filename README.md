# TWZIPCODE

[![Latest Stable Version](https://poser.pugx.org/recca0120/twzipcode/v/stable)](https://packagist.org/packages/recca0120/twzipcode)
[![Total Downloads](https://poser.pugx.org/recca0120/twzipcode/downloads)](https://packagist.org/packages/recca0120/twzipcode)
[![Latest Unstable Version](https://poser.pugx.org/recca0120/twzipcode/v/unstable)](https://packagist.org/packages/recca0120/twzipcode)
[![License](https://poser.pugx.org/recca0120/twzipcode/license)](https://packagist.org/packages/recca0120/twzipcode)
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
```
