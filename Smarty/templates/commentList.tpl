<{section name=n loop=$comments}>
                      <div class="comment">
                      <div class="comment-item">
                          <div class="comment-user">
                             <{$comments[n].user}>
                          </div>
                          <div class="comment-time">
                              <{$comments[n].create_time}>
                          </div>
                          <div class="comment-cotent">
                              <{$comments[n].content}>
                          </div>
                          <div class="comment-tool">
                            <div class="reply" onclick="javascript:replyClick(this)" >
                              <div class="reply-icon"></div>
                              reply(<{$comments[n].childs|@count}>)
                            </div>
                            <div class="like" onclick="javascript:like(this,'<{$comments[n].id_comment}>')" like="no">
                              <div class="like-icon"></div>
                              like(<{$comments[n].support}>)
                            </div>
                            <div class="dislike" onclick="javascript:dislike(this,'<{$comments[n].id_comment}>')" dislike="no">
                              <div class="dislike-icon"></div>
                              dislike(<{$comments[n].unsupport}>)
                            </div>
                            
                        </div>
                        </div>
                          <div class="reply-panel">
                                <div class="reply-placeholder">
                                <textarea onfocus="javascript:replyPlaceholderFocus(this)" onblur="javascript:replyPlaceholderBlur(this)"></textarea>
                                <button class="reply-btn" onclick="javacript:addComment('<{$id_product}>','0','<{$comments[n].id_comment}>',this,'<{$commentsNumber}>')">回复</button>
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
                                      <div class="reply-reply" onclick="javascript:replyReplyClick(this)" toggle='1'>
                                        <div class="reply-icon"></div>
                                        回复
                                      </div>
                                    </div>
                                    <div class="reply-reply-placeholder">
                                        <textarea></textarea>
                                        <button class="btn-comment" onclick="javacript:addComment('<{$id_product}>','<{$comments[n].childs[m].user}>','<{$comments[n].id_comment}>',this,'<{$commentsNumber}>')">回复</button>
                                    </div>
                                </div>
                                <{/section}>
                                
                          </div>
                            
                          
                      </div>
                    <{/section}>
                    <p>
                    <{if $commentsNumber >1}>
                      <div class="pagination" total="<{$commentsNumber}>">
                    
                      </div>
                  <{/if}>
                  <h4>Write your review</h4>
                    <div class="comment-submit">
                        <textarea class="comment-area" rows="3" cols="20"></textarea>
                        <button class="comment-btn" onclick="javacript:addComment('<{$id_product}>','0','0',this,'<{$commentsNumber}>')" > Submit</button>
                    </div>
