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

//判断是否是手机
function is_mobile()
{
    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    $is_pc = (strpos($agent, 'windows nt')) ? true : false;
    $is_mac = (strpos($agent, 'mac os')) ? true : false;
    $is_iphone = (strpos($agent, 'iphone')) ? true : false;
    $is_android = (strpos($agent, 'android')) ? true : false;
    $is_ipad = (strpos($agent, 'ipad')) ? true : false;


    if($is_pc){
        return  false;
    }

    if($is_mac){
        return  true;
    }

    if($is_iphone){
        return  true;
    }

    if($is_android){
        return  true;
    }

    if($is_ipad){
        return  true;
    }
}
