<?php /* Smarty version 2.6.19, created on 2016-04-02 08:17:09
         compiled from compare.tpl */ ?>
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

    <title><?php echo $this->_tpl_vars['title']; ?>
</title>

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
                    <li><a href="#" class="logout-btn">logout</a></li>
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
<div></div>
    <table class="compare-table">
        <thead>
          <tr class="action-comparison">
            <th></th>
              <th data-product-id="10344" scope="col">
                <form class="frm-comparison frm-remove-comparison" data-product-id="10344" data-location="comparison" data-action-add="/reviews/televisions/compare/add/lg-55ef950v" data-action-delete="/reviews/televisions/compare/delete/lg-55ef950v" action="/reviews/televisions/compare/delete/lg-55ef950v" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="MQgSmpNCOJuix/CRlWZAK/HPUdgKYaKZ1ny9+/9JTT0ISiFXf8s3VZek9nXX8kX35QH7E4xf9yzOvx6FKZEMhA=="><button name="button" type="submit" class="action-remove icon-close"></button><button name="button" type="submit" class="action-add">Add to compare</button></form>
              </th>
          </tr>

          <tr class="product-images">
            <th class="cont-edit-comparison" scope="row" rowspan="2">
              <div>
                
              </div>
            </th>

              <th data-product-id="10344" scope="col">
                <div class="product-image">
  <a href="/reviews/televisions/lg-55ef950v">
    <img class="comparison-product-thumbnail" alt="LG 55EF950V" src="http://dam.which.co.uk.s3-website-eu-west-1.amazonaws.com/3f5e2ab1-974e-4f6b-8b32-3c3787245769.jpg">
  </a>
</div>

              </th>
          </tr>

          <tr class="model">
              <th data-product-id="10344" scope="col">
                <div class="cell-inner-wrapper">
                  <div class="product-details-micro">
                    <div class="name">
                      <span class="manufacturer">LG</span>
                      <span class="model">55EF950V</span>
                    </div>
                  </div>
                </div>
              </th>
          </tr>
        </thead>

        <tbody>
          <tr class="score">
            <th scope="row">
              <label><input type="checkbox"><span class="inner-label">COTEST score
</span></label>
            </th>

              <td data-product-id="10344" class="behind-paywall">
  
                <div class="score-list">
                  <div class="star"></div>
                  <div class="star"></div>
                  <div class="star"></div>
                  <div class="star"></div>
                  <div class="star"></div>
                </div>
                <div class="score-text">1.5</div>
             
  </td>


          </tr>

           <!-- REMOVED PENDING RE-INTEGRATION OF REVOO
           <tr class="reevoo">
            <th scope="row">
              <label><input type="checkbox"/><span class="inner-label">Reevoo score</span></label>
            </th>


          </tr> -->

            <tr class="price">
              <th>
                <label>
                  <input type="checkbox">
                  <span class="inner-label">Price</span>
                </label>
              </th>
                  <td data-product-id="10344">
                    <div class="product-offers">
                      <span class="comparison-price">£2,499.00</span>
                      <span class="comparison-smallprint">(Today's best price)</span>
                        <a href="/reviews/televisions/lg-55ef950v/compare-prices"><span class="price-retailer-label">Compare <span>6 retailers</span></span></a>
                    </div>
                  </td>
            </tr>

          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Test results
</h2>
            </th>
                <td class="table-cell-wrapper" data-product-id="10344">
                  <div class="table-cell-wrapper-inner">
                    
                  </div>
                </td>
          </tr>

            <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Picture quality</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Freeview</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Freeview HD</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Satellite tuner picture</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Satellite HD tuner picture</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">HD TV</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">4K ultra HD</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">3D</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Viewing angle</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Sound quality</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Ease of use</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Installations and instructions</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Everyday use</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">EPG</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">PVR</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">PVR recording</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">PVR pausing</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Smart TV and multimedia</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Smart menu</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Smart apps</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Web browser</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Multimedia features</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Energy use</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>
  <tr class="test-results" data-category="tests">
    <th class="behind-paywall">
      <label><input type="checkbox">
        <span class="inner-label">Connections and tuners</span>
      </label>
    </th>

      <td data-product-id="10344" class="behind-paywall">
        Member exclusive
      </td>
  </tr>


            <tr class="subheading" data-category="summary-heading">
              <th>
                <h2>Summary</h2>
              </th>
            </tr>

                <tr class="technical-specifications" data-category="summary">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Screen resolution</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      3840 x 2160
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="summary">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Screen size</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      55
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="summary">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Resolution type</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Ultra-HD
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="summary">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Year released</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      2015
                    </td>
                </tr>
            <tr class="subheading" data-category="key-specification-heading">
              <th>
                <h2>Key specification</h2>
              </th>
            </tr>

                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Freeview</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Freeview HD</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">PVR</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">3D type</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      passive
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Depth</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      21.5
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Height</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      76.3
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">LED type</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      -
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Twin tuner PVR</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      No
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Weight</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      17.4
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">3D TV</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Backlight type</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      -
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Display type</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      OLED
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Width</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      122.5
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Curved</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      No
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Number of remote controls</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      1
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Satellite HD tuner</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Satellite tuner</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Turn on time</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      8.3
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="key-specification">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Freesat HD</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      -
                    </td>
                </tr>
            <tr class="subheading" data-category="smart-tv-heading">
              <th>
                <h2>Smart TV</h2>
              </th>
            </tr>

                <tr class="technical-specifications" data-category="smart-tv">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Smart TV</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="smart-tv">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Web browser</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="smart-tv">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">WiFi</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="smart-tv">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Netflix 4K</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="smart-tv">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Wi-fi built-in</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Built-in
                    </td>
                </tr>
            <tr class="subheading" data-category="connectivity-heading">
              <th>
                <h2>Connectivity</h2>
              </th>
            </tr>

                <tr class="technical-specifications" data-category="connectivity">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Headphone output</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="connectivity">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">USB ports</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      3
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="connectivity">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">HDMI ARC</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="connectivity">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Scart adapter</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="connectivity">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Bluetooth</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      No
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="connectivity">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Digital audio optical output</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="connectivity">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Digital audio output</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="connectivity">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">HDMI ports</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      3
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="connectivity">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Scart socket</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="connectivity">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Independent Volume Control</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Yes
                    </td>
                </tr>
            <tr class="subheading" data-category="power-use-heading">
              <th>
                <h2>Power use</h2>
              </th>
            </tr>

                <tr class="technical-specifications" data-category="power-use">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Annual running costs (£)</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      28
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="power-use">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Standby (watts)</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      0.21
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="power-use">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Switched on (watts)</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      115
                    </td>
                </tr>
            <tr class="subheading" data-category="ideal-picture-settings-heading">
              <th>
                <h2>Ideal picture settings</h2>
              </th>
            </tr>

                <tr class="technical-specifications" data-category="ideal-picture-settings">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Backlight setting</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      44
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="ideal-picture-settings">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Contrast</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      95
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="ideal-picture-settings">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Profile</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      Standard
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="ideal-picture-settings">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Sharpness</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      25
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="ideal-picture-settings">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Brightness</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      54
                    </td>
                </tr>
                <tr class="technical-specifications" data-category="ideal-picture-settings">
                  <th>
                    <label>
                      <input type="checkbox">
                      <span class="inner-label">Colour</span>
                    </label>
                  </th>

                    <td data-product-id="10344">
                      58
                    </td>
                </tr>

        </tbody>
      </table>



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