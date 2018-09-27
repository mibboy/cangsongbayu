<!-- TOC -->

- [构造函数](#构造函数)
- [对象属性](#对象属性)
- [对象方法](#对象方法)

<!-- /TOC -->

---

### 构造函数
[ WebSocket 构造函数 ]  
- 新建 WebSocket 实例
- 演示 ：var ws = new WebSocket('ws://localhost:8080');
- 创建 WebSocket 对象后 ，客户端就会与服务器进行连接

---

### 对象属性
[ 对象属性 - readyState ]  
- readyState 属性返回实例对象的当前状态 ，共有四种
- CONNECTING ：值为 0 ，表示正在连接
- OPEN ：值为 1 ，表示连接成功 ，可以通信了
- CLOSING ：值为 2 ，表示连接正在关闭
- CLOSED ：值为 3 ，表示连接已经关闭 ，或者打开连接失败 

[ 对象属性 - onopen ]
- 用于指定连接成功后的回调函数
- 如果要指定多个回调函数 ，可以使用 addEventListener 方法

[ 对象属性 - onclose ]
- 用于指定连接关闭后的回调函数

[ 对象属性 - onmessage ]  
- 用于指定收到服务器数据后的回调函数

---

### 对象方法
