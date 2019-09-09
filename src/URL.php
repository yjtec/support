<?php
namespace Yjtec\Support;

class URL
{
    protected $urlArr = [];
    
    public static function parse($uri)
    {
        return parse_url($uri);
    }

    public static function params($url)
    {
        $urlArr = self::parse($url);
        if (!isset($urlArr['query']) || $urlArr['query'] == '') {
            return [];
        }
        $paramsStr = $urlArr['query'];
        $paramsArr = explode('&', $paramsStr);
        $params    = [];
        foreach ($paramsArr as $param) {
            list($key, $value) = explode('=', $param);
            $params[$key]      = $value;
        }
        return $params;
    }

    public static function build($params, $uri = null)
    {
        $tmp = [];
        foreach ($params as $k => $param) {
            $tmp[] = $k . '=' . $param;
        }

        $paramStr = implode('&', $tmp);

        if ($uri) {
            return $uri .'?' . $paramStr;
        }

        return $paramStr;
    }
}
