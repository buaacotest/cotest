<?php /* Smarty version 2.6.19, created on 2016-04-17 07:36:00
         compiled from found.tpl */ ?>
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

    <title><?php echo $this->_tpl_vars['lang']['forget']; ?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cotest.css">
    <script src="js/bootstrap.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Static navbar -->
<?php 
    require("navigation.php");
     ?>

<div class="container main-container">
    <div class="form-wrapper">
        <h1 class="text-center"><?php echo $this->_tpl_vars['lang']['forget']; ?>
</h1>
        <br>
        <form accept-charset="UTF-8" action="foundpwd.php" method="post"><div style="margin:0;padding:0;display:inline">
            <div class="row-fluid">
                <div class="span12 icon-over-input">
                    <input class="span12" id="email" name="email" placeholder="<?php echo $this->_tpl_vars['lang']['email']; ?>
" type="text" value="">
                    <i class="icon-user muted"></i>
                </div>
            </div>
            <div class="row-fluid">
                <button class="btn btn-block sign-btn" name="button" type="submit"><?php echo $this->_tpl_vars['lang']['sendNewPass']; ?>
</button>
            </div>
        </form>
        <div class="text-center">
            <hr class="hr-normal">
            <a href="login.php"><i class="icon-chevron-left"></i>
                <?php echo $this->_tpl_vars['lang']['know']; ?>

            </a>
        </div>
    </div>


</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>