<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/23
 * Time: 16:29
 */

/*调用翻译API*/
/**
 * 执行文本翻译
 * @param string $text 要翻译的文本
 * @param string $from 原语言语种 默认:英文
 * @param string $to 目标语种 默认:中文
 * @return boolean string 翻译失败:false 翻译成功:翻译结果
 */
function translateText($text, $from, $to)
{

    $url = "http://fanyi.baidu.com/v2transapi";
    $data = array(
        'from' => $from,
        'to' => $to,
        'query' => $text
    );
    $data = http_build_query($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, "http://fanyi.baidu.com");
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/20100101 Firefox/37.0');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $result = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($result, true);

    if (!isset($result ['trans_result'] ['data'] ['0'] ['dst'])) {
        return false;
    }
    return $result ['trans_result'] ['data'] ['0'] ['dst'];
}

function getProperty()
{
    $sql = "select id_propertygroup,name from propertygroups";
    $groups = $GLOBALS['db']->getAll($sql);
    $sql = "select id_propertygroup,id_property,name from propertys";
    $props = $GLOBALS['db']->getAll($sql);
    foreach ($groups as $k => $g) {
        $temp = '';
        $groupname = $g['name'];
        $groupname=htmlspecialchars($groupname);
        $groupid = $g['id_propertygroup'];
        $gtranslation = GetTransLation($groupname, $groupid,3);
        $chn = array();
        //$de=array();
        //$eng=array();
        if (!empty($gtranslation))
            foreach ($gtranslation as $value) {
                $chn[] = $value['CHN'];
                //$de[]=$value['De'];
                //$eng[]=$value['Eng'];
            }
//        if(empty($chn))
//            $chn[]="null";
        $groups[$k]['CHN'] = $chn;
        $groups[$k]['Eng'] = "null";
        $groups[$k]['De'] = "null";
        foreach ($props as $p) {
            $propname = $p['name'];
            $propname=htmlspecialchars($propname);
            $proid = $p['id_property'];
            $ptranslation = GetTransLation($propname, $proid);
            $chn = array();
            //$de=array();
            //$eng=array();
            if (!empty($ptranslation))
                foreach ($ptranslation as $value) {
                    $chn[] = $value['CHN'];
                    //$de[]=$value['De'];
                    //$eng[]=$value['Eng'];
                }
//            if(empty($chn))
//                $chn[]="null";
            $p['CHN'] = $chn;
            $p['Eng'] = "null";
            $p['De'] = "null";
            if ($p['id_propertygroup'] == $g['id_propertygroup']) {
                $temp[] = $p;
            }
        }
        $groups[$k]['id_propertygroup'] = $temp;
        if (!empty($temp)) {
            $results[] = $groups[$k];
        }
    }
    return $results;
}

function getEvaluations()
{
    $sql = "select id_evaluation,name,id_parent from evaluations
      where id_evaluation<100000000";
    $data = $GLOBALS['db']->getAll($sql);
    $gradeTree = getTree($data, 0);
    return $gradeTree;
}

/*构建评分的树结构*/
function getTree($data, $pId)
{
    $tree = '';
    foreach ($data as $v) {
        $name = $v['name'];
        $name=htmlspecialchars($name);
        $id = $v['id_evaluation'];
        $evalTranslation = GetTransLation($name, $id, 1);
        $chn = array();
        //$de=array();
        //$eng=array();
        if (!empty($evalTranslation))
            foreach ($evalTranslation as $value) {
                $chn[] = $value['CHN'];
                //$de[]=$value['De'];
                //$eng[]=$value['Eng'];
            }
//        if(empty($chn))
//            $chn[]="null";
        $v['CHN'] = $chn;
        $v['Eng'] = "null";
        $v['De'] = "null";
        if ($v['id_parent'] == $pId) {
            $v['id_parent'] = getTree($data, $v['id_evaluation']); //递归查找子树，存入原来的id_parent中,id_parent项现在保存子树。
            $tree[] = $v;
        }
    }
    return $tree;
}

function getManufacturers()
{
    $sql = "SELECT id_manufacturer,name FROM manufacturers";
    $manufacturer = $GLOBALS['db']->getAll($sql);

    foreach ($manufacturer as $k => $v) {

        $manufacturername = $v['name'];
        $manufacturername=htmlspecialchars($manufacturername);
        $manufacturerid = $v['id_manufacturer'];
        $mtranslation = GetTransLation($manufacturername, $manufacturerid, 2);
        $chn = array();
        //$de=array();
        //$eng=array();
        if (!empty($mtranslation))
            foreach ($mtranslation as $value) {
                $chn[] = $value['CHN'];
                //$de[]=$value['De'];
                //$eng[]=$value['Eng'];
            }
//        if(empty($chn))
//            $chn[]="null";
        $manufacturer[$k]['CHN'] = $chn;
        $manufacturer[$k]['Eng'] = "null";
        $manufacturer[$k]['De'] = "null";
        $results[] = $manufacturer[$k];
    }
    return $results;
}

