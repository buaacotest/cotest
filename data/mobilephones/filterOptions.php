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
          {"type":"string","name":"Memory card slot","label":"Micro-SD card slot",
           "value":[1,0],
           "option":["Yes","No"]},
          {"type":"range","name":"Water resistance in 1m if this is claimed?","label":"Water resistance",
           "value":[{">=":0.5,"<=":5.5}],
           "option":["Yes"]}
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
    sortByNumber($arr[3]);
    return json_encode($arr);
}

function showLabels(){
    $labels = <<<EOF
[{"type":"range","name":"total test result","label":"Total test result","value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],"option":["very good ","good ","average","adequate","poor"],"number":["16","185","124","11","0"]},{"type":"date","name":"Publication date","label":"Tested date","value":[2016,2015,2014],"option":[2016,2015,2014],"number":["51","146","139"]},{"type":"string","name":"Brand","label":"Brands","value":["Samsung","LG","Huawei","WIKO","Sony","HTC","Apple","Alcatel","Motorola","Nokia","Microsoft","BQ","Acer","ZTE","Vodafone","Woxter","Asus","BlackBerry","Xiaomi","One Plus","Yota Devices","Fairphone","Medion","Meizu","Energy Sistem","Kazam","NOS","ZOPO","Positivo","Stonex","Wileyfox","Quantum","IKI","Marshall","Honor","Mobistel","Star","THL","Quechua","NGM","Optimus","Orange","NO.1","Haier","MEO","Amazon","Science4you","OnePlus","SOSH","OnePlus One","SGP Technologies"],"option":["Samsung","LG","Huawei","WIKO","Sony","HTC","Apple","Alcatel","Motorola","Nokia","Microsoft","BQ","Acer","ZTE","Vodafone","Woxter","Asus","BlackBerry","Xiaomi","One Plus","Yota Devices","Fairphone","Medion","Meizu","Energy Sistem","Kazam","NOS","ZOPO","Positivo","Stonex","Wileyfox","Quantum","IKI","Marshall","Honor","Mobistel","Star","THL","Quechua","NGM","Optimus","Orange","NO.1","Haier","MEO","Amazon","Science4you","OnePlus","SOSH","OnePlus One","SGP Technologies"],"number":["54","35","30","28","24","16","13","13","12","12","11","11","11","7","6","5","4","3","3","3","2","2","2","2","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1"]},{"type":"string","name":"Operating system name","label":"Operating system","value":["Android","Windows Phone","iOS","Windows","BlackBerry OS ","Firefox OS","Nokia OS","Fire OS","Nokia Asha Software Platform","proprietary","Nokia X software platform 1.1"],"option":["Android","Windows Phone","iOS","Windows","BlackBerry OS ","Firefox OS","Nokia OS","Fire OS","Nokia Asha Software Platform","proprietary","Nokia X software platform 1.1"],"number":["292","15","13","5","3","2","2","1","1","1","1"]},{"type":"range","name":"Display diagonal","label":"Display diagonal","unit":"mm","value":[{">=":130},{">=":110},{">=":100},{">=":84},{">=":51}],"option":["from 130 mm","from 110 mm","from 100 mm","from 84 mm","from 51 mm"],"number":["91","286","320","329","336"]},{"type":"multi","name":"","label":"SIM card format","value":["Micro SIM","Mini SIM","Nano SIM","Dual SIM"],"option":["Micro SIM","Mini SIM","Nano SIM","Dual SIM"],"number":["191","67","98","117"]},{"type":"string","name":"Memory card slot","label":"Micro-SD card slot","value":[1,0],"option":["Yes","No"],"number":["287","49"]},{"type":"range","name":"Water resistance in 1m if this is claimed?","label":"Water resistance","value":[{">=":0.5,"<=":5.5}],"option":["Yes"],"number":["18"]}]
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
