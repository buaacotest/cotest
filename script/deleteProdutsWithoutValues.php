<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 2016/6/21
 * Time: 0:31
 */
$proj="basiccameras";
$conn=mysqli_connect("localhost","root","buaascse");
mysqli_select_db($conn,$proj);
$sql="select id_product from results where `value`='ny' and id_evaluation=7061";
$ids=getAllValues($conn,$sql);
foreach($ids as $id){
    $sql="delete from products where id_product=$id";
    mysqli_query($conn,$sql);
    echo "delete product:$id\n";
}

function getAllValues($conn,$sql)
{
    $res =mysqli_query($conn,$sql);
    if ($res !== false)
    {
        $arr = array();
        while ($row =mysqli_fetch_array($res))
        {
            $arr[] = $row[0];
        }

        return $arr;
    }
    else
    {
        return false;
    }
}
