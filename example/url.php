<?php 
require __DIR__ . '/../vendor/autoload.php';
use Yjtec\Support\URL;
$url = "http://dev.mapbd.360vrsh.com/user?ticket=WnTw5qPtlo3PaxQxiwy9a4uvWiDUx1iozd65ts9EXSeBjxt1y2u5ctfKdXHo&type=1&b=2";
$urlParams = [
    'ticket' => 'WnTw5qPtlo3PaxQxiwy9a4uvWiDUx1iozd65ts9EXSeBjxt1y2u5ctfKdXHo',
    'type' => 1
];
//print_r(URL::parse($url)); // 解析url


//print_r(URL::params($url));

//echo URL::build($urlParams,'http://dev.mapbd.360vrsh.com/user');
//
//URL::init($url)->except('ticket')->url();
//echo URL::build(['ab'=>1,'c'=>2],'http://www.baidu.com');
//echo URL::uri($url);
echo URL::except('ticket',$url);


?>