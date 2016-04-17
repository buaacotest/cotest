<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><{$title}></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cotest.css">
    <script src="js/bootstrap.min.js"></script>

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
     <div class="products-head">
         <a href=""><{$lang.Electronics}></a>
         <{$lang.Smartphones}>
     </div>
        <ul class="nav nav-tabs pro-nav">
                <li role="presentation" class="proper-tab active" target="#product_panel" id="tab1"><a><{$lang.TestedSmartphones}></a></li>
                <li role="presentation" class="proper-tab" target="#panel2" id="tab2"><a><{$lang.HowWeTest}></a></li>

            </ul>

    </div>
    <div class="row" id="#product_panel">
        <div class="sidebar">
        <!--
          <button class="filter-btn">
            Filter
          </button>-->
          <h2 class="filter-title"><{$lang.Filters}></h2>
          
          <button class="clear-btn">
              <{$lang.ClearAll}>
          </button>
          <div id="filter-all-options">
              
          </div>

        </div>
        <div class="products-container">
            <div class="products-sort">
            
              <div class="name"><{$lang.SortBy}></div>
                <div class="btn-group">
                  <button type="button" id="cur-sort"class="btn btn-default dropdown-toggle sort-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <{$lang.MostRecentlyTested}> <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li ><a class="dropdown-menu-item" name="score"href="#"><{$lang.HighestScore}></a></li>
                    <li ><a class="dropdown-menu-item" href="#"><{$lang.PriceLowToHigh}></a></li>
                    <li><a  class="dropdown-menu-item" href="#"><{$lang.PriceHighToLow}></a></li>
                    <li><a href="#"  class="dropdown-menu-item" name="time"><{$lang.MostRecentlyTested}></a></li>
                  </ul>
                </div>
            </div>
            <div id="products-block">
                <p>&nbsp;<b><{$productsNum}>  </b><{$lang.Smartphones}> &nbsp;&nbsp;1 / <{$pageNum}> <{$lang.pages}></p>
                <ul class="products" itemscope="" itemtype="http://schema.org/ItemList">
                   
                   
                    <meta itemprop="mainContentOfPage" content="true">
                     <{section name=n loop=$products}>
                    <li >
                        <div class="product-listing">
                        <div class="product-thumb">
                              <a href="details.php?proj=<{$project}>&id=<{$products[n].product_id}>">
                                <img class="product-listing__thumb-image" alt="Hisense LTDN50K321UWTSEU" src="http://images.pricerunner.com/product/225x169/1484843660/Hisense-LTDN50K321UWTSEU.jpg">
                              </a>
                          </div>
                          <a href="details.php?proj=<{$project}>&id=<{$products[n].product_id}>">
                            <span class="product-brand">
                              <{$products[n].product_manufacturer}>
                            </span>
                            <br>
                            <div class="product-name">
                              <{$products[n].product_name}>
                            </div>
                            
                          </a>
                          <div class="product-price">
                            <div data-test="price-label"><{$lang.RefPrice}></div>
                                  
                          </div>
                

                            <div class="product-listing__tested-date">
                                <{$lang.TestedDate}> <{$products[n].product_tested_date}>
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

                              
                              <div class="score"><{$products[n].score}></div>
                            </div>
                            
                            <div class="product-compare-button" id="cp<{$products[n].product_id}>" proId="<{$products[n].product_id}>" proName="<{$products[n].product_name}>" add=0>
                              <button name="button" type="submit" class="action-remove action-toggle"><{$lang.RemoveFromCompare}></button><button name="button" type="submit" class="action-add"><{$lang.AddToCompare}></button>
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
    <div class="compare-panel" >

        <div class="compare-btn"><{$lang.Compare}></div>
    </div>
</div>
</div>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->

