<?php /* Smarty version 2.6.19, created on 2016-04-17 06:30:59
         compiled from login.tpl */ ?>
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

	<title><?php echo $this->_tpl_vars['lang']['login']; ?>
</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/cotest.css">



	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<!-- Static navbar -->

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
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
              <li><a href="#"><?php echo $this->_tpl_vars['lang']['Tests']; ?>
</a></li>
               <li><a href="#">{$lang.About}</a></li>
                <li><a href="#"><?php echo $this->_tpl_vars['lang']['Press']; ?>
</a></li>
                 
            </ul>

            <ul class="nav navbar-nav navbar-right" style="position:relative">
                <!--<li class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown " aria-haspopup="true" aria-expanded="true"><a href="#">Language</a></li>
                <ul class="dropdown-menu" id="menu2" aria-labelledby="dropdownMenu2">
                    <li><a href="#" onclick="changelanguage('en_us')">English</a></li>
                    <li><a href="#" onclick="changelanguage('zh_cn')">简体中文</a></li>

                </ul>--->
                <li><a href="#" onclick="changelanguage('en_us')">English</a></li>
                <li><a href="#" onclick="changelanguage('zh_cn')">简体中文</a></li>
                <?php if ($this->_tpl_vars['user']): ?>
                <li class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><?php echo $this->_tpl_vars['user']; ?>
</a>

                </li>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#" class="logout-btn"><?php echo $this->_tpl_vars['lang']['Logout']; ?>
</a></li>
                    <li><a href="#"><?php echo $this->_tpl_vars['lang']['ChangePwd']; ?>
</a></li>

                </ul>
                <?php else: ?>
                <li ><a href="login.php"><?php echo $this->_tpl_vars['lang']['SignIn']; ?>
</a></li>
                <li ><a href="register.php"><?php echo $this->_tpl_vars['lang']['SignUp']; ?>
</a></li>
                <?php endif; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container main-container">


	<div class="form-wrapper">
		<h1 class="text-center"><?php echo $this->_tpl_vars['lang']['login']; ?>
</h1>
		<br>
		<div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"></div>
			<div class="row-fluid">
				<div class="span12 icon-over-input">
					<input class="span12 log-input" id="username" name="username" placeholder="<?php echo $this->_tpl_vars['lang']['username']; ?>
" type="text" value="" data-form-un="1456831308049.4834">
					<i class="icon-user muted"></i>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12 icon-over-input">
					<input class="span12  log-input" id="password" name="password" placeholder="<?php echo $this->_tpl_vars['lang']['password']; ?>
" type="password" value="" data-form-pw="1456831308049.4834">
					<i class="icon-lock muted"></i>
				</div>
			</div>
			
			<br>
			<div class="row-fluid">
				<label class="inactive">
                        <span class="checkbox" id="remember-check">
                        <input type="checkbox" name="search[range][50][Screen_size][]" value="17-27">
                        </span>
                        <span class="inner-label">
                          <?php echo $this->_tpl_vars['lang']['remember']; ?>

                        </span>
				</label>
			</div>

			<button id="sign-in-btn"class="btn btn-block sign-btn" name="button" data-form-sbm="1456831308049.4834"><?php echo $this->_tpl_vars['lang']['login']; ?>
</button>
			<br>
			<div class="alert alert-warning alert-dismissible" id="alert-panel" role="alert" style="display:none">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Warning!</strong> Better check yourself, you're not looking too good.
			</div>
		
		<div class="row">
			<hr class="hr-normal">
			<div class="col-md-6 text-center"><a href="forget.php"><?php echo $this->_tpl_vars['lang']['forget']; ?>
?</a></div>
			<div class="col-md-6 text-center

              "><a href="register.php"><b><?php echo $this->_tpl_vars['lang']['sign']; ?>
</b></a></div>
		</div>

		<div class="text-center">

		</div>

	</div>
</div>

<div class="alert-panel"></div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/cotest.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#username").on("click",function(){
			$("#alert-panel").css("display","none");
		})
		$("#password").on("click",function(){
			$("#alert-panel").css("display","none");
		})
			console.log("username"+$.cookie("username") )
			if($.cookie("username") && $.cookie("password")){
				$("#username").val($.cookie("username") );
				$("#password").val($.cookie("password"));
			}
		$("#sign-in-btn").on("click",function(){
			var username=$("#username").val()
			var password=$("#password").val();
			console.log(username);
			console.log(password);
			if($("#remember-check").attr("checked")){
				$.cookie("username", username, { expires: 7 });
				$.cookie("password", password, { expires: 7 });
			}

			if(username==""){
				$("#alert-panel").html("<strong>username</strong> cannot be empty");
				$("#alert-panel").css("display","block");
			}
			else if(password==""){
				$("#alert-panel").html("<strong>password</strong> cannot be empty");
				$("#alert-panel").css("display","block");
			}else{
				$.post("chkname.php",{username:username,password:password},function(result){
					console.log("result");
					if(result==2){
						$("#alert-panel").html("wrong <strong>username</strong> or <strong>password</strong>");
						$("#alert-panel").css("display","block");

					}else{
						window.location.href="index.php";
					}

				})
			}

		})
	})
</script>
</body>
</html>