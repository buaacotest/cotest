<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/7
 * Time: 13:31
 */
function getLabels()
{
    $labels = '[
         {"type":"range","name":"total test result","label":"COTEST quality judgment",
          "value":[{">":4.5,"<=":5.5},{">":3.5,"<=":4.5},{">":2.5,"<=":3.5},{">":1.5,"<=":2.5},{">":0.5,"<=":1.5}],
          "option":["very good ","good ","average","sufficient","poor"]},
          {"type":"date","name":"Publication date","label":"Tested date",
           "value":[16,15,14],
           "option":[2016,2015,2014]},
          {"type":"string","name":"Brand (from brandlist)","label":"Brands",
          "value":["Acer","Alcatel","Apple","Asus","BlackBerry","BQ","Energy Sistem","HTC","Huawei","Kazam","LG","Medion","Meizu","Microsoft","Motorola","NOS","One Plus","ORANGE","Positivo","Quantum","Samsung","SGP Technologies","Sony","Stonex","Vodafone","Wiko","Wileyfox","Woxter","Xiaomi","Yota Devices","ZTE"],
          "option":["Acer","Alcatel","Apple","Asus","BlackBerry","BQ","Energy Sistem","HTC","Huawei","Kazam","LG","Medion","Meizu","Microsoft","Motorola","NOS","One Plus","ORANGE","Positivo","Quantum","Samsung","SGP Technologies","Sony","Stonex","Vodafone","Wiko","Wileyfox","Woxter","Xiaomi","Yota Devices","ZTE"]},
          {"type":"string","name":"Operating system name","label":"Operating system",
           "value":["Android","iOS","BlackBerry OS","Windows Phone"],
           "option":["Android","iOS","BlackBerry","Windows"]},
          {"type":"range","name":"Display diagonal","label":"Display diagonal",
           "value":[{">=":130},{">=":110},{">=":100},{">=":84},{">=":51},{">=":-1,"<=":-1}],
           "option":["from 130 mm","from 110 mm","from 100 mm","from 84 mm","from 51 mm"]},
           {"type":"multi","name":"","label":"SIM card format",
           "value":["Micro SIM","Mini SIM","Nano SIM","Dual SIM"],
           "option":["Micro SIM","Mini SIM","Nano SIM","Dual SIM"]},
          {"type":"string","name":"Memory card slot","label":"Micro-SD card slot",
           "value":[1,0],
           "option":["Yes","No"]}
       ]';
    $arr = json_decode($labels, true);
    foreach ($arr as $key => $item) {
        if ($item['type'] == 'string') {
            foreach ($item['value'] as $value) {
                $sql = "select count(*) from results where value='" . $value . "'" . "and id_evaluation=(select id_evaluation from evaluations where id_evaluation>99999999 and name='" . $item['name'] . "')";
                //echo $sql;
                $v = $GLOBALS['db']->getOne($sql);
                $arr[$key]['number'][] = $v;
            }
        } else if($item['type'] == 'range') {
            foreach ($item['value'] as $value) {
                $opts = array_keys($value);
                $len = count($opts);
                if ($len == 1 && $opts[0] != -1) {
                    $sql = "select count(*) from results where value" . $opts[0] . $value[$opts[0]];
                } else if ($len == 2 && $opts[0] != -1) {
                    $sql = "select count(*) from results where value" . $opts[0] . $value[$opts[0]] . " and value" . $opts[1] . $value[$opts[1]];
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
                $sql = "select count(*) from products where batch like '" . $value . "%'" ;
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
    return json_encode($arr);
}
