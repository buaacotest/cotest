        <p> &nbsp;<{$productsNum}> results</p>
        <ul class="products" itemscope="" itemtype="http://schema.org/ItemList" pagenum=<{$pageNum}> >
                    <meta itemprop="mainContentOfPage" content="true">
                     <{section name=n loop=$products}>
                    <li >
                        <div class="product-listing">
                        <div class="product-thumb">
                              <a href="details.php?proj=<{$project}>&id=<{$products[n].product_id}>">
                                <img class="product-listing__thumb-image" alt="Hisense LTDN50K321UWTSEU" src="http://images.pricerunner.com/product/225x169/1484843660/Hisense-LTDN50K321UWTSEU.jpg">
                              </a>
                          </div>
                          <a href="details.php?proj=<{$project}>&id=<{$products[n].product_id}>">
                            
                            <span class="product-name">
                              <{$products[n].product_name}>
                            </span>
                            
                          </a>
                          <div class="product-price">
                            <div data-test="price-label">Today's best price:</div>
                                  <div data-test="price-amount">£499.00</div>
                          </div>
                

                            <div class="product-listing__tested-date">
                              Tested date: <{$products[n].product_tested_date}>
                            </div>
                            <div class="product-score">
                              <div class="score-list">
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star-b"></div>

                              </div>
                              <div class="score"><{$products[n].score}></div>
                            </div>
                            <div class="product-compare-button">
                              <button name="button" type="submit" class="action-remove action-toggle">Remove from compare</button><button name="button" type="submit" class="action-add">Add to compare</button>
                            </div>

                        </div>

                      </li>
                    <{/section}>
                    

                </ul>