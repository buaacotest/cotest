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
          "option":["very good ","good ","average","adequate","poor"]},
          {"type":"date","name":"Publication date","label":"Tested date",
           "value":[2016],
           "option":[2016]},
          {"type":"string","name":"Brand","label":"Brands",
          "value":$brands,
          "option":$brands},
          {"type":"string","name":"Months of infant age","label":"Months of infant age",
          "value":["> 12"],
          "option":["above 12"]},
          {"type":"string","name":"Country of production (stated)","label":"Country of production",
          "value":["China","Germany","Netherlands","Ireland","Switzerland"],
          "option":["China","Germany","Netherlands","Ireland","Switzerland"]},
		  {"type":"string","name":"Geographical origin of milk (stated)","label":"Geographical origin of milk (stated)",
           "value":["China","Germany","Irland","Netherlands","Switzerland","Imported"],
           "option":["China","Germany","Irland","Netherlands","Switzerland","Imported"]},
		   {"type":"range","name":"DHA measurement","label":"Docosahexaenoic acid (DHA)",
          "value":[{"=":"< LOQ"},{">":1,"<":2.4},{">=":2.4,"<=":4.8}],
          "option":["< LOQ","< 2.4 mg/100kJ","2.4 ~ 4.8 mg/100kJ"]},
		  {"type":"range","name":"Aerobic bacterial count measurement","label":"Aerobic bacterial count",
          "value":[{"=":"<10"},{">=":"10","<=":50},{">=":51,"<=":100},{">=":101,"<=":200},{">=":201,"<=":300},{">=":301,"<=":500}],
          "option":["< 10","10 ~ 50","51 ~ 100","101 ~ 200","201 ~ 300","301 ~ 500"]},
		  {"type":"range","name":"Sum of Dioxins and dioxin-like PCB","label":"Dioxins and dioxin-like PCB in pg WHO-TEQ/g prepared milk",
          "value":[{"<":0.007},{">=":0.007,"<=":0.010},{">=":0.011,"<=":0.020},{">=":0.021,"<=":0.030}],
          "option":["< 0.007","0.007 ~ 0.010","0.011 ~ 0.020","0.021 ~ 0.030"]}
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
						if(is_numeric($value[$opts[0]]))
							$sql = "select count(*) from results where value" . $opts[0] . $value[$opts[0]];
						else
							$sql = "select count(*) from results where value" . $opts[0] . "'".$value[$opts[0]]."'";
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
[{"type":"range","name":"total test result","label":"Total test result","value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],"option":["very good ","good ","average","adequate","poor"],"number":["0","5","6","2","0"]},{"type":"date","name":"Publication date","label":"Tested date","value":[2016],"option":[2016],"number":["13"]},{"type":"string","name":"Brand","label":"Brands","value":["Beingmate","Nestle","Wyeth","Friso","Nutrilon","MeadJohnson","Abbott","PRO-KIDO","JUNLEBAO"],"option":["Beingmate","Nestle","Wyeth","Friso","Nutrilon","MeadJohnson","Abbott","PRO-KIDO","JUNLEBAO"],"number":["3","2","2","1","1","1","1","1","1"]},{"type":"string","name":"Months of infant age","label":"Months of infant age","value":["> 12"],"option":["above 12"],"number":["13"]},{"type":"string","name":"Country of production (stated)","label":"Country of production","value":["China","Germany","Netherlands","Ireland","Switzerland"],"option":["China","Germany","Netherlands","Ireland","Switzerland"],"number":["8","1","2","1","1"]},{"type":"string","name":"Geographical origin of milk (stated)","label":"Geographical origin of milk (stated)","value":["China","Germany","Irland","Netherlands","Switzerland","Imported"],"option":["China","Germany","Irland","Netherlands","Switzerland","Imported"],"number":["2","1","1","2","1","6"]},{"type":"range","name":"DHA measurement","label":"Docosahexaenoic acid (DHA)","value":[{"=":"< LOQ"},{">":1,"<":2.4},{">=":2.4,"<=":4.8}],"option":["< LOQ","< 2.4 mg\/100kJ","2.4 ~ 4.8 mg\/100kJ"],"number":["7","4","2"]},{"type":"range","name":"Aerobic bacterial count measurement","label":"Aerobic bacterial count","value":[{"=":"<10"},{">=":"10","<=":50},{">=":51,"<=":100},{">=":101,"<=":200},{">=":201,"<=":300},{">=":301,"<=":500}],"option":["< 10","10 ~ 50","51 ~ 100","101 ~ 200","201 ~ 300","301 ~ 500"],"number":["3","6","1","1","1","1"]},{"type":"range","name":"Sum of Dioxins and dioxin-like PCB","label":"Dioxins and dioxin-like PCB in pg WHO-TEQ\/g prepared milk","value":[{"<":0.007},{">=":0.007,"<=":0.01},{">=":0.011,"<=":0.02},{">=":0.021,"<=":0.03}],"option":["< 0.007","0.007 ~ 0.010","0.011 ~ 0.020","0.021 ~ 0.030"],"number":["6","5","1","1"]}]
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

