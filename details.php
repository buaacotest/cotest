<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/1/23
 * Time: 22:11
 */
/*test for LSJ's functions*/
require ('./includes/init.php');
$dbnumber=$db->getDBnumber();
echo $dbnumber;
$dbnames=$db->getAllDBnames();
print_r($dbnames);
$db->changeDB("microwave");
$dbsename=$db->getNowDB();
echo $dbsename;

/*test some lib_function by lsj*/
require ('./includes/lib_products.php');
$evaluations=getEvalutionsByOneID(1074);
print_r($evaluations);