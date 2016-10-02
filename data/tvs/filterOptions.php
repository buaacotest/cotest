<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/7
 * Time: 13:31
 */
function getLabels()
{
    $sql="SELECT name FROM manufacturers";
    $brands=$GLOBALS['db']->getAllValues($sql);
    $brands=json_encode($brands);
    //print_r($brands);
    $lang=$_SESSION['lang'];
    if($lang=="en_us"){

        $labels = <<<EOF
[
         {"type":"range","name":"total test result","label":"Total test result",
          "value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],
          "option":["very good ","good ","average","adequate","poor"]},
          {"type":"date","name":"Publication date","label":"Tested date",
           "value":[2016,2015],
           "option":[2016,2015]},
          {"type":"string","name":"Brand","label":"Brands",
          "value":$brands,
          "option":$brands},
           {"type":"range","name":"Screen Size","label":"Screen size",
          "value":[{">=":17,"<=":22},{">=":24,"<=":32},{">=":39,"<=":46},{">=":47,"<=":50},{">=":51,"<=":55},{">=":60,"<=":65}],
          "option":["17-22\"","24-32\"","39-46\"","47-50\"","51-55\"","60-65\""]},
          {"type":"string","name":"Product category (LCD, Plasma, OLED, etc.)","label":"Screen type",
          "value":["OLED","Plasma","LCD"],
          "option":["OLED","Plasma","LCD"]},
          {"type":"multi","name":"","label":"Screen features",
           "value":["Curved screen","Can TV cope with 3D","HDR"],
           "option":["Curved","3D","HDR"]},
          {"type":"string","name":"Resolution level (HD-Ready, Full-HD or Ultra-HD)","label":"Resolution level",
          "value":["Full-HD","HD-Ready","Ultra-HD"],
          "option":["Full HD","HD ready","4K ultra HD"]},
           {"type":"string","name":"Native (physical) resolution","label":"Resolution",
          "value":["1024 x 1080","1024 x 768","1366 x 768","1440 x 900","1920 x 1080","3840 x 2160","640 x 480"],
          "option":["1024 x 1080","1024 x 768","1366 x 768","1440 x 900","1920 x 1080","3840 x 2160","640 x 480"]},
          {"type":"multi","name":"","label":"Smart TV",
           "value":["Wi-Fi Direct","Ethernet Connector","Recording one channel while watching other? (different MX)","Internet browsing and watching TV simultaneously","Smart menu: personalization (placing favorite apps)"],
           "option":["Wi-Fi","Ethernet","Twin-tuner","Browsing/watching","Personalization"]}
       ]
EOF;

    }else if($lang=="zh_cn"){
       /* $sql="select CHN from sdictionary where oriword in( SELECT distinct value FROM results where id_evaluation=100001759)";
        $brandLabels=$GLOBALS['db']->getAllValues($sql);
        $brandLabels=json_encode($brandLabels);*/
        $labels = <<<EOF
            [
         {"type":"range","name":"total test result","label":"总评分",
          "value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],
          "option":["优秀","良好","中等","尚可","差劣"]},
          {"type":"date","name":"Publication date","label":"测试时间",
           "value":[2016,2015],
           "option":[2016,2015]},
          {"type":"string","name":"Brand","label":"品牌",
          "value":$brands,
          "option":$brands},
           {"type":"range","name":"Screen Size","label":"屏幕大小",
          "value":[{">=":17,"<=":22},{">=":24,"<=":32},{">=":39,"<=":46},{">=":47,"<=":50},{">=":51,"<=":55},{">=":60,"<=":65}],
          "option":["17-22\"","24-32\"","39-46\"","47-50\"","51-55\"","60-65\""]},
          {"type":"string","name":"Product category (LCD, Plasma, OLED, etc.)","label":"屏幕类型",
          "value":["OLED","Plasma","LCD"],
          "option":["OLED","Plasma","LCD"]}
       ]
EOF;
    }

    $arr = json_decode($labels, true);
    foreach ($arr as $key => $item) {
        if ($item['type'] == 'string') {
            $index=0;
            foreach ($item['value'] as $value) {
                if($item['name']=='Brand'){
                    $sql="select count(*)from products where id_manufacturer=(select id_manufacturer from manufacturers where `name`='".$value."')";
                }else
                    $sql="select count(*) from results where id_evaluation in(select id_evaluation from evaluations where name='".$item['name']."') and value='$value'";
                //echo $sql;
                $v = $GLOBALS['db']->getOne($sql);
                //echo $value." ".$v." ".$index."+++\n";
                if($v==0){
                    array_splice($arr[$key]['option'],$index,1);
                    array_splice($arr[$key]['value'],$index,1);
                    $index--;
                   // print_r($arr[$key]['option']);

                }else{
                    $arr[$key]['number'][] = $v;
                }
                $index++;
            }
        } else if($item['type'] == 'range') {
            foreach ($item['value'] as $value) {
                $opts = array_keys($value);
                $len = count($opts);
                if($item['name'] == 'total test result'){//评分数据四舍五入
                    if ($len == 1 && $opts[0] != -1) {
                        $sql = "select count(*) from results where format(6-value,1)" . $opts[0] . $value[$opts[0]];
                    } else if ($len == 2 && $opts[0] != -1) {
                        $sql = "select count(*) from results where format(6-value,1)" . $opts[0] . $value[$opts[0]] . " and format(6-value,1)" . $opts[1] . $value[$opts[1]];
                    }
                }else{//property数值正常读取
                    if ($len == 1 && $opts[0] != -1) {
                        $sql = "select count(*) from results where value" . $opts[0] . $value[$opts[0]];
                    } else if ($len == 2 && $opts[0] != -1) {
                        $sql = "select count(*) from results where value" . $opts[0] . $value[$opts[0]] . " and value" . $opts[1] . $value[$opts[1]];
                    }
                }

                $sql .= " and id_evaluation=(select id_evaluation from evaluations where ";
                if ($item['name'] == 'total test result')
                    $sql .= "name='" . $item['name'] . "')";
                else
                    $sql .= "id_evaluation>99999999 and name='" . $item['name'] . "')";
                $v = $GLOBALS['db']->getOne($sql);
                $arr[$key]['number'][] = $v;
            }
        }else if($item['type'] == 'date'){
            foreach ($item['value'] as $value) {
                $sql = "select count(*) from products where  FROM_UNIXTIME(timestamp_created, '%Y' )='" . $value . "'" ;
                //echo $sql;
                $v = $GLOBALS['db']->getOne($sql);
                $arr[$key]['number'][] = $v;
            }
        }else if($item['type'] == 'multi'){
            $index=0;
            foreach ($item['value'] as $k=>$value) {
                $sql = "select count(*) from results where value=1" . " and id_evaluation=(select id_evaluation from evaluations where id_evaluation>99999999 and name='" .$value . "')";
                //echo $sql;
                $v = $GLOBALS['db']->getOne($sql);
                //echo $value." ".$v." ".$index."+++\n";
                if($v==0){
                    array_splice($arr[$key]['option'],$index,1);
                    array_splice($arr[$key]['value'],$index,1);
                    $index--;
                    // print_r($arr[$key]['option']);

                }else{
                    $arr[$key]['number'][] = $v;
                }
                $index++;
            }
        }
    }
    sortByNumber($arr[2]);
    //print_r($arr);
    return json_encode($arr);
}
//print_r(getLabels());
function showLabels(){
    $labels = <<<EOF
[{"type":"range","name":"total test result","label":"Total test result","value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],"option":["very good ","good ","average","adequate","poor"],"number":["0","146","126","20","0"]},{"type":"date","name":"Publication date","label":"Tested date","value":[2016,2015],"option":[2016,2015],"number":["71","221"]},{"type":"string","name":"Brand","label":"Brands","value":["Samsung","LG","Panasonic","Philips","Sony","Grundig","Philco","TCL","HiSense","AOC","Loewe","Semp Toshiba","THOMSON","Metz","Changhong","JVC","TD Systems","TechniSat","Orava","Telefunken","Hitachi","Blaupunkt","Sharp","GoGen","Sencor"],"option":["Samsung","LG","Panasonic","Philips","Sony","Grundig","Philco","TCL","HiSense","AOC","Loewe","Semp Toshiba","THOMSON","Metz","Changhong","JVC","TD Systems","TechniSat","Orava","Telefunken","Hitachi","Blaupunkt","Sharp","GoGen","Sencor"],"number":["62","55","46","36","32","13","5","5","5","4","3","3","3","3","2","2","2","2","2","2","1","1","1","1","1"]},{"type":"range","name":"Screen Size","label":"Screen size","value":[{">=":17,"<=":22},{">=":24,"<=":32},{">=":39,"<=":46},{">=":47,"<=":50},{">=":51,"<=":55},{">=":60,"<=":65}],"option":["17-22\"","24-32\"","39-46\"","47-50\"","51-55\"","60-65\""],"number":["0","56","76","79","66","14"]},{"type":"string","name":"Product category (LCD, Plasma, OLED, etc.)","label":"Screen type","value":["OLED","LCD"],"option":["OLED","LCD"],"number":["3","289"]},{"type":"multi","name":"","label":"Screen features","value":["Curved screen","Can TV cope with 3D"],"option":["Curved","3D"],"number":["28","78"]},{"type":"string","name":"Resolution level (HD-Ready, Full-HD or Ultra-HD)","label":"Resolution level","value":["Full-HD","HD-Ready","Ultra-HD"],"option":["Full HD","HD ready","4K ultra HD"],"number":["125","31","136"]},{"type":"string","name":"Native (physical) resolution","label":"Resolution","value":["1366 x 768","1920 x 1080","3840 x 2160"],"option":["1366 x 768","1920 x 1080","3840 x 2160"],"number":["31","125","136"]},{"type":"multi","name":"","label":"Smart TV","value":["Ethernet Connector","Internet browsing and watching TV simultaneously"],"option":["Ethernet","Browsing\/watching"],"number":["237","79"]}]
EOF;
return $labels;
}

//根据数量多少排序
function sortByNumber(&$src)
{
    foreach($src['value'] as $k=>$v){
        $tmp[$v]=$src['number'][$k];
    }
    arsort($tmp);
    $index=0;
    $keys=array_keys($tmp);
    foreach($src['value'] as $k=>$v){
        $src['value'][$k]=$keys[$index];
        $src['number'][$k]=$tmp[$keys[$index]];
        $index++;
    }
    $src['option']=$src['value'];
}
