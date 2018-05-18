# Emobile Project Off-chain API

## Usage
---

```
POST: /emobile/api.php
```


---

## # 新增一筆搭乘記錄

**URL** : `/emobile/api.php`

**Method** : `POST`

**Auth required** : NO

**Permissions required** : None

**Data constraints**

```json
{
    "method": "new_travel",
	"longitude": float,
	"latitude": float,
	"distance": float,
	"user": byte64,
	"driver": byte64,
	"contract": byte64,
}
```

**Data example**: 

```json
{
    "method": "new_travel", //指定方法為新增新增一筆搭乘記錄
	"longitude": 121.525, //經度
	"latitude": 25.0392, //緯度
	"distance": 1.234, //本次搭乘里程數
	"user": "0x0100000000000000000000000000000000000001", //乘客錢包地址
	"driver": "0x0000000000000000000000000000000000000001", //司機錢包地址
	"contract": "0x0000000000000000000000000000000000000002", //emobile合約地址
}
```

### Success Response

**Condition** : If everything is OK and server available.

**Content example**

```json
{
    "result": true,
	"message": "success",
}
```

### Error Responses

**Condition** : 沒有給定method值

**Content example** :

```json
{
    "result": false,
	"message": "no_method",
}
```

**Condition** : method值不正確

**Content example** :

```json
{
    "result": false,
	"message": "invalid_method",
}
```

**Condition** : 必要的值缺失

**Content example** :

```json
{
    "result": false,
	"message": "missing_data",
}
```

**Condition** : 提供的地址資料長度不正確

**Content example** :

```json
{
    "result": false,
	"message": "invalid_address",
}
```
