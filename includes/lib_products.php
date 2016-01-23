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
       echo "ERROR:ID不能为空";
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

/*get one product's all results by its id*/
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