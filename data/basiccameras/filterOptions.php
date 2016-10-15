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
          {"type":"range","name":"Zoom range, stated","label":"Zoom range, stated",
          "value":[{">=":1,"<=":2},{">=":3,"<=":4},{">=":5,"<=":6},{">=":7,"<=":8},{">=":9,"<=":10},{">=":11,"<=":15},{">":15}],
          "option":["1 - 2 ","3 - 4","5 - 6","7 - 8","9 - 10","11 - 15","> 15"]},
          {"type":"range","name":"Effective sensor diagonal","label":"Image sensor diagonal",
          "value":[{"<":7},{">=":7,"<=":12},{">":12,"<=":14},{">":14,"<=":17},{">=":18,"<=":22},{">=":25,"<=":30},{">=":40,"<=":45}],
          "option":["< 7 mm","7-12 mm","12-14 mm","14-17 mm","18-22 mm","25-30 mm","40-45 mm"]},
          {"type":"range","name":"Weight, complete system camera","label":"Weight, complete",
          "value":[{"<":150},{">=":150,"<=":190},{">":190,"<=":250},{">":250,"<=":550},{">":550,"<=":1000},{">":1000}],
          "option":["< 150 g","150 - 190 g","190 - 250 g","250 - 550 g","550 - 1000 g","> 1000 g"]},
           {"type":"range","name":"normalised focal length wide","label":"Normalised focal length wide(the smaller the better)",
          "value":[{"<":0.58},{">=":0.58,"<":0.61},{">=":0.61,"<=":0.65},{">":0.65,"<=":0.75},{">":0.75,"<=":1.00},{">":1.00}],
          "option":["< 0.58","0.58 - 0.61","0.61 - 0.65","0.65 - 0.75","0.75 - 1.00","> 1.00"]},
          {"type":"range","name":"normalised focal length tele","label":"Normalised focal length tele(the bigger the better)",
          "value":[{">":5.5},{">":2.6,"<=":5.5},{">":2.2,"<=":2.6},{">":1.9,"<=":2.2},{">":0.5,"<=":1.9}],
          "option":["> 5.5","2.6 - 5.5","2.2 - 2.6","1.9 - 2.2","0.5 - 1.9"]},
          {"type":"range","name":"shutter delay 8,5m","label":"Shutter delay 8,5m",
          "value":[{"<":0.25},{">=":0.25,"<=":0.36},{">":0.36,"<=":0.49},{">":0.49,"<=":0.70},{">":0.70}],
          "option":["< 0.25 s","0.25 - 0.36 s","0.36 -0.49 s","0.49 - 0.70 s","> 0.70 s"]},
          {"type":"range","name":"continuous shooting mode","label":"Continuous pictures/s",
          "value":[{">":8.7},{">":6.8,"<=":8.7},{">":4.9,"<=":6.8},{">":2.1,"<=":4.9},{">":0.3,"<=":2.1}],
          "option":["> 8.7","6.8 - 8.7","4.9 - 6.8","2.1 - 4.9","0.3 -2.1"]},
          {"type":"range","name":"Wide setting, minimum F-number, stated","label":"Minimum F-number wide",
          "value":[{"<":2.8},{">=":2.8,"<=":3.2},{">":3.2,"<=":3.5},{">":3.5,"<=":5.6}],
          "option":["< 2.8","2.8 - 3.2","3.2 - 3.5","3.5 - 5.6"]},
          {"type":"range","name":"Tele setting, minimum F-number, stated","label":"Minimum F-number tele",
          "value":[{"<":4.7},{">=":4.7,"<=":5.2},{">":5.2,"<=":5.6},{">":5.6,"<=":5.9},{">":5.9,"<=":8.5}],
          "option":["< 4.7","4.7 - 5.2","5.2 -5.6","5.6 - 5.9","5.9 - 8.5"]},
          {"type":"multi","name":"","label":"Key features",
           "value":["Viewfinder existing (either built in, delivered or optional)","Touchscreen","Manual focus (continuosly, more than 5 settings)","Wi-Fi (WLAN) connection","GPS tagging in camera","HDR function (high dynamic range with several shots)","Panorama record function (panning)"],
           "option":["Viewfinder","Touchscreen","Manual focus","WLAN","GPS","HDR","Panorama record"]},
           {"type":"multi","name":"","label":"Robustness",
           "value":["Water / dust resistance (rain, humidity, dust, snow)","Water proof (for diving)","Shock proof"],
           "option":["Water / dust resistance","Waterproof for diving","Shock proof"]}
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
          "option":$brands},
          {"type":"range","name":"Zoom range, stated","label":"Zoom range, stated",
          "value":[{">=":1,"<=":2},{">=":3,"<=":4},{">=":5,"<=":6},{">=":7,"<=":8},{">=":9,"<=":10},{">=":11,"<=":15},{">":15}],
          "option":["1 - 2 ","3 - 4","5 - 6","7 - 8","9 - 10","11 - 15","> 15"]},
          {"type":"range","name":"Effective sensor diagonal","label":"Image sensor diagonal",
          "value":[{"<":7},{">=":7,"<=":12},{">":12,"<=":14},{">":14,"<=":17},{">=":18,"<=":22},{">=":25,"<=":30},{">=":40,"<=":45}],
          "option":["< 7 mm","7-12 mm","12-14 mm","14-17 mm","18-22 mm","25-30 mm","40-45 mm"]},
          {"type":"range","name":"Weight, complete system camera","label":"Weight, complete",
          "value":[{"<":150},{">=":150,"<=":190},{">":190,"<=":250},{">":250,"<=":550},{">":550,"<=":1000},{">":1000}],
          "option":["< 150 g","150 - 190 g","190 - 250 g","250 - 550 g","550 - 1000 g","> 1000 g"]},
           {"type":"range","name":"normalised focal length wide","label":"Normalised focal length wide(the smaller the better)",
          "value":[{"<":0.58},{">=":0.58,"<":0.61},{">=":0.61,"<=":0.65},{">":0.65,"<=":0.75},{">":0.75,"<=":1.00},{">":1.00}],
          "option":["< 0.58","0.58 - 0.61","0.61 - 0.65","0.65 - 0.75","0.75 - 1.00","> 1.00"]},
          {"type":"range","name":"normalised focal length tele","label":"Normalised focal length tele\n(the bigger the better)",
          "value":[{">":5.5},{">":2.6,"<=":5.5},{">":2.2,"<=":2.6},{">":1.9,"<=":2.2},{">":0.5,"<=":1.9}],
          "option":["> 5.5","2.6 - 5.5","2.2 - 2.6","1.9 - 2.2","0.5 - 1.9"]},
          {"type":"range","name":"shutter delay 8,5m","label":"Shutter delay 8,5m",
          "value":[{"<":0.25},{">=":0.25,"<=":0.36},{">":0.36,"<=":0.49},{">":0.49,"<=":0.70},{">":0.70}],
          "option":["< 0.25 s","0.25 - 0.36 s","0.36 -0.49 s","0.49 - 0.70 s","> 0.70 s"]},
          {"type":"range","name":"continuous shooting mode - pictures in row","label":"Continuous pictures/s",
          "value":[{">":8.7},{">":6.8,"<=":8.7},{">":4.9,"<=":6.8},{">":2.1,"<=":4.9},{">":0.3,"<=":2.1}],
          "option":["> 8.7","6.8 - 8.7","4.9 - 6.8","2.1 - 4.9","0.3 -2.1"]}
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
                }
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
[{"type":"range","name":"total test result","label":"Total test result","value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],"option":["very good ","good ","average","sufficient","poor"],"number":["0","44","19","3","2"]},{"type":"date","name":"Publication date","label":"Tested date","value":[2016,2015,2014],"option":[2016,2015,2014],"number":["68","93","189"]},{"type":"string","name":"Brand","label":"Brands","value":["Nikon","Canon","Sony","Panasonic","Olympus","Samsung","Fujifilm","Pentax","Ricoh","Leica","Apple","LG","Rollei","HTC","Huawei","Kodak","Motorola","OnePlus","Nokia","Microsoft","Casio","DXO"],"option":["Nikon","Canon","Sony","Panasonic","Olympus","Samsung","Fujifilm","Pentax","Ricoh","Leica","Apple","LG","Rollei","HTC","Huawei","Kodak","Motorola","OnePlus","Nokia","Microsoft","Casio","DXO"],"number":["60","56","39","38","36","32","26","17","10","9","5","5","3","3","2","2","2","1","1","1","1","1"]},{"type":"range","name":"Zoom range, stated","label":"Zoom range, stated","value":[{">=":1,"<=":2},{">=":3,"<=":4},{">=":5,"<=":6},{">=":7,"<=":8},{">=":9,"<=":10},{">=":11,"<=":15},{">":15}],"option":["1 - 2 ","3 - 4","5 - 6","7 - 8","9 - 10","11 - 15","> 15"],"number":["58","90","45","20","9","19","84"]},{"type":"range","name":"Effective sensor diagonal","label":"Image sensor diagonal","value":[{"<":7},{">=":7,"<=":12},{">":12,"<=":14},{">":14,"<=":17},{">=":18,"<=":22},{">=":25,"<=":30},{">=":40,"<=":45}],"option":["< 7 mm","7-12 mm","12-14 mm","14-17 mm","18-22 mm","25-30 mm","40-45 mm"],"number":["35","161","0","22","31","87","9"]},{"type":"range","name":"Weight, complete system camera","label":"Weight, complete","value":[{"<":150},{">=":150,"<=":190},{">":190,"<=":250},{">":250,"<=":550},{">":550,"<=":1000},{">":1000}],"option":["< 150 g","150 - 190 g","190 - 250 g","250 - 550 g","550 - 1000 g","> 1000 g"],"number":["225","0","0","29","64","32"]},{"type":"range","name":"normalised focal length wide","label":"Normalised focal length wide(the smaller the better)","value":[{"<":0.58},{">=":0.58,"<":0.61},{">=":0.61,"<=":0.65},{">":0.65,"<=":0.75},{">":0.75,"<=":1},{">":1}],"option":["< 0.58","0.58 - 0.61","0.61 - 0.65","0.65 - 0.75","0.75 - 1.00","> 1.00"],"number":["58","131","126","21","2","12"]},{"type":"range","name":"normalised focal length tele","label":"Normalised focal length tele(the bigger the better)","value":[{">":5.5},{">":2.6,"<=":5.5},{">":2.2,"<=":2.6},{">":1.9,"<=":2.2},{">":0.5,"<=":1.9}],"option":["> 5.5","2.6 - 5.5","2.2 - 2.6","1.9 - 2.2","0.5 - 1.9"],"number":["99","55","31","19","136"]},{"type":"range","name":"shutter delay 8,5m","label":"Shutter delay 8,5m","value":[{"<":0.25},{">=":0.25,"<=":0.36},{">":0.36,"<=":0.49},{">":0.49,"<=":0.7},{">":0.7}],"option":["< 0.25 s","0.25 - 0.36 s","0.36 -0.49 s","0.49 - 0.70 s","> 0.70 s"],"number":["66","102","96","53","33"]},{"type":"range","name":"continuous shooting mode","label":"Continuous pictures\/s","value":[{">":8.7},{">":6.8,"<=":8.7},{">":4.9,"<=":6.8},{">":2.1,"<=":4.9},{">":0.3,"<=":2.1}],"option":["> 8.7","6.8 - 8.7","4.9 - 6.8","2.1 - 4.9","0.3 -2.1"],"number":["80","73","68","61","62"]},{"type":"range","name":"Wide setting, minimum F-number, stated","label":"Minimum F-number wide","value":[{"<":2.8},{">=":2.8,"<=":3.2},{">":3.2,"<=":3.5},{">":3.5,"<=":5.6}],"option":["< 2.8","2.8 - 3.2","3.2 - 3.5","3.5 - 5.6"],"number":["83","96","139","32"]},{"type":"range","name":"Tele setting, minimum F-number, stated","label":"Minimum F-number tele","value":[{"<":4.7},{">=":4.7,"<=":5.2},{">":5.2,"<=":5.6},{">":5.6,"<=":5.9},{">":5.9,"<=":8.5}],"option":["< 4.7","4.7 - 5.2","5.2 -5.6","5.6 - 5.9","5.9 - 8.5"],"number":["97","18","87","35","113"]},{"type":"multi","name":"","label":"Key features","value":["Viewfinder existing (either built in, delivered or optional)","Touchscreen","Manual focus (continuosly, more than 5 settings)","Wi-Fi (WLAN) connection","GPS tagging in camera","HDR function (high dynamic range with several shots)","Panorama record function (panning)"],"option":["Viewfinder","Touchscreen","Manual focus","WLAN","GPS","HDR","Panorama record"],"number":["131","121","220","240","81","241","183"]},{"type":"multi","name":"","label":"Robustness","value":["Water \/ dust resistance (rain, humidity, dust, snow)","Water proof (for diving)","Shock proof"],"option":["Water \/ dust resistance","Waterproof for diving","Shock proof"],"number":["71","34","29"]}]
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
