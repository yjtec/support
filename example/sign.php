<?php 
require __DIR__.'/../vendor/autoload.php';
use Yjtec\Support\Sign;
$params['appid'] = 'SxmfErjzem3ylFBA';
$params['out_trade_no'] = '12312300123123';
$params = Sign::make('lbfK571EUHt7oDEYA46D0ylY5zZhbuIi',time(),$params);
var_dump($params);
?>