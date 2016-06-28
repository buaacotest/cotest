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
    <link rel="stylesheet" type="text/css" href="css/cotest_m.css">
    <link rel="stylesheet" type="text/css" href="css/compare_m.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/changelanguage.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<!-- Static navbar -->

<body>

<{php}>
    require("navigation.php");
    <{/php}>
<div class="content-container">
<!--
    <div class="crumbs">
      <a><div class="crumbs-item"><{$lang.Tests}></div></a> >
      <a><div class="crumbs-item"><{$lang.Electronics}></div></a> > 
      <div class="crumbs-item"><{$lang.Smartphones}></div>

    </div>
    -->
  <!--
    <div class="crumbs">
      <a href="index.php"><div class="crumbs-item"><{$lang.Tests}></a> <sapn>></sapn></div>
      <a href="<{$directory.upper.link}>"><div class="crumbs-item"><{$directory.upper.name}></a> <sapn>></sapn></div>
      <a href="<{$directory.up.link}>"><div class="crumbs-item"><{$directory.up.name}></a> <sapn>></sapn></div>
      <div class="crumbs-item">Comparison</div>

    </div>
    <div class="compare-title"><{$count}> <{$directory.up.name}> in comparison</div>
    -->
    <table class="compare-table">
        <thead class="product-head">
          

          <tr class="product-images">
            <th class="edit-comparison" scope="row" rowspan="2">
       
                <button class="add-compare-btn" title="return to smartphones">+ add more to compare</button>
         
            </th>
             <{section name=n loop=$products}>
              <th data-product-id="10344" scope="col" class="compare-td compare-td-<{$smarty.section.n.iteration}>" >
                <div class="product-image">
                <a class="product-link product-thumb" target="<{$products[n].id}>">
                  <img class="comparison-product-thumbnail" alt="<{$products[n].name}>"  src="data/<{$project}>/picturesx/<{$products[n].id}>_01x.jpg">
                </a>
                <div class="close" target="<{$products[n].id}>"></div>
              </div>

              </th>
              <{/section}>
          </tr>

          <tr class="product-names">
            <{section name=n loop=$products}>
              <th  class="product-name compare-td compare-td-<{$smarty.section.n.iteration}>" ><{$products[n].manufacturer}> <{$products[n].name}></th>
            <{/section}>

          </tr>
        </thead>

        <tbody>
          <tr class="score">
            <th scope="row">
              <div class="compare-th">
                COTEST score
              </div>
            </th>
             <{section name=n loop=$products}>

              <td data-product-id="10344" class="compare-td compare-td-<{$smarty.section.n.iteration}>" >
                 <div class="score-list">
                    <{if $products[n].evaluations[0].value <=1.5}>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <{/if}>
                    <{if $products[n].evaluations[0].value >1.5 && $products[n].evaluations[0].value <= 2.5}>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <{/if}>
                    <{if $products[n].evaluations[0].value >2.5 && $products[n].evaluations[0].value <= 3.5}>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <{/if}>
                    <{if $products[n].evaluations[0].value >3.5 && $products[n].evaluations[0].value <= 4.5}>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <{/if}>
                    <{if $products[n].evaluations[0].value >4.5 && $products[n].evaluations[0].value <= 5.5}>
                                    <div class="star"></div>


                    <{/if}>
                                 
                   </div>
                
                <div class="score-text"><{$products[n].evaluations[0].value}></div>
             
              </td>
              <{/section}>


          </tr>

           <!-- REMOVED PENDING RE-INTEGRATION OF REVOO
           <tr class="reevoo">
            <th scope="row">
              <label><input type="checkbox"/><span class="inner-label">Reevoo score</span></label>
            </th>


          </tr> -->

          <tr class="heading" data-category="tests-heading">
            <th>
              <h2>Test results
              <img src="img/down_b.png">
              </h2>

            </th>
                <{section name=m loop=$products}>
                <td  class="compare-td compare-td-<{$smarty.section.m.iteration}>"  class="table-cell-wrapper" data-product-id="10344">
                  <div class="table-cell-wrapper-inner">
                    
                  </div>
                </td>
                <{/section}>
          </tr>
           <{section name=n loop=$products[0].evaluations[0].id_parent}>
            <tr class="test-results"  data-category="tests">
              <th class="behind-paywall">
                <div class="compare-th">
                <{$products[0].evaluations[0].id_parent[n].name}>
                </div>
                
              </th>
              <{section name=m loop=$products}>
                <td data-product-id="10344"  class="compare-td compare-td-<{$smarty.section.m.iteration}>" >

                        <div class="score-list">
                                        <{if $products[m].evaluations[0].id_parent[n].value <=1.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $products[m].evaluations[0].id_parent[n].value >1.5 && $products[m].evaluations[0].id_parent[n].value <= 2.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $products[m].evaluations[0].id_parent[n].value >2.5 && $products[m].evaluations[0].id_parent[n].value <= 3.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $products[m].evaluations[0].id_parent[n].value>3.5 && $products[m].evaluations[0].id_parent[n].value <= 4.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $products[m].evaluations[0].id_parent[n].value >4.5 && $products[m].evaluations[0].id_parent[n].value <= 5.5}>
                                                        <div class="star"></div>


                                        <{/if}>
                                                     
                   </div>
                  <{$products[m].evaluations[0].id_parent[n].value}>
                </td>
              <{/section}>
            </tr>
             <{section name=p loop=$products[0].evaluations[0].id_parent[n].id_parent}>
                <tr class="test-results" data-category="tests">
                  <th class="behind-paywall">
                    <div class="compare-th">
                    <{$products[0].evaluations[0].id_parent[n].id_parent[p].name}>
                    </div>
                    
                  </th>
                  <{section name=m loop=$products}>
                    <td data-product-id="10344"  class="compare-td compare-td-<{$smarty.section.m.iteration}>" >

                            <div class="score-list">
                                            <{if $products[m].evaluations[0].id_parent[n].id_parent[p].value <=1.5}>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>

                                            <{/if}>
                                            <{if $products[m].evaluations[0].id_parent[n].id_parent[p].value >1.5 && $products[m].evaluations[0].id_parent[n].id_parent[p].value <= 2.5}>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>

                                            <{/if}>
                                            <{if $products[m].evaluations[0].id_parent[n].id_parent[p].value >2.5 && $products[m].evaluations[0].id_parent[n].id_parent[p].value <= 3.5}>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>

                                            <{/if}>
                                            <{if $products[m].evaluations[0].id_parent[n].id_parent[p].value>3.5 && $products[m].evaluations[0].id_parent[n].id_parent[p].value <= 4.5}>
                                                            <div class="star"></div>
                                                            <div class="star"></div>

                                            <{/if}>
                                            <{if $products[m].evaluations[0].id_parent[n].id_parent[p].value >4.5 && $products[m].evaluations[0].id_parent[n].id_parent[p].value <= 5.5}>
                                                            <div class="star"></div>


                                            <{/if}>
                                                         
                       </div>
                      <{$products[m].evaluations[0].id_parent[n].id_parent[p].value}>
                    </td>
                  <{/section}>
                </tr>
             <{/section}>
          <{/section}>
            


          <tr class="heading" data-category="tests-heading">
            <th>
              <h2>Measurements
              <img src="img/down_b.png">
              </h2>
            </th>
                <{section name=m loop=$products}>
                <td  class="compare-td compare-td-<{$smarty.section.m.iteration}>"  data-product-id="10344">
                  <div class="table-cell-wrapper-inner">
                    
                  </div>
                </td>
                <{/section}>
          </tr>
          <{section name=k loop=$products[0].property}>
            <tr class="subheading" data-category="tests-heading">
            <th>
              <h3><{$products[0].property[k].name}>
              <img src="img/down_b.png">
              </h3>
            </th>
                <{section name=m loop=$products}>
                <td  class="compare-td compare-td-<{$smarty.section.m.iteration}>"  data-product-id="10344">
                  <div class="table-cell-wrapper-inner">
                    
                  </div>
                </td>
                <{/section}>
            </tr>
           <{section name=n loop=$products[0].property[k].id_propertygroup}>
            <tr class="test-results" data-category="tests">
              <th class="behind-paywall">
                <div class="compare-th">
                <{$products[0].property[k].id_propertygroup[n].name}>
                </div>
               
              </th>
              <{section name=m loop=$products}>
                <td data-product-id="10344"  class="compare-td compare-td-<{$smarty.section.m.iteration}>" >
              
                          <{if $products[m].property[k].id_propertygroup[n].value == "Yes"}>
                            <img class="proper-signal"src="img/check2.png">
                            <{elseif $products[m].property[k].id_propertygroup[n].value == "No"}>
                            <img class="proper-signal"src="img/cross.png">
                            <{else}>
                            <{$products[m].property[k].id_propertygroup[n].value}> 
                            <{$products[m].property[k].id_propertygroup[n].unit}>
                          <{/if}>
                </td>

              <{/section}>
            </tr>
          <{/section}>
          <{/section}>


          <tr class="heading" data-category="tests-heading">
            <th>
              <h2>Pros
              </h2>
            </th>

                <{section name=m loop=$products}>
                <td  class="compare-td compare-td-<{$smarty.section.m.iteration}>"  data-product-id="10344">
                 
                    <{section name=n loop=$products[m].Pros}>
                    <p><{$products[m].Pros[n]}></p>
                    <{/section}>
                  
                </td>
                <{/section}>
          </tr>
          <tr class="heading" data-category="tests-heading">
            <th>
              <h2>Cons
              </h2>
            </th>
                <{section name=m loop=$products}>
                <td  class="compare-td compare-td-<{$smarty.section.m.iteration}>"  data-product-id="10344">
                 
                    <{section name=n loop=$products[m].Cons}>
                    <p><{$products[m].Cons[n]}></p>
                    <{/section}>
                  
                </td>
                <{/section}>
          </tr>
           
        </tbody>
      </table>
