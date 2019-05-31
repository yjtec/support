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

