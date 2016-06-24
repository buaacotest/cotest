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
    $sql="select modelname as product_name,`name`as product_manufacturer, timestamp_created as product_tested_date, id_product as product_id
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
    return $res;
}
/*挑选指定ID的产品*/
function getProductByIds($ids,$order='time'){
    $sql = "select modelname as product_name,`name`as product_manufacturer,timestamp_created as product_tested_date, id_product as product_id
                from products as A,manufacturers as B
                where A.id_manufacturer=B.id_manufacturer and id_product in(" ;
  
	foreach($ids as $id){
		$sql.=$id. ",";
	}
	$sql=substr($sql,0,-1);
	$sql.=")";
    $res=$GLOBALS['db']->getAll($sql);
    foreach($res as $k=>$v){
        //$res[$k]['product_name']=shortName($v['product_name']);
        $res[$k]['product_tested_date']=convertTime($v['product_tested_date']);
        $res[$k]['score']=getTotalScore($v['product_id']);
    }
    $res=multiSort($res,$order);
    return $res;
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
    foreach ($arr as $key=>$value){
        $time[$key] = $value[2];
        $score[$key] = $value['score'];
    }
    if($order=='score')
        array_multisort($score,SORT_NUMERIC,SORT_ASC,$arr);
    else
        array_multisort($time,SORT_NUMERIC,SORT_DESC,$arr);
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
    $score=$GLOBALS['db']->getOne($sql);
    $score=number_format(6-$score, 1, '.', '');
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
   // print_r($res);
    return $res;
}
/*求某个产品的评分树*/
function getGradeTree($id,$tar,$lang){
    if($lang=='en_us'){
        $sql="select A.id_evaluation,name,id_parent,weighting_normalized as weight, value
       from evaluations as A,results as B
      where A.id_evaluation=B.id_evaluation and selected=1 and weighting_normalized!=0
       and B.id_product=$id";
    }
    else{
        $sql="select A.id_evaluation,C.CHN as name,id_parent,weighting_normalized as weight,value
       from evaluations as A,results as B,sdictionary as C
      where A.id_evaluation=B.id_evaluation and selected=1 and weighting_normalized!=0
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

/*获取指定id产品的属性以及分组*/
function getProperty($id,&$res,$lang){
  $results=array();
    if($lang=='en_us'){
        $sql="select id_propertygroup,name from propertygroups";
        $groups=$GLOBALS['db']->getAll($sql);
        $sql="select id_propertygroup,name,type,unit,binding from propertys where selected=1";
        $props=$GLOBALS['db']->getAll($sql);
    }else{
         $sql="select id_propertygroup,CHN as name from (select * from propertygroups p) p left join sdictionary t on p.id_propertygroup=t.wordid and flag=3 ;";

        $groups=$GLOBALS['db']->getAll($sql);
        $sql="select id_propertygroup,sdictionary.CHN as name,type,unit,binding from propertys,sdictionary where flag=0 and id_property=wordid  and selected=1";
        $props=$GLOBALS['db']->getAll($sql);
    }

    foreach($props as $k=>$v){
        //echo $v['name'];
        $sql="select value from results where id_product=$id  and id_evaluation>99999999
              and id_evaluation=(
              select id_evaluation FROM evaluations WHERE binding='".$v['binding']."' and id_evaluation>99999999)";


       //echo $sql."\n";
        $value=$GLOBALS['db']->getOne($sql);
        $value= htmlspecialchars($value,ENT_QUOTES);
        switch($v['type']){
            case 'String':$v['value']=$value;break;
            case 'Score':if(is_numeric($value))
                $v['value']=round($value,2);
            else
                $v['value']=$value;
                break;
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
        if($value==''){   /*||$value=='ny'||$value=='ns'||$value=='nt'||$value=='nf'*/

            $v['value']='-';
            $v['unit']='';


        }
        $props[$k]=$v;

    }
    foreach($groups as $k=>$g){
        if($g['name']=="Pros"||$g['name']=="优点"){
            $pros=array();
            foreach($props as $p){
                if($p['id_propertygroup']==$g['id_propertygroup']){

                    if($p['value']=="Yes"||$p['value']=="yes"){
                        $pros[]=$p['name'];
                    }
                }

                }

                $res['Pros']=$pros;
            continue;
        } else if($g['name']=="Cons"||$g['name']=="缺点") {

            $cons=array();
            foreach($props as $p){
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
    }

    if($_SESSION['project']=='mobilephones'){
        foreach($results[1]['id_propertygroup'] as $type){
            $results[0]['id_propertygroup'][]=$type;
        }
        foreach($results[2]['id_propertygroup'] as $type){
            $results[0]['id_propertygroup'][]=$type;
        }
        array_splice($results,1,2);
    }
    return $results;
}

/*搜索商品*/
function searchProducts($str){
    echo $str;
    $sql="select id_product from products where completename like '%$str%'";
    echo $sql;
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
                               else
                                   $sql.="value".$opts[0].$value[$opts[0]].")";
                           }

                           else{
                               if($v['name']=='total test result')
                                   $sql.="or(format(6-value,1)".$opts[0].$value[$opts[0]].")";
                               else
                                   $sql.="or value".$opts[0].$value[$opts[0]].")";
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
                                   $sql.="or(format(6-value,1)".$opts[0].$value[$opts[0]]." and format(6-value,1)".$opts[1].$value[$opts[1]].")";
                               else
                                   $sql.="or(value".$opts[0].$value[$opts[0]]." and value".$opts[1].$value[$opts[1]].")";
                           }

                       }
                        $tempIndexRange++;
                    }
                    $sql.=")";
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
                               $sql.="value='".$value."' ";
                       }

                        else{
                            if($v['name']=='Brand')
                                $sql.="or `name`='".$value."' ";
                            else
                                $sql.="or value='".$value."' ";
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
                                'whheadphones'=>array('up'=>array('name'=>'耳机','link'=>'products.php?proj=whheadphones'),'upper'=>array('name'=>'电子产品','link'=>'index.php')),
                                 'fitnessbands'=>array('up'=>array('name'=>'智能手环','link'=>'products.php?proj=fitnessbands'),'upper'=>array('name'=>'电子产品','link'=>'index.php')),
                                     'lenses'=>array('up'=>array('name'=>'镜头','link'=>'products.php?proj=lenses'),'upper'=>array('name'=>'电子产品','link'=>'index.php')),
                             'basiccameras'=>array('up'=>array('name'=>'数码相机','link'=>'products.php?proj=basiccameras'),'upper'=>array('name'=>'Cameras','link'=>'index.php')),
                            'highendcameras'=>array('up'=>array('name'=>'高端相机','link'=>'products.php?proj=highendcameras'),'upper'=>array('name'=>'Cameras','link'=>'index.php')),
                         'actioncamcorders'=>array('up'=>array('name'=>'运动摄录机','link'=>'products.php?proj=actioncamcorders'),'upper'=>array('name'=>'Electronics','link'=>'index.php')));
    }
    return $directoryArray[$project];
}