</div>
<div class="selector">
  <div class="pre selector-inactive" name="pre" onclick="javascript:showCompareItem(this)"><{$lang.Pre}></div>
  <div class="next" name="next" onclick="javascript:showCompareItem(this)"><{$lang.Next}></div>
</div>
</body>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
<script type="text/javascript" src="js/cotest.js"></script>
<script type="text/javascript" src="js/review.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".compare-td-1").addClass("compare-td-show");
    console.log("hehe")
  })
</script>
<script type="text/javascript">
//解析get参数

var local_url = document.location.href; 
var compare_list=getPar("ids");
var id=0;
var ids=[]
for(var i=0;i<compare_list.length;i++){
  ids.push(i+1);
}
//关闭响应事件
$(".compare-title").text(compare_list.length+" <{$directory.up.name}> in comparison".toLowerCase())
//显示第一个产品

//toggle
$(".subheading").on("click",function(){
     if($(this).attr('toggle')=='1'){
         for(var i=$(this).index()+1;i<$(this).parent().find("tr").length;i++){
          if($(this).parent().find("tr").eq(i).hasClass('heading') || $(this).parent().find("tr").eq(i).hasClass('subheading')) 
              break;
          $(this).parent().find("tr").eq(i).removeClass("subheading-hide");
        }
          $(this).attr("toggle","0");
          $(this).find("img").removeClass("heading-toggle");
      }
      else{
        for(var i=$(this).index()+1;i<$(this).parent().find("tr").length;i++){
          if($(this).parent().find("tr").eq(i).hasClass('heading') || $(this).parent().find("tr").eq(i).hasClass('subheading'))
              break;
          $(this).parent().find("tr").eq(i).addClass("subheading-hide");
        }
          $(this).attr("toggle","1");
          $(this).find("img").addClass("heading-toggle");

      }
})

