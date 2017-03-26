<?php /* Smarty version 2.6.19, created on 2017-03-21 11:45:14
         compiled from pressdetail.tpl */ ?>
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
    <link rel="stylesheet" type="text/css" href="css/pressdetail.css">
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
<?php 
    require("navigation.php");
     ?>
<div class="container main-container press-container">

<div class="press-content">
  <h2><?php echo $this->_tpl_vars['title']; ?>
</h2>
  <p><?php echo $this->_tpl_vars['date']; ?>
</p>
  <div class="article-content"><?php echo $this->_tpl_vars['content']; ?>
</div>
</div>
</div>
</body>

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

<script type="text/javascript" src="js/cotest.js"></script>
</html>