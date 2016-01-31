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

    <title>{$title}</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cotest.css">
    <script src="js/bootstrap.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
            <ul class="nav navbar-nav">


            </ul>
            <!--
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../navbar/">Default</a></li>
              <li class="active"><a href="./">Static top <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>-->
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container review-container">
    <div class="row">


        <div class="col-md-12">
            <div class="pro-title text-center">
                <h2>{$product.name}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="pro-img text-center">
                <img src="http://i3.sinaimg.cn/gm/2014/0805/U1782P115DT20140805163226.jpg" alt="Apple_iPad_Air_(16Gb+Wifi) 0290 00_00" id="midimg" style="max-height:200px;max-width:200px;">
            </div>
        </div>
        <div class="col-md-8">
            <div class="pro-info">
                <div class="pro-info-item row">
                    <div class="col-md-2">
                        <label>厂商</label>
                    </div>
                    <div class="col-md-10">
                        {$product.manufacturer}
                    </div>
                </div>
                <div class="pro-info-item row">
                    <div class="col-md-2">
                        <label>简介</label>
                    </div>
                    <div class="col-md-10">
                        暂无
                    </div>
                </div>
                <div class="pro-info-item row">
                    <div class="col-md-2">
                        <label>总分</label>
                    </div>
                    <div class="col-md-10">
                        {$score}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <ul class="nav nav-tabs pro-nav">
                <li role="presentation" class="proper-tab active" target="#panel1"id="tab1"><a >Properties</a></li>
                <li role="presentation"class="proper-tab" target="#panel2"id="tab2"><a >Evaluations</a></li>

            </ul>
            <div class="pro-review-panel">
                <div id="panel1" class="proper-panel">
                {section name=n loop=$props}
                    <div class="proper-block">
                        <div class="row">
                            <div class="proper-title " toggle="1">
                                <div class="col-md-12">
                                    {$props[n].name}
                                </div>

                            </div>
                        </div>
                        {section name=m loop=$props[n].id_propertygroup}
                        <div class="row proper-item">
                            <div class="col-md-6"><label>{$props[n].id_propertygroup[m].name}</label></div>
                            <div class="col-md-6">{$props[n].id_propertygroup[m].max} {$props[n].id_propertygroup[m].unit}</div>

                        </div>
                        {/section}
                    </div>
                    {/section}

                </div>
                <div id="panel2" class="proper-panel">
                    <div class="proper-block">
                        <div class="row">
                            <div class="proper-title" toggle="1">
                                <div class="col-md-6">
                                   {$evals.name}
                                </div>
                                <div class="col-md-6">
                                    {$evals.value}
                                </div>
                            </div>
                        </div>
                        {section name=n loop=$evals.id_parent}
                        <div class="row proper-item">
                            <div class="col-md-6"><label>{$evals.id_parent[n].name}</label></div>
                            <div class="col-md-6">{$evals.id_parent[n].value}</div>

                        </div>
                        {/section}
                    </div>

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
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
<script type="text/javascript" src="js/review.js">
</script>
</html>
