<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/3/29
 * Time: 16:28
 */
require('../sql/mysql_cls.php');
$db=new mysql_cls();
$db->connect();
$database=$_GET['project'];
$opt=$_GET['option'];
if($opt=="property")
    $dicflag=0;
if($opt=="evaluation")
    $dicflag=1;
if($opt=="manufacturer")
    $dicflag=2;
$db->changeDB($database);
$sql="select wordid from sdictionary where flag=".$dicflag;
$res=$db->getAllValues($sql);
$data=json_encode($res);
echo $data;