<?php
namespace Yjtec\Support;
class Str{
    /**
     * 生成随机字符串
     * @param type $length 生成长度
     * @param type $Big 是否包含大写字母
     * @param type $Num 是否包含数字
     * @param type $lower 是否包含小写字母
     * @param type $s 是否包含符号
     * @return type 生成的字符串
     */
    public static function random($length, $Big = true, $Num = true, $lower = true, $s = false)
    {
        $str = null;
        $strPol = '';
        $strPol .= $Big ? "ABCDEFGHIJKLMNOPQRSTUVWXYZ" : '';
        $strPol .= $Num ? "0123456789" : '';
        $strPol .= $lower ? "abcdefghijklmnopqrstuvwxyz" : '';
        $strPol .= $s ? "~!@#$%^&*()_+|<>?:;,.=-" : '';
        $max = strlen($strPol) - 1;
        for ($i = 0; $i < $length; $i++) {
            $str .= $strPol[rand(0, $max)]; //rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }
        return $str;
    }

    public static function cc2($camelCaps,$separator = '-'){
        return strtolower(preg_replace('/([a-z])([A-Z])/', "$1" . $separator . "$2", $camelCaps));
    }

    public static function uncc2($uncamelized_words,$separator='-')
    {
        $uncamelized_words = $separator. str_replace($separator, " ", strtolower($uncamelized_words));
        return ltrim(str_replace(" ", "", ucwords($uncamelized_words)), $separator );
    }
}