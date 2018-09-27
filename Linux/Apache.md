<!-- TOC -->

- [安装流程](#安装流程)
- [文件说明](#文件说明)
- [配置文件说明](#配置文件说明)
- [Apahce 相关命令](#apahce-相关命令)

<!-- /TOC -->
### 安装流程
[ 下载 ]  
- httpd 地址 ：wget http://www-eu.apache.org/dist//httpd/httpd-2.4.34.tar.gz
- apr 地址 ：wget http://www-eu.apache.org/dist//apr/apr-1.6.5.tar.gz
- apr-util 地址 ：wget http://www-eu.apache.org/dist//apr/apr-util-1.6.1.tar.gz

[ 解压 ]
- httpd ：tar -zxvf httpd-2.4.34.tar.gz
- apr ：tar -zxvf apr-1.6.5.tar.gz
- apr-util ：tar -zxvf apr-util-1.6.1.tar.gz

[ 将 apr 和 apr-util 移动到 httpd ]
- 修改 apr 目录名 ：mv apr-1.6.5 apr
- 修改 apr-util 目录名 ：mv apr-util-1.6.1 apr-util
- 将 apr 和 apr-util 移动到 httpd 目录下 ：mv apr apr-util httpd-2.4.34/srclib

[ 安装依赖 ]  
- yum install -y gcc  
- yum install -y gcc++  
- yum install -y zlib  
- yum install -y zlib-devel  
- yum install -y expat-devel  
- yum install -y pcre-devel  
- yum install -y libxml2-devel  

[ 编译安装 ]
- 编译 ：./configure --prefix=/usr/local/apache
- 生成二进制执行文件 ：make
- 执行二进制文件 ：make install
- 删除编译垃圾文件 ：make clean

---

### 文件说明
配置文件 ：conf/httpd.conf  
访问日志 ：logs/access_log  
错误日志 ：logs/error_log

---

### 配置文件说明
[ 配置文件信息说明 ]  
- 注释信息 ：以 # 开头  
- 全局配置 ：作用于所有子站点 ，如 ServerRoot、ServerName  
- 区域配置 ：作用于单独的子站点 ，如 \<Directory>\</Directory>  

[ 参数说明 ]
- ServerRoot ：服务目录
- ServerAdmin ：管理员邮箱
- ServerName ：网站服务器的域名
- DocumentRoot ：网站数据目录
- Listen ：监听端口
- DirectoryIndex ：默认索引文件
- ErrorLog ：错误日志文件
- CustomLog ：访问日志文件
- Timeout ：请求超时时间 ，默认 300 秒
- User ：运行服务的用户
- Group ：运行服务的用户组

---

### Apahce 相关命令
[ 查看服务是否安装 ]  
- /usr/local/apache/bin/apachectl -v
- /usr/local/apache/bin/httpd -v  

[ 查看服务是否启动 ] 
- 通过端口查看，netstat -an | grep 80
- 通过进程查看，ps -aux | grep httpd

[ 启动和停止 ]   
- 启动 ：/usr/local/apache/bin/apachectl start
- 停止 ：/usr/local/apache/bin/apachectl stop

---