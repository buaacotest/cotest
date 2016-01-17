<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/1/17
 * Time: 13:51
 */

require ('./lib.php');

require ('./sql/mysql_cls.php');
include 'config.php';
$db=new mysql_cls();
$db->connect();
$sql=" SELECT * FROM calculationtypes";
$result=$db->excusql($sql);
while($row=mysql_fetch_array($result)){
    $arry[]=$row;
}
$smarty->assign('arr',$arry);
$smarty->display('testmysql.html');


?>