<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/2/19
 * Time: 10:25
 * 真是糟糕的设计
 */
function printEvaluationItem($evaluationid,$evaluationname){
    $outstr = "<li>" .$evaluationid . "--" . $evaluationname ; //先打印自身
    echo $outstr;
    $translation=GetTransLation($evaluationname);
    $chn=$translation['CHN'];
    $de=$translation['De'];
    $outstr="&nbsp;".$chn."&nbsp;".$de;
    echo $outstr;
    $outstr="<input type=\"checkbox\" name=\"evaluations[]\" value=\"".$evaluationid."\"/>";
    echo $outstr;
    echo "<nobr>\n";
    echo"<button type=\"button\" class=\"btntranslation\" name=\"".$evaluationname."\">在线翻译</button>\n";
    echo "</nobr>\n";
    echo "<p>your translation: <input type=\"text\" class=\"transinput\" name=\"".$evaluationname."\" id=\"".$evaluationid."\" />";
    echo "<nobr>&nbsp;<button type=\"button\" class= \"btntranssave\" name=\"".$evaluationname."\">save!</button></nobr></p>";
}



function printEvaluation($evaluationdata){
    $evaluationname=$evaluationdata['name'];
    $evaluationid=$evaluationdata['id_evaluation'];
    $outstr="";
    //$outstr.=$evaluationname."\n";
    $evaluationchild=$evaluationdata['id_parent'];
    if(empty($evaluationchild)==false){//如果有子类
        printEvaluationItem($evaluationid,$evaluationname);
        $outstr = "<ul>\n";////为子树构建列表
        echo $outstr;
        foreach ($evaluationchild as $child) { //循环孩子
            printEvaluation($child); //调用print()，打印孩子
        }
        echo "\n</ul>";///封闭子类
    }
    else{/////没有孩子只打印自身
        printEvaluationItem($evaluationid,$evaluationname);
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
echo "<script type=\"text/javascript\" src=\"saveEvaluationItem.js\"></script>";
$outstr="<body>\n";
echo $outstr;
$outstr="<div hidden=\"hidden\" class=\"projname\">".$project_name."</div>";
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


//<p>First name: <input type="text" name="evaluationname" id="evaluationid"/></p>
//<p><button type="button" class= "btntranssave" name="evaluationname">Click Me!</button></p>
//echo "<p>First name: <input type=\"text\" name=\"evaluationname\" id=\"evaluationid\" />";
//echo "<nobr>&nbsp;<button type=\"button\" class= \"btntranssave\" name=\"evaluationname\">save!</button></nobr></p>";


