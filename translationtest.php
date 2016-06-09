<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/2/19
 * Time: 10:26
 */
require( './sql/mysql_cls.php');
$db=new mysql_cls();
$db->connect();
$serverAddress=$serverUsername=$serverPassword=$selectDBname=NULL;
require('includes/config.php');
//require('includes/lib_translation.php');
require ('translation/lib.php');
$db->changeDB("mobilephones");

//$evaluationtree=GetEvaluationTree();
//$smarty->assign('evals',$evaluationtree[0]);
$transarr=array('CHN'=>"哈哈哈",'Eng'=>"null",'De'=>"null");
//$resutl1=SaveTranslationToAdminDic("total test result",$transarr);
//$result2=SaveTranslationToSelfDic("Inventory",$transarr,118,0);
//echo $result2;


//$translation=GetTransLation("total test result");
//$size=sizeof($translation);
//echo $size;
//print_r($translation);
//echo "\n";
//$outstr="<select name= \"evaluationname\">\n";
//echo $outstr;
//foreach($translation as $value){
//    $chn=$value['CHN'];
//    $de=$value['De'];
//    $outstr="\t <option value=\"".$chn."\">".$chn."</option>\n";
//    echo $outstr."\n";
//}
//echo "</select>";
//$test=GetTransLation("total test result");
//$test=$test[0];
//$chn=$test['CHN'];
//echo $chn;
//$result=DeleteTranslationInSelfDic(1760,0);
//echo $result;
//$propertys=getProperty();
//print_r($propertys);
$dicflag=0;
$sql="select wordid from sdictionary where flag=".$dicflag;
echo $sql;
$res=$db->getAllValues($sql);
//$manufacturer=getManufacturers();
print_r($res);
$GLOBALS['db']->close();
//echo $resutl1;
//echo $result2;

//$transarr=array('CHN'=>"呵呵呵",'Eng'=>"null",'De'=>"null");
//SaveTranslationToSelfDic("test",$transarr,9402,1);

