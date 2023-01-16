<!-- Block Spotlight3  -->
<div class="so-spotlight3">
    <div class="container">

        <?php foreach ($products as $key => $value):
            if (empty($value['sale'])) {
                break;
            } ?>
            <!-- Mod Supercategory -->


            <div class="module cus-style-supper-cate supper2" style="margin-top: 4px !important;">
                <div class="header">
                    <h3 class="modtitle">
								<span class="icon-color">
<!--									<i class="fa fa-mobile"></i>-->
									<?= $value['sale'][0]->cattitle; ?>
									<small class="arow-after"></small>
								</span>
                        <strong class="line-color"></strong>
                    </h3>
                </div>

                <div id="so_super_category_2" class="so-sp-cat first-load">
                    <div class="spcat-wrap ">
                        <div class="spcat-tabs-container" data-delay="300" data-duration="600" data-effect="flip"
                             data-ajaxurl="#" data-modid="155">
                            <!--Begin Tabs-->
                            <div class="spcat-tabs-wrap">
                                <span class="spcat-tab-selected">	Rating	</span>
                                <span class="spcat-tab-arrow">▼</span>
                                <ul class="spcat-tabs cf">
                                    <li class="spcat-tab" data-active-content=".items-category-sales"
                                        data-field_order="sales">
                                        <span class="spcat-tab-label">Sale</span>
                                    </li>
                                    <li class="spcat-tab" data-active-content=".items-category-p_date_added"
                                        data-field_order="p_date_added">
                                        <span class="spcat-tab-label">Date Add</span>
                                    </li>
                                    <li class="spcat-tab tab-sel tab-loaded"
                                        data-active-content=".items-category-rating"
                                        data-field_order="rating">
                                        <span class="spcat-tab-label">Rating</span>
                                    </li>
                                    <li class="spcat-tab " data-active-content=".items-category-p_quantity"
                                        data-field_order="p_quantity">
                                        <span class="spcat-tab-label">Quantity</span>
                                    </li>
                                    <li class="spcat-tab " data-active-content=".items-category-p_price"
                                        data-field_order="p_price">
                                        <span class="spcat-tab-label">Price</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Tabs-->
                        </div>
                        <div class="main-left">
                            <div class="banner-post-text">
                                <?php if ($value['bannerLeft']): ?>
                                    <a href="<?= $value['bannerLeft']->link ?>"
                                       title="<?= $value['bannerLeft']->title ?>"> <img
                                                src="<?= base_url($value['bannerLeft']->image); ?>"
                                                alt="<?= $value['bannerLeft']->title ?>" style="height: 283px;">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="hot-category">
                                <div class="category-wrap-cat">
                                    <div class="title-imageslider  sp-cat-title-parent">
                                        Hot Categories
                                    </div>

                                    <div id="cat_slider_2" class="slider">
                                        <div class="cat_slider_inner so_category_type_default">
                                            <?php foreach ($value['hotCategory'] as $keyy => $valuee): ?>
                                                <div class="item">
                                                    <div class="item-inner">
                                                        <div class="cat_slider_title">

                                                            <a href="<?= base_url('category/' . $valuee->id) ?>"
                                                               title="Tange manue" target="_self">
                                                                <i class="fa fa-caret-right"></i> <?= $valuee->title ?>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-right">
                            <div class="banner-pre-text">
                                <?php if ($value['bannerCenter']): ?>
                                    <a href="<?= $value['bannerCenter']->link ?>"
                                       title="<?= $value['bannerCenter']->title ?>"> <img
                                                class="lazyload img-responsive" data-sizes="auto"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                data-src="<?= base_url($value['bannerCenter']->image)?>"
                                                alt="<?= $value['bannerCenter']->title ?>"
                                                style="height: 283px;">
                                    </a>
                                <?php endif; ?>
                            </div>

                            <div class="spcat-items-container products-list grid show-pre show-row">
                                <!--Begin Items-->

                                <div class="spcat-items spcat-items-loaded items-category-rating product-layout spcat-items-selected"
                                     data-total="9">
                                    <div class="spcat-items-inner spcat00-4 spcat01-4 spcat02-3 spcat03-2 spcat04-1 flip">
                                        <div class="ltabs-items-inner ltabs-slider ">
                                            <?php foreach ($value['sale'] as $keyy => $valuee): ?>
                                                <div class="ltabs-item ">
                                                    <div class="item-inner product-thumb product-item-container transition ">
                                                        <div class="left-block">
                                                            <div class="product-image-container">
                                                                <div class="image">
                                                                    <a class="lt-image"
                                                                       href="<?= base_url('product/' . $valuee->id) ?>"
                                                                       target="_self"
                                                                       title="Verty nolen max..">
                                                                        <img class="lazyload img-1 img-responsive"
                                                                             data-sizes="auto"
                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                             style="height: 170px; width: 100%"
                                                                             data-src="<?= base_url($valuee->mainImage); ?>"
                                                                             alt="Apple Cinema 30" title="Emdcu meagi"/>
                                                                        <img class="lazyload img-2 img-responsive"
                                                                             data-sizes="auto"
                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                             style="height: 170px;"
                                                                             data-src="<?= base_url($valuee->image); ?>"
                                                                             alt="Apple Cinema 30" title="Emdcu meagi"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <span class="label label-sale">Sale</span>
                                                        </div>
                                                        <div class="right-block">
                                                            <div class="caption">
                                                                <div class="rating">
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                </div>
                                                                <h4>
                                                                    <a href="<?= base_url('product/' . $valuee->id) ?>"
                                                                       title="<?= $valuee->title ?>"
                                                                       target="_self">
                                                                        <?= $valuee->title ?> </a>
                                                                </h4>
                                                                <p class="price">
                                                                    <span class="price-new"><?= $valuee->sales_prices ?></span><span
                                                                            class="price-old"><?= $valuee->price ?></span>

                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="button-group">
                                                            <button class="wishlist btn-button" type="button"
                                                                    data-toggle="tooltip" title="Add to Wish List"
                                                                    onclick="wishlist.add('42');"><i
                                                                        class="fa fa-heart"></i>
                                                            </button>
                                                            <button class="addToCart" type="button"
                                                                    data-toggle="tooltip"
                                                                    title="Add to Cart" onclick="cart.add('42', '1');">
                                                                <i
                                                                        class="fa fa-shopping-cart"></i> <span
                                                                        class="hidden-xs"></span></button>
                                                            <button class="compare" type="button" data-toggle="tooltip"
                                                                    title="Compare this Product"
                                                                    onclick="compare.add('42');"><i
                                                                        class="fa fa-exchange"></i></button>
                                                            <a class="quickview iframe-link visible-lg btn-button"
                                                               data-toggle="tooltip" title=""
                                                               data-fancybox-type="iframe"
                                                               href="quickview.html" data-original-title="Quickview"> <i
                                                                        class="fa fa-search"></i> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="spcat-items spcat-items-loaded items-category-p_date_added product-layout"
                                     data-total="9">
                                    <div class="spcat-items-inner spcat00-4 spcat01-4 spcat02-3 spcat03-2 spcat04-1 flip">
                                        <div class="ltabs-items-inner ltabs-slider ">
                                            <?php foreach ($value['date'] as $keyy => $valuee): ?>
                                                <div class="ltabs-item ">
                                                    <div class="item-inner product-thumb product-item-container transition ">
                                                        <div class="left-block">
                                                            <div class="product-image-container">
                                                                <div class="image">
                                                                    <a class="lt-image"
                                                                       href="<?= base_url('product/' . $valuee->id) ?>"
                                                                       target="_self"
                                                                       title="Verty nolen max..">
                                                                        <img class="lazyload img-1 img-responsive"
                                                                             data-sizes="auto"
                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                             style="height: 170px; width: 100%"
                                                                             data-src="<?= base_url($valuee->mainImage); ?>"
                                                                             alt="Apple Cinema 30" title="Emdcu meagi"/>
                                                                        <img class="lazyload img-2 img-responsive"
                                                                             data-sizes="auto"
                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                             style="height: 170px;"
                                                                             data-src="<?= base_url($valuee->image); ?>"
                                                                             alt="Apple Cinema 30" title="Emdcu meagi"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <span class="label label-sale">Sale</span>
                                                        </div>
                                                        <div class="right-block">
                                                            <div class="caption">
                                                                <div class="rating">
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                </div>
                                                                <h4>
                                                                    <a href="<?= base_url('product/' . $valuee->id) ?>"
                                                                       title="<?= $valuee->title ?>"
                                                                       target="_self">
                                                                        <?= $valuee->title ?> </a>
                                                                </h4>
                                                                <p class="price">
                                                                    <span class="price-new"><?= $valuee->sales_prices ?></span><span
                                                                            class="price-old"><?= $valuee->price ?></span>

                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="button-group">
                                                            <button class="wishlist btn-button" type="button"
                                                                    data-toggle="tooltip" title="Add to Wish List"
                                                                    onclick="wishlist.add('42');"><i
                                                                        class="fa fa-heart"></i>
                                                            </button>
                                                            <button class="addToCart" type="button"
                                                                    data-toggle="tooltip"
                                                                    title="Add to Cart" onclick="cart.add('42', '1');">
                                                                <i
                                                                        class="fa fa-shopping-cart"></i> <span
                                                                        class="hidden-xs"></span></button>
                                                            <button class="compare" type="button" data-toggle="tooltip"
                                                                    title="Compare this Product"
                                                                    onclick="compare.add('42');"><i
                                                                        class="fa fa-exchange"></i></button>
                                                            <a class="quickview iframe-link visible-lg btn-button"
                                                               data-toggle="tooltip" title=""
                                                               data-fancybox-type="iframe"
                                                               href="quickview.html" data-original-title="Quickview"> <i
                                                                        class="fa fa-search"></i> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="spcat-items spcat-items-loaded items-category-sales product-layout"
                                     data-total="9">
                                    <div class="spcat-items-inner spcat00-4 spcat01-4 spcat02-3 spcat03-2 spcat04-1 flip">
                                        <div class="ltabs-items-inner ltabs-slider ">
                                            <?php foreach ($value['sale'] as $keyy => $valuee): ?>
                                                <div class="ltabs-item ">
                                                    <div class="item-inner product-thumb product-item-container transition ">
                                                        <div class="left-block">
                                                            <div class="product-image-container">
                                                                <div class="image">
                                                                    <a class="lt-image"
                                                                       href="<?= base_url('product/' . $valuee->id) ?>"
                                                                       target="_self"
                                                                       title="Verty nolen max..">
                                                                        <img class="lazyload img-1 img-responsive"
                                                                             data-sizes="auto"
                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                             style="height: 170px; width: 100%"
                                                                             data-src="<?= base_url($valuee->mainImage); ?>"
                                                                             alt="Apple Cinema 30" title="Emdcu meagi"/>
                                                                        <img class="lazyload img-2 img-responsive"
                                                                             data-sizes="auto"
                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                             style="height: 170px;"
                                                                             data-src="<?= base_url($valuee->image); ?>"
                                                                             alt="Apple Cinema 30" title="Emdcu meagi"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <span class="label label-sale">Sale</span>
                                                        </div>
                                                        <div class="right-block">
                                                            <div class="caption">
                                                                <div class="rating">
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                </div>
                                                                <h4>
                                                                    <a href="<?= base_url('product/' . $valuee->id) ?>"
                                                                       title="<?= $valuee->title ?>"
                                                                       target="_self">
                                                                        <?= $valuee->title ?> </a>
                                                                </h4>
                                                                <p class="price">
                                                                    <span class="price-new"><?= $valuee->sales_prices ?></span><span
                                                                            class="price-old"><?= $valuee->price ?></span>

                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="button-group">
                                                            <button class="wishlist btn-button" type="button"
                                                                    data-toggle="tooltip" title="Add to Wish List"
                                                                    onclick="wishlist.add('42');"><i
                                                                        class="fa fa-heart"></i>
                                                            </button>
                                                            <button class="addToCart" type="button"
                                                                    data-toggle="tooltip"
                                                                    title="Add to Cart" onclick="cart.add('42', '1');">
                                                                <i
                                                                        class="fa fa-shopping-cart"></i> <span
                                                                        class="hidden-xs"></span></button>
                                                            <button class="compare" type="button" data-toggle="tooltip"
                                                                    title="Compare this Product"
                                                                    onclick="compare.add('42');"><i
                                                                        class="fa fa-exchange"></i></button>
                                                            <a class="quickview iframe-link visible-lg btn-button"
                                                               data-toggle="tooltip" title=""
                                                               data-fancybox-type="iframe"
                                                               href="quickview.html" data-original-title="Quickview"> <i
                                                                        class="fa fa-search"></i> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="spcat-items spcat-items-loaded items-category-p_quantity product-layout"
                                     data-total="9">
                                    <div class="spcat-items-inner spcat00-4 spcat01-4 spcat02-3 spcat03-2 spcat04-1 flip">
                                        <div class="ltabs-items-inner ltabs-slider ">
                                            <?php foreach ($value['quantity'] as $keyy => $valuee): ?>
                                                <div class="ltabs-item ">
                                                    <div class="item-inner product-thumb product-item-container transition ">
                                                        <div class="left-block">
                                                            <div class="product-image-container">
                                                                <div class="image">
                                                                    <a class="lt-image"
                                                                       href="<?= base_url('product/' . $valuee->id) ?>"
                                                                       target="_self"
                                                                       title="Verty nolen max..">
                                                                        <img class="lazyload img-1 img-responsive"
                                                                             data-sizes="auto"
                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                             style="height: 170px; width: 100%"
                                                                             data-src="<?= base_url($valuee->mainImage); ?>"
                                                                             alt="Apple Cinema 30" title="Emdcu meagi"/>
                                                                        <img class="lazyload img-2 img-responsive"
                                                                             data-sizes="auto"
                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                             style="height: 170px;"
                                                                             data-src="<?= base_url($valuee->image); ?>"
                                                                             alt="Apple Cinema 30" title="Emdcu meagi"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <span class="label label-sale">Sale</span>
                                                        </div>
                                                        <div class="right-block">
                                                            <div class="caption">
                                                                <div class="rating">
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                </div>
                                                                <h4>
                                                                    <a href="<?= base_url('product/' . $valuee->id) ?>"
                                                                       title="<?= $valuee->title ?>"
                                                                       target="_self">
                                                                        <?= $valuee->title ?> </a>
                                                                </h4>
                                                                <p class="price">
                                                                    <span class="price-new"><?= $valuee->sales_prices ?></span><span
                                                                            class="price-old"><?= $valuee->price ?></span>

                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="button-group">
                                                            <button class="wishlist btn-button" type="button"
                                                                    data-toggle="tooltip" title="Add to Wish List"
                                                                    onclick="wishlist.add('42');"><i
                                                                        class="fa fa-heart"></i>
                                                            </button>
                                                            <button class="addToCart" type="button"
                                                                    data-toggle="tooltip"
                                                                    title="Add to Cart" onclick="cart.add('42', '1');">
                                                                <i
                                                                        class="fa fa-shopping-cart"></i> <span
                                                                        class="hidden-xs"></span></button>
                                                            <button class="compare" type="button" data-toggle="tooltip"
                                                                    title="Compare this Product"
                                                                    onclick="compare.add('42');"><i
                                                                        class="fa fa-exchange"></i></button>
                                                            <a class="quickview iframe-link visible-lg btn-button"
                                                               data-toggle="tooltip" title=""
                                                               data-fancybox-type="iframe"
                                                               href="quickview.html" data-original-title="Quickview"> <i
                                                                        class="fa fa-search"></i> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="spcat-items spcat-items-loaded items-category-p_price product-layout"
                                     data-total="9">
                                    <div class="spcat-items-inner spcat00-4 spcat01-4 spcat02-3 spcat03-2 spcat04-1 flip">
                                        <div class="ltabs-items-inner ltabs-slider ">
                                            <?php foreach ($value['price'] as $keyy => $valuee): ?>
                                                <div class="ltabs-item ">
                                                    <div class="item-inner product-thumb product-item-container transition ">
                                                        <div class="left-block">
                                                            <div class="product-image-container">
                                                                <div class="image">
                                                                    <a class="lt-image"
                                                                       href="<?= base_url('product/' . $valuee->id) ?>"
                                                                       target="_self"
                                                                       title="Verty nolen max..">
                                                                        <img class="lazyload img-1 img-responsive"
                                                                             data-sizes="auto"
                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                             style="height: 170px; width: 100%"
                                                                             data-src="<?= base_url($valuee->mainImage); ?>"
                                                                             alt="Apple Cinema 30" title="Emdcu meagi"/>
                                                                        <img class="lazyload img-2 img-responsive"
                                                                             data-sizes="auto"
                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                             style="height: 170px;"
                                                                             data-src="<?= base_url($valuee->image); ?>"
                                                                             alt="Apple Cinema 30" title="Emdcu meagi"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <span class="label label-sale">Sale</span>
                                                        </div>
                                                        <div class="right-block">
                                                            <div class="caption">
                                                                <div class="rating">
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i
                                                                                class="fa fa-star fa-stack-2x"></i></span>
                                                                </div>
                                                                <h4>
                                                                    <a href="<?= base_url('product/' . $valuee->id) ?>"
                                                                       title="<?= $valuee->title ?>"
                                                                       target="_self">
                                                                        <?= $valuee->title ?> </a>
                                                                </h4>
                                                                <p class="price">
                                                                    <span class="price-new"><?= $valuee->sales_prices ?></span><span
                                                                            class="price-old"><?= $valuee->price ?></span>

                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="button-group">
                                                            <button class="wishlist btn-button" type="button"
                                                                    data-toggle="tooltip" title="Add to Wish List"
                                                                    onclick="wishlist.add('42');"><i
                                                                        class="fa fa-heart"></i>
                                                            </button>
                                                            <button class="addToCart" type="button"
                                                                    data-toggle="tooltip"
                                                                    title="Add to Cart" onclick="cart.add('42', '1');">
                                                                <i
                                                                        class="fa fa-shopping-cart"></i> <span
                                                                        class="hidden-xs"></span></button>
                                                            <button class="compare" type="button" data-toggle="tooltip"
                                                                    title="Compare this Product"
                                                                    onclick="compare.add('42');"><i
                                                                        class="fa fa-exchange"></i></button>
                                                            <a class="quickview iframe-link visible-lg btn-button"
                                                               data-toggle="tooltip" title=""
                                                               data-fancybox-type="iframe"
                                                               href="quickview.html" data-original-title="Quickview"> <i
                                                                        class="fa fa-search"></i> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Items-->
                        </div>


                    </div>
                </div>
            </div>

            <!-- End Mod -->
            <!-- Banner Content2 -->
            <?php if ($value['bannerCenter']): ?>
            <div class="module banner">
                <div class="banners">
                    <div><a title="<?=$value['bannerLeft']->image?>" href="<?=$value['bannerLeft']->link?>"><img class="lazyload img-responsive" data-sizes="auto"
                                                               src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                               data-src="<?= base_url($value['bannerLeft']->image); ?>"
                                                               alt="<?=$value['bannerLeft']->image?>"></a></div>
                </div>
            </div>
        <?php endif;?>
            <!-- End Banner -->
        <?php endforeach; ?>
    </div>
</div>