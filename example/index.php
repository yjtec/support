<?php

require __DIR__ . '/../vendor/autoload.php';
use Yjtec\Support\Curl;

//echo Curl::get('http://www.baidu.com');
echo Curl::post('http://www.baidu.com', ['a' => 1, 'b' => 2]);
echo 33333;
echo Curl::post('http://www.baidu.com', ['a' => 1, 'b' => 2]);

echo Curl::post('http://www.baidu.com', ['a' => 1, 'b' => 2]);
echo Curl::post('http://www.baidu.com', ['a' => 1, 'b' => 2]);

echo Curl::put('http://www.baidu.com', ['a' => 1, 'b' => 2]);

echo Curl::delete('http://www.baidu.com');
