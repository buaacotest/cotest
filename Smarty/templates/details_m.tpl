<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" type="text/css" href="css/cotest_m.css">
    <link rel="stylesheet" type="text/css" href="css/details_m.css">
      <link rel="stylesheet" type="text/css" href="css/footer_m.css">
       <link rel="stylesheet" type="text/css" href="css/review_m.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/changelanguage.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<!-- Static navbar -->

<body>
<{php}>
    require("navigation.php");
    <{/php}>
<div class="container  main-container review-container">
    <div class="row">


        <div class="col-md-12">
         <div class="pro-title text-center">
            <h5><a href="<{$directory.up.link}>"> <{$directory.up.name}></a></h5>
           <h3><{$product.manufacturer}>&nbsp<{$product.name}></h3>
         </div>
       </div>
       <div class="pro-score-banner">
           <div class="pro-score-banner-score"> <{if $score <=1.5}>
                                              <{ $lang.Verygood}>

                                        <{/if}>
                                        <{if $score>1.5 && $score<= 2.5}>
                                             <{ $lang.Good}>

                                        <{/if}>
                                        <{if $score >2.5 && $score <= 3.5}>
                                             <{ $lang.Average}>

                                        <{/if}>
                                        <{if $score >3.5 && $score <= 4.5}>
                                             <{ $lang.Sufficient}>

                                        <{/if}>
                                        <{if $score >4.5 && $score <= 5.5}>
                                             <{ $lang.Poor}>
                                        <{/if}><{$score}></div>
           <div class="product-score">
                <div class="score-list">
                <{if $score <= 1.5}>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>

                <{/if}>
                <{if $score > 1.5 && $score <= 2.5}>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>

                <{/if}>
                <{if $score > 2.5 && $score <= 3.5}>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>

                <{/if}>
                <{if $score >3.5 && $score <= 4.5}>
                                <div class="star"></div>
                                <div class="star"></div>

                <{/if}>
                <{if $score >4.5 && $score <= 5.5}>
                                <div class="star"></div>


                <{/if}>
                             
               </div>
            </div>
            
       </div>
       <div class="pro-option-banner">
           <button class="add-to-compare">Add to compare</button>
           <button class="go-to-compariosn">Go to comparison</button>
           <button class="back-to-list">Back to the list</button>
       </div>
        

        <div class="col-md-12">
            <ul class="nav nav-tabs pro-nav">
                <li role="presentation" class="proper-tab active" target="#panel1"id="tab1"><a ><{$lang.Summary}></a></li>
                <li role="presentation"class="proper-tab" target="#panel2"id="tab2"><a ><{$lang.Ratings}></a></li>
                <li role="presentation" class="proper-tab" target="#panel3"id="tab3"><a ><{$lang.Features}></a></li>
                
              </ul>
            
            <div class="pro-review-panel">
                <div  id="panel1" class="proper-panel">
                    
                    
                        <div class="img-tabs">
                            <ul class="nav nav-tabs pro-nav">
                                <li role="presentation" class="proper-tab active" target="#pro_img1"id="tab1"></li>
                                <!--
                                <li role="presentation"class="proper-tab" target="#pro_img2"id="tab2"></li>
                                -->
                                <li role="presentation" class="proper-tab" target="#pro_img3"id="tab3"></li>
                              </ul>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-12 pro-img text-center"id="pro_img1">

                                <img src="data/<{$project}>/picturesx/<{$product.id}>_01x.jpg" alt="Apple_iPad_Air_(16Gb+Wifi) 0290 00_00" >

                            </div>
                            <!--
                            <div class="col-md-12 pro-img text-center"id="pro_img2">
                                  
                                     <img src="img/ipad2.jpg" alt="Apple_iPad_Air_(16Gb+Wifi) 0290 00_00" >
                                  
                            </div>
                            -->
                            <div class="col-md-12 pro-img text-center"id="pro_img3">

                                <img src="data/<{$project}>/picturesx/<{$product.id}>_02x.jpg" >
                                  
                            </div>
                        </div>
                        <div class="pro-info">

                            
                            <div class="pro-info-item row">
                                <div class="col-md-12">
                                    <h4><{$lang.CotestVerdict}></h4>

                                </div>
                                <div class="col-md-12">
                                    <div class="pro-info-score-text">
                                    <{if $score <=1.5 }>
                                        <{$lang.Verygood}>
                                    <{/if}>
                                     <{if $score >1.5 && $score <= 2.5 }>
                                        <{$lang.Good}>
                                    <{/if}>
                                     <{if $score >2.5 && $score <= 3.5 }>
                                        <{$lang.Average}>
                                    <{/if}>
                                     <{if $score >3.5 && $score <= 4.5 }>
                                        <{$lang.Sufficient}>
                                    <{/if}>
                                    <{if $score >4.5 && $score <= 5.5 }>
                                        <{$lang.Poor}>
                                    <{/if}>
                                    </div>
                                    <div class="pro-info-score"><{$score}></div>
                                </div>
                                <div class="clear"></div>
                                <div class="col-md-12">
                                    <div class="pro-info-pros">
                                    <{$lang.Pros}></div>

                                </div>
                                <div class="row">
                                <{section name=n loop=$Pros}>
                                 <div class="col-md-12 pro-info-pros-text">
                                    
                                        <div class="pro-info-sign">+</div>
                                        <{$Pros[n]}>
                                    </div>
                                    
                                <{/section}>
                                <div class="clear"></div> 
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="pro-info-cons"><{$lang.Cons}></div>

                                </div>
                                <{section name=n loop=$Cons}>
                                   <div class="col-md-12 pro-info-pros-text">
                                    
                                        <div class="pro-info-sign">-</div>
                                        <{$Cons[n]}>
                                    </div>
                                <{/section}>
                            </div>
                          
                       
                            </div>
                </div>
                
                
                <div id="panel2" class="proper-panel">
                    <div class="proper-block">
                            <div class="row">
                                <div class="proper-head">
                                    <div class="col-4">
                                          <{$product.name}>
                                    </div>
                                    <div class="col-4 ">
                                        <{$lang.Weighting}>
                                    </div>
                                    
                                    <div class="col-4">
                                        <{$lang.Rating}>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    <div class="proper-block">
                        <div class="row">
                            <div class="proper-class">
                                <div class="col-4">
                                      <{$evals.name}>
                                </div>
                                <div class="col-4 ">
                                    <div class="proper-weight">
                                        100 %
                                    </div>
                                   
                                </div>
                                
                                <div class="col-4">
                                        
                              
                                       <div class="score-list">
                                        <{if $evals.value <= 1.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $evals.value > 1.5 && $evals.value <= 2.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $evals.value > 2.5 && $evals.value <= 3.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $evals.value > 3.5 && $evals.value <= 4.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $evals.value > 4.5 && $evals.value <= 5.5}>
                                                        <div class="star"></div>


                                        <{/if}>
                                                     
                                       </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <{section name=n loop=$evals.id_parent}>
                        <div class="proper-block">
                            <div class="row">
                                <div class="proper-title" toggle="1">
                                    <div class="col-4"><label><{$evals.id_parent[n].name}></label></div>
                                    <div class="col-4 proper-weight-panel">
                                        <div class="proper-weight">
                                        <{$evals.id_parent[n].weight}> %
                                        </div>
                                    </div>
                                   
                                    <div class="col-4">
                                    
                                        <div class="score-list">
                                        <{if $evals.id_parent[n].value <= 1.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $evals.id_parent[n].value > 1.5 && $evals.id_parent[n].value <= 2.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $evals.id_parent[n].value > 2.5 && $evals.id_parent[n].value <= 3.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $evals.id_parent[n].value > 3.5 && $evals.id_parent[n].value <= 4.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $evals.id_parent[n].value > 4.5 && $evals.id_parent[n].value <= 5.5}>
                                                        <div class="star"></div>


                                        <{/if}>
                                                     
                                       </div>
                                     <{$evals.id_parent[n].value}>
                                    </div>
                                </div>
                            </div>
                            <{foreach from=$evals.id_parent[n].id_parent item=foo}>
                                 <{ if ($foo.name !='') }>
                                 <div class="row proper-item">
                                     <div class="col-4"><label class="proper-item-name"><{$foo.name}></label></div>
                                    <div class="col-4 ">
                                            <div class="proper-weight">
                                            <{$foo.weight}> %
                                            </div>
                                    </div>
                                    <div class="col-4">
                                   
                                        <div class="score-list">
                                        <{if $foo.value <= 1.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $foo.value > 1.5 && $foo.value <= 2.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $foo.value > 2.5 && $foo.value <=  3.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $foo.value > 3.5 && $foo.value <= 4.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $foo.value > 4.5 && $foo.value <= 5.5}>
                                                        <div class="star"></div>


                                        <{/if}>
                                                     
                                       </div>
                                        <{$foo.value}>
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
                            <div class="col-6"><label class="proper-item-name"><{$props[n].id_propertygroup[m].name}></label></div>
                            <div class="col-6">
                            <{if $props[n].id_propertygroup[m].value eq 'Yes' and $props[n].id_propertygroup[m].type=='Boolean'}>
                            <img class="proper-signal"src="img/check2.png">
                            <{elseif $props[n].id_propertygroup[m].value eq 'No' and $props[n].id_propertygroup[m].type=='Boolean'}>
                            <img class="proper-signal"src="img/cross.png">
                            <{else}>
                            <{$props[n].id_propertygroup[m].value}> <{$props[n].id_propertygroup[m].unit}>
                            <{/if}>
                            </div>

                        </div>
                        <{/section}>
                    </div>
                    <{/section}>
                    <div class="supplement">
                    <ul>
                        <li>"nf" for "not featured", for missing features</li>
                        <li>"np" for "not possible", for missing features</li>
                        <li>"ny" for "not yet tested", because the model is still or not yet under test</li>
                        <li>"nc" for "not checked", for properties which are not mandatory according to the test programme</li>
                        <li>"nt" for "not tested" (or "new test"), because these results have not been gathered by lab for older models</li>
                        <li>"ns" for "not stated", because there is no information of the manufacturer</li>
                    </ul>
                        
                    </div>
                </div>
                <!--
                <div id="panel4" class="proper-panel">
                    <div class="comments">
                    <{section name=n loop=$comments}>
                      <div class="comment">
                      <div class="comment-item">
                          <div class="comment-user">
                             <{$comments[n].user}>
                          </div>
                          <div class="comment-time">
                              <{$comments[n].time}>
                          </div>
                          <div class="comment-cotent">
                              <{$comments[n].content}>
                          </div>
                          <div class="comment-tool">
                            <div class="reply">
                              <div class="reply-icon"></div>
                              reply(200)
                            </div>

                            <div class="like">
                              <div class="like-icon"></div>
                              like(200)
                            </div>
                            <div class="dislike">
                              <div class="dislike-icon"></div>
                              dislike(200)
                            </div>
                            
                        </div>
                        </div>
                          <div class="reply-panel">
                                <div class="reply-placeholder">
                                <textarea></textarea>
                                <button class="reply-btn" onlick="javascript:">回复</button>
                              </div>
                                <{section name=m loop=$comments[n].childs}>
                                <div class="reply-item">
                                    <div class="reply-user"><{$comments[n].childs[m].user}>
                                    <{if $comments[n].childs[m].replyer}>
                                      回复了 <{$comments[n].childs[m].replyer}>
                                    <{/if}>
                                      <em><{$comments[n].childs[m].time}></em>
                                    </div>
                                    <div class="reply-content">
                                      <{$comments[n].childs[m].content}>
                                    </div>
                                    <div class="reply-tool">
                                      <div class="reply-reply" toggle='1'>
                                        <div class="reply-icon"></div>
                                        回复
                                      </div>
                                    </div>
                                    <div class="reply-reply-placeholder">
                                        <textarea></textarea>
                                        <button class="reply-reply-btn">回复</button>
                                    </div>
                                </div>
                                <{/section}>
                                
                          </div>
                            
                          
                      </div>
                    <{/section}>
                    </div>
                    
                   

             

                </div>
                -->
                
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
<{php}>
  require("footer.php");
  <{/php}>
