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
    <div class="crumbs">
      <a href="index.php"><div class="crumbs-item">Tests</a> <sapn>></sapn></div>
      <a href=""><div class="crumbs-item">Electronics</a> <sapn>></sapn></div>
      <a href="products.php?proj=mobilephones"><div class="crumbs-item">Smartphones</a> <sapn>></sapn></div>
      <div class="crumbs-item">Comparison</div>

    </div>
    <div class="compare-title">3 smartphones in comparison</div>
    <table class="compare-table">
        <thead class="product-head">
          

          <tr class="product-images">
            <th class="edit-comparison" scope="row" rowspan="2">
       
                <button class="add-compare-btn">+ add more to compare</button>
         
            </th>
             <{section name=n loop=$products}>
              <th data-product-id="10344" scope="col">
                <div class="product-image">
                <a class="product-link" target="<{$products[n].id}>">
                  <img class="comparison-product-thumbnail" alt="LG 55EF950V" src="http://dam.which.co.uk.s3-website-eu-west-1.amazonaws.com/3f5e2ab1-974e-4f6b-8b32-3c3787245769.jpg">
                </a>
                <div class="close" target="<{$products[n].id}>"></div>
              </div>

              </th>
              <{/section}>
          </tr>

          <tr class="product-names">
            <{section name=n loop=$products}>
              <th class="product-name"><{$products[n].name}></th>
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

              <td data-product-id="10344" class="behind-paywall">
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

          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Test results
              </h2>
            </th>
                <{section name=m loop=$products}>
                <td class="table-cell-wrapper" data-product-id="10344">
                  <div class="table-cell-wrapper-inner">
                    
                  </div>
                </td>
                <{/section}>
          </tr>
           <{section name=n loop=$products[0].evaluations[0].id_parent}>
            <tr class="test-results" data-category="tests">
              <th class="behind-paywall">
                <div class="compare-th">
                <{$products[0].evaluations[0].id_parent[n].name}>
                </div>
                
              </th>
              <{section name=m loop=$products}>
                <td data-product-id="10344" class="behind-paywall">

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
          <{/section}>
            


          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Features
              </h2>
            </th>
                <{section name=m loop=$products}>
                <td class="table-cell-wrapper" data-product-id="10344">
                  <div class="table-cell-wrapper-inner">
                    
                  </div>
                </td>
                <{/section}>
          </tr>
           <{section name=n loop=$products[0].property[0].id_propertygroup}>
            <tr class="test-results" data-category="tests">
              <th class="behind-paywall">
                <div class="compare-th">
                <{$products[0].property[0].id_propertygroup[n].name}>
                </div>
               
              </th>
              <{section name=m loop=$products}>
                <td data-product-id="10344" class="behind-paywall">
              
                          <{if $products[m].property[0].id_propertygroup[n].value eq 'Yes'}>
                            <img class="proper-signal"src="img/check2.png">
                            <{elseif $products[m].property[0].id_propertygroup[n].value eq 'No'}>
                            <img class="proper-signal"src="img/cross.png">
                            <{else}>
                            <{$products[m].property[0].id_propertygroup[n].value}> 
                            <{$products[m].property[0].id_propertygroup[n].unit}>
                          <{/if}>
                </td>

              <{/section}>
            </tr>
          <{/section}>


          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Pros
              </h2>
            </th>

                <{section name=m loop=$products}>
                <td class="table-cell-wrapper" data-product-id="10344">
                 
                    <{section name=n loop=$products[m].Pros}>
                    <p><{$products[m].Pros[n]}></p>
                    <{/section}>
                  
                </td>
                <{/section}>
          </tr>
          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Cons
              </h2>
            </th>
                <{section name=m loop=$products}>
                <td class="table-cell-wrapper" data-product-id="10344">
                 
                    <{section name=n loop=$products[m].Cons}>
                    <p><{$products[m].Cons[n]}></p>
                    <{/section}>
                  
                </td>
                <{/section}>
          </tr>
           
        </tbody>
      </table>
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
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
<script type="text/javascript" src="js/cotest.js"></script>
<script type="text/javascript" src="js/review.js"></script>
<script type="text/javascript">
//解析get参数

var local_url = document.location.href; 
var compare_list=getPar("ids");
//关闭响应事件
$(".compare-title").text(compare_list.length+" smartphones in comparison")
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
    $(".compare-title").text(compare_list.length+"  smartphones in comparison")

})
$(".add-compare-btn").on("click",function(){
  var name_list=[];
  var names=$(".product-name");
  for (var i=0;i<names.length;i++){
    name_list.push($(names[i]).text());
    console.log($(names[i]).text())
  }
  var url="products.php?proj=mobilephones&ids="+JSON.stringify(compare_list)+"&names="+JSON.stringify(name_list);

  window.location.href=url;  
})
$(".product-link").on("click",function(){
  var id=$(this).attr("target")
   var name_list=[];
  var names=$(".product-name");
  for (var i=0;i<names.length;i++){
    name_list.push($(names[i]).text());
    console.log($(names[i]).text())
  }
  var url="details.php?proj=mobilephones&ids="+JSON.stringify(compare_list)+"&names="+JSON.stringify(name_list)+"&id="+id; 
 window.location.href=url; 
})
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
        $(".product-head").css({"position":"fixed","top":nav_height});
   
       // $(".product-head").css({"width":top_width});
      }else if(scroH<topH-nav_height){
        $(".product-head").css({"position":"static"});

      }
    })
  })
</script>
</html>
