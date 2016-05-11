<?php /* Smarty version 2.6.19, created on 2016-05-10 12:35:22
         compiled from prolist.tpl */ ?>

                <p>&nbsp;<b><?php echo $this->_tpl_vars['productsNum']; ?>
  </b><?php echo $this->_tpl_vars['lang']['Smartphones']; ?>
 &nbsp;&nbsp;<span class="cur-page">1</span> / <?php echo $this->_tpl_vars['pageNum']; ?>
 <?php echo $this->_tpl_vars['lang']['pages']; ?>
</p>
             <ul class="products" pagenum="<?php echo $this->_tpl_vars['pageNum']; ?>
" itemscope="" itemtype="http://schema.org/ItemList">
                   
                   
                    <meta itemprop="mainContentOfPage" content="true">
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
                    <li >
                        <div class="product-listing">
                        <div class="product-thumb">
                              <a class="product-link" target="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
" >
                                <img class="product-listing__thumb-image" alt="Hisense LTDN50K321UWTSEU" src="data/<?php echo $this->_tpl_vars['project']; ?>
/pictures/<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
_01.jpg">
                              </a>
                          </div>
                          <a class="product-link"  target="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
" >
                            <span class="product-brand">
                              <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_manufacturer']; ?>

                            </span>
                            <br>
                            <div class="product-name">
                              <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_name']; ?>

                            </div>
                            
                          </a>
                          <div class="product-price">
                            <div data-test="price-label"><?php echo $this->_tpl_vars['lang']['RefPrice']; ?>
</div>
                                  
                          </div>
                

                            <div class="product-listing__tested-date">
                                <?php echo $this->_tpl_vars['lang']['TestedDate']; ?>
: <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_tested_date']; ?>

                            </div>
                            <div class="product-score">
                              
                                 <div class="score-list">
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 1.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 1.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 2.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 2.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 3.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 3.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 4.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 4.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 5.5): ?>
                                                        <div class="star"></div>


                                        <?php endif; ?>
                                                     
                                       </div>

                              
                              <div class="score">
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 1.5): ?>
                                              <?php echo $this->_tpl_vars['lang']['Verygood']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 1.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 2.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Good']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 2.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 3.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Average']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 3.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 4.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Sufficient']; ?>


                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 4.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 5.5): ?>
                                             <?php echo $this->_tpl_vars['lang']['Poor']; ?>

                                        <?php endif; ?>


                              / <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['score']; ?>
</div>
                            </div>
                            
                            <div class="product-compare-button" id="cp<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
" proId="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
" proName="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_name']; ?>
" add=0>
                              <button name="button" type="submit" class="action-remove action-toggle"><?php echo $this->_tpl_vars['lang']['RemoveFromCompare']; ?>
</button><button name="button" type="submit" class="action-add"><?php echo $this->_tpl_vars['lang']['AddToCompare']; ?>
</button>
                            </div>
                           
                        </div>

                      </li>
                    <?php endfor; endif; ?>
                    

                </ul>