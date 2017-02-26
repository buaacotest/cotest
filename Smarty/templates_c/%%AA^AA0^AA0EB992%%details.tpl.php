<?php /* Smarty version 2.6.19, created on 2016-12-11 01:53:28
         compiled from details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'details.tpl', 139, false),)), $this); ?>
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
    <link rel="icon" type="image/png" href="img/COTESTicon.png"/>
    <title><?php echo $this->_tpl_vars['title']; ?>
</title>
    <link href="css/bigpic.css" rel="stylesheet"/>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cotest.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/changelanguage.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>

    <![endif]-->
</head>
<script>
  var permission = '<?php echo $this->_tpl_vars['permission']; ?>
';
  if(permission == '-1'){
    window.location="login.php";
  }
</script>
<!-- Static navbar -->

<body>
        <?php 
    require("navigation.php");
     ?>
<div class="container  main-container review-container">
    <div class="row">


        <div class="col-md-12">
         <div class="pro-title text-center">
            <h5><a href="<?php echo $this->_tpl_vars['directory']['up']['link']; ?>
"> <?php echo $this->_tpl_vars['directory']['up']['name']; ?>
</a></h5>
           <h3><?php echo $this->_tpl_vars['product']['manufacturer']; ?>
&nbsp<?php echo $this->_tpl_vars['product']['name']; ?>
</h3>
         </div>
       </div>
       <div class="pro-score-banner">
           <div class="pro-score-banner-score"> <?php if ($this->_tpl_vars['score'] <= 1.5): ?>
                                              <?php echo $this->_tpl_vars['lang']['Verygood']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['score'] > 1.5 && $this->_tpl_vars['score'] <= 2.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Good']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['score'] > 2.5 && $this->_tpl_vars['score'] <= 3.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Average']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['score'] > 3.5 && $this->_tpl_vars['score'] <= 4.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Sufficient']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['score'] > 4.5 && $this->_tpl_vars['score'] <= 5.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Poor']; ?>

                                        <?php endif; ?><?php echo $this->_tpl_vars['score']; ?>
</div>
           <div class="product-score">
                <div class="score-list">
                <?php if ($this->_tpl_vars['score'] <= 1.5): ?>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>

                <?php endif; ?>
                <?php if ($this->_tpl_vars['score'] > 1.5 && $this->_tpl_vars['score'] <= 2.5): ?>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star-b"></div>

                <?php endif; ?>
                <?php if ($this->_tpl_vars['score'] > 2.5 && $this->_tpl_vars['score'] <= 3.5): ?>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star-b"></div>
                                <div class="star-b"></div>

                <?php endif; ?>
                <?php if ($this->_tpl_vars['score'] > 3.5 && $this->_tpl_vars['score'] <= 4.5): ?>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star-b"></div>
                                <div class="star-b"></div>
                                <div class="star-b"></div>

                <?php endif; ?>
                <?php if ($this->_tpl_vars['score'] > 4.5 && $this->_tpl_vars['score'] <= 5.5): ?>
                                <div class="star"></div>
                                <div class="star-b"></div>
                                <div class="star-b"></div>
                                <div class="star-b"></div>
                                <div class="star-b"></div>


                <?php endif; ?>

               </div>
            </div>

       </div>
       <div class="pro-option-banner">
           <button class="add-to-compare"><?php echo $this->_tpl_vars['lang']['AddToCompare']; ?>
</button>
           <button class="go-to-compariosn"><?php echo $this->_tpl_vars['lang']['GoToComparison']; ?>
</button>
           <button class="back-to-list"><?php echo $this->_tpl_vars['lang']['BackToTheList']; ?>
</button>
       </div>


        <div class="col-md-12">
            <ul class="nav nav-tabs pro-nav">
                <li role="presentation" class="proper-tab active" target="#panel1"id="tab1"><a ><?php echo $this->_tpl_vars['lang']['Summary']; ?>
</a></li>
                <li role="presentation"class="proper-tab" target="#panel2"id="tab2"><a ><?php echo $this->_tpl_vars['lang']['Ratings']; ?>
</a></li>
                <li role="presentation" class="proper-tab" target="#panel3"id="tab3"><a ><?php echo $this->_tpl_vars['lang']['Features']; ?>
</a></li>
              <!--  <li role="presentation" class="proper-tab " target="#panel4"id="tab4"><a ><?php echo $this->_tpl_vars['lang']['Review']; ?>
</a></li>
              -->
              </ul>

            <div class="pro-review-panel">
                <div  id="panel1" class="proper-panel">

                    <div class="col-md-12">
                        <div class="img-tabs">
                            <?php if (count($this->_tpl_vars['addrs']) > 1): ?>
                            <ul class="nav nav-tabs pro-nav">
                                <li role="presentation" class="proper-tab active" target="#pro_img1"id="tab1"></li>
                                <!--
                                <li role="presentation"class="proper-tab" target="#pro_img2"id="tab2"><a ><?php echo $this->_tpl_vars['lang']['Side']; ?>
</a></li>
                                -->
                                <li role="presentation" class="proper-tab" target="#pro_img2"id="tab2"></li>
                              </ul>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['addrs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <div class="col-md-12 pro-img text-center"id="pro_img<?php echo $this->_sections['n']['iteration']; ?>
">

                                <img src="data/<?php echo $this->_tpl_vars['project']; ?>
/picturesx/<?php echo $this->_tpl_vars['addrs'][$this->_sections['n']['index']]; ?>
.jpg" alt="<?php echo $this->_tpl_vars['product']['name']; ?>
" bigpic="data/<?php echo $this->_tpl_vars['project']; ?>
/picturesx/<?php echo $this->_tpl_vars['addrs'][$this->_sections['n']['index']]; ?>
.jpg"/>

                            </div>
                            <!--
                            <div class="col-md-12 pro-img text-center"id="pro_img2">

                                     <img src="img/ipad2.jpg" alt="Apple_iPad_Air_(16Gb+Wifi) 0290 00_00" >

                            </div>
                            -->

                            <?php endfor; endif; ?>
                        </div>
                        <div class="pro-info">


                            <div class="pro-info-item row">
                                <div class="col-md-12">
                                    <h4><?php echo $this->_tpl_vars['lang']['CotestVerdict']; ?>
</h4>

                                </div>
                                <div class="col-md-12">
                                    <div class="pro-info-score-text">
                                    <?php if ($this->_tpl_vars['score'] <= 1.5): ?>
                                        <?php echo $this->_tpl_vars['lang']['Verygood']; ?>

                                    <?php endif; ?>
                                     <?php if ($this->_tpl_vars['score'] > 1.5 && $this->_tpl_vars['score'] <= 2.5): ?>
                                        <?php echo $this->_tpl_vars['lang']['Good']; ?>

                                    <?php endif; ?>
                                     <?php if ($this->_tpl_vars['score'] > 2.5 && $this->_tpl_vars['score'] <= 3.5): ?>
                                        <?php echo $this->_tpl_vars['lang']['Average']; ?>

                                    <?php endif; ?>
                                     <?php if ($this->_tpl_vars['score'] > 3.5 && $this->_tpl_vars['score'] <= 4.5): ?>
                                        <?php echo $this->_tpl_vars['lang']['Sufficient']; ?>

                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['score'] > 4.5 && $this->_tpl_vars['score'] <= 5.5): ?>
                                        <?php echo $this->_tpl_vars['lang']['Poor']; ?>

                                    <?php endif; ?>
                                    </div>
                                    <div class="pro-info-score"><?php echo $this->_tpl_vars['score']; ?>
</div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pro-info-pros"><?php echo $this->_tpl_vars['lang']['Pros']; ?>
</div>

                                </div>

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
                                    <div class="col-md-12">
                                        <div class="pro-info-sign">+</div>
                                        <div class="pro-info-pros-text"><?php echo $this->_tpl_vars['Pros'][$this->_sections['n']['index']]; ?>
</div>
                                    </div>
                                <?php endfor; endif; ?>

                                <div class="col-md-12">
                                    <div class="pro-info-cons"><?php echo $this->_tpl_vars['lang']['Cons']; ?>
</div>

                                </div>
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
                                    <div class="col-md-12">
                                        <div class="pro-info-sign">-</div>
                                        <div class="pro-info-pros-text"><?php echo $this->_tpl_vars['Cons'][$this->_sections['n']['index']]; ?>
</div>
                                    </div>
                                <?php endfor; endif; ?>
                            </div>


                            </div>
                    </div>
                </div>


                <div id="panel2" class="proper-panel">
                    <div class="proper-block">
                            <div class="row">
                                <div class="proper-head">
                                    <div class="col-md-4">
                                          <?php echo $this->_tpl_vars['product']['name']; ?>

                                    </div>
                                    <div class="col-md-2 ">
                                        <?php echo $this->_tpl_vars['lang']['Weighting']; ?>

                                    </div>
                                    <div class="col-md-2">
                                        <?php echo $this->_tpl_vars['lang']['Score']; ?>

                                    </div>
                                    <div class="col-md-2">
                                        <?php echo $this->_tpl_vars['lang']['Rating']; ?>

                                    </div>
                                    <div class="col-md-2">
                                        <?php echo $this->_tpl_vars['lang']['Symbol']; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="proper-block">
                        <div class="row">
                            <div class="proper-class">
                                <div class="col-md-4">
                                      <?php echo $this->_tpl_vars['evals']['name']; ?>

                                </div>
                                <div class="col-md-2 ">
                                    <div class="proper-weight">
                                        100 %
                                    </div>

                                </div>
                                <div class="col-md-2">

                                    <?php echo $this->_tpl_vars['evals']['value']; ?>

                                </div>
                                <div class="col-md-2">
                                         <?php if ($this->_tpl_vars['evals']['value'] <= 1.5): ?>
                                              <?php echo $this->_tpl_vars['lang']['Verygood']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] > 1.5 && $this->_tpl_vars['evals']['value'] <= 2.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Good']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] > 2.5 && $this->_tpl_vars['evals']['value'] <= 3.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Average']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] > 3.5 && $this->_tpl_vars['evals']['value'] <= 4.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Sufficient']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] > 4.5 && $this->_tpl_vars['evals']['value'] <= 5.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Poor']; ?>

                                        <?php endif; ?>
                                </div>
                                <div class="col-md-2">
                                       <div class="score-list">
                                        <?php if ($this->_tpl_vars['evals']['value'] <= 1.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] > 1.5 && $this->_tpl_vars['evals']['value'] <= 2.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] > 2.5 && $this->_tpl_vars['evals']['value'] <= 3.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] > 3.5 && $this->_tpl_vars['evals']['value'] <= 4.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['value'] > 4.5 && $this->_tpl_vars['evals']['value'] <= 5.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>


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
                                    <div class="col-md-4"><label><?php echo $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['name']; ?>
</label></div>
                                    <div class="col-md-2 proper-weight-panel">
                                        <div class="proper-weight">
                                        <?php echo $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['weight']; ?>
 %
                                        </div>
                                    </div>
                                    <div class="col-md-2"><?php echo $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value']; ?>
</div>
                                    <div class="col-md-2">
                                         <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] <= 1.5): ?>
                                              <?php echo $this->_tpl_vars['lang']['Verygood']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] > 1.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] <= 2.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Good']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] > 2.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] <= 3.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Average']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] > 3.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] <= 4.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Sufficient']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] > 4.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] <= 5.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Poor']; ?>

                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-2">

                                        <div class="score-list">
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] <= 1.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] > 1.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] <= 2.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] > 2.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] <= 3.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] > 3.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] <= 4.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] > 4.5 && $this->_tpl_vars['evals']['id_parent'][$this->_sections['n']['index']]['value'] <= 5.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>


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
                                     <div class="col-md-4"><label class="proper-item-name"><?php echo $this->_tpl_vars['foo']['name']; ?>
</label></div>
                                    <div class="col-md-2 ">
                                            <div class="proper-weight">
                                            <?php echo $this->_tpl_vars['foo']['weight']; ?>
 %
                                            </div>
                                    </div>
                                    <div class="col-md-2"><?php echo $this->_tpl_vars['foo']['value']; ?>
</div>
                                    <div class="col-md-2">
                                            <?php if ($this->_tpl_vars['foo']['value'] <= 1.5): ?>
                                              <?php echo $this->_tpl_vars['lang']['Verygood']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] > 1.5 && $this->_tpl_vars['foo']['value'] <= 2.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Good']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] > 2.5 && $this->_tpl_vars['foo']['value'] <= 3.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Average']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] > 3.5 && $this->_tpl_vars['foo']['value'] <= 4.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Sufficient']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] > 4.5 && $this->_tpl_vars['foo']['value'] <= 5.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Poor']; ?>

                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="score-list">
                                        <?php if ($this->_tpl_vars['foo']['value'] <= 1.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] > 1.5 && $this->_tpl_vars['foo']['value'] <= 2.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] > 2.5 && $this->_tpl_vars['foo']['value'] <= 3.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] > 3.5 && $this->_tpl_vars['foo']['value'] <= 4.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['foo']['value'] > 4.5 && $this->_tpl_vars['foo']['value'] <= 5.5): ?>
                                                        <div class="star2"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>
                                                        <div class="star2-b"></div>


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
                            <div class="col-md-6">
                            <?php if ($this->_tpl_vars['props'][$this->_sections['n']['index']]['id_propertygroup'][$this->_sections['m']['index']]['value'] == 'Yes' && $this->_tpl_vars['props'][$this->_sections['n']['index']]['id_propertygroup'][$this->_sections['m']['index']]['type'] == 'Boolean'): ?>
                            <img class="proper-signal"src="img/check2.png">
                            <?php elseif ($this->_tpl_vars['props'][$this->_sections['n']['index']]['id_propertygroup'][$this->_sections['m']['index']]['value'] == 'No' && $this->_tpl_vars['props'][$this->_sections['n']['index']]['id_propertygroup'][$this->_sections['m']['index']]['type'] == 'Boolean'): ?>
                            <img class="proper-signal"src="img/cross.png">
                            <?php else: ?>
                            <?php echo $this->_tpl_vars['props'][$this->_sections['n']['index']]['id_propertygroup'][$this->_sections['m']['index']]['value']; ?>
 <?php echo $this->_tpl_vars['props'][$this->_sections['n']['index']]['id_propertygroup'][$this->_sections['m']['index']]['unit']; ?>

                            <?php endif; ?>
                            </div>

                        </div>
                        <?php endfor; endif; ?>
                    </div>
                    <?php endfor; endif; ?>
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
<?php 
  require("footer.php");
   ?>
</body>
<script type="text/javascript" src="js/cotest.js"></script>
<script type="text/javascript" src="js/comment.js"></script>
<script type="text/javascript" src="js/review.js"></script>
<script type="text/javascript" src="js/bigpic.js"></script>

<script >
    var id=getPar("id")+"";
    var project="<?php echo $this->_tpl_vars['project']; ?>
";
    var product_id ="<?php echo $this->_tpl_vars['id']; ?>
";

    $(".add-to-compare").on("click",function(){
        var item={}
        item[id]='<?php echo $this->_tpl_vars['product']['name']; ?>
'
         $.post("compareCart.php",{option:"add",items:item},function(result){
                 console.log('result');

                window.location.href="products.php?proj="+'<?php echo $this->_tpl_vars['project']; ?>
';

        });

  //      window.location.href="products.php?proj="+'<?php echo $this->_tpl_vars['project']; ?>
'+"&ids="+JSON.stringify(compare_ids)+"&names="+JSON.stringify(compare_names);
    })
    $(".go-to-compariosn").on("click",function(){
        var item={}
        item[id]='<?php echo $this->_tpl_vars['product']['name']; ?>
'
         $.post("compareCart.php",{option:"add",items:item},function(result){

                window.location.href="compare.php?proj="+'<?php echo $this->_tpl_vars['project']; ?>
';

        });
    })
    $(".back-to-list").on("click",function(){
        window.location.href="products.php?proj="+'<?php echo $this->_tpl_vars['project']; ?>
';
    })
    var page=getPar("page");
    if(page)
        fetchComments(product_id,$(".comments"),page);
    else{
        fetchComments(product_id,$(".comments"),1);
    }


</script>
</html>