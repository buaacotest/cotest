<?php /* Smarty version 2.6.19, created on 2017-03-26 08:59:39
         compiled from press.tpl */ ?>
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
    <link rel="stylesheet" type="text/css" href="css/press.css">
    <script src="js/changelanguage.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<!-- Static navbar -->

<body>
<?php 
    require("navigation.php");
     ?>
<div class="container main-container review-container">
  <div class="sidebar press-side">
    <div class="facet facet-checkbox" name="total test result" type="range">
      <div class="heading-filter-options">
        <h3><span class="facet-category-heading icon icon-0394"></span>Section</h3>
      </div>
      <div class="cont-filter-options toggle-panel">
        <div class="filter-options">
          <label>
            <span class="checkbox" name="">
              <input class="filter-option" type="checkbox">
            </span>
            <span class="inner-label">Electrics <span class="count"> (11) </span>
            </span>
          </label>
        </div>
      </div>
      <div class="cont-filter-options toggle-panel">
        <div class="filter-options">
          <label>
            <span class="checkbox" name="" >
              <input class="filter-option" type="checkbox">
            </span>
            <span class="inner-label">Babies & Kids <span class="count"> (11) </span>
            </span>
          </label>
        </div>
      </div>
    </div>
  </div>
  <div class="press-content">
    <div class="press-block">
      <div class='press-block-title'>Test Report</div>
      <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['testreports']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <a href="shownews.php?category=testreport&newsid=<?php echo $this->_tpl_vars['testreports'][$this->_sections['n']['index']]['id']; ?>
" class="press-report-item">
        <!--<div class="press-item-nav-info">
          <a>Babies & Kids </a> > Formula Milk Powder (14 Samples)
        </div>-->
        <div class="press-item-title">
          <div style="display:none"><?php echo $this->_tpl_vars['testreports'][$this->_sections['n']['index']]['id']; ?>
</div>
          <?php echo $this->_sections['n']['index_next']; ?>

          <?php echo $this->_tpl_vars['testreports'][$this->_sections['n']['index']]['title']; ?>

        </div>
        <div class="press-item-date">
          <?php echo $this->_tpl_vars['testreports'][$this->_sections['n']['index']]['date']; ?>

        </div>
      </a>
      <?php endfor; endif; ?>
      <div class="testreport_page press-page"></div>
      <!--<div class="press-report-item">
        <div class="press-item-nav-info">
          <a>Babies & Kids </a> > Formula Milk Powder (14 Samples)
        </div>
        <div class="press-item-title">
          1 Chinese formula just as good as the 3 global test winners
        </div>
        <div class="press-item-date">
          Release date: 28/02/2017
        </div>
      </div>-->
    </div>
    <div class="press-block">
      <div class='press-block-title'>Test Programmes</div>
      <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['testprogramme']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <a href="shownews.php?newsid=<?php echo $this->_tpl_vars['testprogramme'][$this->_sections['n']['index']]['id']; ?>
&category=testprogramme" class="press-report-item">
        <!--<div class="press-item-nav-info">
          <a>Babies & Kids </a> > Formula Milk Powder (14 Samples)
        </div>-->
        <div class="press-item-title">
          <div style="display:none"><?php echo $this->_tpl_vars['testprogramme'][$this->_sections['n']['index']]['id']; ?>
</div>
          <?php echo $this->_sections['n']['index_next']; ?>

          <?php echo $this->_tpl_vars['testprogramme'][$this->_sections['n']['index']]['title']; ?>

        </div>
        <div class="press-item-date">
          <?php echo $this->_tpl_vars['testprogramme'][$this->_sections['n']['index']]['date']; ?>

        </div>
      </a>
      <?php endfor; endif; ?>
      <div class="testprogramme_page press-page"></div>
    </div>
    <div class="press-block">
      <div class='press-block-title'>Reports About Cotest</div>
      <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['cotestreports']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <a class="press-report-item" href="shownews.php?newsid=<?php echo $this->_tpl_vars['cotestreports'][$this->_sections['n']['index']]['id']; ?>
&category=cotestreport">
        <!--<div class="press-item-nav-info">
          <a>Babies & Kids </a> > Formula Milk Powder (14 Samples)
        </div>-->
        <div class="press-item-title">
          <div style="display:none"><?php echo $this->_tpl_vars['cotestreports'][$this->_sections['n']['index']]['id']; ?>
