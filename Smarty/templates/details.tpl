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
            <h5><a href="products.php?proj=mobilephones">Smartphones</a></h5>
           <h3><{$product.name}></h3>
         </div>
       </div>
       <div class="pro-score-banner">
           <div class="pro-score-banner-score"><{$score}></div>
           <div class="pro-score-banner-star">CCCC</div>
       </div>
        

        <div class="col-md-12">
            <ul class="nav nav-tabs pro-nav">
                <li role="presentation" class="proper-tab active" target="#panel1"id="tab1"><a >Summary</a></li>
                <li role="presentation"class="proper-tab" target="#panel2"id="tab2"><a >Test results</a></li>
                <li role="presentation" class="proper-tab" target="#panel3"id="tab3"><a >Features</a></li>
                <li role="presentation" class="proper-tab " target="#panel4"id="tab4"><a >Review</a></li>
                <li role="presentation" class="proper-tab " target="#panel5"id="tab5"><a >How to buy</a></li>
              </ul>
            
            <div class="pro-review-panel">
                <div  id="panel1" class="proper-panel">
                    
                    <div class="col-md-12">
                        <div class="img-tabs">
                            <ul class="nav nav-tabs pro-nav">
                                <li role="presentation" class="proper-tab active" target="#pro_img1"id="tab1"><a >Front</a></li>
                                <li role="presentation"class="proper-tab" target="#pro_img2"id="tab2"><a >Side</a></li>
                                <li role="presentation" class="proper-tab" target="#pro_img3"id="tab3"><a >Back</a>
                              </ul>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-12 pro-img text-center"id="pro_img1">
                                  
                                     <img src="img/ipad1.jpg" alt="Apple_iPad_Air_(16Gb+Wifi) 0290 00_00" >
                                  
                            </div>
                            <div class="col-md-12 pro-img text-center"id="pro_img2">
                                  
                                     <img src="img/ipad2.jpg" alt="Apple_iPad_Air_(16Gb+Wifi) 0290 00_00" >
                                  
                            </div>
                            <div class="col-md-12 pro-img text-center"id="pro_img3">
                                  
                                     <img src="img/ipad3.jpg" alt="Apple_iPad_Air_(16Gb+Wifi) 0290 00_00" >
                                  
                            </div>
                        </div>
                        <div class="pro-info">

                            
                            <div class="pro-info-item row">
                                <div class="col-md-12">
                                    <h4>COTEST Verdict</h4>

                                </div>
                                <div class="col-md-12">
                                    <div class="pro-info-score-text">
                                    <{if $score>=4.5 && $score<=5.5 }>
                                   Poor
                                    <{/if}>
                                     <{if $score>=3.5 && $score < 4.5 }>
                                   Sufficient
                                    <{/if}>
                                     <{if $score>=2.5 && $score < 3.5 }>
                                   Average
                                    <{/if}>
                                     <{if $score>=1.5 && $score < 2.5 }>
                                   Good
                                    <{/if}>
                                    <{if $score>=0.5 && $score < 1.5 }>
                                   Very good
                                    <{/if}>
                                    </div>
                                    <div class="pro-info-score"><{$score}></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pro-info-pros">PROS</div>

                                </div>
                                <div class="col-md-12">
                                <{section name=n loop=$Pros}>
                                    <div class="pro-info-pros-text"><{$Pros[n]}></div>
                                <{/section}>
                                </div>
                                <div class="col-md-12">
                                    <div class="pro-info-cons">CONS</div>

                                </div>
                                <div class="col-md-12">
                                 <{section name=n loop=$Cons}>
                                    <div class="pro-info-cons-text"><{$Cons[n]}></div>
                                <{/section}>
                                </div>
                            </div>
                          
                       
                            </div>
                    </div>
                </div>
                
                
                <div id="panel2" class="proper-panel">
                    <div class="proper-block">
                            <div class="row">
                                <div class="proper-head">
                                    <div class="col-md-6">
                                          <{$product.name}>
                                    </div>
                                    <div class="col-md-2">
                                       Weighting
                                    </div>
                                    <div class="col-md-2">
                                       Result
                                    </div>
                                    <div class="col-md-2">
                                       Rating
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="proper-block">
                        <div class="row">
                            <div class="proper-class">
                                <div class="col-md-6">
                                      <{$evals.name}>
                                </div>
                                <div class="col-md-2">
                                   100 %
                                </div>
                                <div class="col-md-2">
                                    <{$evals.value}>
                                </div>
                                <div class="col-md-2">
                                    CCCC
                                </div>
                            </div>
                        </div>
                    </div>
                        <{section name=n loop=$evals.id_parent}>
                        <div class="proper-block">
                            <div class="row">
                                <div class="proper-title" toggle="1">
                                    <div class="col-md-6"><label><{$evals.id_parent[n].name}></label></div>
                                    <div class="col-md-2"><{$evals.id_parent[n].weight}> %</div>
                                    <div class="col-md-2"><{$evals.id_parent[n].value}></div>
                                    <div class="col-md-2">
                                        CCCC
                                    </div>
                                </div>
                            </div>
                            <{foreach from=$evals.id_parent[n].id_parent item=foo}>
                                 <{ if ($foo.name !='') }>
                                 <div class="row proper-item">
                                     <div class="col-md-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><{$foo.name}></label></div>
                                    <div class="col-md-2"><{$foo.weight}> %</div>
                                    <div class="col-md-2"><{$foo.value}></div>
                                    <div class="col-md-2">
                                        CCCC
                                    </div>
                                </div>
                                <{/if}>
                            <{/foreach}>
                        </div>
                        <{/section}>
                        
                    

                </div>

                <div id="panel3" class="proper-panel">
                    <{section name=n loop=$props}>
                    <div class="proper-block">
                        <div class="row">
                            <div class="proper-title " toggle="1">
                                <div class="col-md-12">
                                    <{$props[n].name}>
                                </div>

                            </div>
                        </div>
                        <{section name=m loop=$props[n].id_propertygroup}>
                        <div class="row proper-item">
                            <div class="col-md-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><{$props[n].id_propertygroup[m].name}></label></div>
                            <div class="col-md-6"><{$props[n].id_propertygroup[m].value}> <{$props[n].id_propertygroup[m].unit}></div>

                        </div>
                        <{/section}>
                    </div>
                    <{/section}>

                </div>
                
            </div>
        </div>
    </div >
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
<script type="text/javascript" src="js/review.js"></script>
</html>
