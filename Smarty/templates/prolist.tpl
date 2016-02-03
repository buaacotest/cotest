
<meta itemprop="mainContentOfPage" content="true">
<{section name=n loop=$products}>
    <li itemscope="" itemtype="http://schema.org/Product" itemprop="itemListElement">
        <div itemscope="" itemtype="http://schema.org/Product" class="product-listing" data-product-id="7399">
            <div class="product-listing__thumb">
                <a href="details.php?proj=<{$project}>&id=<{$products[n].product_id}>">
                    <img class="product-listing__thumb-image" alt="Hisense LTDN50K321UWTSEU" src="http://images.pricerunner.com/product/225x169/1484843660/Hisense-LTDN50K321UWTSEU.jpg">
                </a>
            </div>
            <div class="product-listing__name-and-key-fact">
                <a class="product-listing__name--narrow" href="details.php?proj=<{$project}>&id=<{$products[n].product_id}>">
                    <span class="product-listing__model"><{$products[n].product_name}></span>
                </a>
                <div class="product-listing__key-fact">
                    Made by  <span class="product-listing__manufacturer"><{$products[n].product_manufacturer}></span>
                </div>
            </div>
            <div class="product-listing__price-and-badges--with-bottom">
                <div class="product-listing__price ">
                        <span class="price-value">
                            <a href="details.php?id=<{$products[n].product_id}>&proj=<{$project}>">
                                <div data-test="price-label">Total Score:</div>
                                <div data-test="price-amount"><{$products[n].score}></div>
                            </a>
                        </span>
                </div>


            </div>

            <div class="product-listing__tested-date">
                Tested date:<{$products[n].product_tested_date}>
            </div>


            <div class="product-listing__compare-button">
                <form class="frm-comparison" data-product-id="7399" data-location="listing" data-action-add="/reviews/televisions/compare/add/hisense-ltdn50k321uwtseu" data-action-delete="/reviews/televisions/compare/delete/hisense-ltdn50k321uwtseu" action="/reviews/televisions/compare/add/hisense-ltdn50k321uwtseu" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="6WNzRTdafCES7pKllcZgMPPnB7HHxXYWyx+DHyLKI2/kdD50DshQ+57Jy2PhWEgmO1In8gXPoSSxui72YyU9pg=="><button name="button" type="submit" class="action-remove action-toggle">Remove from compare</button><button name="button" type="submit" class="action-add">Add to compare</button></form>
            </div>

        </div>

    </li>
    <{/section}>

