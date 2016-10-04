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
          "option":["very good ","good ","average","sufficient","poor"]},
          {"type":"date","name":"Publication date","label":"Tested date",
           "value":[2015,2014],
           "option":[2015,2014]},
          {"type":"string","name":"Brand","label":"Brands",
          "value":$brands,
          "option":$brands},
          {"type":"string","name":"Primary location to wear band (wrist, belt etc.)","label":"Type of tracker",
          "value":["Wrist","Waist","Wrist or waist","Wrist, waist, foot or around neck","Wrist, waist, foot or around neck _can also be clipped anywhere on the body","Belt. Instructions suggest the device can also be clipped on upper body clothing or bra."],
          "option":["Wrist","Waist","Wrist or waist","Wrist, waist, foot or around neck","Wrist, waist, foot, neck or anywhere","Belt (also on upper body clothing or bra)"]},
          {"type":"multi","name":"","label":"Fitness",
           "value":["Integrated heart monitor present? (y,n)","Sleep tracking? (y,n)","Integrated altimeter? (y,n)"],
           "option":["Heart rate monitor","Sleep tracking","Altimeter"]},
           {"type":"multi","name":"","label":"Phone compatibility",
           "value":["iOS supported? (y,n)","Android supported? (y,n)","Windows phone supported? (y,n)"],
           "option":["iOS","Android","Windows phone"]},
           {"type":"multi","name":"","label":"Smart",
           "value":["Can the display be customised (y,n)","Any smart watch functionality present? (y,n)","  * Text message notification? (y,n)","  * Make/receive phone calls? (y,n)"],
           "option":["Personalisation","Smart watch","Messaging","Calling"]},
           {"type":"multi","name":"","label":"Connection",
           "value":["GPS enabled? (y,n)","Wi-Fi enabled? (y,n)","Bluetooth enabled? (y,n)","USB connection available? (y,n)"],
           "option":["GPS","Wi-Fi","Bluetooth","USB"]},
           {"type":"string","name":"Water resistant? (y,n)","label":"Water resistant",
          "value":["1","0"],
          "option":["Yes","No"]}

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
           "value":[2015,2014],
           "option":[2015,2014]},
          {"type":"string","name":"Brand","label":"品牌",
          "value":$brands,
          "option":$brands}
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
                    $sql="select count(*) from results where id_evaluation in(select id_evaluation from evaluations where id_evaluation>99999999 and name='".$item['name']."') and value ='$value'";
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
            foreach ($item['value'] as $value) {
                $sql = "select count(*) from results where value=1" . " and id_evaluation=(select id_evaluation from evaluations where id_evaluation>99999999 and name='" .$value . "')";
                //echo $sql;
                $v = $GLOBALS['db']->getOne($sql);
                $arr[$key]['number'][] = $v;
            }
        }
    }
    sortByNumber($arr[2]);
    //print_r($arr);
    return json_encode($arr);
}
//print_r(getLabels());
function showLabels(){
    $labels=<<<EOF
[{"type":"range","name":"total test result","label":"Total test result","value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],"option":["very good ","good ","average","sufficient","poor"],"number":["0","24","5","0","0"]},{"type":"date","name":"Publication date","label":"Tested date","value":[2015,2014],"option":[2015,2014],"number":["14","15"]},{"type":"string","name":"Brand","label":"Brands","value":["Fitbit","Sony","Jawbone","Garmin","Withings","Misfit","Xiaomi","Razer","Microsoft","Asus","Polar","LG","iHealth","Nike","Epson","Samsung","Soleus"],"option":["Fitbit","Sony","Jawbone","Garmin","Withings","Misfit","Xiaomi","Razer","Microsoft","Asus","Polar","LG","iHealth","Nike","Epson","Samsung","Soleus"],"number":["5","3","3","3","2","2","1","1","1","1","1","1","1","1","1","1","1"]},{"type":"string","name":"Primary location to wear band (wrist, belt etc.)","label":"Type of tracker","value":["Wrist","Waist","Wrist or waist","Wrist, waist, foot or around neck","Wrist, waist, foot or around neck _can also be clipped anywhere on the body","Belt. Instructions suggest the device can also be clipped on upper body clothing or bra."],"option":["Wrist","Waist","Wrist or waist","Wrist, waist, foot or around neck","Wrist, waist, foot, neck or anywhere","Belt (also on upper body clothing or bra)"],"number":["23","1","2","1","1","1"]},{"type":"multi","name":"","label":"Fitness","value":["Integrated heart monitor present? (y,n)","Sleep tracking? (y,n)","Integrated altimeter? (y,n)"],"option":["Heart rate monitor","Sleep tracking","Altimeter"],"number":["9","25","5"]},{"type":"multi","name":"","label":"Phone compatability","value":["iOS supported? (y,n)","Android supported? (y,n)","Windows phone supported? (y,n)"],"option":["iOS compatible","Android compatible","Windows phone compatible"],"number":["26","29","7"]},{"type":"multi","name":"","label":"Smart","value":["Can the display be customised (y,n)","Any smart watch functionality present? (y,n)","  * Text message notification? (y,n)","  * Make\/receive phone calls? (y,n)"],"option":["Personalisation","Smart watch","Messaging","Calling"],"number":[false,"14","10","1"]},{"type":"multi","name":"","label":"Connection","value":["GPS enabled? (y,n)","Wi-Fi enabled? (y,n)","Bluetooth enabled? (y,n)","USB connection available? (y,n)"],"option":["GPS","Wi-Fi","Bluetooth","USB"],"number":["3","0","29","25"]},{"type":"string","name":"Water resistant? (y,n)","label":"Water resistant","value":["1"],"option":["Yes"],"number":["29"]}]
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
