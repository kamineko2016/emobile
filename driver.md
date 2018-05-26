# Emobile Project Off-chain API

## Usage
---

```
POST: /emobile/driver.php
```


---

## # 新增一筆司機資料

**URL** : `/emobile/driver.php`

**Method** : `POST`

**Auth required** : NO

**Permissions required** : None

**Data constraints**

```
{
    "method": "new_driver",
    "driver": byte64,
    "phone": string,
    "name": string,
    "plate": string,
    "credit": int,
}
```

**Data example**: 

```json
{
    "method": "new_driver", //指定方法為 新增一筆司機資料
    "driver": "0x0000000000000000000000000000000000000001", //司機錢包地址
	"phone": "0912345678", //司機電話
    "name": "王小明", //司機姓名
    "plate": "ABC-0000", //司機車牌
    "credit": 1, //本次乘客給的評價
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

## # 取得一筆司機資料

**URL** : `/emobile/driver.php`

**Method** : `POST`

**Auth required** : NO

**Permissions required** : None

**Data constraints**

```
{
    "method": "get_driver",
    "driver": byte64,
}
```

**Data example**: 

```json
{
    "method": "get_driver", //指定方法為 取得一筆司機資料
    "driver": "0x0100000000000000000000000000000000000001", //司機錢包地址
}
```

### Success Response

**Condition** : If everything is OK and server available.

**Content example**

```json
{
    "result": true,
    "message": "success",
    "count": 1, //資料的總數量 沒有資料則為0
    "data": [
        {
            "id": "1", //每筆司機資料的唯一ID
            "driver": "0x0000000000000000000000000000000000000001", //司機錢包地址
            "name": "王小明", //司機姓名
            "phone": "0912345678", //司機電話
            "plate": "ABC-0000", //司機車牌
            "credit": "1", //本次乘客給的評價(注意拿到的資料型態是字串)
        }
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

## # 取得全部司機資料

**URL** : `/emobile/driver.php`

**Method** : `POST`

**Auth required** : NO

**Permissions required** : None

**Data constraints**

```
{
    "method": "get_all_driver"
}
```

**Data example**: 

```json
{
    "method": "get_all_driver", //指定方法為 取得全部司機資料
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
            "id": "1", //每筆司機資料的唯一ID
            "driver": "0x0000000000000000000000000000000000000001", //司機錢包地址
            "name": "王小明", //司機姓名
            "phone": "0912345678", //司機電話
            "plate": "ABC-0000", //司機車牌
            "credit": "1", //本次乘客給的評價(注意拿到的資料型態是字串)
        },
        {
            "id": "2",
            "driver": "0x0000000000000000000000000000000000000002",
            "name": "王二明",
            "phone": "0900111222",
            "plate": "ABC-0001",
            "credit": "0",
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
