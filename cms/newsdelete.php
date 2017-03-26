<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2017/3/21
 * Time: 18:43
 */

require('../includes/init.php');
include_once '../includes/config.php';
require('libnewseditor.php');

$newsid=trim($_GET['newsid']);
$category=trim($_GET['category']);
$result=[];
$return_val=0;
if($newsid==null){
    ////新建一篇文章
}else {
    if($category=='testprogramme'){
        $result=getOneTestprogrammeByID($newsid);
        $return_val=deleteTestprogrammeByID($newsid);
        updateTestprogrammeIDs();
    }else if($category=='testreport'){
        $result=getOneTestreportByID($newsid);
        $return_val=deleteTestreportByID($newsid);
        updateTestreportsIDs();
    }else if($category=='cotestreport'){
        $result=getOneCotestreportByID($newsid);
        $return_val=deleteCotestreportByID($newsid);
        updateCotestreportsIDs();
    }
}
if(!empty($result)){
    echo $result['title']."</br>";
}
if(!$return_val){
    echo "delete failed</br>";
    echo "results:".$result;
}else{
    echo "delete success!</br>";
}