</div>
          <?php echo $this->_sections['n']['index_next']; ?>

          <?php echo $this->_tpl_vars['cotestreports'][$this->_sections['n']['index']]['title']; ?>

        </div>
        <div class="press-item-date">
          <?php echo $this->_tpl_vars['cotestreports'][$this->_sections['n']['index']]['date']; ?>

        </div>
      </a>
      <?php endfor; endif; ?>
      <div class="cotestreport_page press-page"></div>
    </div>
  </div>
</div>
  <!--
<h1>Press releases</h1>
<h2>
Reports about COTEST
</h2>
<br>
<br>
<h2 style="text-center">New Member – COTEST</h2>
<br>
<p>News | Kim Healy | ICRT | 2016-01-21 </p>
<br>
<br>

<p>
 New ICRT member COTEST (Association for Comparative & Objective Testing in Europe for Safety & Trust e.V) is registered as a non-profit association under German law. A group of multinational experts with extensive testing experience operates COTEST with the following mission: To test products and services independently for a safe and trustful marketplace for consumers in developing countries and around the world.
</p>
<h4>Powered by European experience</h4>
<p>COTEST will buy samples in the respective developing countries but test them in European research labs, which – among other clients – have been testing for German testing foundation Stiftung Warentest,  applying scientific methods, which Stiftung Warentest has been developing and applying for over 50 years. </p>
<p>Thereby, products produced outside Europe are tested in Europe according to European quality and testing standards. The access to the test results is promoted in all countries, where these products are sold to consumers.</p>

<h4>Focus on Chinese Products</h4>
<p>According to the EU RASFF (Rapid Alert System for Food and Feed) records, China is still the largest place of origin for notified unsafe food and feed products in Europe, and almost 60% of notifications in the EU's Rapid Alert System for non-food dangerous products (RAPEX) concern goods of Chinese origin. In Europe, dangerous Chinese products are still countable, but in China, they have been innumerable for a long time. In China and around the world this really affects the basic human right to live safely.  COTEST will therefore, at first, focus on the research and testing of products from China in order to empower consumers in China and around the world to consume safely and healthily.</p>
-->
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<?php 
  require("footer.php");
   ?>
</body>


