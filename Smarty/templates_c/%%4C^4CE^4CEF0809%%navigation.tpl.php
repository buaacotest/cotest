<?php /* Smarty version 2.6.19, created on 2016-05-08 13:06:05
         compiled from navigation.tpl */ ?>
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
              <li><a href="index.php"><?php echo $this->_tpl_vars['lang']['Tests']; ?>
</a></li>
               <li><a href="about.php"><?php echo $this->_tpl_vars['lang']['About']; ?>
</a></li>
                <li><a href="press.php"><?php echo $this->_tpl_vars['lang']['Press']; ?>
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