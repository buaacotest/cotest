<?php /* Smarty version 2.6.19, created on 2016-12-04 10:17:01
         compiled from commentList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'commentList.tpl', 20, false),)), $this); ?>
<h4><?php echo $this->_tpl_vars['lang']['UserReview']; ?>
</h4>
<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['comments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                      <div class="comment">
                      <div class="comment-item">
                          <div class="comment-user">
                             <?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['user']; ?>

                             <?php if ($this->_tpl_vars['comments'][$this->_sections['n']['index']]['product']): ?>
                             <em><?php echo $this->_tpl_vars['lang']['CommentOn']; ?>
 <a href="details.php?proj=<?php echo $this->_tpl_vars['project']; ?>
&id=<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['id_product']; ?>
"><?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['product']; ?>
</a></em>
                             <?php endif; ?>
                          </div>
                          <div class="comment-time">
                              <?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['create_time']; ?>

                          </div>
                          <div class="comment-cotent">
                              <?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['content']; ?>

                          </div>
                          <div class="comment-tool">
                            <div class="reply" onclick="javascript:replyClick(this)" >
                              <div class="reply-icon"></div>
                              <?php echo $this->_tpl_vars['lang']['Reply']; ?>
(<?php echo count($this->_tpl_vars['comments'][$this->_sections['n']['index']]['childs']); ?>
)
                            </div>
                            <?php if ($this->_tpl_vars['comments'][$this->_sections['n']['index']]['likeStatus'] == 1): ?>
                            <div class="like" onclick="javascript:like(this,'<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['id_comment']; ?>
')" like="yes">
                              
                                <div class="like-icon like-icon-active"></div>
                    
                    
                              <span><?php echo $this->_tpl_vars['lang']['Like']; ?>
(<em><?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['support']; ?>
</em>)</span>
                              
                            </div>
                            <?php else: ?>
                            <div class="like" onclick="javascript:like(this,'<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['id_comment']; ?>
')" like="no">
                              
                                <div class="like-icon like-icon"></div>
                              <span><?php echo $this->_tpl_vars['lang']['Like']; ?>
(<em><?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['support']; ?>
</em>)</span>
                              
                            </div>
                            <?php endif; ?>
                            <?php if ($this->_tpl_vars['comments'][$this->_sections['n']['index']]['dislikeStatus'] == 1): ?>
                            <div class="dislike" onclick="javascript:dislike(this,'<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['id_comment']; ?>
')" dislike="yes">
                              
                                <div class="dislike-icon dislike-icon-active"></div>
                    
                    
                              <span><?php echo $this->_tpl_vars['lang']['Dislike']; ?>
(<em><?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['unsupport']; ?>
</em>)</span>
                              
                            </div>
                            <?php else: ?>
                            <div class="dislike" onclick="javascript:dislike(this,'<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['id_comment']; ?>
')" dislike="no">
                              
                                <div class="dislike-icon"></div>
                              <span><?php echo $this->_tpl_vars['lang']['Dislike']; ?>
(<em><?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['unsupport']; ?>
</em>)</span>
                              
                            </div>
                            <?php endif; ?>
                            
                        </div>
                        </div>
                          <div class="reply-panel">
                                <div class="reply-placeholder">
                                <textarea onfocus="javascript:replyPlaceholderFocus(this)" onblur="javascript:replyPlaceholderBlur(this)"></textarea>
                                <button class="reply-btn" onclick="javacript:addComment('<?php echo $this->_tpl_vars['id_product']; ?>
','0','<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['id_comment']; ?>
',this)">回复</button>
                              </div>
                                <?php unset($this->_sections['m']);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['comments'][$this->_sections['n']['index']]['childs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <div class="reply-item">
                                    <div class="reply-user"><?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['childs'][$this->_sections['m']['index']]['user']; ?>

                                    <?php if ($this->_tpl_vars['comments'][$this->_sections['n']['index']]['childs'][$this->_sections['m']['index']]['replyer']): ?>
                                      <?php echo $this->_tpl_vars['lang']['ReplyTo']; ?>
 <?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['childs'][$this->_sections['m']['index']]['replyer']; ?>

                                    <?php endif; ?>
                                      <em><?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['childs'][$this->_sections['m']['index']]['time']; ?>
</em>
                                    </div>
                                    <div class="reply-content">
                                      <?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['childs'][$this->_sections['m']['index']]['content']; ?>

                                    </div>
                                    <div class="reply-tool">
                                      <div class="reply-reply" onclick="javascript:replyReplyClick(this)" toggle='1'>
                                        <div class="reply-icon"></div>
                                        <?php echo $this->_tpl_vars['lang']['Reply']; ?>

                                      </div>
                                    </div>
                                    <div class="reply-reply-placeholder">
                                        <textarea></textarea>
                                        <button class="btn-comment" onclick="javacript:addComment('<?php echo $this->_tpl_vars['id_product']; ?>
','<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['childs'][$this->_sections['m']['index']]['user']; ?>
','<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['id_comment']; ?>
',this)" ><?php echo $this->_tpl_vars['lang']['Reply']; ?>
</button>
                                    </div>
                                </div>
                                <?php endfor; endif; ?>
                                
                          </div>
                            
                          
                      </div>
                    <?php endfor; endif; ?>
                    <p>
                    <?php if ($this->_tpl_vars['commentsNumber'] > 1): ?>
                      <div class="pagination" total="<?php echo $this->_tpl_vars['commentsNumber']; ?>
">
                    
                      </div>
                  <?php endif; ?>
                  <h4><?php echo $this->_tpl_vars['lang']['WriteReview']; ?>
</h4>
                    <div class="comment-submit">
                        <textarea class="comment-area" rows="3" cols="20"></textarea>
                        <button class="comment-btn" onclick="javacript:addComment('<?php echo $this->_tpl_vars['id_product']; ?>
','0','0',this)" href="#?page=1"><?php echo $this->_tpl_vars['lang']['Submit']; ?>
</button>
                    </div>