<script type="text/javascript">
$(document).ready(function(){
  var testprogramme_page_num=getPar("testprogramme_page_num");
  var cotestreport_page_num = getPar('cotestreport_page_num');
  var testreport_page_num = getPar('testreport_page_num');
  if(!testreport_page_num) testreport_page_num = 1
  if(!cotestreport_page_num) cotestreport_page_num = 1
  if(!testprogramme_page_num) testprogramme_page_num = 1

  var section = {name:'Section',level:2,children:[{name:'Electronics'},{name:'Babies'},{name:'Food'}]};
  var releaseDate = {name:'Release date',level:2,children:[{name:'2017'},{name:'2016'},{name:'2015'}]}
  var reportsReleased = {name:'Reports released',level:1,children:[section,releaseDate]}
  var tests = {name:'Test Programmes',level:1,children:[{name:'Electronics'},{name:'Babies'},{name:'Food'}]}
  var reportsAboutCotest = {name:'Reports about Cotest',level:1}
  var selectionData={level:0,children:[reportsReleased,tests,reportsAboutCotest]}
  var s=''
  setPage();
  getSelection(selectionData)
  $(".press-side").html(s);
  console.log(s)
  function getHref(type,page){
    var href = ''
    switch (type) {
      case 'testreport':
        href = 'press.php?testreport_page_num='+page+"&cotestreport_page_num="+cotestreport_page_num+"&testprogramme_page_num="+testprogramme_page_num
        break;
      case 'testprogramme':
          href = 'press.php?testreport_page_num='+testreport_page_num+"&cotestreport_page_num="+cotestreport_page_num+"&testprogramme_page_num="+page
          break;
     case 'cotestreport':
            href = 'press.php?testreport_page_num='+testreport_page_num+"&cotestreport_page_num="+page+"&testprogramme_page_num="+testprogramme_page_num
            break;
      default:
        href = 'press.php?testreport_page_num='+testreport_page_num+"&cotestreport_page_num="+page+"&testprogramme_page_num="+testprogramme_page_num
      }
      return href

  }
  function setPage(){
    $('.testprogramme_page').html(getPageDom(testprogramme_page_num,5,10,'testprogramme'))
    $('.cotestreport_page').html(getPageDom(cotestreport_page_num,5,10,'cotestreport'))
    $('.testreport_page').html(getPageDom(testreport_page_num,5,10,'testreport'))
    console.log(getPageDom(testprogramme_page_num,5,10,'testprogramme'))
  }
  function getPageDom(cpage,totalpage,pagesize,type){
    var href = ''
    var outstr = ''
    for(var i=1;i<=totalpage;i++){
      href = getHref(type,i)
      if(i!=cpage)
        outstr += "<a href='"+href+"'>"+i+"</a>";
      else {
        outstr += "<span>"+i+"</span>";
      }
    }
    return outstr
  }
  /*function getPageDom(cpage,totalpage,pagesize,type){
        var href =''
        var outstr = ''
        if(totalpage<=pagesize){        //总页数小于十页
            for (count=1;count<=totalpage;count++)
            {  if(count!=cpage){
                href = getHref(type,count)
                outstr += "<a href='"+href+"'>"+count+"</a>";
              }
              else{
                  outstr += outstr + "<span class='current' >"+count+"</span>";
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
                        href = getHref(type,count)
                        outstr += "<a href='"+href+"'>"+count+"</a>";
                    }
                    else{
                        outstr += outstr + "<span class='current'>"+count+"</span>";
                    }
                }
                href = getHref(type,count)
                outstr += outstr +"<a href='"+href+"'/>";
            }
            else if(parseInt((cpage-1)/pagesize) == parseInt(totalpage/pagesize))///最后10页
            {
                href = getHref(type,parseInt((cpage-1)/pagesize))
                outstr += outstr + "<a href='"+href+"'>"+count+"</a>";
                for (count=parseInt(totalpage/pagesize)*pagesize+1;count<=totalpage;count++)
                {    if(count!=cpage)
                  {
                      href = getHref(type,count)
                      outstr += outstr +  "<a href='"+href+"'>"+count+"</a>";
                  }else{
                      outstr += outstr + "<span class='current'>"+count+"</span>";
                  }
                }
            }
            else///中间页数
            {
                href = getHref(type,parseInt((cpage-1)/pagesize)*pagesize)
                outstr =   "<a href='"+href+"'>"+count+"</a>";
                for (count=parseInt((cpage-1)/pagesize)*pagesize+1;count<=parseInt((cpage-1)/pagesize)*pagesize+pagesize;count++)
                {
                    if(count!=cpage)
                    {
                      href = getHref(type,count)
                      outstr += outstr +  "<a href='"+href+"'>"+count+"</a>";

                    }else{
                        outstr += outstr + "<span class='current'>"+count+"</span>";
                    }
                }
                href = getHref(type,count)
                outstr += outstr +  "<a href='"+href+"'>"+count+"</a>";

            }
        }
        return outstr

  }
  */
  function getSelection(selectionData){
    switch (selectionData.level) {
      case 0:
        break;
      case 1:
        s+='<div class="selection-block"><div class="selection-title">'+selectionData.name+'</div>'
        break;
      case 2:
        s+='<div class="facet facet-checkbox" name="total test result" type="range">'
        s+= '<div class="heading-filter-options">'+
              '<h3><span class="facet-category-heading icon icon-0394"></span>'+selectionData.name+'</h3>'+
            '</div>'
        break;
      default:
        s+=
            '<div class="cont-filter-options toggle-panel">'+
              '<div class="filter-options">'+
                '<label>'+
                  '<span class="checkbox" name="">'+
                    '<input class="filter-option" type="checkbox">'+
                  '</span>'+
                  '<span class="inner-label">'+selectionData.name+' <span class="count"> (11) </span>'+
                  '</span>'+
                '</label>'+
              '</div>'+
            '</div>'

    }
    if(selectionData.children){
      for(var i=0;i<selectionData.children.length;i++){
        getSelection(selectionData.children[i])
      }
    }
    switch (selectionData.level) {
      case 0:
        break;
      case 1:
        s+='</div>'
        break;
      case 2:
        s+='</div>'
        break;
      default:
        s+=''
    }
  }
})
</script>
<script type="text/javascript" src="js/cotest.js"></script>
<script type="text/javascript" src="js/review.js"></script>
</html>