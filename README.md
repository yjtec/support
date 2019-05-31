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