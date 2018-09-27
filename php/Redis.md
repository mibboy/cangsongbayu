### 连接
[ connect ]、[ open ]  
- 功能 ：连接到 Redis 实例  
- 参数 ：  
    1. host ：主机地址
    2. port ：端口
    3. timeout ：超时时间
- 返回值 ：连接成功返回 true ，失败返回 false

[ pconnect ]、[ popen ]
- 功能 ：连接到 Redis 实例或复用已建立的连接
- 参数 ：
    1. host ：主机地址
    2. port ：端口
    3. timeout ：超时时间
- 返回值 ：连接成功返回 true ，失败返回 false

[ auth ]
- 功能 ：使用密码验证连接
- 参数 ：
    1. STRING ：密码
- 返回值 ：通过身份验证返回 true ，失败返回 false

[ select ]
- 功能 ：更改当前连接的数据库
- 参数 ：
    1. INTEGER ：要切换到的数据库编号 ，0 ~ 15 共十六个库
- 返回值 ：成功返回 true ，失败返回 false

[ close ]
- 功能 ：断开与 Redis 实例的连接
- 返回值 ：成功返回 true ，失败返回 false 

[ ping ]
- 功能 ：检测当前连接状态
- 返回值 ：+PONG 表示连接有效

---

### 有效时间
[ ttl ]
- 功能 ：查看指定键的有效时间
- 参数 ：
    1. KEY ：要查看的键
- 返回值 ：TIMESTAMP

[ persist ]
- 功能 ：删除失效时间
- 参数 ：
    1. KEY ：要删除失效时间的键
- 返回值 ：删除成功 true ，如果 key 不存在或没有到期计时器返回 false

[ expire ]
- 功能 ：设置键的失效时间
- 参数 ：
    1. KEY ：键
    2. INTEGER ：键的有效时间 ，以秒为单位
- 返回值 ：成功返回 true ，失败返回 false

[ pexpire ]
- 功能 ：设置键的失效时间
- 参数 ：
    1. KEY ：键
    2. INTEGER ：键的有效时间 ，以毫秒为单位
- 返回值 ：成功返回 true ，失败返回 false

---

### 服务
[ DBSIZE ]
- 功能 ：返回当前库中 KEY 的个数
- 返回值 ：INTEGER

[ flushAll ]
- 功能 ：清空整个 Redis
- 返回值 ：true

[ flushDB ]
- 功能 ：清空当前库
- 返回值 ：true
---

### STRING
[ strlen ]
- 功能 ：获取 KEY 的长度
- 参数 ：
    1. KEY ：键
- 返回值 ：INTEGER

[ append ]
- 功能 ：向指定的 KEY 追加 VALUE
- 参数 ：
    1. KEY ：键
    2. VALUE ：要追加的值
- 返回值 ：追加后的长度

[ INCR ]
- 功能 ：自增
- 参数 ：
    1. KEY ：键
- 返回值 ：增加后的值

[ INCRBY ]
- 功能 ：增加指定的值
- 参数 ：
    1. KEY ：键
    2. VALUE ：要增加的值
- 返回值 ：增加后的值

[ DECR ]
- 功能 ：自减
- 参数 ：
    1. KEY ：键
- 返回值 ：减少后的值

[ DECRBY ]
- 功能 ：减去指定的值
- 参数 ：
    1. KEY ：键
    2. VALUE ：要减去的值
- 返回值 ：减少后的值

[ SETEX ]
- 功能 ：设置指定的值 ，并指定有效时间
- 参数 ：
    1. KEY ：键
    2. VALUE ：值
    3. TIMEOUT ：有效时间 ，单位秒
- 返回值 ：成功返回 true ，失败返回 false

[ PSETEX ]
- 功能 ：设置指定的值 ，并指定有效时间
- 参数 ：
    1. KEY ：键
    2. VALUE ：值
    3. TIMEOUT ：有效时间 ，单位毫秒
- 返回值 ：成功返回 true ，失败返回 false

---

