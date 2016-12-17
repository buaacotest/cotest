<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/18
 * Time: 14:37
 */
/*获取指定id组的产品表的内容*/
function selectProducts($id){
    if($id==NULL){
      return array();
    }
    else{
        $sql="select * from products where id_productgroup=".$id;
        $prod=$GLOBALS['db']->getAll($sql);
    }
    return $prod;
}
/*获取指定id组的产品类别名称*/
function getProductsCat($id){
    $sql="select name from productgroups where id_productgroup=".$id;
    $catname=$GLOBALS['db']->getOne($sql);
    return $catname;
}


/*得到一个id的manufacture*/
function getManufacterNameByOneID($produnct_id){
    $sql="select name from manufacturers where id_manufacturer=(select id_manufacturer from products where id_product=".$produnct_id.")";
    $manufacturername=$GLOBALS['db']->getOne($sql);
    return $manufacturername;
}

/*得到一个产品的所有评分，传入参数为id_product*/
function getEvalutionsByOneID($product_id)
{
    $nowdb = $GLOBALS['db']->getNowDB();
    if($nowdb==null){
        return null;
    }
    $sql = "SELECT DISTINCT name,value FROM results join evaluations on results.id_evaluation=evaluations.id_evaluation join products on results.id_product=products.id_product where products.id_product=" . $product_id;
    $results = $GLOBALS['db']->query($sql);
    while ($row = mysql_fetch_array($results)) {
        $arry[] = $row;
    }
    return $arry;
    /*arry include all the evaluations' names and their values*/
}
function getPropertysByOneID($product_id)
{
    $nowdb=$GLOBALS['db']->getNowDB();
}

