<html>
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
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/cotest.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/changelanguage.js"></script>
</head>
<body>
<{php}>
require("navigation.php");
<{/php}>
<div class="index-header container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img class="logo" src="img/logo.png">
            </div>
            <div class=" brand-info ">
                <{$lang.Welcome}>
        </div>
        <!--
        <div class="col-md-12  text-center">
            <a href="login.php" class="brand-sign-in-btn  brand-btn"><button>Sign in</button></a>
            <a href="register.php " class=" brand-sign-up-btn brand-btn"><button>Sign up</button></a>
        </div>
        -->
        </div>

    </div>
    <div class="container main-container">
<!--
      <div class="row brand-head">
        <div class="col-md-12 text-center brand-title ">
          COTEST
        </div>
        <div class=" brand-info ">
        Products sold outside Europe are tested in Europe according to European quality and testing standards.
        </div>
      </div>
      -->
      <!--
      <div class="search-container">
      <form method="get"  id="global-search">
            
              <input type="text" class="search-box" name="w" value="" id="sli_search_1" placeholder="搜索COTEST" autocomplete="off">
              <input type="hidden" name="asug">
              <input type="hidden" name="mainresult" value="mainresult:yes">
              <input type="hidden" name="intcmp" value="GNH-Search">
              <input type="submit" value="搜索" class="search-button">
            </form>
      </div>
      -->
      <div class="row pro-list">
        <div class="pro-list-l">
          <div class="pro-list-title">
              <{$lang.Electronics}> (<{$lang.JointTests}>)
          </div>
          <div class="pro-list-content">
            <a href="products.php?proj=mobilephones">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/phone.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.mobilephones}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.Smartphones}></div>
              </div>
            </div>
            </a>
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/tablet.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num">234</div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.Tablets}></div>
              </div>
            </div>
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/tv.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num">234</div>
              </div>
              <div class="pro-list-item-info">
                <div class="name">Televisions</div>
              </div>
            </div>
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/camera.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num">134</div>
              </div>
              <div class="pro-list-item-info">
                <div class="name">Digital Cameras</div>
              </div>
            </div>
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/watch.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num">232</div>
              </div>
              <div class="pro-list-item-info">
                <div class="name">Smart Watches</div>
              </div>
            </div>
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/phone.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num">234</div>
              </div>
              <div class="pro-list-item-info">
                <div class="name">Laptops and Ultrabooks</div>
              </div>
            </div>
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/phone.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num">234</div>
              </div>
              <div class="pro-list-item-info">
                <div class="name">Head Phones</div>
              </div>
            </div>
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/phone.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num">234</div>
              </div>
              <div class="pro-list-item-info">
                <div class="name">Fitness Trackers</div>
              </div>
            </div>
          
          </div>
          
        </div>
        <div class="pro-list-r">
          <div class="pro-list-title">
              <{$lang.Food}>
          </div>
          <div class="pro-list-content">
            <a href="products.php?proj=milk">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/milk.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.milk}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name">UHT Milk</div>
              </div>
            </div>
              </a>
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/milkpowder.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num">234</div>
              </div>
              <div class="pro-list-item-info">
                <div class="name">Formular Milk Powder</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!--
        <div class="col-md-12 portlet">
          <div class="cat-title">
          <img src="img/tech.png">
          Electronics <small></small></div>
          <div class="cat-list col-md-12">-->
          <!--
          <div class="title"> TV&home entertainment</div>
           
            <ul>
              <li>
                Televisions(120)
              </li>
              <li>
                Blu-ray DVD players(23)
              </li>
              <li>
                Home cinema system(23)
              </li>
            </ul>
          </div>
            <div class="cat-list col-md-12">
          <div class="title"> Computing(212)</div>
           
            <ul>
              <li>
                Tablets(122)
              </li>
              <li>
                laptops(834)
              </li>
              <li>
                Computers(23)
              </li>
              <li>
                Printer ink(23)
              </li>
              <li>
                Printers(23)
              </li>

            </ul>
          </div>
           <div class="cat-list col-md-12">
          <div class="title"> Camcorders(212)</div>
           
            <ul>
              <li>
                Camcoders(122)
              </li>
              <li>
                Pocket camecoders(834)
              </li>

            </ul>
          </div>
          <div class="cat-list col-md-12">
          <div class="title"> Photography(212)</div>
           
            <ul>
              <li>
                Digital cameras(122)
              </li>
              <li>
                Digital SERs(834)
              </li>
              <li>
                Bridge Cameras(834)
              </li>
            </ul>
          </div>
          <div class="cat-list col-md-12">
          <div class="title"> Audio(212)</div>
           
            <ul>
              <li>
                MP3 players(122)
              </li>
              <li>
                Radios(834)
              </li>
              <li>
                Headphones(834)
              </li>
            </ul>
          </div>
           <div class="cat-list col-md-12">
           -->
           <!--
          <div class="title"> Phones(212)</div>
           
            <ul>
             
              <li>
               smartphones(834)
              </li>
              
            </ul>
          </div>
          -->
          <!--
          <div class="cat-list col-md-12">
          <div class="title"> Software(212)</div>
           
            <ul>
              <li>
                Security Software(122)
              </li>
              <li>
                Cloud storage(834)
              </li>
              <li>
                Photo-editing Software(834)
              </li>
            </ul>
          </div>
        </div>
        
        <div class="col-md-12 portlet">
          <div class="cat-title">
          <img src="img/food.png">
          Food  <small>(324)</small></div>
          <div class="cat-list col-md-12">
          <div class="title"> Drinks(212)</div>
           
            <ul>
              <li>
                coffee(122)
              </li>
              <li>
              Mineral Water(834)
              </li>
              <li>
                Juice(34)
              </li>
              <li>
                Smoothie(34)
              </li>
              <li>
                Soda(34)
              </li>
              <li>
                Tea(34)
              </li><li>
                Wine(34)
              </li><li>
                Champagne(34)
              </li>
              <li>
                Beer(34)
              </li>
            </ul>
          </div>
            <div class="cat-list col-md-12">
          <div class="title"> Milk and Dairy Product(212)</div>
           
            <ul>
              <li>
                Milk(122)
              </li>
              <li>
                Yogurt(834)
              </li>
              <li>
              Cheese(23)
              </li><li>
                Cottage cheese(34)
              </li><li>
                Cream(34)
              </li><li>
                Ice Cream(34)
              </li>
            </ul>
          </div>
           <div class="cat-list col-md-12">
          <div class="title"> Cereals(212)</div>
           
            <ul>
              <li>
                Rice(122)
              </li>
              <li>
                Wheat flour(834)
              </li>
              <li>
                Noodles(23)
              </li>
            </ul>
          </div>
          -->
        </div>
        
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<{php}>
  require("footer.php");
  <{/php}>

   </body>
</html>
