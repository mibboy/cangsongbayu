<?php
/**
 * 返回一次抽奖在指定中奖概率下是否中奖
 * @param rate 中奖概率
 */
function canReward($rate){
    return mt_rand(0,9) <= $rate;
}
// 返回$min和$max之间的随机数
function getRandomValue($min,$max){
    return round(mt_rand(0,($max-$min)*100)/100+$min,2);
}
/**
 * 带概率偏向的随机算法，概率偏向subMin~subMax区间
 * 返回boundMin~boundMax区间内随机数（含boundMin和boundMax），同时可以指定子区间subMin~subMax的优先概率
 * 例：传入参数(10, 50, 20, 30, 0.8)，则随机结果有80%概率从20~30中随机返回，有20%概率从10~50中随机返回 
 * @param $boundMin 边界
 * @param $boundMax
 * @param $subMin
 * @param $subMax
 * @param $subRate
 */
function getRandomValWithSpecifySubRate($boundMin,$boundMax,$subMin,$subMax,$subRate) {
    if(canReward($subRate)) {
        return getRandomValue($subMin,$subMax);
    }
    return getRandomValue($boundMin,$boundMax);
}
/**
 * 随机分配第n个红包
 * @param $totalBonus 总红包量
 * @param $totalNum 总份数
 * @param $sendedBonus 已发送红包量
 * @param $sendedNum 已发送份数
 * @param $rdMin 随机下限
 * @param $rdMax 随机上限
 */
function randomBonusWithSpecifyBound($totalBonus,$totalNum,$sendedBonus,$sendedNum,$rdMin,$rdMax){
    $avg = $totalBonus/$totalNum;
    $leftLen = $avg - $rdMin;
    $rightLen = $rdMax - $avg;
    $bonudMin = 0;
    $bonudMax = 0;
    if($leftLen == $rightLen){ // 大范围设置小概率
        $boundMin = max(($totalBonus - $sendedBonus - ($totalNum - $sendedNum - 1) * $rdMax),$rdMin);
        $boundMax = min(($totalBonus - $sendedBonus - ($totalNum - $sendedNum - 1) * $rdMin),$rdMax);
    }else if($rightLen - $leftLen > 0){ // 上限偏离
        $bigRate = $leftLen / floatval($leftLen + $rightLen); 
        $standardRdMax = $avg + $leftLen;   // 右侧对称上限点
        $_rdMax = canReward($bigRate) ? $rdMax : $standardRdMax;
        $boundMin = max(($totalBonus - $sendedBonus - ($totalNum - $sendedNum - 1) * $standardRdMax),$rdMin);
        $boundMax = min(($totalBonus - $sendedBonus - ($totalNum - $sendedNum - 1) * $rdMin),$_rdMax);
    }else{ // 下限偏离
        $smallRate = $rightLen / floatval($leftLen + $rightLen);
        $standardRdMin = $avg - $rightLen;  // 左侧对称下限点
        $_rdMin = canReward($smallRate) ? $rdMin : $standardRdMin;
        $boundMin = max(($totalBonus - $sendedBonus - ($totalNum - $sendedNum - 1) * $rdMax),$_rdMin);
        $boundMax = min(($totalBonus - $sendedBonus - ($totalNum - $sendedNum - 1) * $standardRdMin),$rdMax);
    }
    // 已发平均值偏移修正-动态比例
    if ($boundMin == $boundMax) {
        return getRandomValue($boundMin,$boundMax);
    }
    $currAvg = $sendedNum == 0 ? floatval($avg) : ($sendedBonus / floatval($sendedNum));
    // 当前已发平均值
    $middle = ($boundMin + $boundMax) / 2.0;
    $subMin = $boundMin;
    $subMax = $boundMax;
    // 期望值
    $exp = $avg - ($currAvg - $avg) * $sendedNum / (double)($totalNum - $sendedNum);
    if($middle > $exp) {
        $subMax = round(($boundMin + $exp) / 2.0);
    }else{
        $subMin = round(($exp + $boundMax) / 2.0);
    }
    $expBound = ($boundMin + $boundMax) / 2;
    $expSub = ($subMin + $subMax) / 2;
    $subRate = ($exp - $expBound) / floatval($expSub - $expBound);
    return getRandomValWithSpecifySubRate($boundMin,$boundMax,$subMin,$subMax,$subRate); 
}
/**
 * 生成一次红包分配结果
 * @param $totalBonus 红包总金额
 * @param $totalNum 红包总份数
 * @param $sendedBonus 已发红包金额
 * @param $sendedNum 已发份数
 * @param $rdMin 最小随机金额
 * @param $rdMax 最大随机金额
 */
function createBonus($totalBonus,$totalNum,$sendedBonus,$sendedNum,$rdMin,$rdMax){
    if($sendedNum < $totalNum){
        return randomBonusWithSpecifyBound($totalBonus,$totalNum,$sendedBonus,$sendedNum,$rdMin,$rdMax);
    }
}
/**
 * 生成红包分配结果集
 * @param $totalBonus 红包总金额
 * @param $totalNum 红包总份数
 * @param $rdMin 最小随机金额
 * @param $rdMax 最大随机金额
 */
function createBonusList($totalBonus,$totalNum,$rdMin,$rdMax){
    $sendedBonus = 0;
    $sendedNum = 0;
    $arr = array();
    while($sendedNum < $totalNum){
        $bonus = randomBonusWithSpecifyBound($totalBonus,$totalNum,$sendedBonus,$sendedNum,$rdMin,$rdMax);
        $sendedNum++;
        $sendedBonus += $bonus;
        array_push($arr,$bonus);
    }
    return $arr;
}