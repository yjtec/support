# yjtec support
## 1.Curl

> php post和get请求

### 1.1 Curl::get($url)

```
    Curl::get('http://www.baidu.com');
```

### 1.2 Curl::post($url,$data);

```
    echo Curl::post('http://www.baidu.com',['a'=>1,'b'=>2]);
```

### 1.3 Curl::put($url,$data);

```
    echo Curl::put('http://www.baidu.com',['a'=>1,'b'=>2]);
```

## 2.sign

### 1.1 sign::make($secret,$timestamp,$data,[debug:true|false]);
#### 参数
 $secret 密钥
 $timestamp 当前时间戳（time()）
 $data 要加密的数据
### 返回 array

['sign'=>'43ad8f0ab5573fc6fe0a60b5b6ed7216']

如果debug 为ture 

[
    'sign' => '43ad8f0ab5573fc6fe0a60b5b6ed7216',
    'paramstr' => 'lbfK571EUHt7oDEYA46D0ylY5zZhbuIi-appidSxmfErjzem3ylFBAout_trade_no12312300123123-1559295437'
]

## 3.str
###3.1 random 
```
Str::random($len,[$big:true],[$num:true],[$lower:true],[$s:false])
```
#### 参数
1. $length 生成长度
2. $Big 是否包含大写字母
3. $Num 是否包含数字
4. $lower 是否包含小写字母
5. $s 是否包含符号

### 3.2 cc2 驼峰转字符串
```
Str::cc2($camelCaps,[$separator:'-'])
```
#### 参数
1. $camelCaps [string] 驼峰命名字符串
2. $separator [string] 连接字符串 可选

### 3.3 uncc2 连接符转驼峰

```
Str::uncc2($uncamelized_words,[$separator:'-'])
```

同上

## 3.Nested

#无限级分类

## 3.1.unlimitedForLevel(cate,[html='-'],[$pid=0],$level=1) static

>无线分类组合成一位数组

```
Nested::unlimitedForLevel($arr)
```

## 3.2.unlimitedForlayer($cate,[$name="child"],[$pid=0])

> 返回多维数组

```
Nested::unlimitedForlayer($cate)
```

## 3.3.getParents($cate,$pid)

> 返回子分类的所有父级ID

## 3.4.getChildrenId($cate,$pid)

> s返回所有子分类的ID

## 3.5.getChildren($cate,$pid)

> 返回所有子级分类

