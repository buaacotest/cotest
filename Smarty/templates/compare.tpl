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

    <title><{$title}></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cotest.css">
    <script src="js/bootstrap.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<!-- Static navbar -->

<body>

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
              <li><a href="#"><{$lang.Tests}></a></li>
               <li><a href="#">{$lang.About}</a></li>
                <li><a href="#"><{$lang.Press}></a></li>
                 
            </ul>

            <ul class="nav navbar-nav navbar-right" style="position:relative">
                <!--<li class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown " aria-haspopup="true" aria-expanded="true"><a href="#">Language</a></li>
                <ul class="dropdown-menu" id="menu2" aria-labelledby="dropdownMenu2">
                    <li><a href="#" onclick="changelanguage('en_us')">English</a></li>
                    <li><a href="#" onclick="changelanguage('zh_cn')">简体中文</a></li>

                </ul>--->
                <li><a href="#" onclick="changelanguage('en_us')">English</a></li>
                <li><a href="#" onclick="changelanguage('zh_cn')">简体中文</a></li>
                <{if $user}>
                <li class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><a href="#"><{$user}></a>

                </li>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#" class="logout-btn"><{$lang.Logout}></a></li>
                    <li><a href="#"><{$lang.ChangePwd}></a></li>

                </ul>
                <{else}>
                <li ><a href="login.php"><{$lang.SignIn}></a></li>
                <li ><a href="register.php"><{$lang.SignUp}></a></li>
                <{/if}>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="content-container">
    <table class="compare-table">
        <thead>
          

          <tr class="product-images">
            <th class="cont-edit-comparison" scope="row" rowspan="2">
              <div>
                
              </div>
            </th>
             <{section name=n loop=$products}>
              <th data-product-id="10344" scope="col">
                <div class="product-image">
                <a href="details.php?proj=mobilephones&id=<{$products[n].id}>">
                  <img class="comparison-product-thumbnail" alt="LG 55EF950V" src="http://dam.which.co.uk.s3-website-eu-west-1.amazonaws.com/3f5e2ab1-974e-4f6b-8b32-3c3787245769.jpg">
                </a>
              </div>

              </th>
              <{/section}>
          </tr>

          <tr class="model">
            <{section name=n loop=$products}>
              <th data-product-id="10344" scope="col">
                <div class="cell-inner-wrapper">
                  <div class="product-details-micro">
                    <div class="name">
                      <span class="manufacturer">  
                      <{$products[n].name}>
                      </span>
                      <span class="model"></span>
                    </div>
                  </div>
                </div>
              </th>
            <{/section}>

          </tr>
        </thead>

        <tbody>
          <tr class="score">
            <th scope="row">
              <div class="compare-th">
                COTEST score
              </div>
            </th>
             <{section name=n loop=$products}>

              <td data-product-id="10344" class="behind-paywall">
                 <div class="score-list">
                    <{if $products[n].evaluations[0].value <=1.5}>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <{/if}>
                    <{if $products[n].evaluations[0].value >1.5 && $products[n].evaluations[0].value <= 2.5}>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <{/if}>
                    <{if $products[n].evaluations[0].value >2.5 && $products[n].evaluations[0].value <= 3.5}>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <{/if}>
                    <{if $products[n].evaluations[0].value >3.5 && $products[n].evaluations[0].value <= 4.5}>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <{/if}>
                    <{if $products[n].evaluations[0].value >4.5 && $products[n].evaluations[0].value <= 5.5}>
                                    <div class="star"></div>


                    <{/if}>
                                 
                   </div>
                
                <div class="score-text"><{$products[n].evaluations[0].value}></div>
             
              </td>
              <{/section}>


          </tr>

           <!-- REMOVED PENDING RE-INTEGRATION OF REVOO
           <tr class="reevoo">
            <th scope="row">
              <label><input type="checkbox"/><span class="inner-label">Reevoo score</span></label>
            </th>


          </tr> -->

          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Test results
              </h2>
            </th>
                <{section name=m loop=$products}>
                <td class="table-cell-wrapper" data-product-id="10344">
                  <div class="table-cell-wrapper-inner">
                    
                  </div>
                </td>
                <{/section}>
          </tr>
           <{section name=n loop=$products[0].evaluations[0].id_parent}>
            <tr class="test-results" data-category="tests">
              <th class="behind-paywall">
                <div class="compare-th">
                <{$products[0].evaluations[0].id_parent[n].name}>
                </div>
                
              </th>
              <{section name=m loop=$products}>
                <td data-product-id="10344" class="behind-paywall">
                  <{$products[m].evaluations[0].id_parent[n].value}>
                </td>
              <{/section}>
            </tr>
          <{/section}>
            


          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Features
              </h2>
            </th>
                <{section name=m loop=$products}>
                <td class="table-cell-wrapper" data-product-id="10344">
                  <div class="table-cell-wrapper-inner">
                    
                  </div>
                </td>
                <{/section}>
          </tr>
           <{section name=n loop=$products[0].property[0].id_propertygroup}>
            <tr class="test-results" data-category="tests">
              <th class="behind-paywall">
                <div class="compare-th">
                <{$products[0].property[0].id_propertygroup[n].name}>
                </div>
               
              </th>
              <{section name=m loop=$products}>
                <td data-product-id="10344" class="behind-paywall">
                  <{$products[0].property[m].id_propertygroup[n].value}>
                </td>
              <{/section}>
            </tr>
          <{/section}>


          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Pros
              </h2>
            </th>

                <{section name=m loop=$products}>
                <td class="table-cell-wrapper" data-product-id="10344">
                 
                    <{section name=n loop=$products[m].Pros}>
                    <p><{$products[m].Pros[n]}></p>
                    <{/section}>
                  
                </td>
                <{/section}>
          </tr>
          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Cons
              </h2>
            </th>
                <{section name=m loop=$products}>
                <td class="table-cell-wrapper" data-product-id="10344">
                 
                    <{section name=n loop=$products[m].Cons}>
                    <p><{$products[m].Cons[n]}></p>
                    <{/section}>
                  
                </td>
                <{/section}>
          </tr>
           
        </tbody>
      </table>
</div>

<{php}>
  require("footer.php");
  <{/php}>
</body>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
<script type="text/javascript" src="js/cotest.js"></script>
<script type="text/javascript" src="js/review.js"></script>
</html>
