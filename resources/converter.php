<?php

include __DIR__.'/../vendor/autoload.php';

use Recca0120\Twzipcode\Storages\File;

$start = microtime(true);
$file = __DIR__.'/Zip32_utf8_10501_1.zip';

// https://sheethub.com/data.gov.tw/%E6%94%BF%E5%BA%9C%E8%B3%87%E6%96%99%E9%96%8B%E6%94%BE%E5%B9%B3%E8%87%BA%E8%B3%87%E6%96%99%E9%9B%86%E6%B8%85%E5%96%AE/linelink/6
$url = 'http://download.post.gov.tw/post/download/Zip32_utf8_10501_1.csv';

if (file_exists($file) === false) {
    touch($file);
    $zip = new ZipArchive;
    $zip->open($file);
    $zip->addFromString(
        basename($url),
        file_get_contents($url)
    );
    $zip->close();
}

(new File())->loadFile($file);

echo 'benchmark: '.(microtime(true) - $start)."\n";
