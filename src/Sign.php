<?php
namespace Yjtec\Support;

class Sign
{
    public static function make($secret, $timeStamp, $params, $debug = false)
    {
        ksort($params);
        $paramstr = '';
        foreach ($params as $k => $v) {
            if (is_array($v)){
                $paramstr .= "{$k}[]".implode(',',$v);
            } else {

                $paramstr .= "{$k}{$v}";
            }
        }

        $str        = "{$secret}-{$paramstr}-{$timeStamp}";
        $re['sign'] = md5($str);

        if ($debug) {
            $re['paramstr'] = $str;
        }
        return $re;
    }
}