</body>
<script type="text/javascript" src="js/cotest.js"></script>
<script type="text/javascript" src="js/comment.js"></script>
<script type="text/javascript" src="js/review.js"></script>
<script>
    var compare_ids=getPar("ids");
    var id=getPar("id")+"";
    var compare_names=getPar("names");
    var project="<{$project}>";
    var product_id ="<{$id}>";
    if(!compare_ids){
        compare_ids=[]
    }
    if(!compare_names){
        compare_names=[]
    }
    $(".add-to-compare").on("click",function(){
        if(compare_ids.indexOf(id)==-1){
            compare_ids.push(id)
            compare_names.push('<{$product.name}>');
        } 
        
        window.location.href="products.php?proj="+'<{$project}>'+"&ids="+JSON.stringify(compare_ids)+"&names="+JSON.stringify(compare_names);
    })
    $(".go-to-compariosn").on("click",function(){
        if(compare_ids.indexOf(id)==-1){
            compare_ids.push(id)
            compare_names.push('<{$product.name}>');
        } 
        window.location.href="compare.php?proj="+'<{$project}>'+JSON.stringify(compare_ids);
    })
    $(".back-to-list").on("click",function(){
        window.location.href="products.php?proj="+'<{$project}>'+"&ids="+JSON.stringify(compare_ids)+"&names="+JSON.stringify(compare_names);
    })
    var page=getPar("page");
    if(page)
        fetchComments(product_id,$(".comments"),page);
    else{
        fetchComments(product_id,$(".comments"),1);
    }


</script>
</html>
