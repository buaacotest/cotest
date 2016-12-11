<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="img/COTESTicon.png"/>
  <title><{$title}></title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/cotest.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="css/jquery.bxslider.css">
  <script src="js/jquery.bxslider.min.js"></script>
  <script type="text/javascript" src="js/cotest.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/changelanguage.js"></script>
</head>
<body>
<{php}>
require("navigation.php");
<{/php}>
<div class="container">
    <div class="row index-slider">
    <div class="col-md-9 index-slider-panel">
          <!--
            <div class="col-md-12 text-center">
                <img class="logo" src="img/logo.png">
            </div>
            <div class=" brand-info ">
                <{$lang.Welcome}>
                -->
        <ul class="bxslider ">
          <!--
              <li>
                  <div class="row index-header ">
                      <div class="col-md-12">
                      <img class="index-logo" src="img/logo.png">
                  </div>
                  <div class=" brand-info ">
                      <{$lang.Welcome}>
                  </div>
                  </div>
                </li>
            <li >
            -->
              <div class="index-slider-container">

                <img src="img/ibanner_3.jpg" class="index-slider-img">
                <div class="index-slider-title">
                    The EU limit for dioxins in formula milk up to 32 times too high!
                  </div>
              </div>
            </li>
            <li>
              <div class="index-slider-container">

                <img src="img/ibanner_2.jpg" class="index-slider-img">
                <div class="index-slider-title">
               One of the Chinese manufactures produced with Chinese milk just as good formula as international ones
                </div>
              </div>
            </li>
            <li>
              <div class="index-slider-container">

                <img src="img/ibanner_1.jpg" class="index-slider-img">
                <div class="index-slider-title">
              Hundreds of different brand and model smartphones tested in hundreds of properties
                </div>
              </div>
            </li>
            <!--
            <li>
              <div class="index-slider-container">

                <img src="img/ad4.jpg" class="index-slider-img">
                <div class="index-slider-title">
                  The Chinese UHT milk market co-leader MENGNIU contains dioxins 66% higher than the limit of 2.5 pg/g fat and 6 times more than another co-leader Yili and 6 imported milk products from Germany
                </div>
              </div>
            </li>
          -->
          </ul>

        <!--
        <div class="col-md-12  text-center">
            <a href="login.php" class="brand-sign-in-btn  brand-btn"><button>Sign in</button></a>
            <a href="register.php " class=" brand-sign-up-btn brand-btn"><button>Sign up</button></a>
        </div>
        -->
    </div>
    <ul class="slider-select col-md-3">

          <li target="0" id="slider-select-item0" class="slider-select-item slider-select-item-active">
            <div class="row">
              <div class="slider-select-thumb col-md-5">
                  <img src="img/ibanner3_s.jpg"/>
              </div>
              <div class="col-md-7">
                 EU limit for dioxins in formula
              </div>
            </div>

          </li>
          <li target="1" id="slider-select-item1"class="slider-select-item">
            <div class="row">
              <div class="slider-select-thumb col-md-5">
                  <img src="img/ibanner2_s.jpg"/>
              </div>
              <div class="col-md-7">
              Chinese formula milk
              </div>
            </div>
          </li>
          <li target="2" id="slider-select-item2"class="slider-select-item">
            <div class="row">
              <div class="slider-select-thumb col-md-5">
                  <img src="img/ibanner1_s.jpg"/>
              </div>
              <div class="col-md-7">
                Smartphones in test
              </div>
            </div>
          </li>


    </ul>
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

        <div class="pro-list-r">
          <div class="pro-list-title">
              <{$lang.Food}>
                <p><{$lang.JointTests_C}></p>
          </div>

          <div class="pro-list-content">

            <a href="products.php?proj=milkpowder">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/index/milkpowder.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.milkpowder}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.MilkPowder}></div>
              </div>
            </div>
              </a>
              <a href="products.php?proj=milk">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/index/milk.jpg">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.milk}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.Milk}></div>
              </div>
            </div>
              </a>
          </div>
        </div>
        <div class="pro-list-l">
          <div class="pro-list-title">
              <{$lang.Electronics}>
              <p><{$lang.JointTests}></p>
          </div>
          <div class="pro-list-content">
            <a href="products.php?proj=mobilephones">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/index/mobilephone.png">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.mobilephones}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.Smartphones}></div>
              </div>
            </div>
            </a>
            <a href="products.php?proj=tvs">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/index/tv.png">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.tvs}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.Televisions}></div>
              </div>
            </div>
              </a>
            <a href="products.php?proj=tablets">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/index/tablet.png">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.tablets}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.Tablets}></div>
              </div>
            </div>
            </a>

            <a  href="products.php?proj=basiccameras">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/index/camera.png">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.basiccameras}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.Cameras}></div>
              </div>
            </div>
            </a>
            <a  href="products.php?proj=fitnessbands">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/index/fitnessband.png">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.fitnessbands}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.Fitness}></div>
              </div>
            </div>
            </a>
            <a href="products.php?proj=laptops">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/index/laptop.png">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.laptops}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.Laptops}></div>
              </div>
            </div>
            </a>

            <a  href="products.php?proj=whheadphones">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/index/headphone.png">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.whheadphones}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.Headphones}></div>
              </div>
            </div>
            </a>

            <a href="products.php?proj=smartwatches">
            <div class="pro-list-item">
              <div class="pro-list-item-img">
                <img src="img/index/smartwatch.png">
              </div>
              <div class="pro-list-item-info">
                <div class="num"><{$number.smartwatches}></div>
              </div>
              <div class="pro-list-item-info">
                <div class="name"><{$lang.Smartwatches}></div>
              </div>
            </div>
            </a>

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
<script>
    $(document).ready(function(){

    var slider = $( '.bxslider').bxSlider({
        captions: true,
        auto: true,
        onSlideAfter: function($slideElement, oldIndex, newIndex){
          $(".slider-select-item").removeClass("slider-select-item-active");
          $("#slider-select-item"+newIndex).addClass("slider-select-item-active");
        }
      }
    );
    $(".slider-select-item").on("click",function(){
      $(".slider-select-item").removeClass("slider-select-item-active");
      $(this).addClass("slider-select-item-active");
      slider.goToSlide($(this).attr("target"));
    })
});
</script>
   </body>
</html>
