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
	<title><{$lang.login}></title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/cotest.css">
	<script src="js/changelanguage.js"></script>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<!-- Static navbar -->

<{php}>
	require("navigation.php");
	<{/php}>
<div class="container main-container">


	<div class="form-wrapper">
		<h1 class="text-center"><{$lang.AlterPass}></h1>
		<br>
		<div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"></div>
			
			<div class="row-fluid">
				<div class="span12 icon-over-input">
					<input class="span12  info log-input" id="originPassword" name="oldpassword" placeholder="<{$lang.OriginalPass}>" type="password" value="" data-form-pw="1456831308049.4834">
					<i class="icon-lock muted"></i>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12 icon-over-input">
					<input class="span12 info  log-input" id="newPassword" name="newPassword" placeholder="<{$lang.NewPass}>" type="password" value="" data-form-pw="1456831308049.4834">
					<i class="icon-lock muted"></i>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12 icon-over-input">
					<input class="span12 info log-input" id="newPasswordConfirm" name="newPasswordConfirm" placeholder="<{$lang.NewPassConfirm}>" type="password" value="" data-form-pw="1456831308049.4834">
					<i class="icon-lock muted"></i>
				</div>
			</div>
			<br>
			
			<button id="alter-btn"class="btn btn-block sign-btn" name="button" data-form-sbm="1456831308049.4834"><{$lang.sendNewPass}></button>
			<br>
			<div class="alert alert-warning alert-dismissible" id="alert-panel" role="alert" style="display:none">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Warning!</strong> Better check yourself, you're not looking too good.
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
		
		$(".info").on("click",function(){
			$("#alert-panel").css("display","none");
		})
		
		$("#alter-btn").on("click",function(){
			var password=$("#originPassword").val();
			var newPassword=$("#newPassword").val();
			var newPasswordConfirm=$("#newPasswordConfirm").val();
			var username='<{$user}>';
			if(password==''){
				$("#alert-panel").html("<strong>password</strong> cannot be empty");
				$("#alert-panel").css("display","block");
			}
			else if(newPassword==""){
				$("#alert-panel").html("<strong>new password</strong> cannot be empty");
				$("#alert-panel").css("display","block");
			}
			else if(newPassword!=newPasswordConfirm){
				$("#alert-panel").html("Your new password and confirming password must match");
				$("#alert-panel").css("display","block")
			}
			else if(newPassword==password){
				
				$("#alert-panel").html("Your old and new password are the same. Please enter your passwords again.");
				$("#alert-panel").css("display","block")
			}
			else{
				$.post("altercheck.php",{username:username,oldpassword:password,newpassword:newPassword},function(result){
				
					if(result==2){
						$("#alert-panel").html("wrong <strong>password</strong>");
						$("#alert-panel").css("display","block");

					}else if(result==1){
						alert(" Your password has been revised successfully");
					}
					console.log(result)

				})
			}
		})
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
