<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/COTESTicon.png"/>

    <title><{$title}></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cotest_m.css">
    <link rel="stylesheet" type="text/css" href="css/products_m.css">
    <link rel="stylesheet" type="text/css" href="css/footer_m.css">
    <link rel="stylesheet" type="text/css" href="css/review_m.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/changelanguage.js"></script>
</head>
<body>
<{php}>
    require("navigation.php");
    <{/php}>
<div class="tool-tip"></div>
<div class="content-container">
    <div class="flip-container">

    </div>
    <div class="
    products-select-tab">
    <!--
     <div class="products-head">
         <a href="<{$upper.link}>"><{$upper.name}></a>>
         <{$up.name}>
     </div>
     -->
        <ul class="nav nav-tabs pro-nav">
                <li role="presentation" class="proper-tab active" target="#product_panel" id="tab1" style="width:50%"><a><{$lang.TestedSmartphones_m}></a></li>
                <li role="presentation" class="proper-tab"style="width:50%" target="#how-we-test-panel" id="tab2"><a><{$lang.HowWeTest}></a></li>
               <!-- <li role="presentation"style="width:30%" class="proper-tab" target="#review_panel" id="tab3"><a><{$lang.Review}></a></li>-->

            </ul>


    </div>
    <div class="row" id="product_panel">
        <div class="filter-selector">
          <div class="filter-sort sort-time filter-sort-active" name="time"><{$lang.SortTime}>
              
            
              <div class="triangle-down triangle-down-active"></div>
          
          </div>
          <div class="filter-sort sort-score" name="score"><{$lang.SortScore}>
          <!--
              <div class="triangle-up"></div>
              <div class="triangle-down"></div>
              -->
              <div class="triangle-down"></div>
          </div>
          <div class="side-btn" onclick="javascript:showSide(this)" toggle="1"><{$lang.Filter}></div>
        </div>
        <div class="product-container-panel">
        <div class="products-container">
            
            <div id="products-block">
                <p>&nbsp;<b><{$productsNum}>  </b><{$up.name}> &nbsp;&nbsp;<span class="cur-page">1</span> / <{$pageNum}>  <{$lang.pages}></p>
                <ul class="products" itemscope="" itemtype="http://schema.org/ItemList">
                   
                   
                    <meta itemprop="mainContentOfPage" content="true">
                     <{section name=n loop=$products}>
                    <li >
                        <div class="product-listing">
                        <div class="product-thumb">
                              <a class="product-link" target="<{$products[n].product_id}>" >
 								<img class="product-listing__thumb-image" alt="<{$products[n].product_name}>" src="data/<{$project}>/picturesx/<{$products[n].product_id}>_01x.jpg">                              </a>
                          </div>
                          <div class="product-info">
                          <a class="product-link"  target="<{$products[n].product_id}>" >
                            <span class="product-brand">
                              <{$products[n].product_manufacturer}>
                            </span>
                            <br>
                            <div class="product-name">
                              <{$products[n].product_name}>
                            </div>
                            
                          </a>
                          <div class="product-price">
                            <div data-test="price-label"><{$lang.RefPrice}> <{$products[n].price}></div>
                                  
                          </div>
                

                            <div class="product-listing__tested-date">
                                <{$lang.TestedDate}>: <{$products[n].product_tested_date}>
                            </div>
                            <div class="product-score">
                              
                                 <div class="score-list">
                                        <{if $products[n].score <=1.5}>

                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $products[n].score >1.5 && $products[n].score <= 2.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $products[n].score >2.5 && $products[n].score <= 3.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $products[n].score >3.5 && $products[n].score <= 4.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $products[n].score >4.5 && $products[n].score <= 5.5}>
                                                        <div class="star"></div>


                                        <{/if}>
                                                     
                                       </div>

                              
                              <div class="score">
                                        <{if $products[n].score <=1.5}>
                                              <{ $lang.Verygood}>

                                        <{/if}>
                                        <{if $products[n].score >1.5 && $products[n].score <= 2.5}>
                                             <{ $lang.Good}>

                                        <{/if}>
                                        <{if $products[n].score >2.5 && $products[n].score <= 3.5}>
                                             <{ $lang.Average}>

                                        <{/if}>
                                        <{if $products[n].score >3.5 && $products[n].score <= 4.5}>
                                             <{ $lang.Sufficient}>

                                        <{/if}>
                                        <{if $products[n].score >4.5 && $products[n].score <= 5.5}>
                                             <{ $lang.Poor}>
                                        <{/if}>


                              / <{$products[n].score}></div>
                            </div>
                            
                            <div class="product-compare-button" id="cp<{$products[n].product_id}>" proId="<{$products[n].product_id}>" proName="<{$products[n].product_manufacturer}> <{$products[n].product_name}>" add=0>
                              <button name="button" type="submit" class="action-remove action-toggle"><{$lang.RemoveFromCompare}></button><button name="button" type="submit" class="action-add"><{$lang.AddToCompare}></button>
                            </div>
                           
                        </div>
                        </div>

                      </li>
                    <{/section}>
                    

                </ul>
            </div>
       
            <!-- lishijie -->
            <div id="setpage"></div>
        </div>
        </div>
        

    </div>
    <div id="how-we-test-panel" style="display: none">
      
    </div>
    <div id="review_panel" style="display:none">
      <div class="comments "></div>
      
    </div>
    <div class="compare-panel" >
        <div class="compare-toogle">
            <img src="img/down.png" />
        </div>
        <div class="compare-btn"><{$lang.Compare}></div>
    </div>
