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
              <img  src="img/COTESTlogo2.png">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php"><{$lang.Tests}></a></li>
               <li><a href="about.php"><{$lang.About}></a></li>
                <li><a href="press.php"><{$lang.Press}></a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right" style="position:relative">
                <!--<li class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown " aria-haspopup="true" aria-expanded="true"><a href="#">Language</a></li>
                <ul class="dropdown-menu" id="menu2" aria-labelledby="dropdownMenu2">
                    <li><a href="#" onclick="changelanguage('en_us')">English</a></li>

                    <li><a href="#" onclick="changelanguage('zh_cn')">简体中文</a></li>

                </ul>-->
                <!--
                <li><a href="#" onclick="changelanguage('en_us')">English</a></li>
               <li><a href="#" onclick="changelanguage('zh_cn')">简体中文</a></li>-->
               <li class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#">language</a>

               </li>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                   <li><a href="#" >English</a></li>
                   <li><a href="#">中文</a></li>

               </ul>
                <{if $user}>
                <li class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><{$user}></a>

                </li>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href='#'>My account</a></li>
                    <li><a href='#'>Subscribe</a></li>
                    <li><a href='#'>Donate</a></li>
                    <li><a href='#'>Logout</a></li>
                    <!--
                    <li><a href="#" class="logout-btn"><{$lang.Logout}></a></li>
                    <li><a href="alterpwd.php"><{$lang.ChangePwd}></a></li>
                  -->

                </ul>
                <{else}>
                <li ><a href="login.php"><{$lang.SignIn}></a></li>
                <li ><a href="register.php"><{$lang.SignUp}></a></li>
                <{/if}>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
