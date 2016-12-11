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
    $sql="select distinct value from results where id_evaluation=100001770";
    $OSs=$GLOBALS['db']->getAllValues($sql);
    $OSs=json_encode($OSs);
    //print_r($brands);
    $lang=$_SESSION['lang'];
    if($lang=="en_us"){

        $labels = <<<EOF
[
         {"type":"range","name":"total test result","label":"Total test result",
          "value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],
          "option":["very good ","good ","average","adequate","poor"]},
          {"type":"date","name":"Publication date","label":"Tested date",
           "value":[2016,2015,2014],
           "option":[2016,2015,2014]},
          {"type":"string","name":"Brand","label":"Brands",
          "value":$brands,
          "option":$brands},
          {"type":"string","name":"Operating system name","label":"Operating system",
           "value":$OSs,
           "option":$OSs},
          {"type":"range","name":"Display diagonal","label":"Display diagonal","unit":"mm",
           "value":[{">=":130},{">=":110},{">=":100},{">=":84},{">=":51}],
           "option":["from 130 mm","from 110 mm","from 100 mm","from 84 mm","from 51 mm"]},
           {"type":"multi","name":"","label":"SIM card format",
           "value":["Micro SIM","Mini SIM","Nano SIM","Dual SIM"],
           "option":["Micro SIM","Mini SIM","Nano SIM","Dual SIM"]},
          {"type":"multi","name":"","label":"GSM bands",
           "value":["GSM 850 MHz","GSM 1900 MHz","UMTS 2100 MHz","HSDPA","HSUPA","HSPA +","LTE"],
           "option":[" GSM 850","GSM 1900","UMTS 2100","HSDPA","HSUPA","HSPA +","LTE"]},
           {"type":"multi","name":"","label":"Connection",
           "value":["WiFi 802.11 n","Memory card slot","NFC (Near Field Communication via RFID; payment services)"],
           "option":["WiFi 802.11 n ","Memory card slot","NFC"]},
           {"type":"range","name":"Resolution (main camera)","label":"Camera resolution",
           "value":[{">=":2,"<":5},{">=":5,"<":8},{">=":8,"<":13},{">":13}],
           "option":["2 ~ 5 Megapixel","5 ~ 8 Megapixel","8 ~ 13 Megapixel","> 13 Megapixel"]},
           {"type":"multi","name":"","label":"Camera features",
           "value":["Auto focus","LED flash","Xenon flash"],
           "option":["Auto focus","LED flash","Xenon flash "]},
           {"type":"range","name":"maximum operational time with realistic scenario (cycle to be defined)","label":"Realistic operational time of battery",
           "value":[{"<":15},{">=":15,"<":20},{">=":20,"<":25},{">=":25,"<=":30}],
           "option":["< 15 hours","15 ~ 20 hours","20 ~ 25 hours","25 ~ 30 hours"]},
           {"type":"multi","name":"","label":"Battery features",
           "value":["Changeable accumulator (easy reachable)","wireless charging possible"],
           "option":["Changeable accumulator","Wireless charging"]},
           {"type":"multi","name":"","label":"Durability",
           "value":["Water resistance in 1m if this is claimed?","Expert rating for construction 100 drops (Screen)"],
           "option":["Water resistance","Screen damages"]}
       ]
EOF;

    }else if($lang=="zh_cn"){
        $sql="select CHN from sdictionary where oriword in( SELECT distinct value FROM mobilephones.results where id_evaluation=100001759)";
        $brandLabels=$GLOBALS['db']->getAllValues($sql);
        $brandLabels=json_encode($brandLabels);
        $labels = <<<EOF
            [
         {"type":"range","name":"total test result","label":"总评分",
          "value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],
          "option":["优秀","良好","中等","尚可","差劣"]},
          {"type":"date","name":"Publication date","label":"测试时间",
           "value":[2016,2015,2014],
           "option":[2016,2015,2014]},
          {"type":"string","name":"Brand","label":"品牌",
          "value":$brands,
          "option":$brandLabels},
          {"type":"string","name":"Operating system name","label":"操作系统",
           "value":$OSs,
           "option":$OSs},
          {"type":"range","name":"Display diagonal","label":"屏幕对角线长度","unit":"mm",
           "value":[{">=":130},{">=":110},{">=":100},{">=":84},{">=":51}],
           "option":["130 mm以上","110 mm以上","100 mm以上","84 mm以上","51 mm以上"]},
           {"type":"multi","name":"","label":"SIM卡格式",
           "value":["Micro SIM","Mini SIM","Nano SIM","Dual SIM"],
           "option":["Micro SIM","Mini SIM","Nano SIM","Dual SIM"]},
           {"type":"string","name":"Memory card slot","label":"Micro-SD card slot",
           "value":[1,0],
           "option":["有","无"]},
          {"type":"range","name":"Water resistance in 1m if this is claimed?","label":"防1米深水性能",
           "value":[{">=":0.5,"<=":5.5}],
           "option":["有"]}
       ]
EOF;
    }

    $arr = json_decode($labels, true);
    foreach ($arr as $key => $item) {
        if ($item['type'] == 'string') {
            $index = 0;
            foreach ($item['value'] as $value) {
                if ($item['name'] == 'Brand') {
                    $sql = "select count(*)from products where id_manufacturer=(select id_manufacturer from manufacturers where `name`='" . $value . "')";
                }else
                    $sql="select count(*) from results where id_evaluation in(select id_evaluation from evaluations where name='".$item['name']."') and value='$value'";
               //echo $sql."\n";
                $v = $GLOBALS['db']->getOne($sql);
                //echo $value." ".$v." ".$index."+++\n";
                if ($v == 0) {
                    array_splice($arr[$key]['option'], $index, 1);
                    array_splice($arr[$key]['value'], $index, 1);
                    $index--;
                    // print_r($arr[$key]['option']);

                } else {
                    $arr[$key]['number'][] = $v;
                }


                $index++;
            }
        }else if($item['type'] == 'range') {
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
                    $sql .= "id_evaluation>99999999 and name='" . $item['name'] . "')and value REGEXP '^[0-9]+[.0-9]*$'";
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
                $sql = "select count(*) from results where value>=1" . " and id_evaluation=(select id_evaluation from evaluations where id_evaluation>99999999 and name='" .$value . "')";
                //echo $sql;
                $v = $GLOBALS['db']->getOne($sql);
                $arr[$key]['number'][] = $v;
            }
        }
    }
    sortByNumber($arr[2]);
    sortByNumber($arr[3]);
    return json_encode($arr);
}
//print_r(getLabels());
function showLabels(){
    $labels = <<<EOF
﻿[{"type":"range","name":"total test result","label":"Total test result","value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],"option":["very good ","good ","average","adequate","poor"],"number":["14","226","131","11","0"]},{"type":"date","name":"Publication date","label":"Tested date","value":[2016,2015,2014],"option":[2016,2015,2014],"number":["97","146","139"]},{"type":"string","name":"Brand","label":"Brands","value":["Samsung","LG","Huawei","WIKO","Sony","HTC","Apple","Motorola","BQ","Alcatel","Nokia","Acer","Microsoft","ZTE","Vodafone","Woxter","Asus","One Plus","Xiaomi","Alcatel OneTouch","BlackBerry","Medion","Gigaset","Fairphone","Yota Devices","GM","Honor","Meizu","Stonex","Positivo","Energy Sistem","Lenovo","ZOPO","Coolpad","Marshall","IKI","Wileyfox","Quantum","SOSH","Star","THL","NO.1","Quechua","NGM","Optimus","Orange","Haier","Mobistel","Amazon","SGP Technologies","Kazam","MEO","Science4you","OnePlus One","OnePlus","NOS"],"option":["Samsung","LG","Huawei","WIKO","Sony","HTC","Apple","Motorola","BQ","Alcatel","Nokia","Acer","Microsoft","ZTE","Vodafone","Woxter","Asus","One Plus","Xiaomi","Alcatel OneTouch","BlackBerry","Medion","Gigaset","Fairphone","Yota Devices","GM","Honor","Meizu","Stonex","Positivo","Energy Sistem","Lenovo","ZOPO","Coolpad","Marshall","IKI","Wileyfox","Quantum","SOSH","Star","THL","NO.1","Quechua","NGM","Optimus","Orange","Haier","Mobistel","Amazon","SGP Technologies","Kazam","MEO","Science4you","OnePlus One","OnePlus","NOS"],"number":["59","41","33","32","28","18","15","14","13","13","12","12","11","8","7","6","5","4","3","3","3","2","2","2","2","2","2","2","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1"]},{"type":"string","name":"Operating system name","label":"Operating system","value":["Android","iOS","Windows Phone","Windows","BlackBerry OS ","Firefox OS","Nokia OS","Fire OS","Nokia Asha Software Platform","proprietary","Nokia X software platform 1.1"],"option":["Android","iOS","Windows Phone","Windows","BlackBerry OS ","Firefox OS","Nokia OS","Fire OS","Nokia Asha Software Platform","proprietary","Nokia X software platform 1.1"],"number":["335","15","15","6","3","2","2","1","1","1","1"]},{"type":"range","name":"Display diagonal","label":"Display diagonal","unit":"mm","value":[{">=":130},{">=":110},{">=":100},{">=":84},{">=":51}],"option":["from 130 mm","from 110 mm","from 100 mm","from 84 mm","from 51 mm"],"number":["114","331","366","375","382"]},{"type":"multi","name":"","label":"SIM card format","value":["Micro SIM","Mini SIM","Nano SIM","Dual SIM"],"option":["Micro SIM","Mini SIM","Nano SIM","Dual SIM"],"number":["210","68","128","141"]},{"type":"multi","name":"","label":"GSM bands","value":["GSM 850 MHz","GSM 1900 MHz","UMTS 2100 MHz","HSDPA","HSUPA","HSPA +","LTE"],"option":[" GSM 850","GSM 1900","UMTS 2100","HSDPA","HSUPA","HSPA +","LTE"],"number":["374","379","379","379","379","354","254"]},{"type":"multi","name":"","label":"Connection","value":["WiFi 802.11 n","Memory card slot","NFC (Near Field Communication via RFID; payment services)"],"option":["WiFi 802.11 n ","Memory card slot","NFC"],"number":["378","330","187"]},{"type":"range","name":"Resolution (main camera)","label":"Camera resolution","value":[{">=":2,"<":5},{">=":5,"<":8},{">=":8,"<":13},{">":13}],"option":["2 ~ 5 Megapixel","5 ~ 8 Megapixel","8 ~ 13 Megapixel","> 13 Megapixel"],"number":["30","80","117","51"]},{"type":"multi","name":"","label":"Camera features","value":["Auto focus","LED flash","Xenon flash"],"option":["Auto focus","LED flash","Xenon flash "],"number":["341","348","1"]},{"type":"range","name":"maximum operational time with realistic scenario (cycle to be defined)","label":"Realistic operational time of battery","value":[{"<":15},{">=":15,"<":20},{">=":20,"<":25},{">=":25,"<=":30}],"option":["< 15 hours","15 ~ 20 hours","20 ~ 25 hours","25 ~ 30 hours"],"number":["11","36","33","10"]},{"type":"multi","name":"","label":"Battery features","value":["Changeable accumulator (easy reachable)","wireless charging possible"],"option":["Changeable accumulator","Wireless charging"],"number":["182","22"]},{"type":"multi","name":"","label":"Durability","value":["Water resistance in 1m if this is claimed?","Expert rating for construction 100 drops (Screen)"],"option":["Water resistance","Screen damages"],"number":["21","84"]}]
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
