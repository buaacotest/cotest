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
           "value":[2016,2015],
           "option":[2016,2015]},
          {"type":"string","name":"Brand","label":"Brands",
          "value":$brands,
          "option":$brands},
          {"type":"string","name":"Headphone type e.g. in ear etc","label":"Headphone type",
          "value":["In","Around","Over","On"],
          "option":["In ear","Around ear","Over ear","On ear"]},
		  {"type":"multi","name":"","label":"Key features",
           "value":["Wireless headphones","Phone call controls and mic built into cable (answer button etc)","Do headphones fold","Travel case","External noise cancelling present"],
           "option":["Wireless connectivity","Mic for phonecall","Folding headphones","Travel case","Noise canceling"]}
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
           "value":[2016,2015],
           "option":[2016,2015]},
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
                    $sql="select count(*) from results where id_evaluation in(select id_evaluation from evaluations where id_evaluation>99999999 and name='".$item['name']."') and value like'%$value%'";
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
[{"type":"range","name":"total test result","label":"Total test result","value":[{">=":0,"<=":1.5},{">":1.5,"<=":2.5},{">":2.5,"<=":3.5},{">":3.5,"<=":4.5},{">":4.5,"<=":5.5}],"option":["very good ","good ","average","sufficient","poor"],"number":["8","64","74","34","2"]},{"type":"date","name":"Publication date","label":"Tested date","value":[2016,2015],"option":[2016,2015],"number":["39","143"]},{"type":"string","name":"Brand","label":"Brands","value":["Sennheiser","Sony","Bose","Skullcandy","AKG","Beats by Dr. Dre","Monster","Philips","JVC","SoundMagic","Yurbuds","Grado","B&O (Bang and Olufsen)","Jabra","Gibson","John Lewis","BW (Bowers  Wilkins)","RHA","Harmon Kardon","Bang and Olufsen","Ted Baker","Jam","Onkyo","Kitsound","Plantronics","Pioneer","Bowers & Wilkins","Urbanears","Beats by Dr.Dre","Marshall","Audio-Technica","B&O","Adidas (Monster)","Audio Technica","Rock Jaw","Sony Xperia Z2","KEF","Starck","HTC One (M8)","Apple","Sol Republic","Goji","Klipsch","Samsung Galaxy S4 S5","Apple iPhone 5s","Bowers and Wilkins","Denon","Samsung","Bang Olufsen","LG","Nokia","Parrot"],"option":["Sennheiser","Sony","Bose","Skullcandy","AKG","Beats by Dr. Dre","Monster","Philips","JVC","SoundMagic","Yurbuds","Grado","B&O (Bang and Olufsen)","Jabra","Gibson","John Lewis","BW (Bowers  Wilkins)","RHA","Harmon Kardon","Bang and Olufsen","Ted Baker","Jam","Onkyo","Kitsound","Plantronics","Pioneer","Bowers & Wilkins","Urbanears","Beats by Dr.Dre","Marshall","Audio-Technica","B&O","Adidas (Monster)","Audio Technica","Rock Jaw","Sony Xperia Z2","KEF","Starck","HTC One (M8)","Apple","Sol Republic","Goji","Klipsch","Samsung Galaxy S4 S5","Apple iPhone 5s","Bowers and Wilkins","Denon","Samsung","Bang Olufsen","LG","Nokia","Parrot"],"number":["27","25","20","11","11","9","8","7","3","3","3","3","2","2","2","2","2","2","2","2","2","2","2","2","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1"]},{"type":"string","name":"Headphone type e.g. in ear etc","label":"Headphone type","value":["In","Around","Over","On"],"option":["In ear","Around ear","Over ear","On ear"],"number":["76","11","24","71"]},{"type":"multi","name":"","label":"Key features","value":["Wireless headphones","Phone call controls and mic built into cable (answer button etc)","Do headphones fold","Travel case","External noise cancelling present"],"option":["Wireless connectivity","Mic for phonecall","Folding headphones","Travel case","Noise canceling"],"number":["55","137","74","121","21"]}]
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
