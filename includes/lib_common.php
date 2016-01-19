<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/18
 * Time: 20:49
 */
/*加载初始配置*/
function load_config(){
    $arr= array();
    //限定语言项
    $lang_array = array('zh_cn', 'en_us');
    if (empty($arr['lang']) || !in_array($arr['lang'], $lang_array))
    {
        $arr['lang'] = 'zh_cn'; // 默认语言为简体中文
    }
    return $arr;
}