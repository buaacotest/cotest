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
function getAllProducts($pname){
    $GLOBALS['db']->changeDB($pname);
    $sql="select completename as product_name,`name`as product_manufacturer, FROM_UNIXTIME(timestamp_created,'%Y-%m-%d')as product_tested_date, id_product as product_id
                from products as A,manufacturers as B
                where A.id_manufacturer=B.id_manufacturer
                order by A.timestamp_created desc";

    $res=$GLOBALS['db']->getAll($sql);
    foreach($res as $k=>$v){
        $res[$k]['score']=getTotalScore($v['product_id']);
    }
    return $res;
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
    $sql="select completename as name,`name`as manufacturer, FROM_UNIXTIME(timestamp_created,'%Y-%m-%d')as tested_date
                from products as A,manufacturers as B
                where A.id_manufacturer=B.id_manufacturer and A.id_product=$id";
    $res=$GLOBALS['db']->getOneRow($sql);
    $res['evaluations']=getGradeTree($id);
    $res['property']=getProperty($id);
    return $res;
}
/*求某个产品的评分树*/
function getGradeTree($id){
    $sql="select A.id_evaluation,name,id_parent,format(value,2) as value
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
function getProperty($id){
    $sql="select id_propertygroup,name from propertygroups";
    $groups=$GLOBALS['db']->getAll($sql);
    $sql="select id_propertygroup,name,type,unit from propertys where selected=1";
    $props=$GLOBALS['db']->getAll($sql);
    foreach($props as $k=>$v){
        //echo $v['name'];
        $sql="select value from results where id_product=$id and id_evaluation=
        (select id_evaluation from evaluations where  binding=
       (select binding from propertys where name='".$v['name']."' and selected=1)
       order by id_evaluation asc limit 1)";

        $value=$GLOBALS['db']->getOne($sql);
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
    return $results;
}