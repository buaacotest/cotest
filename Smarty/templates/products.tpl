
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
            <a class="navbar-brand" href="index.php">COTEST</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
            <!--
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../navbar/">Default</a></li>
              <li class="active"><a href="./">Static top <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>-->
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="content-container">
    <div class="flip-container">

    </div>
    <div class="row">
        <div class="sidebar">
            <div class="facet facet-checkbox">
                <div class="heading-filter-options">
                    <h3>
                <span class="facet-category-heading icon icon-0394">
                </span>
                        屏幕尺寸
                    </h3>
                </div>
                <div class="cont-filter-options toggle-panel">
                    <div class="filter-options">
                        <label class="inactive">
                        <span class="checkbox">
                        <input type="checkbox" name="search[range][50][Screen_size][]" value="17-27">
                        </span>
                        <span class="inner-label">
                          17-26"
                          <span class="count">(31)</span>
                        </span>
                        </label>
                        <label class="inactive">
                        <span class="checkbox">
                        <input type="checkbox" name="search[range][50][Screen_size][]" value="17-27">
                        </span>
                        <span class="inner-label">
                          17-26"
                          <span class="count">(31)</span>
                        </span>
                        </label>
                        <label class="inactive">
                        <span class="checkbox">
                        <input type="checkbox" name="search[range][50][Screen_size][]" value="17-27">
                        </span>
                        <span class="inner-label">
                          17-26"
                          <span class="count">(31)</span>
                        </span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="facet facet-checkbox">
                <div class="heading-filter-options">
                    <h3>
                <span class="facet-category-heading icon icon-0394">
                </span>
                        屏幕尺寸
                    </h3>
                </div>
                <div class="cont-filter-options toggle-panel">
                    <div class="filter-options">
                        <label class="inactive">
                        <span class="checkbox">
                        <input type="checkbox" name="search[range][50][Screen_size][]" value="17-27">
                        </span>
                        <span class="inner-label">
                          17-26"
                          <span class="count">(31)</span>
                        </span>
                        </label>
                        <label class="inactive">
                        <span class="checkbox">
                        <input type="checkbox" name="search[range][50][Screen_size][]" value="17-27">
                        </span>
                        <span class="inner-label">
                          17-26"
                          <span class="count">(31)</span>
                        </span>
                        </label>
                        <label class="inactive">
                        <span class="checkbox">
                        <input type="checkbox" name="search[range][50][Screen_size][]" value="17-27">
                        </span>
                        <span class="inner-label">
                          17-26"
                          <span class="count">(31)</span>
                        </span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="facet facet-checkbox">
                <div class="heading-filter-options">
                    <h3>
                <span class="facet-category-heading icon icon-0394">
                </span>
                        屏幕尺寸
                    </h3>
                </div>
                <div class="cont-filter-options toggle-panel">
                    <div class="filter-options">
                        <label class="inactive">
                        <span class="checkbox">
                        <input type="checkbox" name="search[range][50][Screen_size][]" value="17-27">
                        </span>
                        <span class="inner-label">
                          17-26"
                          <span class="count">(31)</span>
                        </span>
                        </label>
                        <label class="inactive">
                        <span class="checkbox">
                        <input type="checkbox" name="search[range][50][Screen_size][]" value="17-27">
                        </span>
                        <span class="inner-label">
                          17-26"
                          <span class="count">(31)</span>
                        </span>
                        </label>
                        <label class="inactive">
                        <span class="checkbox">
                        <input type="checkbox" name="search[range][50][Screen_size][]" value="17-27">
                        </span>
                        <span class="inner-label">
                          17-26"
                          <span class="count">(31)</span>
                        </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="products-container">
            <ul class="products" itemscope="" itemtype="http://schema.org/ItemList">
                <meta itemprop="mainContentOfPage" content="true">
                <{section name=n loop=$products}>
                <li itemscope="" itemtype="http://schema.org/Product" itemprop="itemListElement">
                    <div itemscope="" itemtype="http://schema.org/Product" class="product-listing" data-product-id="7399">
                        <div class="product-listing__thumb">
                            <a href="details.php?proj=<{$project}>&id=<{$products[n].product_id}>">
                                <img class="product-listing__thumb-image" alt="Hisense LTDN50K321UWTSEU" src="http://images.pricerunner.com/product/225x169/1484843660/Hisense-LTDN50K321UWTSEU.jpg">
                            </a>
                        </div>
                        <div class="product-listing__name-and-key-fact">
                            <a class="product-listing__name--narrow" href="details.php?proj=<{$project}>&id=<{$products[n].product_id}>">
                                <span class="product-listing__model"><{$products[n].product_name}></span>
                            </a>
                            <div class="product-listing__key-fact">
                                Made by  <span class="product-listing__manufacturer"><{$products[n].product_manufacturer}></span>
                            </div>
                        </div>
                        <div class="product-listing__price-and-badges--with-bottom">
                            <div class="product-listing__price ">
                        <span class="price-value">
                            <a href="details.php?id=<{$products[n].product_id}>&proj=<{$project}>">
                                <div data-test="price-label">Total Score:</div>
                                <div data-test="price-amount"><{$products[n].score}></div>
                            </a>
                        </span>
                            </div>


                        </div>

                        <div class="product-listing__tested-date">
                            Tested date:<{$products[n].product_tested_date}>
                        </div>


                        <div class="product-listing__compare-button">
                            <form class="frm-comparison" data-product-id="7399" data-location="listing" data-action-add="/reviews/televisions/compare/add/hisense-ltdn50k321uwtseu" data-action-delete="/reviews/televisions/compare/delete/hisense-ltdn50k321uwtseu" action="/reviews/televisions/compare/add/hisense-ltdn50k321uwtseu" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="6WNzRTdafCES7pKllcZgMPPnB7HHxXYWyx+DHyLKI2/kdD50DshQ+57Jy2PhWEgmO1In8gXPoSSxui72YyU9pg=="><button name="button" type="submit" class="action-remove action-toggle">Remove from compare</button><button name="button" type="submit" class="action-add">Add to compare</button></form>
                        </div>

                    </div>

                </li>
                <{/section}>

            </ul>
            <div class="row">
                <ul class="pagenator">
                    <li class="pagebtn active" value="1">1</li>
                    <li class="pagebtn" value="2">2</li>
                    <li class="pagebtn" value="3">3</li>
                    <li class="pagebtn" value="4">4</li>
                    <li class="pagebtn" value="5">5</li>
                </ul>

            </div>
        </div>
    </div>
</div>
</div>
<div class="footer">
    <div class="triangle-bottomright"></div>
    <div class="footer-container"></div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".pagebtn").on("click",function(){
            var value=$(this).attr("value");
            console.log(value)
            $(".pagebtn").attr("class","pagebtn");
            $(this).attr("class","pagebtn active");
            $.get("products.php?page="+value+"&proj=<{$project}>",function(result){
                $(".products").html(result);
            })
        })
    })

</script>


</body>
</html>