$(".heading").on("click",function(){

      if($(this).attr('toggle')=='1'){
         for(var i=$(this).index()+1;i<$(this).parent().find("tr").length;i++){
          if($(this).parent().find("tr").eq(i).hasClass('heading'))
              break;
          $(this).parent().find("tr").eq(i).removeClass("heading-hide");
        }
          $(this).attr("toggle","0")
          $(this).find("img").removeClass("heading-toggle");
      }
      else{
        for(var i=$(this).index()+1;i<$(this).parent().find("tr").length;i++){
          if($(this).parent().find("tr").eq(i).hasClass('heading'))
              break;
          $(this).parent().find("tr").eq(i).addClass("heading-hide");
        }
          $(this).attr("toggle","1");
          $(this).find("img").addClass("heading-toggle");

      }

})

  // $("td:eq(2)").hide();   
$(".product-image").find(".close").on("click",function(){

    var index=$(this).parent().parent().index();
    console.log(index);
    var trs=$(".compare-table").find("tbody").find("tr");
    $(".product-images").children().eq(index).remove();
    $(".product-names").children().eq(index-1).remove();
    for(var i=0;i<trs.length;i++){
      $(trs[i]).children().eq(index).remove();
    }
    compare_list.splice(index-1,1);
    ids.splice(index-1,1);
    $(".compare-title").text(compare_list.length+"  <{$directory.up.name}> in comparison".toLowerCase());
    if(compare_list.length==0){
        $(".pre").addClass("selector-inactive");
        $(".next").addClass("selector-inactive");
    } 
    else if(index<=compare_list.length){
        $(".compare-td").hide();
        $(".compare-td-"+(ids[index-1])).show();
        if(index==1&&compare_list.length==1){
          $(".pre").addClass("selector-inactive");
          $(".next").addClass("selector-inactive");
        }
       id=index-1;
        
    }else{
        $(".compare-td").hide();
        $(".compare-td-"+(ids[index-2])).show();
        if(index==1&&compare_list.length==1){
          $(".pre").addClass("selector-inactive");
          $(".next").addClass("selector-inactive");
        }

        
      id=index-2;
    }

})

