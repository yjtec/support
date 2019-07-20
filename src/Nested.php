<?php
namespace Yjtec\Support;

class Nested
{

    /**
     * 返回一维数组
     * @param  [type]  $cate  要递归的数组
     * @param  string  $html  子级分类前要显示的缩进符号。默认 '─'
     * @param  integer $pid   父级分类ID。默认为 0，表示顶级分类
     * @param  integer $level level级，配合 $html 显示足够的缩进。默认为 1，表示顶级分类
     * @return [type]         [description]
     */
    public static function unlimitedForLevel($cate, $html = '─', $pid = 0, $level = 1)
    {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level;
                $v['html']  = str_repeat($html, $level - 1);
                $arr[]      = $v;
                $arr        = array_merge($arr, self::unlimitedForLevel($cate, $html, $v['id'], $level + 1));
            }
        }
        return $arr;
    }

    /**
     * 返回多维数组
     * @param  [type]  $cate 要递归的数组
     * @param  string  $name 子级分类在父分类数组中的 key
     * @param  integer $pid  父级分类ID。默认为0，表示顶级分类
     * @return [type]        [description]
     */
    public static function unlimitedForlayer($cate, $name = 'child', $pid = 0, $level = 1)
    {
        $arr = array();
        foreach ($cate as &$v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level;
                $v[$name]   = self::unlimitedForlayer($cate, $name, $v['id'], $level + 1);
                if (count($v[$name]) == 0) {
                    unset($v[$name]);
                }
                $arr[] = $v;
            }
        }
        return $arr;
    }

    /**
     * 传递子分类ID返回所有父级分类
     * @param  [type] $cate 要递归的数组
     * @param  [type] $id   子分类ID
     * @return [type]       [description]
     */
    public static function getParents($cate, $id)
    {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['id'] == $id) {
                $arr[] = $v;
                $arr   = array_merge(self::getParents($cate, $v['pid']), $arr);
            }
        }
        return $arr;
    }

    /**
     * 传递子分类ID返回所有父级分类ID
     * @param  [type] $cate 要递归的数组
     * @param  [type] $id   子分类ID
     * @return [type]       [description]
     */
    public static function getParentsID($cate, $id)
    {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['id'] == $id) {
                $arr[] = $v['id'];
                $arr   = array_merge(self::getParentsID($cate, $v['pid']), $arr);
            }
        }
        return $arr;
    }

    /**
     * 传递父级分类ID返回所有子分类ID
     * @param  [type] $cate 要递归的数组
     * @param  [type] $pid  父级分类ID
     * @return [type]       [description]
     */
    public static function getChildrenId($cate, $pid)
    {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v['id'];
                $arr   = array_merge($arr, self::getChildrenId($cate, $v['id']));
            }
        }
        return $arr;
    }

    /**
     * 传递父级分类ID返回所有子级分类
     * @param  [type] $cate 要递归的数组
     * @param  [type] $pid  父级分类ID
     * @return [type]       [description]
     */
    public static function getChildren($cate, $pid)
    {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v;
                $arr   = array_merge($arr, self::getChildren($cate, $v['id']));
            }
        }
        return $arr;
    }

}
