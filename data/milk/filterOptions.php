<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/7
 * Time: 13:31
 */
function getLabels()
{
    $sql="SELECT name FROM milk.manufacturers";
    $brands=$GLOBALS['db']->getAllValues($sql);
    $brands=json_encode($brands);
    $lang=$_SESSION['lang'];
    if($lang=="en_us"){

        $labels = <<<EOF
[
         {"type":"range","name":"total test result","label":"Total test result",
          "value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],
          "option":["very good ","good ","average","adequate","poor"]},
          {"type":"date","name":"Publication date","label":"Tested date",
           "value":[2016],
           "option":[2016]},
          {"type":"string","name":"Brand","label":"Brands",
          "value":$brands,
          "option":$brands},
		  {"type":"string","name":"Country of production (stated)","label":"Country of production",
          "value":["China","Germany"],
          "option":["China","Germany"]},
          {"type":"string","name":"Manufacturing process (stated)","label":"Manufacturing process",
          "value":["UHT"],
          "option":["UHT"]},
          {"type":"string","name":"Fat content","label":"Fat content",
          "value":["Whole milk"],
          "option":["Whole milk"]},
          {"type":"range","name":"Shelf life (stated)","label":"Shelf life(Days)",
          "value":[{">=":180,"<=":215},{">":215,"<=":360},{">":360,"<=":366}],
          "option":["from 180d to 215d","from 215d to 360d","from 360d to 365d"]},
          {"type":"range","name":"Bacterial count","label":"Bacterial count",
          "value":[{"<=":0},{">":0,"<=":3},{">":3,"<=":10},{">":10,"<=":20}],
          "option":["below 0","from 1 to 3","from 4 to 10","from 11 to 20"]},
          {"type":"range","name":"Dioxins incl. LOQ","label":"Dioxins in pg WHO-TEQ/g fat",
          "value":[{"<":0.56},{">=":0.56,"<=":1.0},{">":1.0,"<=":2.0},{">":2.0,"<=":2.5},{">":2.5}],
          "option":["below 0.56","from 0.56 to 1","from 1.01 to 2.0","from 2.01 to 2.5","above 2.5"]},
          {"type":"range","name":"Dioxins and dioxin-like PCB incl. LOQ","label":"Dioxins and dioxin-like PCB in pg WHO-TEQ/g fat",
          "value":[{"<":1.2},{">=":1.2,"<=":2.0},{">":2.0,"<=":4.0},{">":4.0,"<=":5.5},{">":5.5}],
          "option":["below 1.2","from 1.2 to 2.0","from 2.01 to 4.0","from 4.01 to 5.5","above 5.5"]}
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
           "value":[2016],
           "option":[2016]},
          {"type":"string","name":"Brand","label":"品牌",
          "value":$brands,
          "option":$brandLabels}
       ]
EOF;
    }

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
                //echo $sql."\n";
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
    return json_encode($arr);
}

//print_r(getLabels());
function showLabels(){
    $labels = <<<EOF
[{"type":"range","name":"total test result","label":"Total test result","value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],"option":["very good ","good ","average","adequate","poor"],"number":["0","7","1","2","1"]},{"type":"date","name":"Publication date","label":"Tested date","value":[2016],"option":[2016],"number":["11"]},{"type":"string","name":"Brand","label":"Brands","value":["Weidendorf","hochwald","SUKI","brightdairy","MUH","SUNSIDES","MENGNIU","Yili","Nestle","Oldenburger","SANYUAN"],"option":["Weidendorf","hochwald","SUKI","brightdairy","MUH","SUNSIDES","MENGNIU","Yili","Nestle","Oldenburger","SANYUAN"],"number":["1","1","1","1","1","1","1","1","1","1","1"]},{"type":"string","name":"Country of production (stated)","label":"Country of production","value":["China","Germany"],"option":["China","Germany"],"number":["5","6"]},{"type":"string","name":"Manufacturing process (stated)","label":"Manufacturing process","value":["UHT"],"option":["UHT"],"number":["11"]},{"type":"string","name":"Fat content","label":"Fat content","value":["Whole milk"],"option":["Whole milk"],"number":["11"]},{"type":"range","name":"Shelf life (stated)","label":"Shelf life(Days)","value":[{">=":180,"<=":215},{">":215,"<=":360},{">":360,"<=":366}],"option":["from 180d to 215d","from 215d to 360d","from 360d to 365d"],"number":["5","0","6"]},{"type":"range","name":"Bacterial count","label":"Bacterial count","value":[{"<=":0},{">":0,"<=":3},{">":3,"<=":10},{">":10,"<=":20}],"option":["below 0","from 1 to 3","from 4 to 10","from 11 to 20"],"number":["7","3","0","1"]},{"type":"range","name":"Dioxins incl. LOQ","label":"Dioxins in pg WHO-TEQ\/g fat","value":[{"<":0.56},{">=":0.56,"<=":1},{">":1,"<=":2},{">":2,"<=":2.5},{">":2.5}],"option":["below 0.56","from 0.56 to 1","from 1.01 to 2.0","from 2.01 to 2.5","above 2.5"],"number":["3","5","2","0","1"]},{"type":"range","name":"Dioxins and dioxin-like PCB incl. LOQ","label":"Dioxins and dioxin-like PCB in pg WHO-TEQ\/g fat","value":[{"<":1.2},{">=":1.2,"<=":2},{">":2,"<=":4},{">":4,"<=":5.5},{">":5.5}],"option":["below 1.2","from 1.2 to 2.0","from 2.01 to 4.0","from 4.01 to 5.5","above 5.5"],"number":["5","3","2","0","1"]}]
EOF;
    return $labels;
}

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

