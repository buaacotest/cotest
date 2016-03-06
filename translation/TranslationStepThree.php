<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/3/6
 * Time: 9:31
 */
$result = "";
$evaluations=$_POST['evaluations'];
if(empty($evaluations))
    echo "error,nobody selected";
else {
    foreach( $evaluations as $i)
    {
        echo $i;
        echo "\n";
    }
}