function getIDsByKeywords($keywords)
{
    $nowdb = $GLOBALS['db']->getNowDB();
    if($nowdb==null){
        return null;
    }
    $sql="SELECT id_product FROM products where completename like '%s%'";
    $results = $GLOBALS['db']->excusql($sql);
    while ($row = mysql_fetch_array($results)) {
        $arry[] = $row;
    }
    return $arry;
}
/*根据project_name获取所有的product的相关属性*/
function getAllProducts($order='time'){
    $sql="select modelname as product_name,`name`as product_manufacturer,timestamp_created as product_tested_date, id_product as product_id,price
                from products as A,manufacturers as B
                where A.id_manufacturer=B.id_manufacturer";
    //echo $sql;
    $res=$GLOBALS['db']->getAll($sql);
    foreach($res as $k=>$v){
        //$res[$k]['product_name']=shortName($v['product_name']);
        $res[$k]['product_tested_date']=convertTime($v['product_tested_date']);
        $res[$k]['score']=getTotalScore($v['product_id']);
    }
    $res=multiSort($res,$order);
    //print_r($res);
    roundScore($res);
    return $res;
}
/*挑选指定ID的产品*/
function getProductByIds($ids,$order='time'){
    $sql = "select modelname as product_name,`name`as product_manufacturer,timestamp_created as product_tested_date, id_product as product_id,price
                from products as A,manufacturers as B
                where A.id_manufacturer=B.id_manufacturer and id_product in(" ;

	foreach($ids as $id){
		$sql.=$id. ",";
	}
	$sql=substr($sql,0,-1);
	$sql.=")";

    $res=$GLOBALS['db']->getAll($sql);
    if(empty($res)){
        return [];
    }
    foreach($res as $k=>$v){
        //$res[$k]['product_name']=shortName($v['product_name']);
        $res[$k]['product_tested_date']=convertTime($v['product_tested_date']);
        $res[$k]['score']=getTotalScore($v['product_id']);
    }
    $res=multiSort($res,$order);
    roundScore($res);
    return $res;
}

/*
 *
 * 对得分四舍五入,
 * In:products Array*/
function roundScore(&$arr){
    if (empty($arr)){
        return ;
    }
    foreach($arr as $k=>$v){

        $arr[$k]['score']=number_format($v['score'], 1, '.', '');
    }
}

/*省略太长的产品名*/
function shortName($name,$targetLen=39){
    if(strlen($name)>$targetLen){
        return  substr($name,0,$targetLen)."...";
    }


    return $name;
}

/*排序*/
function multiSort($arr,$order){
    if (empty($arr)){
        return [];
    }
    foreach ($arr as $key=>$value){
        $time[$key] = $value[2];
        $score[$key] = $value['score'];
        $price[$key]=$value['price'];
        /*
        $tempPrice=explode(" ",$value['price']);
        if(is_numeric($tempPrice))
             $price[$key]=$tempPrice[0];
        */
    }
    if($order=='score')
        array_multisort($score,SORT_NUMERIC,SORT_ASC,$arr);
    else if($order=='priceUp'&&!empty($price))
        array_multisort($price,SORT_NUMERIC,SORT_ASC,$arr);
    else if($order=='priceDown'&&!empty($price))
        array_multisort($price,SORT_NUMERIC,SORT_DESC,$arr);
    else{
        array_multisort($time,SORT_NUMERIC,SORT_DESC,$arr);
    }
    return $arr;
}

/*日期转换TIMESTAMP-->Dec 2015*/
function convertTime($time){
    if($_SESSION['lang']=='en_us'){
       $newTime=gmdate('M Y',$time);
        return $newTime;
        /*
        $timeArray=array("01"=>"Jan","02"=>"Feb","03"=>"Mar","04"=>"Apr","05"=>"May","06"=>"Jun","07"=>"Jul","08"=>"Aug","09"=>"Sep",
            "10"=>"Oct","11"=>"Nov","12"=>"Dec");
        $year="20".substr($time,0,2);
        $mon=$timeArray[substr($time,2,2)];
        return $mon." ".$year;
        */

    }else{
        $newTime=date('Y/m', $time);
        return $newTime;
        /*
        $year="20".substr($time,0,2);
        $mon=substr($time,2,2);
        return $year."/".$mon;
        */
    }

}

/*获取某个product的总评分*/
function getTotalScore($id){
    $sql="select value from results where id_product=$id and id_evaluation=
          (select id_evaluation from evaluations where name='total test result')";
    $score=6-$GLOBALS['db']->getOne($sql);

    return $score;
}

/*根据product的id获取基本信息、测试得分以及属性*/
function getDetails($id,$level,$lang){
    if($lang=="en_us"){
        $sql="select modelname as name,`name`as manufacturer
                from products as A,manufacturers as B
                where A.id_manufacturer=B.id_manufacturer and A.id_product=$id";
    }
    else if($lang="zh_cn"){
        $sql="select modelname as name,`CHN`as manufacturer
                from products as A,manufacturers as B,sdictionary as C
                where A.id_manufacturer=B.id_manufacturer and C.wordid=B.id_manufacturer and C.flag=2 and A.id_product=$id";
    }

    $res=$GLOBALS['db']->getOneRow($sql);
    $res['id']=$id;
    $res['evaluations']=getGradeTree($id,$level,$lang);
    $res['property']=getProperty($id,$res,$lang);
   //print_r($res);
    return $res;
}
/*求某个产品的评分树*/
function getGradeTree($id,$tar,$lang){
    if($lang=='en_us'){
        $sql="select A.id_evaluation,name,id_parent,weighting_normalized as weight, value
       from evaluations as A,results as B
      where A.id_evaluation=B.id_evaluation and weighting_normalized!=0
       and B.id_product=$id";
    }
    else{
        $sql="select A.id_evaluation,C.CHN as name,id_parent,weighting_normalized as weight,value
       from evaluations as A,results as B,sdictionary as C
      where A.id_evaluation=B.id_evaluation and weighting_normalized!=0
      and flag=1 and C.wordid=A.id_evaluation
       and B.id_product=$id";
    }
    //echo $sql;
    $data=$GLOBALS['db']->getAll($sql);
    foreach($data as $k=>$v){
        if(is_numeric($v['value']))
            $data[$k]['value']=number_format(6-$v['value'],1, '.', '');
    }
    $gradeTree=getTree($data,0,0,$tar);
    return $gradeTree;

}
/*构建评分的树结构*/
function getTree($data, $pId,$level,$end)
{
    //echo $level;
    if($level==$end)
        return null;
    $tree = '';
    foreach($data as $v)
    {
        if($v['id_parent'] == $pId)
        {
            $level++;
            $v['id_parent'] = getTree($data, $v['id_evaluation'],$level,$end);
            $tree[] = $v;
            $level--;
        }
    }
    return $tree;
}


/*获取指定id产品的属性的值*/
function getPropsValues($props,$id){
    foreach($props as $k=>$v){
        //echo $v['name'];
        $id_evaluation = $v['id_property']+100000000;
        $sql="select value from results where id_product=$id  and id_evaluation>99999999
              and id_evaluation=$id_evaluation";


       // echo $sql."\n";
        $value=$GLOBALS['db']->getOne($sql);
        $value= htmlspecialchars($value,ENT_QUOTES);
        switch($v['type']){
            case 'String':if(is_numeric($value))
                $v['value']=round($value,4);
			else
				$v['value']=$value;
			break;
            case 'Score':if(is_numeric($value))
                $v['value']=round($value,2);
            else
                $v['value']=$value;
                break;
            case 'Numeric':if(is_numeric($value))
                $v['value']=round($value,4);
            else
                $v['value']=$value;
                break;
            case 'Boolean':if($value==0)
                $v['value']='No';
            elseif($value==1)
                $v['value']='Yes';
            else
                $v['value']=$value;
                break;
            default:$v['value']=$value;break;
        }
        if($value==''){   /*||$value=='ny'||$value=='ns'||$value=='nt'||$value=='nf'*/

            $v['value']='-';
            $v['unit']='';


        }
        $props[$k]=$v;

    }
    return $props;
}

/*产品属性挑选指定规则*/
function getRules(){
    return $rules = array("mobilephones"=>null,
                            "basiccameras"=>null,
                            "whheadphones"=>null,
                            "tvs"=>array("groups"=>array(array("name"=>"Screen","props"=>array(2004, 1702, 1704, 1705, 1706, 1717, 1718,
                                                                             2029, 1722, 1723, 1789)),
                                  array("name"=>"Size","props"=>array(1707, 1746, 1747, 1748, 1751)),
                                  array("name"=>" Connection","props"=>array(1752, 1754, 1755,1758, 1760, 1761, 1762,1763,1766,1768,1771,1772,                                                                                  1777,1784,1785,1786,1725)),
                                  array("name"=>"Smart","props"=>array(1778,1779,1780,1781,1860,1861,1868,1898,1936)),
                                  array("name"=>"Tuners","props"=>array(1797,1800,1804)),
                                  array("name"=>"Picture settings","props"=>array(1939,1940,1941,1942,1943,1945,1807)),
                                  array("name"=>"Recorder","props"=>array(1842,1848,1849,1855)),
                                  array("name"=>"Power consumption","props"=>array(1835,1838,2040,1991,1992)),)),
                            "laptops"=>array("groups"=>array(array("name"=>"Basic","props"=>array(144,145,146,147,14)),
                                  array("name"=>"Processor","props"=>array(6,7,8)),
                                  array("name"=>"Memory","props"=>array(11,13)),
                                  array("name"=>"DVD","props"=>array(27,28)),
                                  array("name"=>"HardDisk","props"=>array(20,21,23)),
                                  array("name"=>"Graphics Adaptor","props"=>array(36,37,40,41,42)),
                                  array("name"=>"Connectors","props"=>array(47,48,54,56,57,58,71,72)),
                                  array("name"=>"Sound","props"=>array(77,79,81)),
                                  array("name"=>"Screen","props"=>array(88,89,90,91)),
                                  array("name"=>"Webcam","props"=>array(113,114)),
                                  array("name"=>"Security","props"=>array(136,137)),)),
                            "tablets"=>array("groups"=>array(array("name"=>"Dimensions","props"=>array(389,390,391,392,653,698,446,683)),
                                  array("name"=>"Operating system & processor","props"=>array(393,381,427,428,429,430,431,726)),
                                  array("name"=>"Operating system & processor","props"=>array(438,439,440,441,442,443,448)),
                                  array("name"=>"Camera","props"=>array(449,450,451,452,453,455,694)),
                                  array("name"=>"Security","props"=>array(459,460,461,462)),
                                  array("name"=>"Connections","props"=>array(399,400,401,402,404,406,407,408,411,412,413,414,416,420,422,424,425,665,680,705,473)),
                                  array("name"=>"Performances battery","props"=>array(572,573,575,577)),
                                  array("name"=>"Robustness","props"=>array(723,724)) )),
						    "milkpowder"=>array("groups"=>array(array("name"=>"Test Samples","props"=>array(3,4,5,6,7,8,9,10,11,14,16,17,18,20,21)),
                                  array("name"=>"Protein","props"=>array(22,23,24)),
                                  array("name"=>"Fat","props"=>array(25,26,27,28,31,33,34,35,36,37,46,393)),
                                  array("name"=>"Sugar","props"=>array(79,82,84,86)),
                                  array("name"=>"Minerals","props"=>array(91,95,97)),
                                  array("name"=>"Non-protein Nitrogen","props"=>array(98,99)),
                                  array("name"=>"Microbiology","props"=>array(101,369)),
                                  array("name"=>"Dioxins","props"=>array(102,121)),
								  array("name"=>"Dioxin-like PCB","props"=>array(139)),
								  array("name"=>"Non-dioxin-like PCB","props"=>array(149)),
								  array("name"=>"Heavy Metal","props"=>array(150,151,152,153,154,155)),
								  array("name"=>"Aflatoxin","props"=>array(156)),
								  array("name"=>"Pesticides","props"=>array(158)),
								  array("name"=>"Nitrite and Nitrate","props"=>array(162)),
								  array("name"=>"Polycyclic Aromatic Hydrocarbons","props"=>array(169)),
								  array("name"=>"Deviation from Declaration","props"=>array(241,242,243,244,245,246,247,248,249)),
								  array("name"=>"Check Statements","props"=>array(297,298,305,313,314,315,378,379,383))
								  ))


);
}

/*获取指定id产品的属性以及分组*/
function getProperty($id,&$res,$lang){
  $results=array();
    $rules = getRules();
    $project = $_SESSION['project'];
    if(!$rules[$project]) {
        if ($lang == 'en_us') {
            $sql = "select id_propertygroup,name from propertygroups";
            $groups = $GLOBALS['db']->getAll($sql);
            $sql = "select id_propertygroup,name,type,unit,id_property from propertys where selected=1";
            $props = $GLOBALS['db']->getAll($sql);
        } else {
            $sql = "select id_propertygroup,CHN as name from (select * from propertygroups p) p left join sdictionary t on p.id_propertygroup=t.wordid and flag=3 ;";

            $groups = $GLOBALS['db']->getAll($sql);
            $sql = "select id_propertygroup,sdictionary.CHN as name,type,unit,id_property from propertys,sdictionary where flag=0 and id_property=wordid  and selected=1";
            $props = $GLOBALS['db']->getAll($sql);
        }
        $props = getPropsValues($props,$id);
        foreach($groups as $k=>$g){
            //先跳过优缺点的查找
            if($g['name']=="Pros"||$g['name']=="优点"||$g['name']=="Cons"||$g['name']=="缺点")
                continue;



            $temp='';
            foreach($props as $p){
                if($p['id_propertygroup']==$g['id_propertygroup']){
                    $temp[]=$p;
                }
            }
            $groups[$k]['id_propertygroup']=$temp;
            if(!empty($temp)){
                $results[]=$groups[$k];
            }
        }
    }else{
        $groups = $rules[$project]['groups'];
        foreach($groups as $k=>$g){
            $sql = "select name,type,unit,id_property from propertys where id_property in(";
            foreach($g['props'] as $v){
                $sql .= $v.",";
            }
            $sql = substr($sql,0,-1);
            $sql .= ")";
           // echo $sql;
            $props = $GLOBALS['db']->getAll($sql);
            $props = getPropsValues($props,$id);
            $g['id_propertygroup'] = $props;
            unset($g['props']);
            $groups[$k] = $g;
        }
        $results = $groups;
    }

    //Pros 和Cons优先从proerpty筛选
    $sql = "select id_propertygroup from propertygroups where `name` = 'Pros'";
    //echo $sql;
    $prosGroupId = $GLOBALS['db']->getOne($sql);
    $sql = "select id_propertygroup from propertygroups where `name` = 'Cons'";
    $consGroupId = $GLOBALS['db']->getOne($sql);
    //print_r($prosGroupId);
    $pros=array();
    if(!empty($prosGroupId)){
        $sql = "select id_propertygroup,name,type,unit,id_property from propertys where selected=1 and id_propertygroup =".$prosGroupId;
        //print_r($sql);
        $props = $GLOBALS['db']->getAll($sql);////取出所有的Pros
        $props = getPropsValues($props,$id);
        foreach($props as $p){
            if($p['value']=="Yes"||$p['value']=="yes"){
                $pros[]=$p['name'];
            }
        }
    }
    $cons=array();
    if(!empty($consGroupId)){
        $sql = "select id_propertygroup,name,type,unit,id_property from propertys where selected=1 and id_propertygroup =".$consGroupId;
        // print_r($sql);
        $props = $GLOBALS['db']->getAll($sql);////取出所有的Cons
        $props = getPropsValues($props,$id);
        foreach($props as $p){
            if($p['value']=="Yes"||$p['value']=="yes"){
                $cons[]=$p['name'];
            }
        }
    }
   // print_r($pros);
   // print_r($cons);

    if(empty($pros)){/*************************处理groups中没有Pros的情况*/
        $pros=array();
        $sql="select value  from results where id_product=$id and id_evaluation=(select id_evaluation from evaluations where name='Pros')";
        $stringPros=trim($GLOBALS['db']->getOne($sql));
        if(!empty($stringPros)) {
            $pros = preg_split("/[,;]/", $stringPros);//explode(",",$p['value']);
            //
            if(empty($pros[count($pros)-1]))
                unset($pros[count($pros)-1]);
        }
        $res['Pros']=$pros;
    }else{
        $res['Pros']=$pros;
    }
    if(empty($cons)){/*************************处理groups中没有Cons的情况*/

        $cons=array();
        $sql="select value  from results where id_product=$id and id_evaluation=(select id_evaluation from evaluations where name='Cons')";
       // echo $sql;
       $stringCons=trim($GLOBALS['db']->getOne($sql));
        if(!empty($stringCons)){
            $cons=preg_split("/[,;]/", $stringCons);//explode(",",$p['value']);
            if(empty($cons[count($cons)-1]))
                unset($cons[count($cons)-1]);
        }

        //print_r($cons);
        $res['Cons']=$cons;
    }else{
        $res['Cons']=$cons;
    }
/*
    if($_SESSION['project']=='mobilephones'){
        foreach($results[1]['id_propertygroup'] as $type){
            $results[0]['id_propertygroup'][]=$type;
        }
        foreach($results[2]['id_propertygroup'] as $type){
            $results[0]['id_propertygroup'][]=$type;
        }
        array_splice($results,1,2);
    }
*/

   // print_r($groups);
    return $results;
}

/*搜索商品*/
function searchProducts($str){
    $sql="select id_product from products where completename like '%$str%'";
    //echo $sql;
   $results=$GLOBALS['db']->getAllValues($sql);
    return $results;
}

/*根据标签筛选商品*/
//labels:[{'type':string,'name':'Brand (from brandlist)',value:['xx','yy']},....]
//labels:[{'type':'range','name':'A - Sample',value:[{'>=':3,'<=':5},{'<':3}]}]
function filterProducts($lab){
    $results=$tempResult=array();
    $index=0;
   // print_r($lab);
        foreach($lab as $v){
            $tempResult=array();
            if($v['type']=='range'){
                $evalId=getEvaluationId($v['name']);
                $tempIndexRange=0;
                if(is_array($v['value'])){
                    $sql="select id_product from results where id_evaluation=".$evalId." and(";
                    foreach($v['value'] as $key=>$value){
                        $opts=array_keys($value);
                        $len=count($opts);
                       if($len==1){
                           if($tempIndexRange==0){
                               if($v['name']=='total test result')
                                   $sql.="(format(6-value,1)".$opts[0].$value[$opts[0]].")";
                               else{
								   if(is_numeric($value[$opts[0]]))
									   $sql.="value".$opts[0].$value[$opts[0]];
								   else
									   $sql.="value".$opts[0]."'".$value[$opts[0]]."'";
							   }

                           }

                           else{
                               if($v['name']=='total test result')
                                   $sql.=" or(format(6-value,1)".$opts[0].$value[$opts[0]].")";
                               else
                                   $sql.=" or value".$opts[0].$value[$opts[0]];
                           }
                       }else if($len==2){
                           if($tempIndexRange==0){
                               if($v['name']=='total test result')
                                   $sql.="(format(6-value,1)".$opts[0].$value[$opts[0]]." and format(6-value,1)".$opts[1].$value[$opts[1]].")";
                               else
                                   $sql.="(value".$opts[0].$value[$opts[0]]." and value".$opts[1].$value[$opts[1]].")";
                           }

                           else{
                               if($v['name']=='total test result')
                                   $sql.=" or(format(6-value,1)".$opts[0].$value[$opts[0]]." and format(6-value,1)".$opts[1].$value[$opts[1]].")";
                               else
                                   $sql.=" or(value".$opts[0].$value[$opts[0]]." and value".$opts[1].$value[$opts[1]].")";
                           }

                       }
                        $tempIndexRange++;
                    }
                    $sql.=")and value REGEXP '^[0-9]+[.0-9]*$'";
                   // echo $sql;
                    $tempResult=$GLOBALS['db']->getAllValues($sql);
                }
            }else if($v['type']=='string'){

               if($v['name']!='Brand')
                     $evalId=getEvaluationId($v['name']);
                $tempStringIndex=0;
                if(is_array($v['value'])){
                    if($v['name']=='Brand'){
                        $sql="select id_product from products where id_manufacturer in(select id_manufacturer from manufacturers where ";
                    }
                   else
                       $sql="select id_product from results where id_evaluation=".$evalId." and(";
                    foreach($v['value'] as $key=>$value){
                       //echo $tempValue."==".$value."  ";
                       if($tempStringIndex==0){
                           if($v['name']=='Brand')
                               $sql.="`name`='".$value."' ";
                           else
                               $sql.="value like'%".$value."%' ";
                       }

                        else{
                            if($v['name']=='Brand')
                                $sql.="or `name`='".$value."' ";
                            else
                                $sql.="or value like'%".$value."%' ";
                        }

                        $tempStringIndex++;
                    }
                    $sql.=")";
                   // echo $sql;
                    $tempResult=$GLOBALS['db']->getAllValues($sql);
                }

            }else if($v['type']=='date'){
                $tempStringIndex=0;
                if(is_array($v['value'])){
                    $sql="select id_product from products where ";
                    foreach($v['value'] as $key=>$value){
                        //echo $tempValue."==".$value."  ";
                        if($tempStringIndex==0)
                            $sql.="FROM_UNIXTIME(timestamp_created, '%Y' )='".$value."' ";
                        else
                            $sql.="or FROM_UNIXTIME(timestamp_created, '%Y' )='".$value."' ";
                        $tempStringIndex++;
                    }
                    //echo $sql;
                    $tempResult=$GLOBALS['db']->getAllValues($sql);
                }
            }else if($v['type']=='multi'){
                foreach($v['value'] as $key=>$value){
                    $evalId=getEvaluationId($value);
                    if(is_array($v['value'])){
                        $sql="select id_product from results where id_evaluation=".$evalId." and value>=1";

                        $res=$GLOBALS['db']->getAllValues($sql);
                        $tempResult=array_merge($tempResult,$res);
                    }
                }
            }
			//print_r($tempResult);
            if($index==0)
                $results=$tempResult;
            else
                $results=array_intersect($results,$tempResult);
			//echo $index;
			//print_r($results);
            $index++;
        }
    return $results;
}

/*通过名字获取evaluation的id*/
function getEvaluationId($name){
    if($name=='total test result')
        $sql="select id_evaluation from evaluations where name='".$name."'";
    else
        $sql="select id_evaluation from evaluations where id_evaluation>99999999 and name='".$name."'";
   return $GLOBALS['db']->getOne($sql);
}
function judge($opt,$data,$value){
    //echo $data.$opt.$value;
    $ret=0;
    switch($opt){
        case '>=':if($data>=$value) $ret=1;break;
        case '>':if($data>$value)   $ret=1;break;
        case '=':if($data==$value)  $ret=1;break;
        case '<=':if($data<=$value) $ret=1;break;
        case '<':if($data<$value)  $ret=1;break;
        default:break;
    }
    //echo " ".$ret."\n";
    if($ret==1)
        return true;
    return false;
}

/*生成项目名目录与链接的映射*/
function getDirectoryWithLink($project){
    $lang=$_SESSION['lang'];
    $directoryArray=array();
    if($lang=='en_us'){//up表示上一级目录，upper表示上上级目录
        $directoryArray=array('mobilephones'=>array('up'=>array('name'=>'Smartphones','link'=>'products.php?proj=mobilephones'),'upper'=>array('name'=>'Electronics','link'=>'index.php')),
                                        'milk'=>array('up'=>array('name'=>'Milk','link'=>'products.php?proj=milk'),'upper'=>array('name'=>'Food','link'=>'index.php')),
                                  'milkpowder'=>array('up'=>array('name'=>'Formula Milk Powder','link'=>'products.php?proj=milkpowder'),'upper'=>array('name'=>'Food','link'=>'index.php')),
                                        'tablets'=>array('up'=>array('name'=>'Tablets','link'=>'products.php?proj=tablets'),'upper'=>array('name'=>'Electronics','link'=>'index.php')),
                                         'tvs'=>array('up'=>array('name'=>'Televisions','link'=>'products.php?proj=tvs'),'upper'=>array('name'=>'Electronics','link'=>'index.php')),
            'laptops'=>array('up'=>array('name'=>'Laptops','link'=>'products.php?proj=laptops'),'upper'=>array('name'=>'Electronics','link'=>'index.php')),
            'smartwatches'=>array('up'=>array('name'=>'Smart watches','link'=>'products.php?proj=smartwatches'),'upper'=>array('name'=>'Electronics','link'=>'index.php')),
                                'whheadphones'=>array('up'=>array('name'=>'Headphones','link'=>'products.php?proj=whheadphones'),'upper'=>array('name'=>'Electronics','link'=>'index.php')),
                                'fitnessbands'=>array('up'=>array('name'=>'Fitness Trackers','link'=>'products.php?proj=fitnessbands'),'upper'=>array('name'=>'Electronics','link'=>'index.php')),
                                     'lenses'=>array('up'=>array('name'=>'Lenses','link'=>'products.php?proj=lenses'),'upper'=>array('name'=>'Cameras','link'=>'index.php')),
                              'basiccameras'=>array('up'=>array('name'=>'Cameras','link'=>'products.php?proj=basiccameras'),'upper'=>array('name'=>'Electronics','link'=>'index.php')),
                            'highendcameras'=>array('up'=>array('name'=>'High-END Cameras','link'=>'products.php?proj=highendcameras'),'upper'=>array('name'=>'Cameras','link'=>'index.php')),
                         'actioncamcorders'=>array('up'=>array('name'=>'Action Camcorders','link'=>'products.php?proj=actioncamcorders'),'upper'=>array('name'=>'Electronics','link'=>'index.php')));
    }else{
        $directoryArray=array('mobilephones'=>array('up'=>array('name'=>'智能手机','link'=>'products.php?proj=mobilephones'),'upper'=>array('name'=>'电子产品','link'=>'index.php')),
                                        'milk'=>array('up'=>array('name'=>'牛奶','link'=>'products.php?proj=milk'),'upper'=>array('name'=>'食品','link'=>'index.php')),
                                 'milkpowder'=>array('up'=>array('name'=>'婴幼儿奶粉','link'=>'products.php?proj=milkpowder'),'upper'=>array('name'=>'食品','link'=>'index.php')),
                                    'tablets'=>array('up'=>array('name'=>'平板电脑','link'=>'products.php?proj=tablets'),'upper'=>array('name'=>'电子产品','link'=>'index.php')),
                                         'tvs'=>array('up'=>array('name'=>'电视','link'=>'products.php?proj=tvs'),'upper'=>array('name'=>'电子产品','link'=>'index.php')),
            'laptops'=>array('up'=>array('name'=>'笔记本电脑','link'=>'products.php?proj=laptops'),'upper'=>array('name'=>'电子产品','link'=>'index.php')),
            'smartwatches'=>array('up'=>array('name'=>'智能手表','link'=>'products.php?proj=smartwatches'),'upper'=>array('name'=>'电子产品','link'=>'index.php')),
                                'whheadphones'=>array('up'=>array('name'=>'耳机','link'=>'products.php?proj=whheadphones'),'upper'=>array('name'=>'电子产品','link'=>'index.php')),
                                 'fitnessbands'=>array('up'=>array('name'=>'智能手环','link'=>'products.php?proj=fitnessbands'),'upper'=>array('name'=>'电子产品','link'=>'index.php')),
                                     'lenses'=>array('up'=>array('name'=>'镜头','link'=>'products.php?proj=lenses'),'upper'=>array('name'=>'电子产品','link'=>'index.php')),
                             'basiccameras'=>array('up'=>array('name'=>'数码相机','link'=>'products.php?proj=basiccameras'),'upper'=>array('name'=>'Cameras','link'=>'index.php')),
                            'highendcameras'=>array('up'=>array('name'=>'高端相机','link'=>'products.php?proj=highendcameras'),'upper'=>array('name'=>'Cameras','link'=>'index.php')),
                         'actioncamcorders'=>array('up'=>array('name'=>'运动摄录机','link'=>'products.php?proj=actioncamcorders'),'upper'=>array('name'=>'Electronics','link'=>'index.php')));
    }
    return $directoryArray[$project];
}
