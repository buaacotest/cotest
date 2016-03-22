<nav class="navbar navbar-default navbar-static-top">
    <div class="container main-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">COTEST</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
           
            <ul class="nav navbar-nav navbar-right" style="position:relative">
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
