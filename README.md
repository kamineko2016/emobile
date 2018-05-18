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

```
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
    "method": "new_travel", //指定方法為 新增一筆搭乘記錄
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


---

## # 取得乘客的搭乘記錄

**URL** : `/emobile/api.php`

**Method** : `POST`

**Auth required** : NO

**Permissions required** : None

**Data constraints**

```
{
    "method": "get_user_travel",
    "user": byte64,
}
```

**Data example**: 

```json
{
    "method": "get_user_travel", //指定方法為 取得乘客的搭乘記錄
    "user": "0x0100000000000000000000000000000000000001", //乘客錢包地址
}
```

### Success Response

**Condition** : If everything is OK and server available.

**Content example**

```json
{
    "result": true,
    "message": "success",
    "count": 2, //資料的總數量 沒有資料則為0
    "data": [
        {
            "id": "1", //每筆搭乘記錄的唯一ID
            "user": "0x0100000000000000000000000000000000000001", //乘客錢包地址
            "driver": "0x0000000000000000000000000000000000000001", //司機錢包地址
            "contract": "0x0000000000000000000000000000000000000002", //emobile合約地址
            "longitude": "121.525", //經度(注意拿到的資料型態是字串)
            "latitude": "25.0392", //緯度(注意拿到的資料型態是字串)
            "distance": "1.234", //本筆搭乘里程數(注意拿到的資料型態是字串)
        },
        {
            "id": "2",
            "user": "0x0100000000000000000000000000000000000001",
            "driver": "0x0000000000000000000000000000000000000001",
            "contract": "0x0000000000000000000000000000000000000002",
            "longitude": "121.525",
            "latitude": "25.0392",
            "distance": "1.234",
        },
    ],
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


---

## # 取得司機的載客記錄

**URL** : `/emobile/api.php`

**Method** : `POST`

**Auth required** : NO

**Permissions required** : None

**Data constraints**

```
{
    "method": "get_driver_travel",
    "driver": byte64,
}
```

**Data example**: 

```json
{
    "method": "get_driver_travel", //指定方法為 取得司機的載客記錄
    "driver": "0x0000000000000000000000000000000000000001", //司機錢包地址
}
```

### Success Response

**Condition** : If everything is OK and server available.

**Content example**

```json
{
    "result": true,
    "message": "success",
    "count": 2, //資料的總數量 沒有資料則為0
    "data": [
        {
            "id": "1", //每筆搭乘記錄的唯一ID
            "user": "0x1100000000000000000000000000000000000001", //乘客錢包地址
            "driver": "0x0000000000000000000000000000000000000001", //司機錢包地址
            "contract": "0x0000000000000000000000000000000000000002", //emobile合約地址
            "longitude": "121.525", //經度(注意拿到的資料型態是字串)
            "latitude": "25.0392", //緯度(注意拿到的資料型態是字串)
            "distance": "1.234", //本筆搭乘里程數(注意拿到的資料型態是字串)
        },
        {
            "id": "2",
            "user": "0x2100000000000000000000000000000000000001",
            "driver": "0x0000000000000000000000000000000000000001",
            "contract": "0x0000000000000000000000000000000000000002",
            "longitude": "121.525",
            "latitude": "25.0392",
            "distance": "1.234",
        },
    ],
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
