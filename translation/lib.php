<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/23
 * Time: 16:29
 */
function translate($strToTranslate){
    echo $strToTranslate;
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
    echo $googleTransUrl;
    $transResult=file_get_contents($googleTransUrl);
    $data=json_decode($transResult,true);
    return $data["translation"][0];
}
/*调用翻译API*/
/**
 * 执行文本翻译
 * @param string $text 要翻译的文本
 * @param string $from 原语言语种 默认:英文
 * @param string $to 目标语种 默认:中文
 * @return boolean string 翻译失败:false 翻译成功:翻译结果
 */
function translateText($text, $from, $to) {

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
function getProperty(){
    $sql="select id_propertygroup,name from propertygroups";
    $groups=$GLOBALS['db']->getAll($sql);
    $sql="select id_propertygroup,id_property,name from propertys";
    $props=$GLOBALS['db']->getAll($sql);
    foreach($groups as $k=>$g){
        $temp='';
        $groups[$k]['CHN']=array();
        $groups[$k]['Eng']='null';
        $groups[$k]['De']='null';
        foreach($props as $p){
            $p['CHN']=array();
            $p['Eng']="null";
            $p['De']="null";
            if($p['id_propertygroup']==$g['id_propertygroup']){
                $temp[]=$p;
            }
        }
        $groups[$k]['id_propertygroup']=$temp;
        if(!empty($temp)){
            $results[]=$groups[$k];
        }
    }
    return $results;
}
function getEvaluations()
{
    $sql="select id_evaluation,name,id_parent from evaluations
      where id_evaluation<10000";
    $data=$GLOBALS['db']->getAll($sql);
    $gradeTree=getTree($data,0);
    return $gradeTree;
}
/*构建评分的树结构*/
function getTree($data, $pId)
{
    $tree = '';
    foreach($data as $v)
    {
        $v['CHN']=array();
        $v['Eng']="null";
        $v['De']="null";
        if($v['id_parent'] == $pId)
        {
            $v['id_parent'] = getTree($data, $v['id_evaluation']);
            $tree[] = $v;
        }
    }
    return $tree;
}