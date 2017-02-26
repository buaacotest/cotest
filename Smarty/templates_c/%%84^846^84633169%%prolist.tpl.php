<?php /* Smarty version 2.6.19, created on 2016-12-11 02:49:13
         compiled from prolist.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', 'prolist.tpl', 6, false),)), $this); ?>

        <div class="product-container-panel">
         <div class="products-header">
         <div class="products-title" style="overflow:hidden">

           <h3>&nbsp;<b><?php echo $this->_tpl_vars['productsNum']; ?>
  </b><?php echo ((is_array($_tmp=$this->_tpl_vars['up']['name'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
 &nbsp;&nbsp;
           <!--<span class="cur-page">1</span> / <?php echo $this->_tpl_vars['pageNum']; ?>
  <?php echo $this->_tpl_vars['lang']['pages']; ?>

           --></h3>
           <div id="highlights-panel" class="row">

           </div>

         </div>
         <div >
            <div class="products-sort">

              <div class="name"><?php echo $this->_tpl_vars['lang']['SortBy']; ?>
</div>
                <div class="btn-group">
                  <button type="button" id="cur-sort"class="btn btn-default dropdown-toggle sort-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php echo $this->_tpl_vars['lang']['MostRecentlyTested']; ?>
 <span class="caret"></span>
                  </button>

                  <ul class="dropdown-menu" >
                    <?php if ($this->_tpl_vars['permission'] != -1): ?>
                    <li ><a class="dropdown-menu-item" name="score"href="#" onclick="javascript:sort(this)"><?php echo $this->_tpl_vars['lang']['HighestScore']; ?>
</a></li>
                    <?php endif; ?>
                    <li ><a class="dropdown-menu-item" name="priceUp" onclick="javascript:sort(this)" href="#"><?php echo $this->_tpl_vars['lang']['PriceLowToHigh']; ?>
</a></li>
                    <li><a onclick="javascript:sort(this)" class="dropdown-menu-item" name="priceDown"href="#"><?php echo $this->_tpl_vars['lang']['PriceHighToLow']; ?>
</a></li>
                    <li><a onclick="javascript:sort(this)" href="#"  class="dropdown-menu-item" name="time"><?php echo $this->_tpl_vars['lang']['MostRecentlyTested']; ?>
</a></li>
                  </ul>
                </div>
            </div>
            <div class="products-search">
                <input value="<?php echo $this->_tpl_vars['keyword']; ?>
"class="products-search-text"type="text" oninput="javascript:searchTextInput(this)" onfocus="javascript:searchTextFocus()" onblur="javascript:searchTextBlur()"></input>
                <div class="products-search-btn" onclick="javascript:search()">search</div>
                <ul class="keyword-panel"></ul>
            </div>
            </div>
            </div>
        <div class="products-container">

            <div id="products-block">

                <ul pagenum="<?php echo $this->_tpl_vars['pageNum']; ?>
" class="products" itemscope="" itemtype="http://schema.org/ItemList">


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
                              <a class="product-link" onclick="javascript:productLinkClick(this)" target="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
" >
                <img class="product-listing__thumb-image" alt="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_name']; ?>
" src="data/<?php echo $this->_tpl_vars['project']; ?>
/picturesx/<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
_01x.jpg">
                          </div>
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
 <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['price']; ?>
</div>

                          </div>


                            <div class="product-listing__tested-date">
                                <?php echo $this->_tpl_vars['lang']['TestedDate']; ?>
: <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_tested_date']; ?>

                            </div>
                            <?php if ($this->_tpl_vars['permission'] != -1): ?>
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
                                                        <div class="star-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 2.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 3.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 3.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 4.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>

                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] > 4.5 && $this->_tpl_vars['products'][$this->_sections['n']['index']]['score'] <= 5.5): ?>
                                                        <div class="star"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>
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
                            <?php endif; ?>
                            <div onclick="javascript:productCompareOnClick(this)" class="product-compare-button" id="cp<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
" proId="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
" proName="<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_manufacturer']; ?>
 <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_name']; ?>
" add=0>
                              <button name="button" type="submit" class="action-remove action-toggle"><?php echo $this->_tpl_vars['lang']['RemoveFromCompare']; ?>
</button><button name="button" type="submit" class="action-add"><?php echo $this->_tpl_vars['lang']['AddToCompare']; ?>
</button>
                            </div>

                        </div>

                      </li>
                    <?php endfor; endif; ?>


                </ul>
            </div>

            <!-- lishijie -->
            <div id="setpage"></div>
        </div>
        </div>