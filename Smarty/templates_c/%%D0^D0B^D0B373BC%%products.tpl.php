<?php /* Smarty version 2.6.19, created on 2016-03-14 12:39:53
         compiled from products.tpl */ ?>

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

    <title><?php echo $this->_tpl_vars['title']; ?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cotest.css">
    <script src="js/bootstrap.min.js"></script>

</head>

<body>
<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container main-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">COTEST</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
            <!--
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../navbar/">Default</a></li>
              <li class="active"><a href="./">Static top <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>-->
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="content-container">
    <div class="flip-container">

    </div>
    <div class="
    products-select-tab">
     <div class="products-head">
         <a href="">Electronics</a>
         Smartphones
     </div>
        <ul class="nav nav-tabs pro-nav">
                <li role="presentation" class="proper-tab active" target="#product_panel" id="tab1"><a>All smartphones</a></li>
                <li role="presentation" class="proper-tab" target="#panel2" id="tab2"><a>How we test</a></li>

            </ul>

    </div>
    <div class="row" id="#product_panel">
        <div class="sidebar">
          <button class="filter-btn">
            Filter
          </button>
          <div id="filter-all-options">
              
          </div>

        </div>
        <div class="products-container">
            <div class="products-sort">
            
              <div class="name">Sort by</div>
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle sort-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Most recently tested <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Highest score</a></li>
                    <li><a href="#">Price(low to high)</a></li>
                    <li><a href="#">Price(high to low)</a></li>
                    <li><a href="#">Most-recently launched</a></li>
                  </ul>
                </div>
            </div>
            <ul class="products" itemscope="" itemtype="http://schema.org/ItemList">
                <p> &nbsp;<?php echo $this->_tpl_vars['productsNum']; ?>
 results</p>
               
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
                          <a href="details.php?proj=<?php echo $this->_tpl_vars['project']; ?>
&id=<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
">
                            <img class="product-listing__thumb-image" alt="Hisense LTDN50K321UWTSEU" src="http://images.pricerunner.com/product/225x169/1484843660/Hisense-LTDN50K321UWTSEU.jpg">
                          </a>
                      </div>
                      <a href="details.php?proj=<?php echo $this->_tpl_vars['project']; ?>
&id=<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
">
                        
                        <span class="product-name">
                          <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_name']; ?>

                        </span>
                        
                      </a>
                      <div class="product-price">
                        <div data-test="price-label">Today's best price:</div>
                              <div data-test="price-amount">£499.00</div>
                      </div>
            

                        <div class="product-listing__tested-date">
                          Tested date: <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_tested_date']; ?>

                        </div>
                        <div class="product-score">
                          <div class="score-list">
                            <div class="star"></div>
                            <div class="star"></div>
                            <div class="star"></div>
                            <div class="star"></div>
                            <div class="star-b"></div>

                          </div>
                          <div class="score"><?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['score']; ?>
</div>
                        </div>
                        <div class="product-compare-button">
                          <button name="button" type="submit" class="action-remove action-toggle">Remove from compare</button><button name="button" type="submit" class="action-add">Add to compare</button>
                        </div>

                    </div>

                  </li>
                <?php endfor; endif; ?>
                

            </ul>
            <div class="row">
                <ul class="pagenator">
                    <li class="pagebtn active" value="1">1</li>
                    <li class="pagebtn" value="2">2</li>
                </ul>

            </div>
            <!-- lishijie -->
            <div id="setpage"></div>
        </div>

    </div>
</div>
</div>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/cotest.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->

<!-- lishijie -->
{*<script type="text/javascript">*}
    {*$(document).ready(function(){*}
        {*var pgn=<?php echo $this->_tpl_vars['pageNum']; ?>
;*}
            {*if(pgn>2){*}
                {*if(pgn<=10){*}
                    {*for(var i=3;i<=pgn;i++){*}
                    {*//  alert(i);*}
                    {*//str=<li class="pagebtn" value="2">2</li>*}
                     {*var str="<li class=\"pagebtn\" value=\""+i+"\">"+i+"</li>";*}
                    {*$("ul.pagenator").append(str);*}
                 {*}*}
                {*}*}
                {*else{*}
                    {*for(var i=3;i<=10;i++){*}
                        {*var str="<li class=\"pagebtn\" value=\""+i+"\">"+i+"</li>";*}
                         {*$("ul.pagenator").append(str);*}
                        {*}*}
                    {*}*}
                {*}*}
            {*});*}
    }
    }
{*</script>*}

<!-- lishijie -->
<script type="text/javascript">
    <!--
    var totalpage,pagesize,cpage,count,curcount,outstr;
    //初始化
    console.log(<?php echo $this->_tpl_vars['labels']; ?>
)
    console.log(<?php echo $this->_tpl_vars['products']; ?>
)
    cpage = 1;
    totalpage =<?php echo $this->_tpl_vars['pageNum']; ?>
;
    console.log(totalpage);
    pagesize = 10;
    outstr = "";
    var labels_str="";
    loadoption(<?php echo $this->_tpl_vars['labels']; ?>
)
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
             option_text+="</div></div></div>"
          

        }
        console.log(option_text)
          $("#filter-all-options").html(option_text);
    }
    $(".filter-btn").on("click",function(){
        filter();
    })
    function filter(){
        var labels=[]
        var all_options=$("#filter-all-options").find(".facet-checkbox");
        for(var i=0;i<all_options.length;i++){
            var name=$(all_options[i]).attr("name");
            var type=$(all_options[i]).attr("type");
            var active_options=$(all_options[i]).find(".active");
            if(active_options.length==0) continue;
            var values=[]
            for(var j=0;j<active_options.length;j++){
                if(type=="string")
                    values.push($(active_options[j]).attr("name"));
                else{
                   
                    values.push(eval("("+$(active_options[j]).attr("name")+")"))
                }
            }
            labels.push({"name":name,"type":type,"value":values});

        }
        console.log(JSON.stringify(labels));
        labels_str=JSON.stringify(labels);
        console.log(labels_str);
        $.get("products.php?page=1&proj=<?php echo $this->_tpl_vars['project']; ?>
&labels="+labels_str,function(result){
            console.log(result)
            $(".products").html(result);
         
        })
       
        
    }

    function reloadpage(target){
        var query_str="";
        if(labels_str==""){
            query_str="products.php?page="+target+"&proj=<?php echo $this->_tpl_vars['project']; ?>
"
        }else{
            query_str="products.php?page="+target+"&proj=<?php echo $this->_tpl_vars['project']; ?>
&labels="+labels_str;
        }

        $.get(query_str,function(result){
            $(".products").html(result);
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
        totalpage =<?php echo $this->_tpl_vars['pageNum']; ?>
;
        console.log("pageNum="+totalpage);
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
        document.getElementById("setpage").innerHTML = "<div id='setpage'><span id='info'>共"+totalpage+"页|第"+cpage+"页<\/span>" + outstr + "<\/div>";
        outstr = "";
    }
    setpage();    //调用分页
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".pagebtn").on("click",function(){
            var value=$(this).attr("value");
            console.log(value)
            $(".pagebtn").attr("class","pagebtn");
            $(this).attr("class","pagebtn active");
            $.get("products.php?page="+value+"&proj=<?php echo $this->_tpl_vars['project']; ?>
",function(result){
                $(".products").html(result);
            })
        })
    })
</script>


</body>
</html>