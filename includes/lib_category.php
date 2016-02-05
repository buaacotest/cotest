<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/1/19
 * Time: 15:24
 */
/*统计二级目录中每种产品的个数*/
function getProductsSum(){
    $sql="SELECT name,count(*)as number,B.id_productgroup FROM products as A,productgroups as B where
      A.id_productgroup=B.id_productgroup
      group by name";
    $sum=$GLOBALS['db']->getAll($sql);
    return $sum;
}
/*得到一个当前数据库的测试产品数目*/
/*得到一个当前数据库的测试产品数目*/
function getProductsCount($pname){
    $GLOBALS['db']->changeDB($pname);
    $sql="SELECT count(*) FROM products";
    $results=$GLOBALS['db']->query($sql);
    $countarray=mysql_fetch_array($results);
    $count=$countarray[0];
    return $count;
}