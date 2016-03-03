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

    <title>Static Top Navbar Example for Bootstrap</title>

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
            <a class="navbar-brand" href="#">COTEST</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">


            <ul class="nav navbar-nav navbar-right">
                <li><a href="../navbar/">Login</a></li>
                <!--
                <li class="active"><a href="./">Static top <span class="sr-only">(current)</span></a></li>
                <li><a href="../navbar-fixed-top/">Fixed top</a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="form-wrapper">
        <h1 class="text-center">Forgot password</h1>
        <br>
        <form accept-charset="UTF-8" action="foundpwd.php" method="post"><div style="margin:0;padding:0;display:inline">
            <div class="row-fluid">
                <div class="span12 icon-over-input">
                    <input class="span12" id="email" name="email" placeholder="E-mail" type="text" value="">
                    <i class="icon-user muted"></i>
                </div>
            </div>
            <div class="row-fluid">
                <button class="btn btn-block" name="button" type="submit">Send me instructions</button>
            </div>
        </form>
        <div class="text-center">
            <hr class="hr-normal">
            <a href="login.php"><i class="icon-chevron-left"></i>
                I already know my password
            </a>
        </div>
    </div>


</div>
<div class="footer">
    <div class="triangle-bottomright"></div>
    <div class="footer-container"></div>
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
