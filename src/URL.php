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
            $ex = count($tmp) ? '?' : '';
            return $uri . $ex . $paramStr;
        }

        return $paramStr;
    }
    public static function uri($url)
    {
        $arr = self::parse($url);
        $uri = '';
        if(isset($arr['scheme'])){
            $uri .= $arr['scheme'] . "://";
        }
        if(isset($arr['host'])){
            $uri .= $arr['host'];
        }
        if(isset($arr['port'])){
            $uri .= ':'.$arr['port'];
        }
        if(isset($arr['path'])){
            $uri .= $arr['path'];
        }
        return $uri;
    }
    public static function except($filter = [], $url)
    {
        $uri    = self::uri($url);
        $params = self::params($url);
        $keys   = array_keys($params);
        if(is_array($filter)){
            foreach ($filter as $v) {
                if (in_array($v, $keys)) {
                    unset($params[$v]);
                }
            }
        }else{
            if(in_array($filter, $keys)){
                unset($params[$filter]);
            }
        }
        return self::build($params, $uri);
    }
}
