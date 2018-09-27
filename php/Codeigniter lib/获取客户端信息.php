<?php
/**
 * @return array
 * 返回值说明
 * array['is_robot'] ：是否机器人
 * array['is_browser'] ：是否浏览器
 * array['is_mobile'] ：是否移动设备
 * array['robot'] ：机器人名称
 * array['browser'] ：客户端浏览器名称
 * array['mobile'] ：移动设备名称
 * array['platform'] ：平台名称
 * array['version'] ：浏览器版本号
 * array['agent'] ：用户代理字符串
 * 
 */
function get_client_info(){
    // 初始化用户代理
    $this -> load -> library('user_agent');
    // 获取客户端ip
    $client_info['ip'] = $this -> input -> ip_address();
    // 判断是否是机器人
    $client_info['is_robot'] = $this -> agent -> is_robot();
    // 获取机器人名称
    $client_info['robot'] = $this -> agent -> robot();
    // 判断是否是浏览器
    $client_info['is_browser'] = $this -> agent -> is_browser();
    // 获取浏览器名称
    $client_info['browser'] = $this -> agent -> browser();
    // 判断是否是移动设备
    $client_info['is_mobile'] = $this -> agent -> is_mobile();
    // 获取移动设备名称
    $client_info['mobile'] = $this -> agent -> mobile();
    // 获取平台名称
    $client_info['platform'] = $this -> agent -> platform();
    // 获取浏览器版本号
    $client_info['version'] = $this -> agent -> version();
    // 用户代理字符串
    $client_info['agent'] = $this -> agent -> agent_string();
    return $client_info;
}