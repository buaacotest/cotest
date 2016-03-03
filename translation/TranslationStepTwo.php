<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/2/19
 * Time: 10:25
 */
$project_name=trim($_GET['proj']);
echo $project_name;
require('../includes/lib_common.php');
require('../sql/mysql_cls.php');
require('../includes/lib_translation.php');
$db=new mysql_cls();
$db->connect();
$serverAddress=$serverUsername=$serverPassword=$selectDBname=NULL;
$db->changeDB($project_name);
/*TODO:get the evaluation trees*/
$evaluationtree=GetEvaluationTree();
print_r($evaluationtree);