/*调用翻译函数exec，输出中英德文*/
function getTranslateOnline($text)
{
    $arr = array('CHN' => translateText($text, 'auto', 'zh'), 'Eng' => translateText($text, 'auto', 'en'), 'De' => translateText($text, 'auto', 'de'));
    return $arr;
}


/*得到在Admin词典中某个单词的个数，用来判断是否是多义词以及是否已经存在于词典*/
function getCountInAdminDic($oriWord)
{
    $sql = "SELECT count(*) FROM admin.dictionary where admin.dictionary.originword= '" . $oriWord . "'";
    $count = 0;
    $results = $GLOBALS['db']->query($sql);
    if ($results) {
        $countarray = mysql_fetch_array($results);
        $count = $countarray[0];
    } else {
        mysql_error();
        $count = 0;
    }
    return $count;
}

/*得到在自身数据库中的count*/
function getCountInSelfDic($wordid,$flag)
{
    $nowdb = $GLOBALS['db']->getNowDB();
    //echo $nowdb;
    $count = 0;
    $sql = "SELECT count(*) FROM " . $nowdb . ".sdictionary where wordid='" . $wordid . "' and flag=".$flag;
    $results = $GLOBALS['db']->query($sql);
    if ($results) {
        $countarray = mysql_fetch_array($results);
        $count = $countarray[0];
    } else {
        mysql_error();
        $count = 0;
    }
    return $count;
}

/*产生一个用于存储在总词典中的ID*/
function GenAdminDicID()
{
    $sql = "SELECT max(`wordid`) FROM admin.dictionary";
    $results = $GLOBALS['db']->query($sql);
    $countarray = mysql_fetch_array($results);
    $count = $countarray[0];
    return $count + 1;
}

function QueryInSelfDic($id, $flag)
{
    $count = getCountInSelfDic($id,$flag);
    //echo $oriword;
    if ($count == 0)
        return null;
    else {
        $nowdb = $GLOBALS['db']->getNowDB();
        //echo $nowdb;
        $sql = "SELECT * FROM " . $nowdb . ".sdictionary where wordid='" . $id . "'" . " and flag=" . $flag;
        //echo $sql;
        //echo "\n";
        $results = $GLOBALS['db']->getAll($sql);
        //print_r($results);
        return $results;
    }
}

function QueryInAdminDic($oriword)
{
    $count = getCountInAdminDic($oriword);
    if ($count == 0)
        return null;
    else {
        $sql = "SELECT * FROM admin.dictionary where originword='" . $oriword . "'";
        // echo $sql;
        //echo "\n";
        $results = $GLOBALS['db']->getAll($sql);
        return $results;
    }
}


function GetTransLation($oriword, $id, $flag = 0)
{////默认取的是propertys的翻译，1为evaluation，2为manufacturer
    ///step1:query in the self dictionary
    //echo $oriword;
    $Translation = QueryInSelfDic($id, $flag);
    //print_r($Translation);
    if ($Translation == null) {
        //echo "null";
        $Translation = QueryInAdminDic($oriword);
        //step2:query in the admin dictionary
        if ($Translation == null) {
            ///step 3:query online
//            $Translation=getTranslateOnline($oriword); ////may be time_out
            return $Translation;
        } else
            return $Translation;
    } else{
        //echo $Translation;
        return $Translation;
    }

}

/*TODO:realize save translation functions*/

function SaveTranslationToAdminDic($oriword, $translationArray, $id = null)
{
    if ($id == null) {
        //id==null in save admin dic means insert a new translation,default null
        //step1:generate one id
        $id = GenAdminDicID();
        $deword = $translationArray["De"];
        $chnword = $translationArray["CHN"];
        $engword = $translationArray["Eng"];
        $sql = "SELECT count(*) FROM admin.dictionary where originword='" . $oriword . "' and CHN = '" . $chnword . "'";
        //echo $sql;
        $results = $GLOBALS['db']->query($sql);
        $countarray = mysql_fetch_array($results);
        $count = $countarray[0];
        if ($count != 0)/////如果已经存在一模一样的词条，则直接返回不用插入
            return true;
        $sql = "INSERT INTO `admin`.`dictionary` (`wordid`,`originword`,`De`,`Eng`,`CHN`) VALUES (" . $id . ",'" . $oriword . "','" . $deword . "','" . $engword . "','" . $chnword . "')";
        //step2:insert into admin.dictionary table
        //echo $sql;
        $result = $GLOBALS['db']->query($sql);
        return $result;
    } else {/////按初始设计来，大词典中的单词只允许添加单词，不允许修改。所以else应该永远不会调用
        //id!=null means change the meaning of one word
        //echo "change the admin dic oriword= " . $oriword . "and id=" . $id;
        $sql = "SELECT count(*) FROM admin.dictionary where wordid=" . $id;
        $results = $GLOBALS['db']->query($sql);
        $countarray = mysql_fetch_array($results);
        $count = $countarray[0];
        ///if count==0,means there is no such id
        if ($count == 0)
            return false;
        else {
            $deword = $translationArray["De"];
            $chnword = $translationArray["CHN"];
            $engword = $translationArray["Eng"];
            $sql = "UPDATE `admin`.`dictionary` SET `originword`= '" . $oriword . "',`De`= '" . $deword . "',`Eng`= '" . $engword . "',`CHN`= '" . $chnword . "'where `wordid`=" . $id;
            $result = $GLOBALS['db']->query($sql);
            return $result;
        }
    }
}

