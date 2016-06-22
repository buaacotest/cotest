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
    $lang=$_SESSION['lang'];
    if($lang=="en_us"){

        $labels = <<<EOF
[
         {"type":"range","name":"total test result","label":"Total test result",
          "value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],
          "option":["very good ","good ","average","sufficient","poor"]},
          {"type":"date","name":"Publication date","label":"Tested date",
           "value":[2016],
           "option":[2016]},
          {"type":"string","name":"Brand","label":"Brands",
          "value":$brands,
          "option":$brands}

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

