<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/7
 * Time: 13:31
 */
function getLabels()
{
    $sql="SELECT name FROM tablets.manufacturers";
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
          {"type":"range","name":"Screen image diagonal","label":"Screen image diagonal",
          "value":[{">":8},{">=":8,"<=":10},{">":10}],
          "option":["> 8\"","8 - 10\"","> 10\""]},
          {"type":"range","name":"Native resolution (height)","label":"Native resolution (height)",
          "value":[{"<":800},{">=":800,"<=":1200},{">":1200,"<=":1500},{">":1500,"<=":2048}],
          "option":["< 800 Pixel","800 - 1200 Pixel","1200 - 1500 Pixel","1500 -2048 Pixel"]},
          {"type":"range","name":"Native resolution (width)","label":"Native resolution (width)",
          "value":[{"<":1300},{">=":1300,"<=":1900},{">":1900,"<=":2000},{">":2000,"<=":2736}],
          "option":["< 1300 Pixel","1300 - 1900 Pixel","1900 - 2000 Pixel","2000 - 2736 Pixel"]},
          {"type":"string","name":"OS installed","label":"OS installed",
          "value":["Android","iOS","Windows"],
          "option":["Android","iOS","Windows"]},
          {"type":"string","name":"Claimed size of internal storage [Gb]","label":"Claimed size of internal storage",
          "value":[4,8,16,32,64,128,256],
          "option":["4GB","8GB","16GB","32GB","64GB","128GB","256GB"]},
          {"type":"multi","name":"","label":"Connection",
           "value":["3G","LTE","Bluetooth","GPS","NFC","Phone functionality"],
           "option":["3G","LTE","Bluetooth","GPS","NFC","Phone functionality"]},
          {"type":"multi","name":"","label":"WLAN",
           "value":["Wi-Fi G","Wi-Fi N","Wi-Fi 5GHzN","Wi-Fi AC"],
           "option":["Wi-Fi G","Wi-Fi N","Wi-Fi 5GHzN","Wi-Fi AC"]},
           {"type":"multi","name":"","label":"USB",
           "value":["USB 4.0 [y/n]","USB 3.0 [y/n]","USB 2.0 [y/n]","Mini-USB [y/n]" ,"Micro-USB [y/n]", "HDMI"],
           "option":["USB 4.0","USB 3.0","USB 2.0","Mini-USB" ,"Micro-USB", "HDMI"]},
           {"type":"multi","name":"","label":"SD",
           "value":["full SD size","mini-SD","micro-SD"],
           "option":["full SD size","mini-SD","micro-SD"]},
           {"type":"multi","name":"","label":"Accessories",
           "value":["Physical keyboard provided","Stylus supplied"],
           "option":["Physical keyboard provided","Stylus supplied"]},
           {"type":"multi","name":"","label":"Robustness",
           "value":["Manufacturer claims waterproof?","Manufacturer claims water resistant?"],
           "option":["Waterproof, stated","Water resistant, stated"]}
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
          "option":$brandLabels}
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
                    $sql="select count(*) from results where id_evaluation in(select id_evaluation from evaluations where name='".$item['name']."') and value like'%$value%'";
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
[{"type":"range","name":"total test result","label":"Total test result","value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],"option":["very good ","good ","average","sufficient","poor"],"number":["23","173","86","38","3"]},{"type":"date","name":"Publication date","label":"Tested date","value":[2016,2015,2014],"option":[2016,2015,2014],"number":["77","118","128"]},{"type":"string","name":"Brand","label":"Brands","value":["Apple","Samsung","Asus","Lenovo","Acer","HP","Amazon","Microsoft","Sony","BQ","Archos","Storex","Wolder","Denver","Google","LG","Dell","iGet","Go Clever","Toshiba","Woxter","Bush","Prestigio","Cube","Haier","Estar","Mediacom","Teclast","Point of View","Gigaset","SPC","Huawei","Sencor","Kurio","EE","Pipo","Ramos","Xiaomi \/ Mi","UMAX","C3 Tech","DL","Nvidia","GoGEN","PocketBook","Alcatel","Onda","Salora","Kobo","SPCinternet","Tesco","Multilaser","Hannspree","Lenco","Qilive","Binatone","Xtreme","Leap Frog","e-star","Hyundai","Difrnce","Vtech"],"option":["Apple","Samsung","Asus","Lenovo","Acer","HP","Amazon","Microsoft","Sony","BQ","Archos","Storex","Wolder","Denver","Google","LG","Dell","iGet","Go Clever","Toshiba","Woxter","Bush","Prestigio","Cube","Haier","Estar","Mediacom","Teclast","Point of View","Gigaset","SPC","Huawei","Sencor","Kurio","EE","Pipo","Ramos","Xiaomi \/ Mi","UMAX","C3 Tech","DL","Nvidia","GoGEN","PocketBook","Alcatel","Onda","Salora","Kobo","SPCinternet","Tesco","Multilaser","Hannspree","Lenco","Qilive","Binatone","Xtreme","Leap Frog","e-star","Hyundai","Difrnce","Vtech"],"number":["40","37","25","22","19","15","14","12","11","11","8","7","6","6","5","5","5","4","4","4","4","3","3","2","2","2","2","2","2","2","2","2","2","2","2","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1"]},{"type":"range","name":"Screen image diagonal","label":"Screen image diagonal","value":[{">":8},{">=":8,"<=":10},{">":10}],"option":["> 8\"","8 - 10\"","> 10\""],"number":["207","101","118"]},{"type":"range","name":"Native resolution (height)","label":"Native resolution (height)","value":[{"<":800},{">=":800,"<=":1200},{">":1200,"<=":1500},{">":1500,"<=":2048}],"option":["< 800 Pixel","800 - 1200 Pixel","1200 - 1500 Pixel","1500 -2048 Pixel"],"number":["42","115","51","105"]},{"type":"range","name":"Native resolution (width)","label":"Native resolution (width)","value":[{"<":1300},{">=":1300,"<=":1900},{">":1900,"<=":2000},{">":2000,"<=":2736}],"option":["< 1300 Pixel","1300 - 1900 Pixel","1900 - 2000 Pixel","2000 - 2736 Pixel"],"number":["186","65","29","43"]},{"type":"string","name":"OS installed","label":"OS installed","value":["Android","iOS","Windows"],"option":["Android","iOS","Windows"],"number":["222","40","43"]},{"type":"string","name":"Claimed size of internal storage [Gb]","label":"Claimed size of internal storage","value":[4,8,16,32,64,128,256],"option":["4GB","8GB","16GB","32GB","64GB","128GB","256GB"],"number":["25","95","117","73","17","21","9"]},{"type":"multi","name":"","label":"Connection","value":["3G","LTE","Bluetooth","GPS","NFC","Phone functionality"],"option":["3G","LTE","Bluetooth","GPS","NFC","Phone functionality"],"number":["75","48","288","180","42","39"]},{"type":"multi","name":"","label":"WLAN","value":["Wi-Fi G","Wi-Fi N","Wi-Fi 5GHzN","Wi-Fi AC"],"option":["Wi-Fi G","Wi-Fi N","Wi-Fi 5GHzN","Wi-Fi AC"],"number":["322","318","144","116"]},{"type":"multi","name":"","label":"USB","value":["USB 4.0 [y\/n]","USB 3.0 [y\/n]","USB 2.0 [y\/n]","Mini-USB [y\/n]","Micro-USB [y\/n]","HDMI"],"option":["USB 4.0","USB 3.0","USB 2.0","Mini-USB","Micro-USB","HDMI"],"number":["1","28","258","2","264","64"]},{"type":"multi","name":"","label":"SD","value":["full SD size","mini-SD","micro-SD"],"option":["full SD size","mini-SD","micro-SD"],"number":["0","8","262"]},{"type":"multi","name":"","label":"Accessories","value":["Physical keyboard provided","Stylus supplied"],"option":["Physical keyboard provided","Stylus supplied"],"number":["34","32"]},{"type":"multi","name":"","label":"Robustness","value":["Manufacturer claims waterproof?","Manufacturer claims water resistant?"],"option":["Waterproof, stated","Water resistant, stated"],"number":["4","7"]}]
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
