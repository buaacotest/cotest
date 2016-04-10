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

    <title><{$lang.forget}></title>

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
<nav class="navbar navbar-default navbar-static-top">
    <div class="container main-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
              <img  src="img/logo2.png">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="#">Tests</a></li>
               <li><a href="#"><img src="img/cotestb.png"></a></li>
                <li><a href="#">Press</a></li>
                 
            </ul>

            <ul class="nav navbar-nav navbar-right" style="position:relative">
                <li class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown " aria-haspopup="true" aria-expanded="true"><a href="#">Language</a></li>
                <ul class="dropdown-menu" id="menu2" aria-labelledby="dropdownMenu2">
                    <li><a href="#">English</a></li>
                    <li><a href="#">Chinese</a></li>

                </ul>
                <{if $user}>
                <li class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><{$user}></a>

                </li>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#" class="logout-btn">logout</a></li>
                    <li><a href="#">change password</a></li>

                </ul>
                <{else}>
                <li ><a href="login.php">Sign in</a></li>
                <li ><a href="register.php">Sign up</a></li>
                <{/if}>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="form-wrapper">
        <h1 class="text-center"><{$lang.forget}></h1>
        <br>
        <form accept-charset="UTF-8" action="foundpwd.php" method="post"><div style="margin:0;padding:0;display:inline">
            <div class="row-fluid">
                <div class="span12 icon-over-input">
                    <input class="span12" id="email" name="email" placeholder="<{$lang.email}>" type="text" value="">
                    <i class="icon-user muted"></i>
                </div>
            </div>
            <div class="row-fluid">
                <button class="btn btn-block sign-btn" name="button" type="submit"><{$lang.sendNewPass}></button>
            </div>
        </form>
        <div class="text-center">
            <hr class="hr-normal">
            <a href="login.php"><i class="icon-chevron-left"></i>
                <{$lang.know}>
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
