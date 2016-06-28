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

    <title><{$lang.sign}></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cotest.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/cotest.js"></script>
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
        <h1 class="text-center"><{$lang.sign}></h1>
        <br>
        <div style="margin:0;padding:0;display:inline">

            <div class="row-fluid">
                <div class="span12 icon-over-input">
                    <input class="span12 log-input" id="username" name="username" placeholder="<{$lang.username}>" type="text" value="" data-form-un="1456842528245.992">
                    <i class="icon-user muted"></i>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 icon-over-input">
                    <input class="span12 log-input" id="email" name="email" placeholder="<{$lang.email}>" type="text" value="" data-form-un="1456842528245.992">
                    <i class="icon-user muted"></i>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 icon-over-input">
                    <input class="span12 log-input" id="password" name="password" placeholder="<{$lang.password}>" type="password" value="" data-form-pw="1456842528245.7815">
                    <i class="icon-lock muted"></i>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 icon-over-input">
                    <input class="span12 log-input" id="password_confirmation" name="password_confirmation" placeholder="<{$lang.confirm}>" type="password" value="" data-form-pw="1456842528245.992">
                    <i class="icon-lock muted"></i>
                </div>
            </div>
            <div class="row-fluid" >
                <input  class="span12 log-input yzm-input " placeholder="<{$lang.code}>"  id="yzm-input" type="text">
                <img id="yzm-img">
            </div>
        

<div id="success-modal"class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
   
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
       <h4 class="modal-title" id="myModalLabel">注册成功，请到邮箱激活验证</h4>
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" id="regconfirm"data-dismiss="modal">
        <a href="login.php">确定  </a></button>
      
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

                           <{$lang.agree}>
                              <a href="#" class="text-contrast"><{$lang.agreements}></a>

                        </span>
                </label>
            </div>

            <button class="btn btn-block sign-btn" name="button" type="submit" data-form-sbm="1456842528245.992" id="sign-up-btn" ><{$lang.sign}></button>
            <br>
            <div class="alert alert-warning alert-dismissible" id="alert-panel" role="alert" style="display:none">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Warning!</strong> Better check yourself, you're not looking too good.
            </div>

        <div class="text-center">
            <hr class="hr-normal">
            <a href="login.php"><i class="icon-chevron-left"></i>
                <{$lang.goback}>
            </a>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        function CheckMail(mail) {
         var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         if (filter.test(mail)) return true;
         else {
         return false;}
        }
        var yzm_value=0;
        function check_usr(obj){
             var objvalue = obj;
             var b=/^[a-zA-Z\d]\w{2,10}[a-zA-Z\d]$/;
             if (!b.test(objvalue)) {
          //    document.getElementByIdx_x('checkusr').innerHTML ="<font color='#ff0000'>用户名非法!</font>";
              return false;
            }
            else 
                return true;
         }
         function check_psw(obj){
             checkpsw=obj;
             if(checkpsw.length > 5 && checkpsw.length<21){
            //  document.getElementByIdx_x("checkpsw").innerHTML = "<font color='#00c72e'>密码可以使用!</font>";
                return true;
               }else {
             // document.getElementByIdx_x("checkpsw").innerHTML="<font color='#ff0000'>密码不符合长度要求!</font>";
                return false;
             }
         }
             function check_mail(obj){
                 var strm=obj;
                 var regm = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;//验证Mail的正则表达式,^[a-zA-Z0-9_-]:开头必须为字母,下划线,数字,
                 if (!strm.match(regm))
                 {
                  return false
                 } else{
                  return true;
                 }
            }
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
        $("#regconfirm").on("click",function(){
            window.location.href="index.php"
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

            }else if(!check_usr(username)){
                $("#alert-panel").html("Username does not conform to the requirements");
                $("#alert-panel").css("display","block")
            }else if(!check_psw(password)){
                $("#alert-panel").html("Password length must be in 6 to 20");
                $("#alert-panel").css("display","block")
            }else if(!check_mail(email)){
                $("#alert-panel").html("Email address does not conform to the requirements");
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
                                      //  alert("success!")
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
