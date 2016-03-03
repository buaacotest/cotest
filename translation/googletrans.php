<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/2/28
 * Time: 13:55
 */
/*
function translateString($strToTranslate, $fromLanguage, $toLanguage){
    $googleTransBaseUrl = "http://translate.google.cn/translate_a/t?";
    $encodedStr = urlencode($strToTranslate);
    $googleTransUrl=$googleTransBaseUrl;
    $googleTransUrl.="&client=" ."t";
    $googleTransUrl.="&text=". $encodedStr;
    $googleTransUrl.="&hl="."zh-CN";
    $googleTransUrl.="&sl=".$fromLanguage;
    $googleTransUrl.="&tl=" . $toLanguage;
    $googleTransUrl.="&ie=" ."UTF-8";
    $googleTransUrl.= "&oe=" . "UTF-8";
    $transRetHtml = file_get_contents($googleTransUrl);
    //preg_match_all('//[/[/[/"([/s/S]*?)/"/',$transRetHtml,$transResult);
    return $transRetHtml;
}

function translate($strToTranslate){
    $googleTransBaseUrl = "http://fanyi.youdao.com/openapi.do?";
    $encodedStr = urlencode($strToTranslate);
    $googleTransUrl=$googleTransBaseUrl;
    $googleTransUrl.="keyfrom=cotest";
    $googleTransUrl.="&key=1354614018";
    $googleTransUrl.="&type=data";
    $googleTransUrl.="&doctype=json";
    $googleTransUrl.="&version=1.1";
    $googleTransUrl.="&q=". $encodedStr;
    $googleTransUrl.="&only=translate";
    $transResult=file_get_contents($googleTransUrl);
    $data=json_decode($transResult,true);
    return $data["translation"][0];
}
print_r(translate(""));
*/


 class Translate {
     /**
      * 支持的语种
      * @var ArrayAccess
      */
     static $Lang = Array (
         'auto' => '自动检测',
         'ara' => '阿拉伯语',
         'de' => '德语',
         'ru' => '俄语',
         'fra' => '法语',
         'kor' => '韩语',
         'nl' => '荷兰语',
         'pt' => '葡萄牙语',
         'jp' => '日语',
         'th' => '泰语',
         'wyw' => '文言文',
         'spa' => '西班牙语',
         'el' => '希腊语',
         'it' => '意大利语',
         'en' => '英语',
         'yue' => '粤语',
         'zh' => '中文'
     );
     /**
      * 获取支持的语种
      * @return array 返回支持的语种
      */
     static function getLang() {
         return self::$Lang;
     }
     /**
      * 执行文本翻译
      * @param string $text 要翻译的文本
      * @param string $from 原语言语种 默认:英文
      * @param string $to 目标语种 默认:中文
      * @return boolean string 翻译失败:false 翻译成功:翻译结果
      */
     static function exec($text, $from = 'en', $to = 'zh') {

         $url = "http://fanyi.baidu.com/v2transapi";
         $data = array (
             'from' => $from,
             'to' => $to,
             'query' => $text
         );
         $data = http_build_query ( $data );
         $ch = curl_init ();
         curl_setopt ( $ch, CURLOPT_URL, $url );
         curl_setopt ( $ch, CURLOPT_REFERER, "http://fanyi.baidu.com" );
         curl_setopt ( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/20100101 Firefox/37.0' );
         curl_setopt ( $ch, CURLOPT_HEADER, 0 );
         curl_setopt ( $ch, CURLOPT_POST, 1 );
         curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
         curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
         curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
         $result = curl_exec ( $ch );
         curl_close ( $ch );

         $result = json_decode ( $result, true );

         if (!isset($result ['trans_result'] ['data'] ['0'] ['dst'])){
             return false;
         }
         return $result ['trans_result'] ['data'] ['0'] ['dst'];
     }
 }
echo "Was kann ich für Sie tun ".Translate::exec ( "Was kann ich für Sie tun","de" );