$(".add-compare-btn").on("click",function(){
  var name_list=[];
  var names=$(".product-name");
  for (var i=0;i<names.length;i++){
    name_list.push($(names[i]).text());
    console.log($(names[i]).text())
  }
  var url="products.php?proj=<{$project}>&ids="+JSON.stringify(compare_list)+"&names="+JSON.stringify(name_list);

  window.location.href=url;  
})
$(".product-link").on("click",function(){
  var id=$(this).attr("target")
  var names=$(".product-name");
  for (var i=0;i<names.length;i++){
    name_list.push($(names[i]).text());
    console.log($(names[i]).text())
  }
  var url="details.php?proj=<{$project}>&ids="+JSON.stringify(compare_list)+"&names="+JSON.stringify(name_list)+"&id="+id;
 window.location.href=url; 
})

//选择显示哪个产品
$(".compare-td").hide();
$(".compare-td-1").show();
function showCompareItem(selector){
  if($(selector).attr("name")=="pre"){
      if(id>0){
        id-=1;
        $(".compare-td").hide();
        $(".compare-td-"+ids[id]).show();
      }
  }
   if($(selector).attr("name")=="next"){
      if(id<compare_list.length-1){
        id+=1;
        $(".compare-td").hide();
        $(".compare-td-"+ids[id]).show();
      }
  }
  if(id==0){
    $(".pre").addClass("selector-inactive")
  }else{
    $(".pre").removeClass("selector-inactive")
  }
   if(id==compare_list.length-1){
    $(".next").addClass("selector-inactive")
  }else{
    $(".next").removeClass("selector-inactive")
  }
}


  $(function(){
  //获取要定位元素距离浏览器顶部的距离
    var topH = $(".product-head").offset().top;
    var top_width=$(".product-head").width();
    console.log(topH)
    var nav_height=60;
    //滚动条事件
    $(window).scroll(function(){
      //获取滚动条的滑动距离
      var scroH = $(this).scrollTop();
      //滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
      if(scroH>=topH-nav_height){
        $(".product-head").css({"position":"fixed","top":nav_height,"width":"100%"});
        $(".product-thumb").hide();
       // $(".product-head").css({"width":top_width});
      }else if(scroH<topH-nav_height){
        $(".product-head").css({"position":"static"});
        $(".product-thumb").show();

      }
    })
  })
</script>
</html>
