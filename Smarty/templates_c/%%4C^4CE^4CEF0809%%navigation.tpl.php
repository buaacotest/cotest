<?php /* Smarty version 2.6.19, created on 2016-03-22 08:31:54
         compiled from navigation.tpl */ ?>
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
             <?php if ($this->_tpl_vars['user']): ?>
              <li class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><?php echo $this->_tpl_vars['user']; ?>
</a>

              </li>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="logout.php" class="logout-btn">logout</a></li>
                    <li><a href="#">change password</a></li>
                
                </ul>
              <?php else: ?>
              <li ><a href="login.php">Sign in</a></li>
              <li ><a href="register.php">Sign up</a></li>
              <?php endif; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>