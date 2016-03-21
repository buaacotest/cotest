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
    $sql="select modelname as product_name,`name`as product_manufacturer, batch as product_tested_date, id_product as product_id
                from products as A,manufacturers as B
                where A.id_manufacturer=B.id_manufacturer";
    $res=$GLOBALS['db']->getAll($sql);
    foreach($res as $k=>$v){
        $res[$k]['product_tested_date']=convertTime($v['product_tested_date']);
        $res[$k]['score']=getTotalScore($v['product_id']);
    }
    $res=multiSort($res,$order);
    return $res;
}
/*挑选指定ID的产品*/
function getProductByIds($ids,$order='time'){
    $sql = "select modelname as product_name,`name`as product_manufacturer, batch as product_tested_date, id_product as product_id
                from products as A,manufacturers as B
                where A.id_manufacturer=B.id_manufacturer and id_product in(" ;
  
	foreach($ids as $id){
		$sql.=$id. ",";
	}
	$sql=substr($sql,0,-1);
	$sql.=")";
    $res=$GLOBALS['db']->getAll($sql);
    foreach($res as $k=>$v){
        $res[$k]['product_tested_date']=convertTime($v['product_tested_date']);
        $res[$k]['score']=getTotalScore($v['product_id']);
    }
    $res=multiSort($res,$order);
    return $res;
}
/*排序*/
function multiSort($arr,$order){
    foreach ($arr as $key=>$value){
        $time[$key] = $value[2];
        $score[$key] = $value['score'];
    }
    if($order=='score')
        array_multisort($score,SORT_NUMERIC,SORT_DESC,$arr);
    else
        array_multisort($time,SORT_NUMERIC,SORT_DESC,$arr);
    return $arr;
}

/*日期转换1512-->Dec 2015*/
function convertTime($time){
    $timeArray=array("01"=>"Jan","02"=>"Feb","03"=>"Mar","04"=>"Apr","05"=>"May","06"=>"Jun","07"=>"Jul","08"=>"Aug","09"=>"Sep",
              "10"=>"Oct","11"=>"Nov","12"=>"Dec");
    $year="20".substr($time,0,2);
    $mon=$timeArray[substr($time,2,2)];
    return $mon." ".$year;
}

/*获取某个product的总评分*/
function getTotalScore($id){
    $sql="select format(value,2) from results where id_product=$id and id_evaluation=
          (select id_evaluation from evaluations where name='total test result')";
    $score=$GLOBALS['db']->getOne($sql);
    return $score;
}

/*根据product的id获取基本信息、测试得分以及属性*/
function getDetails($id){
    $sql="select completename as name,`name`as manufacturer
                from products as A,manufacturers as B
                where A.id_manufacturer=B.id_manufacturer and A.id_product=$id";
    $res=$GLOBALS['db']->getOneRow($sql);
    $res['evaluations']=getGradeTree($id);
    $res['property']=getProperty($id,$res);
    return $res;
}
/*求某个产品的评分树*/
function getGradeTree($id){
    $sql="select A.id_evaluation,name,id_parent,weighting_normalized as weight,format(value,2) as value
       from evaluations as A,results as B
      where A.id_evaluation=B.id_evaluation and B.value!='na'
      and B.id_product=$id";
    $data=$GLOBALS['db']->getAll($sql);
    $gradeTree=getTree($data,0);
    return $gradeTree;
}
/*构建评分的树结构*/
function getTree($data, $pId)
{
    $tree = '';
    foreach($data as $v)
    {
        if($v['id_parent'] == $pId)
        {
            $v['id_parent'] = getTree($data, $v['id_evaluation']);
            $tree[] = $v;
        }
    }
    return $tree;
}

/*获取指定id产品的属性以及分组*/
function getProperty($id,&$res){

    $sql="select id_propertygroup,name from propertygroups";
    $groups=$GLOBALS['db']->getAll($sql);
    $sql="select id_propertygroup,name,type,unit from propertys where selected=1";
    $props=$GLOBALS['db']->getAll($sql);
    foreach($props as $k=>$v){
        //echo $v['name'];
        $sql="select value from results where id_product=$id  and id_evaluation>99999999
              and id_evaluation=(
              select id_evaluation FROM evaluations WHERE name='".$v['name']."' and id_evaluation>99999999)";


       //echo $sql."\n";
        $value=$GLOBALS['db']->getOne($sql);
        /*if($value==""){
           unset($props[$k]);
           continue;
        }*/
        switch($v['type']){
            case 'String':$v['value']=$value;break;
            case 'Numeric':if(is_numeric($value))
                $v['value']=round($value,2);
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
        $props[$k]=$v;
    }
    foreach($groups as $k=>$g){
        if($g['name']=="Pros"){
            $pros=array();
            foreach($props as $p){/*将优点连成字符串*/
                if($p['id_propertygroup']==$g['id_propertygroup']){

                    if($p['value']=="Yes"||$p['value']=="yes"){
                        $pros[]=$p['name'];
                    }
                }

                }
               
                $res['Pros']=$pros;
            continue;
        } else if($g['name']=="Cons") {
            $string="";
            $cons=array();
            foreach($props as $p){/*将缺点连成字符串*/
                if($p['id_propertygroup']==$g['id_propertygroup']){

                    if($p['value']=="Yes"||$p['value']=="yes"){
                        $cons[]=$p['name'];
                    }
                }
            }
           // $string=substr($string, 0, -1);
            $res['Cons']=$cons;
            continue;
        }
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
    foreach($results[1]['id_propertygroup'] as $type){
        $results[0]['id_propertygroup'][]=$type;
    }
    foreach($results[2]['id_propertygroup'] as $type){
        $results[0]['id_propertygroup'][]=$type;
    }
    array_splice($results,1,2);
    return $results;
}
/*根据标签筛选商品*/
//labels:[{'type':string,'name':'Brand (from brandlist)',value:['xx','yy']},....]
//labels:[{'type':'range','name':'A - Sample',value:[{'>=':3,'<=':5},{'<':3}]}]
function filterProducts($lab){
    $results=$tempResult=array();
    $index=0;
    //print_r($lab);
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
                           if($tempIndexRange==0)
                              $sql.="(value".$opts[0].$value[$opts[0]].")";
                           else
                               $sql.="or(value".$opts[0].$value[$opts[0]].")";
                       }else if($len==2){
                           if($tempIndexRange==0)
                               $sql.="(value".$opts[0].$value[$opts[0]]." and value".$opts[1].$value[$opts[1]].")";
                           else
                               $sql.="or(value".$opts[0].$value[$opts[0]]." and value".$opts[1].$value[$opts[1]].")";
                       }
                        $tempIndexRange++;
                    }
                    $sql.=")";
                    //echo $sql;
                    $tempResult=$GLOBALS['db']->getAllValues($sql);
                }
            }else if($v['type']=='string'){
                $evalId=getEvaluationId($v['name']);
                $tempStringIndex=0;
                if(is_array($v['value'])){
                    $sql="select id_product from results where id_evaluation=".$evalId." and(";
                    foreach($v['value'] as $key=>$value){
                       //echo $tempValue."==".$value."  ";
                       if($tempStringIndex==0)
                           $sql.="value='".$value."' ";
                        else
                            $sql.="or value='".$value."' ";
                        $tempStringIndex++;
                    }
                    $sql.=")";
                    //echo $sql;
                    $tempResult=$GLOBALS['db']->getAllValues($sql);
                }

            }else if($v['type']=='date'){
                $tempStringIndex=0;
                if(is_array($v['value'])){
                    $sql="select id_product from products where ";
                    foreach($v['value'] as $key=>$value){
                        //echo $tempValue."==".$value."  ";
                        if($tempStringIndex==0)
                            $sql.="batch like'".$value."%' ";
                        else
                            $sql.="or batch like'".$value."%' ";
                        $tempStringIndex++;
                    }
                    //echo $sql;
                    $tempResult=$GLOBALS['db']->getAllValues($sql);
                }
            }else if($v['type']=='multi'){
                foreach($v['value'] as $key=>$value){
                    $evalId=getEvaluationId($value);
                    if(is_array($v['value'])){
                        $sql="select id_product from results where id_evaluation=".$evalId." and value=1";

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