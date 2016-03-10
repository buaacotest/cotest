<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/3/6
 * Time: 9:31
 */
require('../includes/lib_common.php');
require('../sql/mysql_cls.php');
require('../includes/lib_translation.php');
$db=new mysql_cls();
$db->connect();
$serverAddress=$serverUsername=$serverPassword=$selectDBname=NULL;

$evaluations=$_POST['evaluations'];
$projname=trim($_GET['proj']);
//echo $projname;
$db->changeDB($projname);
//echo $projname;
if(empty($evaluations))
    echo "error,nobody selected";
else {
    //print_r($evaluations);
    foreach( $evaluations as $i)
    {
        $id=$i;
        echo $id." ";
        $result=SetEvaluationSelected($id);
        $name=GetEvaluationName($id);
        if($result){
            echo $name."has been selected\n";
        }
        //print_r($result);
    }
}
