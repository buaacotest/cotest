<?php /* Smarty version 2.6.19, created on 2016-04-30 10:20:27
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
    <script type="text/javascript" src="js/jquery.min.js"></script>
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

<?php 
    require("navigation.php");
     ?>
<div class="content-container">
<!--
    <div class="crumbs">
      <a><div class="crumbs-item"><?php echo $this->_tpl_vars['lang']['Tests']; ?>
</div></a> >
      <a><div class="crumbs-item"><?php echo $this->_tpl_vars['lang']['Electronics']; ?>
</div></a> > 
      <div class="crumbs-item"><?php echo $this->_tpl_vars['lang']['Smartphones']; ?>
</div>

    </div>
    -->
    <div class="crumbs">
      <a href="index.php"><div class="crumbs-item">Tests</a> <sapn>></sapn></div>
      <a href=""><div class="crumbs-item">Electronics</a> <sapn>></sapn></div>
      <a href="products.php?proj=mobilephones"><div class="crumbs-item">Smartphones</a> <sapn>></sapn></div>
      <div class="crumbs-item">Comparison</div>

    </div>
    <div class="compare-title">3 smartphones in comparison</div>
    <table class="compare-table">
        <thead class="product-head">
          

          <tr class="product-images">
            <th class="edit-comparison" scope="row" rowspan="2">
       
                <button class="add-compare-btn">+ add more to compare</button>
         
            </th>
             <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              <th data-product-id="10344" scope="col">
                <div class="product-image">
                <a class="product-link" target="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['id']; ?>
">
                  <img class="comparison-product-thumbnail" alt="LG 55EF950V" src="http://dam.which.co.uk.s3-website-eu-west-1.amazonaws.com/3f5e2ab1-974e-4f6b-8b32-3c3787245769.jpg">
                </a>
                <div class="close" target="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['id']; ?>
"></div>
              </div>

              </th>
              <?php endfor; endif; ?>
          </tr>

          <tr class="product-names">
            <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              <th class="product-name"><?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['name']; ?>
</th>
            <?php endfor; endif; ?>

          </tr>
        </thead>

        <tbody>
          <tr class="score">
            <th scope="row">
              <div class="compare-th">
                COTEST score
              </div>
            </th>
             <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

              <td data-product-id="10344" class="behind-paywall">
                 <div class="score-list">
                    <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['evaluations'][0]['value'] <= 1.5): ?>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['evaluations'][0]['value'] > 1.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['evaluations'][0]['value'] <= 2.5): ?>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['evaluations'][0]['value'] > 2.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['evaluations'][0]['value'] <= 3.5): ?>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['evaluations'][0]['value'] > 3.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['evaluations'][0]['value'] <= 4.5): ?>
                                    <div class="star"></div>
                                    <div class="star"></div>

                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['evaluations'][0]['value'] > 4.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['evaluations'][0]['value'] <= 5.5): ?>
                                    <div class="star"></div>


                    <?php endif; ?>
                                 
                   </div>
                
                <div class="score-text"><?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['evaluations'][0]['value']; ?>
</div>
             
              </td>
              <?php endfor; endif; ?>


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
                <?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <td class="table-cell-wrapper" data-product-id="10344">
                  <div class="table-cell-wrapper-inner">
                    
                  </div>
                </td>
                <?php endfor; endif; ?>
          </tr>
           <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['products'][0]['evaluations'][0]['id_parent']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <tr class="test-results" data-category="tests">
              <th class="behind-paywall">
                <div class="compare-th">
                <?php echo $this->_tpl_vars['products'][0]['evaluations'][0]['id_parent'][$this->_sections['n']['index']]['name']; ?>

                </div>
                
              </th>
              <?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <td data-product-id="10344" class="behind-paywall">

                        <div class="score-list">
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['m']['index']]['evaluations'][0]['id_parent'][$this->_sections['n']['index']]['value'] <= 1.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['m']['index']]['evaluations'][0]['id_parent'][$this->_sections['n']['index']]['value'] > 1.5 && $this->_tpl_vars['products'][$this->_sections['m']['index']]['evaluations'][0]['id_parent'][$this->_sections['n']['index']]['value'] <= 2.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['m']['index']]['evaluations'][0]['id_parent'][$this->_sections['n']['index']]['value'] > 2.5 && $this->_tpl_vars['products'][$this->_sections['m']['index']]['evaluations'][0]['id_parent'][$this->_sections['n']['index']]['value'] <= 3.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['m']['index']]['evaluations'][0]['id_parent'][$this->_sections['n']['index']]['value'] > 3.5 && $this->_tpl_vars['products'][$this->_sections['m']['index']]['evaluations'][0]['id_parent'][$this->_sections['n']['index']]['value'] <= 4.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['m']['index']]['evaluations'][0]['id_parent'][$this->_sections['n']['index']]['value'] > 4.5 && $this->_tpl_vars['products'][$this->_sections['m']['index']]['evaluations'][0]['id_parent'][$this->_sections['n']['index']]['value'] <= 5.5): ?>
                                                        <div class="star"></div>


                                        <?php endif; ?>
                                                     
                   </div>
                  <?php echo $this->_tpl_vars['products'][$this->_sections['m']['index']]['evaluations'][0]['id_parent'][$this->_sections['n']['index']]['value']; ?>

                </td>
              <?php endfor; endif; ?>
            </tr>
          <?php endfor; endif; ?>
            


          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Features
              </h2>
            </th>
                <?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <td class="table-cell-wrapper" data-product-id="10344">
                  <div class="table-cell-wrapper-inner">
                    
                  </div>
                </td>
                <?php endfor; endif; ?>
          </tr>
           <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['products'][0]['property'][0]['id_propertygroup']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <tr class="test-results" data-category="tests">
              <th class="behind-paywall">
                <div class="compare-th">
                <?php echo $this->_tpl_vars['products'][0]['property'][0]['id_propertygroup'][$this->_sections['n']['index']]['name']; ?>

                </div>
               
              </th>
              <?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <td data-product-id="10344" class="behind-paywall">
              
                          <?php if ($this->_tpl_vars['products'][$this->_sections['m']['index']]['property'][0]['id_propertygroup'][$this->_sections['n']['index']]['value'] == 'Yes'): ?>
                            <img class="proper-signal"src="img/check2.png">
                            <?php elseif ($this->_tpl_vars['products'][$this->_sections['m']['index']]['property'][0]['id_propertygroup'][$this->_sections['n']['index']]['value'] == 'No'): ?>
                            <img class="proper-signal"src="img/cross.png">
                            <?php else: ?>
                            <?php echo $this->_tpl_vars['products'][$this->_sections['m']['index']]['property'][0]['id_propertygroup'][$this->_sections['n']['index']]['value']; ?>
 
                            <?php echo $this->_tpl_vars['products'][$this->_sections['m']['index']]['property'][0]['id_propertygroup'][$this->_sections['n']['index']]['unit']; ?>

                          <?php endif; ?>
                </td>

              <?php endfor; endif; ?>
            </tr>
          <?php endfor; endif; ?>


          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Pros
              </h2>
            </th>

                <?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <td class="table-cell-wrapper" data-product-id="10344">
                 
                    <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['products'][$this->_sections['m']['index']]['Pros']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <p><?php echo $this->_tpl_vars['products'][$this->_sections['m']['index']]['Pros'][$this->_sections['n']['index']]; ?>
</p>
                    <?php endfor; endif; ?>
                  
                </td>
                <?php endfor; endif; ?>
          </tr>
          <tr class="subheading" data-category="tests-heading">
            <th>
              <h2>Cons
              </h2>
            </th>
                <?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <td class="table-cell-wrapper" data-product-id="10344">
                 
                    <?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['products'][$this->_sections['m']['index']]['Cons']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <p><?php echo $this->_tpl_vars['products'][$this->_sections['m']['index']]['Cons'][$this->_sections['n']['index']]; ?>
</p>
                    <?php endfor; endif; ?>
                  
                </td>
                <?php endfor; endif; ?>
          </tr>
           
        </tbody>
      </table>
</div>

<?php 
  require("footer.php");
   ?>
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
<script type="text/javascript">
//解析get参数

var local_url = document.location.href; 
var compare_list=getPar("ids");
//关闭响应事件
$(".compare-title").text(compare_list.length+" smartphones in comparison")
$(".product-image").find(".close").on("click",function(){

    var index=$(this).parent().parent().index();
    console.log(index);
    var trs=$(".compare-table").find("tbody").find("tr");
    $(".product-images").children().eq(index).remove();
    $(".product-names").children().eq(index-1).remove();
    for(var i=0;i<trs.length;i++){
      $(trs[i]).children().eq(index).remove();
    }
    compare_list.splice(index-1,1);
    $(".compare-title").text(compare_list.length+"  smartphones in comparison")

})
$(".add-compare-btn").on("click",function(){
  var name_list=[];
  var names=$(".product-name");
  for (var i=0;i<names.length;i++){
    name_list.push($(names[i]).text());
    console.log($(names[i]).text())
  }
  var url="products.php?proj=mobilephones&ids="+JSON.stringify(compare_list)+"&names="+JSON.stringify(name_list);

  window.location.href=url;  
})
$(".product-link").on("click",function(){
  var id=$(this).attr("target")
   var name_list=[];
  var names=$(".product-name");
  for (var i=0;i<names.length;i++){
    name_list.push($(names[i]).text());
    console.log($(names[i]).text())
  }
  var url="details.php?proj=mobilephones&ids="+JSON.stringify(compare_list)+"&names="+JSON.stringify(name_list)+"&id="+id; 
 window.location.href=url; 
})
  $(function(){
  //获取要定位元素距离浏览器顶部的距离
    var topH = $(".product-head").offset().top;
    var top_width=$(".product-head").width();
    console.log(topH)
    var nav_height=60;
    //滚动条事件
    $(window).scroll(function(){
      //获取滚动条的滑动距离
      var scroH = $(this).scrollTop();
      //滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
      if(scroH>=topH-nav_height){
        $(".product-head").css({"position":"fixed","top":nav_height});
   
       // $(".product-head").css({"width":top_width});
      }else if(scroH<topH-nav_height){
        $(".product-head").css({"position":"static"});

      }
    })
  })
</script>
</html>