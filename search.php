<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/6/20
 * Time: 11:51
 */
require('./includes/init.php');
$dbName=$_SESSION['project'];
$keyWords=trim($_POST["keyword"]);
$sql="select completename from $dbName.products where completename like '$keyWords%'";
$relativeNames=$db->getAllValues($sql);
sort($relativeNames);
echo json_encode($relativeNames);

/*
function getRelativeNames($words){

}
*/