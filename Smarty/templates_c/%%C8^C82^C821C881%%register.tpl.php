<?php /* Smarty version 2.6.19, created on 2016-03-14 09:20:37
         compiled from register.tpl */ ?>
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
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/cotest.js"></script>

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
        <h1 class="text-center">Sign up</h1>
        <br>
        <div style="margin:0;padding:0;display:inline">

            <div class="row-fluid">
                <div class="span12 icon-over-input">
                    <input class="span12 log-input" id="username" name="username" placeholder="Username" type="text" value="" data-form-un="1456842528245.992">
                    <i class="icon-user muted"></i>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 icon-over-input">
                    <input class="span12 log-input" id="email" name="email" placeholder="E-mail" type="text" value="" data-form-un="1456842528245.992">
                    <i class="icon-user muted"></i>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 icon-over-input">
                    <input class="span12 log-input" id="password" name="password" placeholder="Password" type="password" value="" data-form-pw="1456842528245.7815">
                    <i class="icon-lock muted"></i>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 icon-over-input">
                    <input class="span12 log-input" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" type="password" value="" data-form-pw="1456842528245.992">
                    <i class="icon-lock muted"></i>
                </div>
            </div>
            <div class="row-fluid" >
                <input  class="span12 log-input yzm-input " placeholder="Verification code"  id="yzm-input" type="text">
                <img id="yzm-img">
            </div>
        

<div id="success-modal"class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
      <a href="login.php">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
        </a>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
            <br>
            <div class="row-fluid">
                <label class="inactive">
                        <span class="checkbox">
                        <input type="checkbox" >
                        </span>
                        <span class="inner-label">

                            I agree
                              <a href="#" class="text-contrast">user agreements</a>

                        </span>
                </label>
            </div>

            <button class="btn btn-block sign-btn" name="button" type="submit" data-form-sbm="1456842528245.992" id="sign-up-btn" >Sign up</button>
            <br>
            <div class="alert alert-warning alert-dismissible" id="alert-panel" role="alert" style="display:none">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Warning!</strong> Better check yourself, you're not looking too good.
            </div>

        <div class="text-center">
            <hr class="hr-normal">
            <a href="login.php"><i class="icon-chevron-left"></i>
                Go back to sign in
            </a>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/cotest.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        function CheckMail(mail) {
         var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         if (filter.test(mail)) return true;
         else {
         return false;}
        }
        var yzm_value=0;

        function yzm(){
            var num1=Math.round(Math.random()*10000000);
            var num=num1.toString().substr(0,4);
            $("#yzm-img").attr("src",'yzm.php?num='+num);
            yzm_value=num;
        }
        yzm();
        $("#yzm-img").on("click",function(){
            yzm();
        })
        $("#username").on("click",function(){
            $("#alert-panel").css("display","none");
        })
        $("#password").on("click",function(){
            $("#alert-panel").css("display","none");
        })
        $("#sign-up-btn").on("click",function(){
            var username=$("#username").val()
            var password=$("#password").val();
            var password_confirmation=$("#password_confirmation").val();
            var email=$("#email").val();
            var username_flag=-1;
            var email_flag=-1;
            var yzm_input=$("#yzm-input").val();
            console.log(username);
            console.log(password);
            if(username==""){
                $("#alert-panel").html("<strong>Username</strong> cannot be empty");
                $("#alert-panel").css("display","block");
            }else if(email==""){
                  $("#alert-panel").html("<strong>Email</strong> cannot be empty");
                $("#alert-panel").css("display","block");
            }else if(!CheckMail(email)){
                 $("#alert-panel").html("Mailbox format is not correct");
                $("#alert-panel").css("display","block");
            }
            else if(password==""){
                $("#alert-panel").html("<strong>Password</strong> cannot be empty");
                $("#alert-panel").css("display","block");
            }else if(password!=password_confirmation){
                $("#alert-panel").html("Two passwords are not consistent");
                $("#alert-panel").css("display","block");
            }else if(yzm_value!=yzm_input){
                $("#alert-panel").html("Verification code input error ");
                $("#alert-panel").css("display","block")

            }else{
                $.post("chkname.php",{username:username},function(result){
                    console.log(result);
                    if(result==6){
                        $("#alert-panel").html("Username has been used");
                        $("#alert-panel").css("display","block");

                    }else{
                        $.post("chkname.php",{email:email},function(result2){
                             console.log(result2);
                            if(result2==4){
                                $("#alert-panel").html("Email has been used");
                                $("#alert-panel").css("display","block");

                            }else{
                                  $.post("regcheck.php",{email:email,username:username,password:password},function(result3){
                                    console.log(result3);
                                    if(result3==1){
                                        $("#success-modal").modal();
                                        alert("success!")
                                    }
                                  })
                            }
                        })
                    }

                })
            }

        })
    })
</script>

</body>
</html>