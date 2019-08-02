<?php
namespace Yjtec\Support;

class Curl
{
    private $method; // 请求方式
    private static $instance = null;
    public function __construct($method)
    {
        $this->ch     = curl_init();
        $this->method = $method;
    }
    private function __clone()
    {}
    public static function getInstance($method)
    {
        if (self::$instance instanceof self) {
            curl_reset(self::$instance->ch);
            return self::$instance;
        } else {
            self::$instance = new self($method);
            return self::$instance;
        }
    }
    public function curlGet($url, $post_data = 0, $header = [])
    {
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        if ($this->method == 'post') {
            curl_setopt($this->ch, CURLOPT_POST, 1);

            curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post_data);
        } elseif ($this->method == 'get') {
            curl_setopt($this->ch, CURLOPT_HEADER, 0);
        }
        $output = curl_exec($this->ch);
        return $output;
    }

    //Curl::get($url);
    //Curl::post($url,['asdf'=>1])
    public static function __callStatic($method, $arguments)
    {
        $data   = [];
        $header = [];
        if (count($arguments) == 1) {
            list($url) = $arguments;
        } else if (count($arguments) == 3) {
            list($url, $data, $header) = $arguments;
        } else {
            list($url, $data) = $arguments;
        }
        $obj = self::getInstance($method);
        return $obj->curlGet($url, $data, $header);
    }

    public function __destruct()
    {
        curl_close($this->ch);
    }
}
