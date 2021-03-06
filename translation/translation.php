<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2016/6/9
 * Time: 10:24
 *
 */
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['usertype'])){
    header("Location:translation.html");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cotest翻译</title>
    <link href="trans.css" rel="stylesheet" type="text/css"/>
    <script src="jquery.min.js"></script>
    <script type="text/javascript">
    $(function() {
        /* For zebra striping */
        $("table tr:nth-child(odd)").addClass("odd-row");
        /* For cell text alignment */
        $("table td:first-child, table th:first-child").addClass("first");
        /* For removing the last border */
        $("table td:last-child, table th:last-child").addClass("last");
    });
    </script>
    <script>
        var all;
        $(document).ready(function(){
            $.ajaxSetup({async: false});
            $.get("sourcedata.php",function(data,status){
                if(status=="success"){
                    data=eval(data);
                    var dbstr="";
                    for(var i=0;i<data.length;i++){
                        dbstr+="<option>"+data[i]+"</option>";
                    }
                    $("#database").html(dbstr);
                }
            });
            $(".submit").click(function(){
                var proj=$("#database  option:selected").text();
                var opt=$("#project option:selected").text();

                $.get("sourcedata.php?project="+proj+"&option="+opt,function(data,status){
                    if(status=="success"){
                        var result = new Array();
                        result=eval(data);
                        var table=$(".table");
                        if(opt=="property"){
                            removeLines();
                            for(var i in result){
                                var str="<tr typeAttr='3'><td>"+result[i][0]+"</td><td class='source'>"+result[i][1]+"</td><td>";
                                var idstr="zh"+result[i][0];
                                var word=result[i][1];
                                word=word.replace(/\'/g,"&apos;");////替换单词中的单引号
                                word=word.replace(/\"/g,"&quot;");////替换单词中的双引号
                                var options=new Array();
                                options= result[i].CHN;
                                if(options.length==0){
                                    str+="<textarea  id='"+idstr+"_3'  onfocus=\"showOption('"+idstr+"_3','"+options+"','"+word+"');\""+" onblur=\"showAndHide('"+idstr+"_3List'"+",'hide');\""+">"+"</textarea></td><td>";
                                }else
                                    str+="<textarea  id='"+idstr+"_3'  onfocus=\"showOption('"+idstr+"_3','"+options+"','"+word+"');\""+" onblur=\"showAndHide('"+idstr+"_3List'"+",'hide');\""+">"+result[i]["CHN"][0]+"</textarea></td><td> "

                                str+=result[i]["Eng"]+"</td><td>";
                                str+=result[i]["De"]+"</td><td>";
                                str+="<input type='checkbox' onclick='save(this)'></td>"
                                //str+="<td><button type='button' class='btntranssave'>save</button></td>"
                                str+="</tr>"
                                //alert(str)
                                table.append(str);
                                var charr=result[i]["id_propertygroup"];

                                for(var j=0;j<charr.length;j++){
                                    var chstr="<tr typeAttr='0'><td>"+charr[j].id_property+"</td><td  class='source' style='color:#009999;padding-left:30px'>"+charr[j].name+"</td><td >";
                                    var chidstr="zh"+charr[j].id_property;
                                    var chword=charr[j].name;
                                    chword=chword.replace(/\'/g,"&apos;");////替换单词中的单引号
                                    chword=chword.replace(/\"/g,"&quot;");////替换单词中的双引号
                                    var chopt=charr[j].CHN;
                                    if(chopt.length==0){
                                        chstr+="<textarea id='"+chidstr+"' onfocus=\"showOption('"+chidstr+"','"+chopt+"','"+chword+"');\""+" onblur=\"showAndHide('"+chidstr+"List'"+",'hide');\""+">"+"</textarea></td><td>";
                                    }else
                                        chstr+="<textarea id='"+chidstr+"' onfocus=\"showOption('"+chidstr+"','"+chopt+"','"+chword+"');\""+" onblur=\"showAndHide('"+chidstr+"List'"+",'hide');\""+">"+chopt[0]+"</textarea></td><td> "
                                    chstr+=charr[j]["Eng"]+"</td><td>";
                                    chstr+=charr[j]["De"]+"</td><td>";
                                    chstr+="<input type='checkbox' onclick='save(this)'></td>"
                                    //chstr+="<td><button type='button' class='btntranssave'>save</button></td>"
                                    chstr+="</tr>"
                                    //alert(chstr)
                                    table.append(chstr);
                                }
                            }
                            $("span").text("翻译完成！");
                        }else if(opt=="evaluation"){
                            removeLines();
                            parseTree(result[0],0,0);
                            $("span").text("翻译完成！");
                        }else if(opt=="manufacturer"){
                            removeLines();
                            showManufacturer(result);
                            $("span").text("翻译完成！");
                        }
                        all=table.html();
                    }
                    else
                    {
                        alert("翻译失败！");
                    }
                })
            })
        });
        var colors=["#336666","#996633","#CCCC33","#990033","#333366","#66CC66","#FF9966"];
        function parseTree(data,offset,index){
            var idstr=data.id_evaluation;
            //alert(idstr)
            var opts=data.CHN;
            var str="";
            var word=data.name;
            word=word.replace(/\'/g,"&apos;");////替换单词中的单引号
            word=word.replace(/\"/g,"&quot;");////替换单词中的双引号
            str+="<tr typeAttr='1'><td>"+idstr+"</td>";

            str+="<td class='source' style=\"color:"+colors[index]+";padding-left:"+offset+"px \">"+word+"</td><td>";
            if(opts.length==0){
                str+="<textarea  id='"+idstr+"' onfocus=\"showOption('"+idstr+"','"+opts+"','"+word+"');\""+" onblur=\"showAndHide('"+idstr+"List'"+",'hide');\""+">"+"</textarea></td><td>";
            }else
                str+="<textarea id='"+idstr+"' onfocus=\"showOption('"+idstr+"','"+opts+"','"+word+"');\""+" onblur=\"showAndHide('"+idstr+"List'"+",'hide');\""+">"+opts[0]+"</textarea></td><td> "
            str+=data["Eng"]+"</td><td>";
            str+=data["De"]+"</td><td>";
            str+="<input type='checkbox' onclick='save(this)'></td>"
            //str+="<td><button type='button' class='btntranssave'>save</button></td>"
            str+="</tr>"
            $(".table").append(str);
            if(!(data.id_parent instanceof Array)){
                return;
            }else{
                index++;
                offset+=30;
                var arr=data.id_parent;
                $(arr).each(function () {
                    parseTree(this,offset,index);
                })

            }
        }
        function showManufacturer(result){
            //alert("manufacturer");
            for(var i in result) {
                var name= result[i].name;
                var id_manufacturer=result[i].id_manufacturer;
                console.log(name);
                console.log(id_manufacturer);
                var str="<tr typeAttr='2'><td>"+result[i][0]+"</td><td id='source'>"+result[i][1]+"</td><td>";
                var idstr="manu"+id_manufacturer;
                var word=result[i][1];
                word=word.replace(/\'/g,"&apos;");////替换单词中的单引号
                word=word.replace(/\"/g,"&quot;");////替换单词中的双引号
                var options=new Array();
                options= result[i].CHN;
                if(options.length==0){
                    str+="<textarea  id='"+idstr+"'  onfocus=\"showOption('"+idstr+"','"+options+"','"+word+"');\""+" onblur=\"showAndHide('"+idstr+"List'"+",'hide');\""+">"+"</textarea></td><td>";
                }else
                    str+="<textarea  id='"+idstr+"'  onfocus=\"showOption('"+idstr+"','"+options+"','"+word+"');\""+" onblur=\"showAndHide('"+idstr+"List'"+",'hide');\""+">"+result[i]["CHN"][0]+"</textarea></td><td> "

                str+=result[i]["Eng"]+"</td><td>";
                str+=result[i]["De"]+"</td><td>";
                str+="<input type='checkbox' onclick='save(this)'></td>"
                //str+="<td><button type='button' class='btntranssave'>save</button></td>"
                str+="</tr>"
                //alert(str)
                $(".table").append(str);
            }
        }
        function removeLines() {
            var table = $(".table");
            $(table).html("<tr><th>ID</th><th>源数据</th><th>中文</th><th>英文</th><th>德文</th><th>选择</th></tr>");
        }
        function showAndHide(obj,types){
            var Layer=$("#"+obj);
            switch(types){
                case "show":
                    Layer.show();
                    break;
                case "hide":
                    Layer.hide();
                    break;
            }
        }
        function getValue(obj,str){
            var input=window.document.getElementById(obj);
            input.value=str;
        }
        function showOption(obj,options,word){
            var opt=options.split(",");
            var divstr=" <div class='Menu' id='"+obj+"List'>";
            divstr+="<div class='Menu2'>";
            divstr+="<ul>";
            //alert(divstr)
            $.each(opt, function (index, item) {
                if(item!="")
                    divstr += "<li onmousedown=\"" + "getValue('" + obj + "','" + item + "');showAndHide('" + obj + "List'" + ",'hide');\">" + item + "</li>";
            })
            var autoword=autoTrans(word);
            divstr+="<li onmousedown=\""+"getValue('"+obj+"','"+autoword+"');showAndHide('"+obj+"List'"+",'hide');\">"+autoword+"</li>";

             //alert(divstr)
            divstr+="</ul></div></div>";
            var element="#"+obj;
            $(element).after(divstr);
            var width=$(element).width();
            $(element+"List").width(width);
            var lis=$(element+"List").find("li");

            showAndHide(obj+"List",'show');
        }
        function autoTrans(word){
            var temp="";
            $.get("autoTrans.php?q="+word,function(ret,stat){
                if(stat=="success")
                    temp=ret;
                else
                    temp="翻译失败";
            });
            console.log(temp)
            return temp;
        }
        function save(para){
            //alert("checked")
            var tr=$(para).parents('tr')
            var td = tr.children('td');
            var _typeAttr=tr.attr("typeAttr");
            //alert(_typeAttr);
            var _id=td.eq(0).text()
            var _oriword=td.eq(1).text()
            _oriword=_oriword.replace(/\'/g,"&apos;");////替换单词中的单引号
            _oriword=_oriword.replace(/\"/g,"&quot;");////替换单词中的双引号
            var chn=tr.find('textarea').val();
            var _translation=new Array();
            _translation['CHN']=chn;
            //_translation['De']="null";暂时不需要
            // _translation['Eng']="null";
            var _projname=$("#database  option:selected").text();////所翻译的数据库
            //var _type=$("#project option:selected").text();/////翻译的是evaluation还是property还是manufacturer
            var typeArray=['property','evaluation','manufacturer','propertygroup']
            var _type=typeArray[_typeAttr];

            //alert(chn)

            //alert(id);
            if(para.checked){
                $.get("saveitem.php",
                        {
                            oriword:_oriword,
                            id:_id,
                            projname:_projname,
                            //translation:_translation,
                            CHN:chn,
                            flag:1,////标示是否选择
                            type:_type
                        },
                        function(data,status){
                            //_this.parent().html(data);
                            if(status=="success")
                                $(para).after("<p>"+data+"</p>");

                        });

                $(para).next().fadeOut(2000);
            }
            else{
                $.get("saveitem.php",
                        {
                            oriword:_oriword,
                            id:_id,
                            projname:_projname,
                            //translation:_translation,
                            CHN:chn,
                            flag:0,
                            type:_type
                        },
                        function(data,status){
                            //_this.parent().html(data);
                            if(status=="success")
                                $(para).after("<p>"+data+"</p>");
                        });
                $(para).next().fadeOut(2000);
            }
        }
        function inArraySearch(para,ids){
            var flagself=para.attr("typeAttr");
          // console.log(flagself);
            var ret=-1;
            var id=para.children('td').eq(0).text();
            for(var i=0;i<ids.length;i++){
                if(ids[i].wordid==id&&flagself==ids[i].flag)
                    //alert(ids[i].wordid);
                    return 1;
            }

            //alert("not found")
            return -1;
        }
       function filterSelected(flag){
           var proj=$("#database  option:selected").text();
           var opt=$("#project option:selected").text();
           var str="<tr><th>ID</th><th>源数据</th><th>中文</th><th>英文</th><th>德文</th><th>选择</th></tr>";
           $.get("check.php?project="+proj+"&option="+opt,function(data,status){
               if(status=="success"){
                   var ids=eval(data);
                   //console.log(ids)
                   var tempTr=$(".table").find('tr');
                   tempTr.each(function(){
                       if(!$(this).attr("typeAttr")){
                           console.log("no attr")
                       }
                       else{
                           var id=$(this).children('td').eq(0).text();
                           //console.log($(this).attr("typeAttr"))
                           if(inArraySearch($(this),ids)==1){
                               $(this).find('input').attr("checked",true);
                               if(flag==1){
                                   //alert($(this).html());
                                   str+="<tr typeAttr='"+$(this).attr("typeAttr")+"'>"+$(this).html()+"</tr>";
                               }

                           }
                       }
                   })
               }
           });
           if(flag==1){
              // console.log(str);
               //alert(str);
               $(".table").html(str);
           }

       }
        function resume(){
            $(".table").html(all);
            filterSelected(0);
        }
    </script>

</head>
<body>
<div style="position: relative;left: 10px;top:10px;width: 100%">
    <b>选择需要翻译的数据库</b>
    <select id="database">
    </select>
    &nbsp;&nbsp;&nbsp;
    <b>选择需要翻译的内容</b>
    <select id="project">
        <option>property</option>
        <option>evaluation</option>
        <option>manufacturer</option>
    </select>
    &nbsp;
    <button class="submit" onfocus=" $('span').text('系统自动翻译中，请稍候...');" onblur=" $('span').text('翻译完成！');">确认</button>&nbsp;<span></span>
   <ul  style="position:absolute;right: 4%;top:0;list-style-type:none;"><li style="float: left"> <button class="check" onclick="filterSelected(1)">查看已保存翻译项</button></li>
       <li style="float: left"><button class="resume" onclick="resume()">显示所有翻译项</button></li>
       </ul>
</div>

<div id="content">

    <table cellspacing="0" class="table">
        <tr><th>ID</th><th>源数据</th><th>中文</th><th>英文</th><th>德文</th><th>选择</th></tr>
    </table>
</div>
</body>
</html>