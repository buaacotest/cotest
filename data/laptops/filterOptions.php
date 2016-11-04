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
           "value":[2016,2015,2014],
           "option":[2016,2015,2014]},
          {"type":"string","name":"Brand","label":"Brands",
          "value":$brands,
          "option":$brands},
          {"type":"string","name":"OS version on hard disk","label":"Operating System",
          "value":["windows","OS X","Android"],
          "option":["Windows","Mac OS","Android"]},
          {"type":"string","name":"Size of main memory (Ram)","label":"Memory (RAM)",
          "value":["2","4","6","8","12","16"],
          "option":["2GB","4GB","6GB","8GB","12GB","16GB"]},
          {"type":"range","name":"Claimed Capacity [GB]","label":"Storage capacity",
          "value":[{">=":8,"<=":64},{">=":65,"<=":128},{">":129,"<=":256},{">":257,"<=":500},{">=":1000}],
          "option":["8 - 64 GB","65 - 128 GB","129 - 256 GB","257 - 500 GB","1+ TB"]},
          {"type":"range","name":"Screen image diagonal","label":"Screen diagonal",
          "value":[{">":10,"<=":12},{">":12,"<=":14},{">":14,"<=":16},{">":16,"<=":18}],
          "option":["10 - 12\"","12 - 14\"","14 - 16\"","16 - 18\""]},
          {"type":"range","name":"Weight (with mid capacity battery)","label":"Weight incl. battery",
          "value":[{"<":1.2},{">=":1.2,"<=":1.7},{">":1.7,"<=":2.5},{">":2.5}],
          "option":["< 1.2kg","1.2 - 1.7kg","1.7 - 2.5kg","> 2.5kg"]},
          {"type":"string","name":"Type of drive","label":"Type of drive",
          "value":["DVD","BD"],
          "option":["DVD drive","Blu-ray drive"]},
          {"type":"string","name":"Type SSD HD?","label":"SSD",
          "value":["1","0"],
          "option":["Yes","No"]},
          {"type":"string","name":"Touch screen [y/n]","label":"Touch screen",
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
            "value":[2016,2015,2014],
           "option":[2016,2015,2014]},
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
                    $sql="select count(*) from results where id_evaluation in(select id_evaluation from evaluations where name='".$item['name']."' and id_evaluation>99999999) and value like'$value%'";
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
[{"type":"range","name":"total test result","label":"Total test result","value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],"option":["very good ","good ","average","sufficient","poor"],"number":["7","62","81","0","0"]},{"type":"date","name":"Publication date","label":"Tested date","value":[2016,2015,2014],"option":[2016,2015,2014],"number":["51","88","11"]},{"type":"string","name":"Brand","label":"Brands","value":["Lenovo","HP","Acer","Toshiba","Asus","Dell","Apple","Medion","Packard Bell","Microsoft","Compaq"],"option":["Lenovo","HP","Acer","Toshiba","Asus","Dell","Apple","Medion","Packard Bell","Microsoft","Compaq"],"number":["34","29","25","22","17","12","5","3","1","1","1"]},{"type":"string","name":"OS version on hard disk","label":"Operating System","value":["windows","OS X","Android"],"option":["Windows","Mac OS","Android"],"number":["144","2","1"]},{"type":"string","name":"Size of main memory (Ram)","label":"Memory (RAM)","value":["2","4","6","8","12","16"],"option":["2GB","4GB","6GB","8GB","12GB","16GB"],"number":["24","50","3","58","6","9"]},{"type":"range","name":"Claimed Capacity [GB]","label":"Storage capacity","value":[{">=":8,"<=":64},{">=":65,"<=":128},{">":129,"<=":256},{">":257,"<=":500},{">=":1000}],"option":["8 - 64 GB","65 - 128 GB","129 - 256 GB","257 - 500 GB","1+ TB"],"number":["23","20","17","29","61"]},{"type":"range","name":"Screen image diagonal","label":"Screen diagonal","value":[{">":10,"<=":12},{">":12,"<=":14},{">":14,"<=":16},{">":16,"<=":18}],"option":["10 - 12\"","12 - 14\"","14 - 16\"","16 - 18\""],"number":["24","51","60","14"]},{"type":"range","name":"Weight (with mid capacity battery)","label":"Weight incl. battery","value":[{"<":1.2},{">=":1.2,"<=":1.7},{">":1.7,"<=":2.5},{">":2.5}],"option":["< 1.2kg","1.2 - 1.7kg","1.7 - 2.5kg","> 2.5kg"],"number":["24","42","66","18"]},{"type":"string","name":"Type of drive","label":"Type of drive","value":["DVD","BD"],"option":["DVD drive","Blu-ray drive"],"number":["57","2"]},{"type":"string","name":"Type SSD HD?","label":"SSD","value":["1","0"],"option":["Yes","No"],"number":["68","82"]},{"type":"string","name":"Touch screen [y\/n]","label":"Touch screen","value":["1","0"],"option":["Yes","No"],"number":["50","100"]}]
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