function SaveTranslationToSelfDic($oriword, $translationArray, $id, $idflag)
{
    //step1:query in selfdic to see if the id and the flag is conflict
    $nowdb = $GLOBALS['db']->getNowDB();
    $sql = "SELECT count(*) FROM " . $nowdb . ".sdictionary where wordid=" . $id . " and `flag`= " . $idflag;
    //echo  $sql;
    $results = $GLOBALS['db']->query($sql);
    $count=0;
    if($results){
        $countarray = mysql_fetch_array($results);
        $count = $countarray[0];
    }

    $deword = $translationArray["De"];
    $chnword = $translationArray["CHN"];
    $engword = $translationArray["Eng"];
    if ($count != 0) {///如果已经有了 ，说明是修改。
        $sql = "UPDATE " . $nowdb . ".sdictionary SET `oriword`= '" . $oriword . "',`De`= '" . $deword . "',`Eng`= '" . $engword . "',`CHN`= '" . $chnword . "' where `wordid`= '" . $id . "' and `flag`= " . $idflag;
        //echo $sql;
        $result = $GLOBALS['db']->query($sql);
        return $result;
        //echo $sql;
    } else {
        //step2:insert

        $sql = "INSERT INTO `sdictionary`(`wordid`,`oriword`,`De`,`Eng`,`CHN`,`flag`)VALUES(" . $id . ",'" . $oriword . "','" . $deword . "','" . $engword . "','" . $chnword . "'," . $idflag . ")";
        $result = $GLOBALS['db']->query($sql);
        return $result;
    }

}

function DeleteTranslationInSelfDic($id, $idflag)
{
    $nowdb = $GLOBALS['db']->getNowDB();
    $sql = "DELETE FROM " . $nowdb . ".`sdictionary` WHERE wordid=" . $id . " and `flag` = " . $idflag;
    //echo $sql;
    $result = $GLOBALS['db']->query($sql);
    return $result;
}

function GetEvaluationName($evaluationid)
{
    $sql = "SELECT name FROM evaluations where id_evaluation=" . $evaluationid;
    //echo $sql;
    $result = $GLOBALS['db']->getOne($sql);
    return $result;
}


function SetEvaluationSelected($evaluationid, $flag)
{////set evaluationselected
    if ($flag == 1) {
        $sql = "UPDATE `evaluations` SET selected=1 where id_evaluation=" . $evaluationid;
        $result = $GLOBALS['db']->query($sql);
        return $result;
    } else {
        $sql = "UPDATE `evaluations` SET selected=0 where id_evaluation=" . $evaluationid;
        $result = $GLOBALS['db']->query($sql);
        return $result;
    }
}

function SetPropertySelected($id, $flag)
{////set propertyselected
    if ($flag == 1) {
            $sql = "UPDATE `propertys` SET selected=1 where id_property=" . $id;
            $result = $GLOBALS['db']->query($sql);
            return $result;
    } else {////flag==0
            $sql = "UPDATE `propertys` SET selected=0 where id_property=" . $id;
            //echo $sql;
            $result = $GLOBALS['db']->query($sql);
            return $result;
    }
}

///**may be not used*//
function GenSelfDicID()
{
    $sql = "SELECT count(*) FROM sdictionary";
    $results = $GLOBALS['db']->query($sql);
    $countarray = mysql_fetch_array($results);
    $count = $countarray[0];
    return $count + 1;
}

function translate($strToTranslate)
{
    echo $strToTranslate;
    $googleTransBaseUrl = "http://fanyi.youdao.com/openapi.do?";
    $encodedStr = urlencode($strToTranslate);
    $googleTransUrl = $googleTransBaseUrl;
    $googleTransUrl .= "keyfrom=cotest";
    $googleTransUrl .= "&key=1354614018";
    $googleTransUrl .= "&type=data";
    $googleTransUrl .= "&doctype=json";
    $googleTransUrl .= "&version=1.1";
    $googleTransUrl .= "&q=" . $encodedStr;
    $googleTransUrl .= "&only=translate";
    echo $googleTransUrl;
    $transResult = file_get_contents($googleTransUrl);
    $data = json_decode($transResult, true);
    return $data["translation"][0];
}