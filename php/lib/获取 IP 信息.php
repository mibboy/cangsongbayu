<?php
/**
 * 基于淘宝接口根据 ip 获取用户信息
 * @return array
 * 返回值说明
 * array['code'] ：状态码
 * array['data']['country'] ：国家
 * array['data']['region'] ：地区
 * array['data']['city'] ：城市
 * array['data']['isp'] ：互联网服务提供商名称
 * array['data']['country_id'] ：国家代码，如CN
 */
function taobao_ip($ip){
    $taobao_ip = 'http://ip.taobao.com/service/getIpInfo.php?ip=' . $ip;
    $ip_info = json_decode(file_get_contents($taobao_ip),true);
    return $ip_info;
}