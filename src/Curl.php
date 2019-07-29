<?php
namespace Yjtec\Support;

class Curl
{
    private $method; // 请求方式
    public function __construct($method)
    {
        $this->method = $method;
    }
    public function curlGet($url, $post_data = 0, $header =[])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($this->method == 'post') {
            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        } elseif ($this->method == 'get') {
            curl_setopt($ch, CURLOPT_HEADER, 0);
        }
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    //Curl::get($url);
    //Curl::post($url,['asdf'=>1])
    public static function __callStatic($method, $arguments)
    {
        $data = [];
        if (count($arguments) == 1) {
            list($url) = $arguments;
        } else {
            list($url, $data,$header) = $arguments;
        }
        $obj = new self($method);
        return $obj->curlGet($url, $data,$header);
    }
}
