
        <div class="product-container-panel">
         <div class="products-header">
         <div class="products-title" style="overflow:hidden">
           
           <h3>&nbsp;<b><{$productsNum}>  </b><{$up.name|lower}> &nbsp;&nbsp;
           <!--<span class="cur-page">1</span> / <{$pageNum}>  <{$lang.pages}>
           --></h3>
           <div id="highlights-panel" class="row">

           </div>
           
         </div>
         <div >
            <div class="products-sort">
              
              <div class="name"><{$lang.SortBy}></div>
                <div class="btn-group">
                  <button type="button" id="cur-sort"class="btn btn-default dropdown-toggle sort-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <{$lang.MostRecentlyTested}> <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" >
                    <li ><a class="dropdown-menu-item" name="score"href="#" onclick="javascript:sort(this)"><{$lang.HighestScore}></a></li>
                    <li ><a class="dropdown-menu-item" name="priceUp" onclick="javascript:sort(this)" href="#"><{$lang.PriceLowToHigh}></a></li>
                    <li><a onclick="javascript:sort(this)" class="dropdown-menu-item" name="priceDown"href="#"><{$lang.PriceHighToLow}></a></li>
                    <li><a onclick="javascript:sort(this)" href="#"  class="dropdown-menu-item" name="time"><{$lang.MostRecentlyTested}></a></li>
                  </ul>
                </div>
            </div>
            <div class="products-search">
                <input value="<{$keyword}>"class="products-search-text"type="text" oninput="javascript:searchTextInput(this)" onfocus="javascript:searchTextFocus()" onblur="javascript:searchTextBlur()"></input>
                <div class="products-search-btn" onclick="javascript:search()">serach</div>
                <ul class="keyword-panel"></ul>
            </div>
            </div>
            </div>
        <div class="products-container">

            <div id="products-block">
                
                <ul pagenum="<{$pageNum}>" class="products" itemscope="" itemtype="http://schema.org/ItemList">
                   
                   
                    <meta itemprop="mainContentOfPage" content="true">
                     <{section name=n loop=$products}>
                    <li >
                        <div class="product-listing">
                        <div class="product-thumb">
                              <a class="product-link" onclick="javascript:productLinkClick(this)" target="<{$products[n].product_id}>" >
                <img class="product-listing__thumb-image" alt="<{$products[n].product_name}>" src="data/<{$project}>/picturesx/<{$products[n].product_id}>_01x.jpg">                              </a>
                          </div>
                          <a class="product-link"  target="<{$products[n].product_id}>" >
                            <span class="product-brand">
                              <{$products[n].product_manufacturer}>
                            </span>
                            <br>
                            <div class="product-name">
                              <{$products[n].product_name}>
                            </div>
                            
                          </a>
                          <div class="product-price">
                            <div data-test="price-label"><{$lang.RefPrice}> <{$products[n].price}></div>
                                  
                          </div>
                

                            <div class="product-listing__tested-date">
                                <{$lang.TestedDate}>: <{$products[n].product_tested_date}>
                            </div>
                            <div class="product-score">
                              
                                 <div class="score-list">
                                        <{if $products[n].score <=1.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>

                                        <{/if}>
                                        <{if $products[n].score >1.5 && $products[n].score <= 2.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star-b"></div>

                                        <{/if}>
                                        <{if $products[n].score >2.5 && $products[n].score <= 3.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>

                                        <{/if}>
                                        <{if $products[n].score >3.5 && $products[n].score <= 4.5}>
                                                        <div class="star"></div>
                                                        <div class="star"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>
                                                        <div class="star-b"></div>

                                        <{/if}>
                                        <{if $products[n].score >4.5 && $products[n].score <= 5.5}>
                                                        <div class="star"></div>
                                                        <div class="star_b"></div>
                                                        <div class="star_b"></div>
                                                        <div class="star_b"></div>
                                                        <div class="star_b"></div>
                                        <{/if}>
                                                     
                                       </div>

                              
                              <div class="score">
                                        <{if $products[n].score <=1.5}>
                                              <{ $lang.Verygood}>

                                        <{/if}>
                                        <{if $products[n].score >1.5 && $products[n].score <= 2.5}>
                                             <{ $lang.Good}>

                                        <{/if}>
                                        <{if $products[n].score >2.5 && $products[n].score <= 3.5}>
                                             <{ $lang.Average}>

                                        <{/if}>
                                        <{if $products[n].score >3.5 && $products[n].score <= 4.5}>
                                             <{ $lang.Sufficient}>

                                        <{/if}>
                                        <{if $products[n].score >4.5 && $products[n].score <= 5.5}>
                                             <{ $lang.Poor}>
                                        <{/if}>


                              / <{$products[n].score}></div>
                            </div>
                            
                            <div onclick="javascript:productCompareOnClick(this)" class="product-compare-button" id="cp<{$products[n].product_id}>" proId="<{$products[n].product_id}>" proName="<{$products[n].product_manufacturer}> <{$products[n].product_name}>" add=0>
                              <button name="button" type="submit" class="action-remove action-toggle"><{$lang.RemoveFromCompare}></button><button name="button" type="submit" class="action-add"><{$lang.AddToCompare}></button>
                            </div>
                           
                        </div>

                      </li>
                    <{/section}>
                    

                </ul>
            </div>
       
            <!-- lishijie -->
            <div id="setpage"></div>
        </div>
        </div>
    

    