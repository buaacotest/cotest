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
<{php}>
    require("navigation.php");
    <{/php}>
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
    <div class='press-block'><a class="press-item-edit" href="cms/newsedit.php">
        Add news
      </a>
    </div>
    <div class="press-block">
      <div class='press-block-title'>Test Report</div>
      <{section name=n loop=$testreports}>
      <a href="shownews.php?category=testreport&newsid=<{$testreports[n].id}>" class="press-report-item">
        <!--<div class="press-item-nav-info">
          <a>Babies & Kids </a> > Formula Milk Powder (14 Samples)
        </div>-->
        <div class="press-item-title">
          <div style="display:none"><{ $testreports[n].id}></div>
          <{$smarty.section.n.index_next}>
          <{ $testreports[n].title}>
        </div>
        <div class="press-item-date">
          <{ $testreports[n].date}>
        </div>
        <a class="press-item-edit" href="cms/newsedit.php?newsid=<{$testreports[n].id}>&category=testreport">
          edit
        </a>
        <a class="press-item-edit" href="cms/newsdelete.php?newsid=<{$testreports[n].id}>&category=testreport">
          delete
        </a>
      </a>
      <{/section}>
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
      <{section name=n loop=$testprogramme}>
      <a href="shownews.php?newsid=<{$testprogramme[n].id}>&category=testprogramme" class="press-report-item">
        <!--<div class="press-item-nav-info">
          <a>Babies & Kids </a> > Formula Milk Powder (14 Samples)
        </div>-->
        <div class="press-item-title">
          <div style="display:none"><{ $testprogramme[n].id}></div>
          <{$smarty.section.n.index_next}>
          <{ $testprogramme[n].title}>
        </div>
        <div class="press-item-date">
          <{ $testprogramme[n].date}>
        </div>
        <a class="press-item-edit" href="cms/newsedit.php?newsid=<{$testprogramme[n].id}>&category=testprogramme">
          edit
        </a>
        <a class="press-item-edit" href="cms/newsdelete.php?newsid=<{$testprogramme[n].id}>&category=testprogramme">
          delete
        </a>
      </a>
      <{/section}>
    </div>
    <div class="press-block">
      <div class='press-block-title'>Reports About Cotest</div>
      <{section name=n loop=$cotestreports}>
      <a class="press-report-item" href="shownews.php?newsid=<{$cotestreports[n].id}>&category=cotestreport">
        <!--<div class="press-item-nav-info">
          <a>Babies & Kids </a> > Formula Milk Powder (14 Samples)
        </div>-->
        <div class="press-item-title">
          <div style="display:none"><{ $cotestreports[n].id}></div>
          <{$smarty.section.n.index_next}>
          <{ $cotestreports[n].title}>
        </div>
        <div class="press-item-date">
          <{ $cotestreports[n].date}>
        </div>
        <a class="press-item-edit" href="cms/newsedit.php?newsid=<{$cotestreports[n].id}>&category=cotestreport">
          edit
        </a>
        <a class="press-item-edit" href="cms/newsdelete.php?newsid=<{$cotestreports[n].id}>&category=cotestreport">
          delete
        </a>
      </a>
      <{/section}>
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
<{php}>
  require("footer.php");
  <{/php}>
</body>


<script type="text/javascript">
$(document).ready(function(){
  var section = {name:'Section',level:2,children:[{name:'Electronics'},{name:'Babies'},{name:'Food'}]};
  var releaseDate = {name:'Release date',level:2,children:[{name:'2017'},{name:'2016'},{name:'2015'}]}
  var reportsReleased = {name:'Reports released',level:1,children:[section,releaseDate]}
  var tests = {name:'Test Programmes',level:1,children:[{name:'Electronics'},{name:'Babies'},{name:'Food'}]}
  var reportsAboutCotest = {name:'Reports about Cotest',level:1}
  var selectionData={level:0,children:[reportsReleased,tests,reportsAboutCotest]}
  var s=''
  getSelection(selectionData)
  $(".press-side").html(s);
  console.log(s)
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
