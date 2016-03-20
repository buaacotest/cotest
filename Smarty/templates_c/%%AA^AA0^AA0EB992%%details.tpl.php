<?php /* Smarty version 2.6.19, created on 2016-03-20 13:44:40
         compiled from details.tpl */ ?>
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
           <h3><?php echo $this->_tpl_vars['product']['name']; ?>
</h3>
         </div>
       </div>
       <div class="pro-score-banner">
           <div class="pro-score-banner-score"><?php echo $this->_tpl_vars['score']; ?>
</div>
           <div class="product-score">
                <div class="score-list">
                <?php if ($this->_tpl_vars['score'] >= 4.5): ?>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>

                <?php endif; ?>
                <?php if ($this->_tpl_vars['score'] >= 3.5 && $this->_tpl_vars['score'] < 4.5): ?>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>

                <?php endif; ?>
                <?php if ($this->_tpl_vars['score'] >= 2.5 && $this->_tpl_vars['score'] < 3.5): ?>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>

                <?php endif; ?>
                <?php if ($this->_tpl_vars['score'] >= 1.5 && $this->_tpl_vars['score'] < 2.5): ?>
                                <div class="star"></div>
                                <div class="star"></div>

                <?php endif; ?>
                <?php if ($this->_tpl_vars['score'] >= 0.5 && $this->_tpl_vars['score'] < 1.5): ?>
                                <div class="star"></div>


                <?php endif; ?>
                             
               </div>
            </div>
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
                                    <?php if ($this->_tpl_vars['score'] >= 4.5 && $this->_tpl_vars['score'] <= 5.5): ?>
                                   Poor
                                    <?php endif; ?>
                                     <?php if ($this->_tpl_vars['score'] >= 3.5 && $this->_tpl_vars['score'] < 4.5): ?>
                                   Sufficient
                                    <?php endif; ?>
                                     <?php if ($this->_tpl_vars['score'] >= 2.5 && $this->_tpl_vars['score'] < 3.5): ?>
                                   Average
                                    <?php endif; ?>
                                     <?php if ($this->_tpl_vars['score'] >= 1.5 && $this->_tpl_vars['score'] < 2.5): ?>
                                   Good
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['score'] >= 0.5 && $this->_tpl_vars['score'] < 1.5): ?>
                                   Very good
                                    <?php endif; ?>
                                    </div>
                                    <div class="pro-info-score"><?php echo $this->_tpl_vars['score']; ?>
</div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pro-info-pros">PROS</div>

                                </div>
                                <div class="col-md-12">
                                <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['Pros']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
                                    <div class="pro-info-pros-text"><?php echo $this->_tpl_vars['Pros'][$this->_sections['n']['index']]; ?>
</div>
                                <?php endfor; endif; ?>
                                </div>
                                <div class="col-md-12">
                                    <div class="pro-info-cons">CONS</div>

                                </div>
                                <div class="col-md-12">
                                 <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['Cons']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
                                    <div class="pro-info-cons-text"><?php echo $this->_tpl_vars['Cons'][$this->_sections['n']['index']]; ?>
</div>
                                <?php endfor; endif; ?>
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
                                          <?php echo $this->_tpl_vars['product']['name']; ?>

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
                                      <?php echo $this->_tpl_vars['evals']['name']; ?>

                                </div>
                                <div class="col-md-2">
                                   100 %
                                </div>
                                <div class="col-md-2">
                                    <?php echo $this->_tpl_vars['evals']['value']; ?>

                                </div>
                                <div class="col-md-2">
                                       <div class="score-list">
                                        <?php if ($this->_tpl_vars['evals']['value'] >= 4.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] >= 3.5 && $this->_tpl_vars['evals']['value'] < 4.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] >= 2.5 && $this->_tpl_vars['evals']['value'] < 3.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] >= 1.5 && $this->_tpl_vars['evals']['value'] < 2.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] >= 0.5 && $this->_tpl_vars['evals']['value'] < 1.5): ?>
                                                        <div class="star"></div>


                                        <?php endif; ?>
                                                     
                                       </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['evals']['id_parent']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
                        <div class="proper-block">
                            <div class="row">
                                <div class="proper-title" toggle="1">
                                    <div class="col-md-6"><label><?php echo $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['name']; ?>
