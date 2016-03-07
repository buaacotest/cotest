<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/2/19
 * Time: 10:25
 * 前后端完全耦合的糟糕设计
 */
function printEvaluation($evaluationdata){
    $evaluationname=$evaluationdata['name'];
    $evaluationid=$evaluationdata['id_evaluation'];
    $outstr="";
    //$outstr.=$evaluationname."\n";
    $evaluationchild=$evaluationdata['id_parent'];
    if(empty($evaluationchild)==false){//如果有子类
        $outstr = "<li>" .$evaluationid . "--" . $evaluationname ; //先打印自身
        echo $outstr;
        $translation=GetTransLation($evaluationname);
        $chn=$translation['CHN'];
        $outstr="&nbsp;".$chn;
        echo $outstr;
        $outstr="<input type=\"checkbox\" name=evaluations[] value=\"".$evaluationid."\"/>";
        echo $outstr;
        echo "<nobr>\n";
        echo"<button type=\"button\" class=\"btnchange\" name=\"".$evaluationname."\">在线翻译</button>\n";
        echo "</nobr>\n";
        $outstr = "<ul>\n";////为子树构建列表
        echo $outstr;
        foreach ($evaluationchild as $child) { //循环孩子
            printEvaluation($child); //调用print()，打印孩子
        }
        echo "\n</ul>";///封闭子类
    }
    else{
        $outstr = "<li>" .$evaluationid . "--" . $evaluationname ; //没有子树就仅打印自身
        echo $outstr;
        $translation=GetTransLation($evaluationname);
        $chn=$translation['CHN'];
        $outstr="&nbsp;".$chn;
        echo $outstr;
        $outstr="<input type=\"checkbox\" name=evaluations[] value=\"".$evaluationid."\"/>";
        echo $outstr;
        echo "<nobr>\n";
        echo"<button type=\"button\" class=\"btnchange\" name=\"".$evaluationname."\">在线翻译</button>\n";
        echo "</nobr>\n";
    }
    echo "\n</li>";///封闭自身
}


$project_name=trim($_GET['proj']);
//echo $project_name;
require('../includes/lib_common.php');
require('../sql/mysql_cls.php');
require('../includes/lib_translation.php');
$db=new mysql_cls();
$db->connect();
$serverAddress=$serverUsername=$serverPassword=$selectDBname=NULL;
$db->changeDB($project_name);

//SaveTranslationToAdminDic("manufacture",$tranlationArray,$id=1); tested
//SaveTranslationToSelfDic("test",$tranlationArray,1030,1);   tested

/*get the evaluation trees*/
$evaluations=GetEvaluationTree();
$evaluationTree=$evaluations[0];
//print_r($evaluationTree);



/*generate html*/
$outstr="<html>\n<head>\n";
echo $outstr;
echo "<script src=\"../js/jquery.min.js\"></script>";
echo "<script type=\"text/javascript\" src=\"translationOnline.js\"></script>";
$outstr="<body>\n";
echo $outstr;
$outstr="<form name=\"input\" action=\"TranslationStepThree.php\" method=\"post\">\n";
echo $outstr;
echo "<ul>";
printEvaluation($evaluationTree);
echo "</ul>";
$outstr="<input type=\"submit\" value=\"Submit\" />\n";
echo $outstr;
$outstr="</form>\n";
echo $outstr;
$outstr="<p>选择需要翻译的项点击 \"Submit\" 按钮。</p>";
echo $outstr;
$outstr="</body>\n";
echo $outstr;
$outstr="</head>\n</html>";
echo $outstr;