</div>
<div class="sidebar">
        <!--
          <button class="filter-btn">
            Filter
          </button>-->
          <div class="filter-head">
          <h2 class="filter-title"><{$lang.Filters}></h2>
          <div class="filter-close" onclick="javascript:hideSide()">
            <img src="img/cross.png">
          </div>
          <button class="clear-btn">
              <{$lang.ClearAll}>
          </button>
          </div>
          <div id="filter-all-options">
              
          </div>

        </div>


</div>
<{php}>
  require("footer.php");
  <{/php}>

</body>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
<script type="text/javascript" src="js/comment.js"></script>
<script type="text/javascript">
    <!--
    var totalpage,pagesize,cpage,count,curcount,outstr;
    var compare_list=[];
    var compare_name_list=[];
    //初始化
    //console.log(<{$labels}>)
    //console.log(<{$products}>)
     var page=getPar("page");
    if(page)
        fetchComments('',$(".comments"),page);
    else{
        fetchComments('',$(".comments"),1);
    }
    cpage = 1;
    totalpage =<{$pageNum}>;
    //console.log(totalpage);
    pagesize = 10;
    outstr = "";
    var labels_str="";
    loadoption(<{$labels}>)
    $(".compare-panel").hide();
     function getPar(par){
        //获取当前URL
        var local_url = document.location.href; 
        console.log(local_url)
        //获取要取得的get参数位置
        var get = local_url.indexOf(par +"=");
        if(get == -1){
            return false;   
        }   
        //截取字符串
        var get_par = local_url.slice(par.length + get + 1);    
        //判断截取后的字符串是否还有其他get参数
        var nextPar = get_par.indexOf("&");

        var nextSharp =get_par.indexOf("#");
        console.log(nextSharp)
        console.log(nextPar)
        nextPar=nextPar>nextSharp?((nextSharp==-1)?nextPar:nextSharp):((nextPar==-1)?nextSharp:nextPar);
        console.log(nextPar)
        if(nextPar != -1){
            get_par = get_par.slice(0, nextPar);
        }
       
        get_par=get_par.replace(/%22/g,"'");
        get_par=get_par.replace(/%20/g," ");
        return eval("("+get_par+")");
    }


    function loadoption(labels){
        var option_text="";
        if(labels){
           for(var i=0;i<labels.length;i++){
            var option_info=labels[i];
            var option_name=option_info.name;
            var option_label=option_info.label;
            var option_options=option_info.option;
            var option_values=option_info.value;
            var option_numbers=option_info.number;
            var option_type=option_info.type;
            var option_unit=option_info.unit;
            option_text+=" <div class='facet facet-checkbox' name='"+option_name+"' type='"+option_type+"'>";
            option_text+=
                "<div class='heading-filter-options'>"+
                  "<h3>"+
                   "<span class='facet-category-heading icon icon-0394'></span>"+
                    option_label+
                  "</h3>"+
                "</div>";
            option_text+='<div class="cont-filter-options toggle-panel">';
            //console.log(option_values)
            option_text+='<div class="filter-options">';
            for(var j=0;j<option_options.length;j++){
                if(option_options[j]!=''){
                var value_text="";
                if(option_type=="range"){
                    value_text=" name='"+JSON.stringify(option_values[j])+"' ";
                }
                else{
                    value_text=" name='"+option_values[j]+"'"
                }
                option_text+='<label >'+
                        '<span class="checkbox" '+value_text+' >'+
                        '<input class="filter-option" type="checkbox"/>'+
                        '</span>'+
                        '<span class="inner-label">'+
                          option_options[j]+
                          '<span class="count"> ('+option_numbers[j]+') </span>'+
                        '</span>'+
                      '</label>';
                }

            }
            if(option_type=="range" && option_unit){
                    option_text+='<div class="range-select">from<input class="range-from" type="text"/>to<input class="range-to" type="text"/>'+option_unit+'</div><button class="range-confirm"><{$lang.Confirm}></button>'
                }
             option_text+="</div></div></div>"
          

        }
        }
       
        //console.log(option_text)
          $("#filter-all-options").html(option_text);
          filterToggle();
              $(".checkbox").on("click",function(){
                if($(this).hasClass("active")){
              $(this).removeClass("active")
              $(this).css("background","none")
              $(this).attr("checked",null)
            }else{
              $(this).addClass("active")
              $(this).css("background","url(img/check.png)")
              $(this).attr("checked","checked")
            }
            filter();
            })
          $(".range-confirm").on("click",function(){
          
            filter();
            })
    }
    $(".clear-btn").on("click",function(){
       var checkboxs=$("#filter-all-options").find(".checkbox");
       $(".range-from").val("");
       $(".range-to").val("");
       $(checkboxs).attr("class","checkbox");
       $(checkboxs).attr("checked",null);
         $(checkboxs).css("background","none");
          filter();
    })
    //filter toggle
    function filterToggle(){
        var filteroptions=$(".filter-options");
        for(var i=0;i<filteroptions.length;i++){
          var filteroption=$(filteroptions[i])
          if($(filteroption).find("label").length>5){
              for(var j=5;j<$(filteroption).find("label").length;j++){
                $(filteroption).find('label').eq(j).hide();

              }
              $(filteroption).append("<div class='more-option-btn' toggle='1'><img src='img/down_b.png'></div>");
          }
        }
        $('.more-option-btn').on("click",function(){
            if($(this).attr('toggle')=='1'){
              $(this).attr('toggle','0');
              $(this).parent().find('label').show();
              $(this).attr('class',"more-option-btn more-option-btn-active")
            }else{
                for(var i=5;i<$(this).parent().find("label").length;i++){
                  $(this).parent().find("label").eq(i).hide();
                }
                 $(this).attr('toggle','1');
                 $(this).attr('class',"more-option-btn")
            }
        }) 
    }

    function getScoreInfo(star){
        if(star==1) return "Poor";
        if(star==2) return "Sufficient";
        if(star==3) return "Average";
        if(star==4) return "Good";
        if(star==5) return "Very good";
    }
  
    $(".filter-btn").on("click",function(e){
        filter();
    })

    $(".dropdown-menu-item").on("click",function(){
        var sortname=$(this).attr("name");
        if(sortname){
            sort(sortname);
            $("#cur-sort").html($(this).text()+'<span class="caret"></span>');
        }
    })
    $(".filter-sort").on("click",function(){
         var sortname=$(this).attr("name");
         if(sortname){
            sort(sortname);
            $(".filter-sort").removeClass("filter-sort-active")
            $(this).addClass("filter-sort-active")
        }
        $(".triangle-down").removeClass("triangle-down-active")
        $(this).find(".triangle-down").addClass("triangle-down-active");
    })


      $(".proper-tab").on("click",function(){
        var target_panel=$(this).attr("target");
        var tabs=$(this).parent().find(".proper-tab");
        for(var i=0;i<tabs.length;i++){
            var panel= $(tabs[i]).attr("target");
            $(panel).css("display","none");
            $(tabs[i]).attr("class","proper-tab");
        }
        $(target_panel).css("display","block");
        $(this).attr("class","proper-tab active");
    })
    function sort(sortType){
        $.get("products.php?page=1&proj=<{$project}>&sort="+sortType+"&labels="+labels_str,function(result){
           // console.log(result)
            $("#products-block").html(result);
            totalpage=$(".products").attr("pagenum");
            cpage=1;
            setpage();
            //console.log($(".products").attr("pagenum"));
            //console.log("page="+totalpage);

         
        })
    }
    function filter(){
        var labels=[]
        var all_options=$("#filter-all-options").find(".facet-checkbox");
        for(var i=0;i<all_options.length;i++){
            var name=$(all_options[i]).attr("name");
            var type=$(all_options[i]).attr("type");
            var active_options=$(all_options[i]).find(".active");
            
            var values=[]
            for(var j=0;j<active_options.length;j++){
                if(type=="string"||type=="date"||type=="multi")
                    values.push($(active_options[j]).attr("name"));
                else{
                   
                    values.push(eval("("+$(active_options[j]).attr("name")+")"))
                }
            }
            if(type=="range"){
                var from_val=$(all_options[i]).find(".range-from").val();
                var to_val=$(all_options[i]).find(".range-to").val();
               // console.log("from_val"+from_val);
                if(from_val && to_val)
                    values.push({">=":from_val,"<":to_val});
            }
            if(values.length==0 ) continue;
            labels.push({"name":name,"type":type,"value":values});

        }
        //console.log(JSON.stringify(labels));
        labels_str=JSON.stringify(labels);
        //console.log(labels_str);
        $.get("products.php?page=1&proj=<{$project}>&labels="+labels_str,function(result){
           // console.log(result)
            $("#products-block").html(result);
            totalpage=$(".products").attr("pagenum");
            cpage=1;
            setpage();
           
           // console.log($(".products").attr("pagenum"));
            //console.log("page="+totalpage);

         
        })
       
        
    }
    function addCompare(pro_id,pro_name){
       // alert("addcompare")
        var content='<div class="compare-item" proId="'+pro_id+'">'
            +'<div class="compare-context">'+pro_name+'</div>'
            +'<div class="compare-close">'
             +'<img src="img/cross_w.png">'
            +'</div>'
        +'</div>';
        if(compare_list.indexOf(pro_id)==-1 ){
            compare_list.push(pro_id);
            compare_name_list.push(pro_name);
            console.log(pro_id);
            $(".compare-panel").append(content);
            $(".compare-close").on("click",function(){
                console.log(pro_name)

                $("#cp"+pro_id).find(".action-remove").addClass("action-toggle");
                $("#cp"+pro_id).find(".action-add").removeClass("action-toggle");
                $("#cp"+pro_id).attr('add',0);
                removeCompare(pro_id);
            })
        }
        
        //$(".compare-panel").append(content);
        $(".compare-close").on("click",function(){
            //console.log(pro_name)
            
            $("#cp"+pro_id).find(".action-remove").addClass("action-toggle");
            $("#cp"+pro_id).find(".action-add").removeClass("action-toggle");
            $("#cp"+pro_id).attr('add',0);
            removeCompare(pro_id);
        })
        
    }

    function removeCompare(pro_id){

        var compareitems=$(".compare-panel").find('.compare-item');
        //console.log(pro_id);
        for(var i=0;i<compareitems.length;i++){
            if($(compareitems[i]).attr("proId")==pro_id){
                $(compareitems[i]).remove();
            }
        }
        var compareitems=$(".compare-panel").find('.compare-item');
        if(compareitems.length==0){
            $(".compare-panel").hide();
        }
        var id=compare_list.indexOf(pro_id);
        console.log(compare_list);
       // compare_list.remove(id);
        compare_list.splice(id,1) 
        compare_name_list.splice(id,1)
    }
    function updateCompareBtn(){
        var btns=$(".product-compare-button");
        for(var i=0;i<btns.length;i++){
            if(compare_list.indexOf($(btns[i]).attr("proId"))!=-1){
                $(btns[i]).find(".action-add").addClass("action-toggle");
                $(btns[i]).find(".action-remove").removeClass("action-toggle");
                $(btns[i]).attr('add',1);
            }
        }
    }
    function productCompareOnClick(compare_btn){
        //alert("xxxxxx");
         if(compare_btn.attr("add")==0){
             if(compare_list.length>=3){
                 alert("too much compared items.");
             }
             else{
                 addCompare(compare_btn.attr("proId"),compare_btn.attr("proName"));
                 compare_btn.find(".action-add").addClass("action-toggle");
                 compare_btn.find(".action-remove").removeClass("action-toggle");
                 compare_btn.attr('add',1);
                 $(".compare-panel").show();
               //  console.log($(".compare-panel").css("display"))
             }
        }else{
            removeCompare(compare_btn.attr("proId"));
            compare_btn.find(".action-remove").addClass("action-toggle");
            compare_btn.find(".action-add").removeClass("action-toggle");
            compare_btn.attr('add',0);
          //  console.log($(".compare-panel").css("display"))
        }
    }
   
    $(".compare-btn").on("click",function(){
        var items=$(".compare-panel").find(".compare-item");
        var ids=[];
        for(var i=0;i<items.length;i++){
            ids.push(parseInt($(items[i]).attr("proId")));
        }
       // $.get();
            window.location.href="compare.php?proj="+'<{$project}>'+"&ids="+JSON.stringify(compare_list)
        
    })
    $(".compare-toogle").on("click",function(){
        if($(this).attr("toogle")==1){
            $(".compare-panel").animate({bottom:"0px"});
            $(this).attr("toogle",0);
            $(this).find("img").attr("src","img/down.png");
        }else{
            $(".compare-panel").animate({bottom:"-160px"});
            $(this).attr("toogle",1);
            $(this).find("img").attr("src","img/up.png");
        }

    })
   
    function reloadpage(target){
        var query_str="";
        if(labels_str==""){
            query_str="products.php?page="+target+"&proj=<{$project}>"
        }else{
            query_str="products.php?page="+target+"&proj=<{$project}>&labels="+labels_str;
        }

        $.get(query_str,function(result){
            $("#products-block").html(result);
            updateCompareBtn();
            $(".product-compare-button").on("click",function(){
                productCompareOnClick($(this));
           
            })
            $(".product-link").on("click",function(){
              var id=$(this).attr("target");
            window.location.href="details.php?proj=<{$project}>&id="+id+"&ids="+JSON.stringify(compare_list)+"&names="+JSON.stringify(compare_name_list);
            })
             $(".cur-page").text(cpage)
        })


    }

    function gotopage(target)
    {
        cpage = target;        //把页面计数定位到第几页
        setpage();
        reloadpage(target);    //调用显示页面函数显示第几页,这个功能是用在页面内容用ajax载入的情况
    }
    function setpage()
    {


        if(totalpage<=pagesize){        //总页数小于十页
            for (count=1;count<=totalpage;count++)
            {  if(count!=cpage)
            {
                outstr = outstr + "<a href='javascript:void(0)' onclick='gotopage("+count+")'>"+count+"</a>";
            }
            else{
                outstr = outstr + "<span class='current' >"+count+"</span>";
            }
            }
        }
        if(totalpage>pagesize){        //总页数大于十页
            if(parseInt((cpage-1)/pagesize) == 0)///前10页
            {
                for (count=1;count<=pagesize;count++)
                {
                    if(count!=cpage)
                    {
                        outstr = outstr + "<a href='javascript:void(0)' onclick='gotopage("+count+")'>"+count+"</a>";
                    }
                    else{
                        outstr = outstr + "<span class='current'>"+count+"</span>";
                    }
                }
                outstr = outstr + "<a href='javascript:void(0)' onclick='gotopage("+count+")'> >> </a>";
            }
            else if(parseInt((cpage-1)/pagesize) == parseInt(totalpage/pagesize))///最后10页
            {
                outstr = outstr + "<a href='javascript:void(0)' onclick='gotopage("+(parseInt((cpage-1)/pagesize)*pagesize)+")'><<</a>";
                for (count=parseInt(totalpage/pagesize)*pagesize+1;count<=totalpage;count++)
                {    if(count!=cpage)
                {
                    outstr = outstr + "<a href='javascript:void(0)' onclick='gotopage("+count+")'>"+count+"</a>";
                }else{
                    outstr = outstr + "<span class='current'>"+count+"</span>";
                }
                }
            }
            else///中间页数
            {
                outstr = outstr + "<a href='javascript:void(0)' onclick='gotopage("+(parseInt((cpage-1)/pagesize)*pagesize)+")'>previous</a>";
                for (count=parseInt((cpage-1)/pagesize)*pagesize+1;count<=parseInt((cpage-1)/pagesize)*pagesize+pagesize;count++)
                {
                    if(count!=cpage)
                    {
                        outstr = outstr + "<a href='javascript:void(0)' onclick='gotopage("+count+")'>"+count+"</a>";
                    }else{
                        outstr = outstr + "<span class='current'>"+count+"</span>";
                    }
                }
                outstr = outstr + "<a href='javascript:void(0)' onclick='gotopage("+count+")'> next </a>";
            }
        }
        console.log(outstr)
        document.getElementById("setpage").innerHTML = "<div id='setpage'>" + outstr + "<\/div>";
        outstr = "";

         updateCompareBtn();
            $(".product-compare-button").on("click",function(){
                productCompareOnClick($(this));
           
            })
        //$("html,body").animate({scrollTop:0,500});
        $(".product-link").on("click",function(){
            var id=$(this).attr("target");
            window.location.href="details.php?proj=<{$project}>&id="+id+"&ids="+JSON.stringify(compare_list)+"&names="+JSON.stringify(compare_name_list);
        })

    }
    


 
  //  var local_url = document.location.href; 
    var compare_ids=getPar("ids");
    var compare_names=getPar("names");
    console.log(compare_ids);
    console.log(compare_names);
    if(compare_ids&&compare_names){
      if(compare_ids.length>0 && compare_names.length>0){
         for(var i=0;i<compare_ids.length;i++){
            addCompare(compare_ids[i],compare_names[i])
        
         }
          $(".compare-panel").show();
      }
     
    }
    //显示侧边栏
    var bodyscroll=0;
    function hideSide(){
                $("html").css("height","none")
                $(".sidebar").hide();
                
                $(".content-container").css("position","relative");
                $(".content-container").css("height","auto");
               
                $("body").scrollTop=bodyscroll;
    }
    function showSide(sideBtn){
                $(sideBtn).attr("toogle","0");
                $("html").css("height","100%");
              //  $(body).scrollTop(0);
              bodyscroll= $("body").scrollTop();
              //bodyscroll= $(".products-container").offset().top;
               console.log(bodyscroll);
                $("body").scrollTop=0;
                $(".content-container").css("position","fixed");
          //      $(".content-container").css("top",bodyscroll);
                $(".sidebar").show();
                
                 window.scrollTo(0,0);
        

    }
    //侧边栏滚动
    /*
    if ( ! ( !-[1,] && !window.XMLHttpRequest ) ) {  //非IE6浏览器

      $(window).scroll(function(){
        $('.sidebar').css( 'top', 0 - $(window).scrollTop() );
      });
    }*/
    setpage();    //调用分页
</script>
<script type="text/javascript">
 $.get("data/<{$project}>/howtotest/<{$project}>.html",function(data){
    $("#how-we-test-panel").html(data)
  })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".pagebtn").on("click",function(){
            var value=$(this).attr("value");
           // console.log(value)
            $(".pagebtn").attr("class","pagebtn");
            $(this).attr("class","pagebtn active");
            $.get("products.php?page="+value+"&proj=<{$project}>",function(result){
                $("#products-block").html(result);
            })
        })
        $(".logout-btn").on("click",function  () {
        // body...
        $.get("logout.php",function(){
            location.reload();
        });
      })
    })
</script>

</html>
