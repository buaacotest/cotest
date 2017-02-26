<?php /* Smarty version 2.6.19, created on 2017-02-10 01:38:32
         compiled from products.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', 'products.tpl', 48, false),)), $this); ?>
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

    <title><?php echo $this->_tpl_vars['title']; ?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cotest.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/changelanguage.js"></script>
</head>
<body>
<?php 
    require("navigation.php");
     ?>
<div class="tool-tip"></div>
<div class="content-container">
    <div class="flip-container">

    </div>
    <div class="
    products-select-tab">
     <div class="products-head">
         <a href="<?php echo $this->_tpl_vars['upper']['link']; ?>
"><?php echo $this->_tpl_vars['upper']['name']; ?>
</a>>
         <?php echo $this->_tpl_vars['up']['name']; ?>

     </div>
        <ul class="nav nav-tabs pro-nav">
                <li role="presentation" class="proper-tab active" target="#products-panel" id="tab1"><a><?php echo $this->_tpl_vars['lang']['TestedSmartphones']; ?>
</a></li>
                <li role="presentation" class="proper-tab" target="#how-we-test-panel" id="tab2"><a><?php echo $this->_tpl_vars['lang']['HowWeTest']; ?>
</a></li>
               <!-- <li role="presentation" class="proper-tab" target="#review_panel" id="tab3"><a><?php echo $this->_tpl_vars['lang']['Review']; ?>
</a></li>-->

            </ul>

    </div>
    <div class="row" id="products-panel">
        <div class="product-container-panel" id="product-container-panel">
         <div class="products-header">
         <div class="products-title" style="overflow:hidden">

           <h3>&nbsp;<b><?php echo $this->_tpl_vars['productsNum']; ?>
  </b><?php echo ((is_array($_tmp=$this->_tpl_vars['up']['name'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
 &nbsp;&nbsp;
           <!--<span class="cur-page">1</span> / <?php echo $this->_tpl_vars['pageNum']; ?>
  <?php echo $this->_tpl_vars['lang']['pages']; ?>

           --></h3>
           <div id="highlights-panel" class="row">

           </div>

         </div>
         <div >
            <div class="products-sort">

              <div class="name"><?php echo $this->_tpl_vars['lang']['SortBy']; ?>
</div>
                <div class="btn-group">
                  <button type="button" id="cur-sort"class="btn btn-default dropdown-toggle sort-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php echo $this->_tpl_vars['lang']['MostRecentlyTested']; ?>
 <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" >
                    <?php if ($this->_tpl_vars['permission'] != -1): ?>
                    <li ><a class="dropdown-menu-item" name="score"href="#" onclick="javascript:sort(this)"><?php echo $this->_tpl_vars['lang']['HighestScore']; ?>
</a></li>
                    <?php endif; ?>
                    <li ><a class="dropdown-menu-item" name="priceUp" onclick="javascript:sort(this)" href="#"><?php echo $this->_tpl_vars['lang']['PriceLowToHigh']; ?>
</a></li>
                    <li><a onclick="javascript:sort(this)" class="dropdown-menu-item" name="priceDown"href="#"><?php echo $this->_tpl_vars['lang']['PriceHighToLow']; ?>
</a></li>
                    <li><a onclick="javascript:sort(this)" href="#"  class="dropdown-menu-item" name="time"><?php echo $this->_tpl_vars['lang']['MostRecentlyTested']; ?>
</a></li>
                  </ul>
                </div>
            </div>
            <div class="products-search">
                <input class="products-search-text"type="text" oninput="javascript:searchTextInput(this)" onfocus="javascript:searchTextFocus()" onblur="javascript:searchTextBlur()"></input>
                <div class="products-search-btn" onclick="javascript:search()">search</div>
                <ul class="keyword-panel"></ul>
            </div>
            </div>
            </div>
        <div class="products-container">

            <div id="products-block">

                <ul class="products" itemscope="" itemtype="http://schema.org/ItemList">


                    <meta itemprop="mainContentOfPage" content="true">
                     <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
                    <li >
                        <div class="product-listing">
                        <div class="product-thumb">
                              <a class="product-link" onclick="javascript:productLinkClick(this)"target="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
" >
 								<img class="product-listing__thumb-image" alt="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_name']; ?>
" src="data/<?php echo $this->_tpl_vars['project']; ?>
/picturesx/<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
_01x.jpg">

                          </div>
                            <span class="product-brand">
                              <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_manufacturer']; ?>

                            </span>
                            <br>
                            <div class="product-name">
                              <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_name']; ?>

                            </div>

                          </a>
                          <div class="product-price">
                            <div data-test="price-label"><?php echo $this->_tpl_vars['lang']['RefPrice']; ?>
 <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['price']; ?>
</div>

                          </div>


                            <div class="product-listing__tested-date">
                                <?php echo $this->_tpl_vars['lang']['TestedDate']; ?>
: <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_tested_date']; ?>

                            </div>
                            <?php if ($this->_tpl_vars['permission'] != -1): ?>
                            <div class="product-score">

                                 <div class="score-list">
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 1.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 1.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 2.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 2.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 3.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 3.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 4.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 4.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 5.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>
                                        <?php endif; ?>

                                       </div>


                              <div class="score">
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 1.5): ?>
                                              <?php echo $this->_tpl_vars['lang']['Verygood']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 1.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 2.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Good']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 2.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 3.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Average']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 3.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 4.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Sufficient']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 4.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 5.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Poor']; ?>

                                        <?php endif; ?>


                              / <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['score']; ?>
</div>
                            </div>
                            <?php endif; ?>
                            <div class="product-compare-button" onclick="javascript:productCompareOnClick(this)"id="cp<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
" proId="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
" proName="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_manufacturer']; ?>
 <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_name']; ?>
" add=0>
                              <button name="button" type="submit" class="action-remove action-toggle"><?php echo $this->_tpl_vars['lang']['RemoveFromCompare']; ?>
</button><button name="button" type="submit" class="action-add"><?php echo $this->_tpl_vars['lang']['AddToCompare']; ?>
</button>
                            </div>

                        </div>

                      </li>
                    <?php endfor; endif; ?>


                </ul>
            </div>

            <!-- lishijie -->
            <div id="setpage"></div>
        </div>
        </div>
        <div class="sidebar">
        <!--
          <button class="filter-btn">
            Filter
          </button>-->
          <h2 class="filter-title"><?php echo $this->_tpl_vars['lang']['Filters']; ?>
</h2>

          <button class="clear-btn" onclick="javascript:clearFilter()">
              <?php echo $this->_tpl_vars['lang']['ClearAll']; ?>

          </button>
          <div id="filter-all-options">
          </div>

        </div>

    </div>
    <!--
    <div id="review_panel" style="display:none">
      <div class="comments "></div>

    </div>
    -->
    <div id="how-we-test-panel" style="display: none;">





    </div>
    <?php if ($this->_tpl_vars['permission'] == -1): ?>
    <div class="alert-log-panel">
        <b><a href="login.php">Log in</a></b> or <b><a href="register.php">Sign up</a> </b>
        to see <b>2000</b> products tested in Europe
        <div class="alert-log-close" onclick="javascript:closeAlert()">
            <img src="img/cross_w.png"/>
        </div>
    </div>
    <?php endif; ?>
    <div class="compare-panel" >
        <div class="compare-toogle">
            <img src="img/down.png" />
        </div>
        <div class="compare-btn"><?php echo $this->_tpl_vars['lang']['Compare']; ?>
</div>
        <div class="compare-clear-btn" onclick="javascript:clearCompare()"><?php echo $this->_tpl_vars['lang']['Clear']; ?>
</div>
    </div>
</div>
<?php 
  require("footer.php");
   ?>
</div>


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
  $.get("data/<?php echo $this->_tpl_vars['project']; ?>
/howtotest/<?php echo $this->_tpl_vars['project']; ?>
.html",function(data){
    $("#how-we-test-panel").html(data)
  })
  $.get("data/<?php echo $this->_tpl_vars['project']; ?>
/highlights/<?php echo $this->_tpl_vars['project']; ?>
.html",function(data){
      $("#highlights-panel").html(data)
  })
</script>
<script type="text/javascript">
    var totalpage,pagesize,cpage,count,curcount,outstr;
    var compare_list=[];
    var compare_name_list=[];
    //初始化
    console.log(<?php echo $this->_tpl_vars['labels']; ?>
)
    //console.log(<?php echo $this->_tpl_vars['products']; ?>
)
     var cpage=1;
     var page=getPar("page");
     var sortType="time";
     var keyword="";
     var labels=[];
     var permission = '<?php echo $this->_tpl_vars['permission']; ?>
'
   //  var keyword=getPar("keyword")?getPar("keyword"):"";
    //    $(".products-search-text").val(keyword);
    // console.log(keyword)
    if(page)
        fetchComments('',$(".comments"),page);
    else{
        fetchComments('',$(".comments"),1);
    }
    cpage = 1;
    totalpage =<?php echo $this->_tpl_vars['pageNum']; ?>
;
    //console.log(totalpage);
    pagesize = 10;
    outstr = "";
    var labels_str="";
    loadoption(<?php echo $this->_tpl_vars['labels']; ?>
,permission)
    $(".compare-panel").hide();

    function init(){
      $.post("compareCart.php",{option:"show"},function(result){
          var compareList= eval("("+result+")");
            console.log(compareList)
            if(compareList)
                if(compareList.length!=0){

                  for(var key in compareList){
                  addCompare(key,compareList[key]);
              }

                $(".compare-panel").show();

            }
            setpage();    //调用分页
      })
    }
    init();
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
        console.log(get_par)
        return get_par;
    }


    function clickKeyword(item){
        $(".products-search-text").val($(item).text());
        console.log($(item).text())
      $(".keyword-panel").hide();
    }
    function search(){
         if($("#highlights-panel").html()!="")
                $("#highlights-panel").html("");
          keyword=$(".products-search-text").val();
          clearFilter();
          cpage=1;
          filter();
    }
    function searchTextInput(searchText){
      keyword=$(searchText).val();
      $.post("search.php",{keyword:keyword},function(result){
        result=eval("("+result+")")
          var content="";
          var n=result.length>10?10:result.length
          for(var i=0;i<n;i++){
            content+="<li class='keyword-item' onclick='javascript:clickKeyword(this)'>"+result[i]+"</li>";
          }
          $(".keyword-panel").html(content);
      })
    }
    function searchTextFocus(){
        $(".keyword-panel").show();
    }
    function searchTextBlur(){
      setTimeout(function(){
        if( ! $(".keyword-panel").is(":hover"))
          $(".keyword-panel").hide();
      },100)

    }
    function loadoption(labels,permission){
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
            console.log(permission)
            if(option_name=="total test result" && permission==-1){

              continue;
            }
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
                    option_text+='<div class="range-select">from<input class="range-from" type="text"/>to<input class="range-to" type="text"/>'+option_unit+'</div><button class="range-confirm"><?php echo $this->_tpl_vars['lang']['Confirm']; ?>
</button>'
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

    function clearFilter(){
        var checkboxs=$("#filter-all-options").find(".checkbox");
       $(".range-from").val("");
       $(".range-to").val("");
       $(checkboxs).attr("class","checkbox");
       $(checkboxs).attr("checked",null);
         $(checkboxs).css("background","none");
         filter();
    }
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
    function sort(sortmenu){
        var sortname=$(sortmenu).attr("name");
        if(sortname){
            sortType=sortname;
            filter();

        }

    }

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
    function closeAlert(){
      $(".alert-log-panel").hide()
    }
    function showAlert(){
      $(".alert-log-panel").show()
    }
    function filter(){
        if(permission == -1){
          showAlert()
          return;
        }
        labels=[]
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
        var sort_str=(sortType!="")?("&sort="+sortType):"";
        //console.log(labels_str);
            if($("#highlights-panel").html()!="")
                $("#highlights-panel").html("");
          var query_str="products.php?&proj=<?php echo $this->_tpl_vars['project']; ?>
&page="+cpage+"&labels="+labels_str+sort_str;
          if(keyword!="")
              query_str+="&keyword="+keyword

          var sortText= ""
          switch (sortType)
          {
          case "score":
            sortText= "<?php echo $this->_tpl_vars['lang']['HighestScore']; ?>
";
            break;
          case "priceUp":
            sortText= "<?php echo $this->_tpl_vars['lang']['PriceLowToHigh']; ?>
";
            break;
          case "priceDown":
            sortText= "<?php echo $this->_tpl_vars['lang']['PriceHighToLow']; ?>
"
            break;
          case "time":
            sortText= "<?php echo $this->_tpl_vars['lang']['MostRecentlyTested']; ?>
";
            break;
          }
        $.get(query_str,function(result){
          console.log(query_str)
           // console.log(result)
            $("#product-container-panel").html(result);
            totalpage=$(".products").attr("pagenum");

            setpage();
            $(window).scrollTop(0);

              $("#cur-sort").html(sortText+'<span class="caret"></span>');


        })


    }
    function closeCompareClick(pro_id){

            removeCompare(pro_id);
    }
    function clearCompare(){
        $.post("compareCart.php",{option:"removeAll"},function(result){

              for(var i=0;i<compare_list.length;i++){
                     removeCompare(compare_list[i]);

              }


        });
    }
    function addCompare(pro_id,pro_name){
      if(compare_list.length>=5){
                 alert("too much compared items.");
      }else{
       // alert("addcompare")
        var content='<div class="compare-item" proName="'+pro_name+'" proId="'+pro_id+'">'
            +'<div class="compare-context">'+pro_name+'</div>'
            +'<div class="compare-close" onclick="javascript:closeCompareClick('+pro_id+')">'
             +'<img src="img/cross_w.png">'
            +'</div>'
        +'</div>';
        $("#cp"+pro_id).find(".action-add").addClass("action-toggle");
        $("#cp"+pro_id).find(".action-remove").removeClass("action-toggle");
        $("#cp"+pro_id).attr('add',1);
        $(".compare-panel").show();
        if(compare_list.indexOf(pro_id)==-1 ){
            compare_list.push(pro_id);
            compare_name_list.push(pro_name);
            console.log(pro_id);
            $(".compare-panel").append(content);

        }
      }


    }

    function removeCompare(pro_id){
        $("#cp"+pro_id).find(".action-remove").addClass("action-toggle");
            $("#cp"+pro_id).find(".action-add").removeClass("action-toggle");
            $("#cp"+pro_id).attr('add',0);
        console.log(pro_id);
        console.log(compare_list);
        var id=compare_list.indexOf(pro_id.toString());
        var removeItem={}

        removeItem[compare_list[id]]=compare_name_list[id]
        $.post("compareCart.php",{option:"remove",items:removeItem},function(result){
          console.log(removeItem)
            console.log(result)
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

            $.post("compareCart.php",{option:"show"},function(res){
              console.log(res);
            })
            compare_list.splice(id,1)
            compare_name_list.splice(id,1);
            console.log(compare_list);
        });

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
    $(".compare-btn").on("click",function(){
        var items=$(".compare-panel").find(".compare-item");
        var ids={};
        for(var i=0;i<items.length;i++){
          var id=$(items[i]).attr("proId").toString();
            ids[id]=$(items[i]).attr("proName");
        }
        $.post("compareCart.php",{option:"add",items:ids},function(result){
                console.log(result);
                window.location.href="compare.php?proj="+'<?php echo $this->_tpl_vars['project']; ?>
'

        });
        console.log(ids);
       // $.get();

    })
    $(".compare-toogle").on("click",function(){
        if($(this).attr("toogle")==1){
            $(".compare-panel").animate({bottom:"0px"});
            $(this).attr("toogle",0);
            $(this).find("img").attr("src","img/down.png");
        }else{
            $(".compare-panel").animate({bottom:"-200px"});
            $(this).attr("toogle",1);
            $(this).find("img").attr("src","img/up.png");
        }

    })

    function gotopage(target)
    {
        cpage = target;        //把页面计数定位到第几页
        setpage();
        filter(); //调用显示页面函数显示第几页,这个功能是用在页面内容用ajax载入的情况
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
    }
    function productLinkClick(productLink){
            var id=$(productLink).attr("target");
            window.location.href="details.php?proj=<?php echo $this->_tpl_vars['project']; ?>
&id="+id;
    }
    function productCompareOnClick(compare_btn){
        //alert("xxxxxx");
         if($(compare_btn).attr("add")==0){
            addCompare($(compare_btn).attr("proId"),$(compare_btn).attr("proName"));

        }else{
            removeCompare($(compare_btn).attr("proId"));
          //  console.log($(".compare-panel").css("display"))
        }
    }



  //  var local_url = document.location.href;

    //var compare_ids=getPar("ids");
    //var compare_names=getPar("names");

</script>
<script type="text/javascript">
    $(document).ready(function(){

        $(".logout-btn").on("click",function  () {
        // body...
        $.get("logout.php",function(){
            location.reload();
        });
      })
    })
</script>

</html>