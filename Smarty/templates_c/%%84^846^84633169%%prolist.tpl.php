<?php /* Smarty version 2.6.19, created on 2016-03-14 09:09:59
         compiled from prolist.tpl */ ?>

                <p> &nbsp;<?php echo $this->_tpl_vars['productsNum']; ?>
 results</p>
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
                          <a href="details.php?proj=<?php echo $this->_tpl_vars['project']; ?>
&id=<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
">
                            <img class="product-listing__thumb-image" alt="Hisense LTDN50K321UWTSEU" src="http://images.pricerunner.com/product/225x169/1484843660/Hisense-LTDN50K321UWTSEU.jpg">
                          </a>
                      </div>
                      <a href="details.php?proj=<?php echo $this->_tpl_vars['project']; ?>
&id=<?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_id']; ?>
">
                        
                        <span class="product-name">
                          <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_name']; ?>

                        </span>
                        
                      </a>
                      <div class="product-price">
                        <div data-test="price-label">Today's best price:</div>
                              <div data-test="price-amount">£499.00</div>
                      </div>
            

                        <div class="product-listing__tested-date">
                          Tested date: <?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['product_tested_date']; ?>

                        </div>
                        <div class="product-score">
                          <div class="score-list">
                            <div class="star"></div>
                            <div class="star"></div>
                            <div class="star"></div>
                            <div class="star"></div>
                            <div class="star-b"></div>

                          </div>
                          <div class="score"><?php echo $this->_tpl_vars['products'][$this->_sections['n']['index']]['score']; ?>
</div>
                        </div>
                        <div class="product-compare-button">
                          <button name="button" type="submit" class="action-remove action-toggle">Remove from compare</button><button name="button" type="submit" class="action-add">Add to compare</button>
                        </div>

                    </div>

                  </li>
                <?php endfor; endif; ?>
                