<script type="text/javascript">
    <!--
    var totalpage,pagesize,cpage,count,curcount,outstr;
    //初始化
    console.log(<{$labels}>)
    console.log(<{$products}>)
    cpage = 1;
    totalpage =<{$pageNum}>;
    console.log(totalpage);
    pagesize = 10;
    outstr = "";
    var labels_str="";
    loadoption(<{$labels}>)
    $(".compare-panel").hide();
    function loadoption(labels){
        var option_text="";
        for(var i=0;i<labels.length;i++){
            var option_info=labels[i];
            var option_name=option_info.name;
            var option_label=option_info.label;
            var option_options=option_info.option;
            var option_values=option_info.value;
            var option_numbers=option_info.number;
            var option_type=option_info.type;
            option_text+=" <div class='facet facet-checkbox' name='"+option_name+"' type='"+option_type+"'>";
            option_text+=
                "<div class='heading-filter-options'>"+
                  "<h3>"+
                   "<span class='facet-category-heading icon icon-0394'></span>"+
                    option_label+
                  "</h3>"+
                "</div>";
            option_text+='<div class="cont-filter-options toggle-panel">';
            console.log(option_values)
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
            if(option_type=="range"){
                    option_text+='<div class="range-select">from<input class="range-from" type="text"/>to<input class="range-to" type="text"/></div><button class="range-confirm"><{$lang.Confirm}></button>'
                }
             option_text+="</div></div></div>"
          

        }
        console.log(option_text)
          $("#filter-all-options").html(option_text);
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
    function getScoreInfo(star){
        if(star==1) return "Poor";
        if(star==2) return "Sufficient";
        if(star==3) return "Average";
        if(star==4) return "Good";
        if(star==5) return "Very good";
    }
    $(".score-list").on("mousemove",function(e){
        $(".tool-tip").css("top",e.pageY);
        $(".tool-tip").css("left",e.pageX);
        var stars=$(this).find(".star");
        $(".tool-tip").text(getScoreInfo(stars.length));
        $(".tool-tip").css("display","block");
    })
    $(".score-list").on("mouseleave",function(e){
        $(".tool-tip").css("display","none");
    })
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
    function sort(sortType){
        $.get("products.php?page=1&proj=<{$project}>&sort="+sortType+"&labels="+labels_str,function(result){
           // console.log(result)
            $("#products-block").html(result);
            totalpage=$(".products").attr("pagenum");
            cpage=1;
            setpage();
            console.log($(".products").attr("pagenum"));
            console.log("page="+totalpage);

         
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
        console.log(JSON.stringify(labels));
        labels_str=JSON.stringify(labels);
        console.log(labels_str);
        $.get("products.php?page=1&proj=<{$project}>&labels="+labels_str,function(result){
           // console.log(result)
            $("#products-block").html(result);
            totalpage=$(".products").attr("pagenum");
            cpage=1;
            setpage();
            $(".product-compare-button").on("click",function(){

                if($(this).attr("add")==0){
                    addCompare($(this).attr("proId"),$(this).attr("proName"));
                    $(this).find(".action-add").addClass("action-toggle");
                    $(this).find(".action-remove").removeClass("action-toggle");
                    $(this).attr('add',1);
                    $(".compare-panel").show();
                }else{
                    removeCompare($(this).attr("proId"));
                    $(this).find(".action-remove").addClass("action-toggle");
                    $(this).find(".action-add").removeClass("action-toggle");
                    $(this).attr('add',0);
                }
            })
           // console.log($(".products").attr("pagenum"));
            //console.log("page="+totalpage);

         
        })
       
        
    }
    function addCompare(pro_id,pro_name){
        var content='<div class="compare-item" proId="'+pro_id+'">'
            +'<div class="compare-context">'+pro_name+'</div>'
            +'<div class="compare-close">'
             +'<img src="img/cross_w.png">'
            +'</div>'
        +'</div>';
        
        $(".compare-panel").append(content);
        $(".compare-close").on("click",function(){
            console.log(pro_name)
            
            $("#cp"+pro_id).find(".action-remove").addClass("action-toggle");
            $("#cp"+pro_id).find(".action-add").removeClass("action-toggle");
            $("#cp"+pro_id).attr('add',0);
            removeCompare(pro_id);
        })
        
    }

    function removeCompare(pro_id){
        var compareitems=$(".compare-panel").find('.compare-item');
        console.log(pro_id);
        for(var i=0;i<compareitems.length;i++){
            if($(compareitems[i]).attr("proId")==pro_id){
                $(compareitems[i]).remove();
            }
        }
        var compareitems=$(".compare-panel").find('.compare-item');
        if(compareitems.length==0){
            $(".compare-panel").hide();
        }

    }
    $(".product-compare-button").on("click",function(){

        if($(this).attr("add")==0){
            addCompare($(this).attr("proId"),$(this).attr("proName"));
            $(this).find(".action-add").addClass("action-toggle");
            $(this).find(".action-remove").removeClass("action-toggle");
            $(this).attr('add',1);
            $(".compare-panel").show();
        }else{
            removeCompare($(this).attr("proId"));
            $(this).find(".action-remove").addClass("action-toggle");
            $(this).find(".action-add").removeClass("action-toggle");
            $(this).attr('add',0);
        }
    })
    $(".compare-btn").on("click",function(){
        var items=$(".compare-panel").find(".compare-item");
        var ids=[];
        for(var i=0;i<items.length;i++){
            ids.push(parseInt($(items[i]).attr("proId")));
        }
       // $.get();
            window.location.href="compare.php?proj=mobilephones&ids="+JSON.stringify(ids)
        
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
                outstr = outstr + "<a href='javascript:void(0)' onclick='gotopage("+count+")'> next </a>";
            }
            else if(parseInt((cpage-1)/pagesize) == parseInt(totalpage/pagesize))///最后10页
            {
                outstr = outstr + "<a href='javascript:void(0)' onclick='gotopage("+(parseInt((cpage-1)/pagesize)*pagesize)+")'>previous</a>";
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
        document.getElementById("setpage").innerHTML = "<div id='setpage'>" + outstr + "<\/div>";
        outstr = "";
        //$("html,body").animate({scrollTop:0,500});
    }
    setpage();    //调用分页
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
    })
</script>

</html>