</label></div>
                                    <div class="col-md-2"><?php echo $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['weight']; ?>
 %</div>
                                    <div class="col-md-2"><?php echo $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value']; ?>
</div>
                                    <div class="col-md-2">
                                     
                                        <div class="score-list">
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] >= 4.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] >= 3.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] < 4.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] >= 2.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] < 3.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] >= 1.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] < 2.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] >= 0.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] < 1.5): ?>
                                                        <div class="star"></div>


                                        <?php endif; ?>
                                                     
                                       </div>
           
                                    </div>
                                </div>
                            </div>
                            <?php $_from = $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['id_parent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['foo']):
?>
                                 <?php if (( $this->_tpl_vars['foo']['name'] != '' )): ?>
                                 <div class="row proper-item">
                                     <div class="col-md-6"><label class="proper-item-name"><?php echo $this->_tpl_vars['foo']['name']; ?>
</label></div>
                                    <div class="col-md-2"><?php echo $this->_tpl_vars['foo']['weight']; ?>
 %</div>
                                    <div class="col-md-2"><?php echo $this->_tpl_vars['foo']['value']; ?>
</div>
                                    <div class="col-md-2">
                                        <div class="score-list">
                                        <?php if ($this->_tpl_vars['foo']['value'] >= 4.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] >= 3.5 && $this->_tpl_vars['foo']['value'] < 4.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] >= 2.5 && $this->_tpl_vars['foo']['value'] < 3.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] >= 1.5 && $this->_tpl_vars['foo']['value'] < 2.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] >= 0.5 && $this->_tpl_vars['foo']['value'] < 1.5): ?>
                                                        <div class="star"></div>


                                        <?php endif; ?>
                                                     
                                       </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                        <?php endfor; endif; ?>
                        
                    

                </div>

                <div id="panel3" class="proper-panel">
                    <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['props']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
                    <div class="proper-block">
                        <div class="row">
                            <div class="proper-title " toggle="1">
                                <div class="col-md-12">
                                    <?php echo $this->_tpl_vars['props'][$this->_sections['n']['index']]['name']; ?>

                                </div>

                            </div>
                        </div>
                        <?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['props'][$this->_sections['n']['index']]['id_propertygroup']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['m']['show'] = true;
$this->_sections['m']['max'] = $this->_sections['m']['loop'];
$this->_sections['m']['step'] = 1;
$this->_sections['m']['start'] = $this->_sections['m']['step'] > 0 ? 0 : $this->_sections['m']['loop']-1;
if ($this->_sections['m']['show']) {
    $this->_sections['m']['total'] = $this->_sections['m']['loop'];
    if ($this->_sections['m']['total'] == 0)
        $this->_sections['m']['show'] = false;
} else
    $this->_sections['m']['total'] = 0;
if ($this->_sections['m']['show']):

            for ($this->_sections['m']['index'] = $this->_sections['m']['start'], $this->_sections['m']['iteration'] = 1;
                 $this->_sections['m']['iteration'] <= $this->_sections['m']['total'];
                 $this->_sections['m']['index'] += $this->_sections['m']['step'], $this->_sections['m']['iteration']++):
$this->_sections['m']['rownum'] = $this->_sections['m']['iteration'];
$this->_sections['m']['index_prev'] = $this->_sections['m']['index'] - $this->_sections['m']['step'];
$this->_sections['m']['index_next'] = $this->_sections['m']['index'] + $this->_sections['m']['step'];
$this->_sections['m']['first']      = ($this->_sections['m']['iteration'] == 1);
$this->_sections['m']['last']       = ($this->_sections['m']['iteration'] == $this->_sections['m']['total']);
?>
                        <div class="row proper-item">
                            <div class="col-md-6"><label class="proper-item-name"><?php echo $this->_tpl_vars['props'][$this->_sections['n']['index']]['id_propertygroup'][$this->_sections['m']['index']]['name']; ?>
</label></div>
                            <div class="col-md-6"><?php echo $this->_tpl_vars['props'][$this->_sections['n']['index']]['id_propertygroup'][$this->_sections['m']['index']]['value']; ?>
 <?php echo $this->_tpl_vars['props'][$this->_sections['n']['index']]['id_propertygroup'][$this->_sections['m']['index']]['unit']; ?>
</div>

                        </div>
                        <?php endfor; endif; ?>
                    </div>
                    <?php endfor; endif; ?>

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