 <!-- Filters -->
        <div class="product-filter filters-panel">
            <div class="row">
                <div class="col-md-2 visible-lg">
                    <div class="view-mode">
                        <div class="list-view">
                            <button class="btn btn-default grid " data-view="grid" data-toggle="tooltip"
                                    data-original-title="Grid"><i class="fa fa-th"></i></button>
                            <button class="btn btn-default list active" data-view="list" data-toggle="tooltip"
                                    data-original-title="List"><i class="fa fa-th-list"></i></button>
                        </div>
                    </div>
                </div>
                <div class="short-by-show form-inline text-right col-md-7 col-sm-8 col-xs-12">
                    <div class="form-group short-by">
                        <label class="control-label" for="input-sort">Sort By:</label>
                        <select id="input-sort" class="form-control">
                            <option value="" selected="selected">Default</option>
                            <option value="">Name (A - Z)</option>
                            <option value="">Name (Z - A)</option>
                            <option value="">Price (Low &gt; High)</option>
                            <option value="">Price (High &gt; Low)</option>
                            <option value="">Rating (Highest)</option>
                            <option value="">Rating (Lowest)</option>
                            <option value="">Model (A - Z)</option>
                            <option value="">Model (Z - A)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="input-limit">Show:</label>
                        <select id="input-limit" class="form-control">
                            <option value="" selected="selected">9</option>
                            <option value="">25</option>
                            <option value="">50</option>
                            <option value="">75</option>
                            <option value="">100</option>
                        </select>
                    </div>
                </div>
                <div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">
                    <ul class="pagination">
                        <li class="active"><span>1</span></li>
                        <li><a href="">2</a></li>
                        <li><a href="">&gt;</a></li>
                        <li><a href="">&gt;|</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- //end Filters -->
        <!--changed listings-->
        <div class="products-list row list">
            <?php foreach ($product as $key => $value): ?>
                <div class="product-layout  col-md-3 col-sm-6 col-xs-12">
                    <div class="product-item-container">
                        <div class="left-block">

                            <div class="product-image-container lazy second_img  lazy-loaded">
                                <?php
                                $img1 = '';
                                $img2 = '';
                                foreach ($value->image as $imgKey => $imgValue) {
                                    if ($imgValue->main == 1) {
                                        $img1 = $imgValue->path;
                                    } else {
                                        $img2 = $imgValue->path;
                                    }
                                };

                                if (empty($img2)) {
                                    $img2 = $img1;
                                }
                                ?>
                                <img data-src="<?= base_url($img1); ?>"
                                     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                     alt="<?= $value->title; ?>" class="img-1 img-responsive" style="height: 170px;">
                                <img data-src="<?= base_url($img2); ?>"
                                     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                     alt="<?= $value->title; ?>" class="img-2 img-responsive" style="height: 170px;">
                            </div>
                            <!--Sale Label-->
                            <span class="label label-sale">Sale</span>
                        </div>

                        <div class="right-block">
                            <div class="caption">
                                <h4><a href="<?= base_url('product/'.$value->slug); ?>""><?= $value->title; ?></a></h4>
                                <div class="ratings">
                                    <div class="rating-box">
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    </div>
                                </div>
                                <div class="price">
                                    <span class="price-new"><?= $value->sales_prices; ?></span>
                                    <span class="price-old"><?= $value->price; ?></span>
                                    <span class="label label-percent"><?= round(($value->sales_prices * 100 / $value->price) - 100) ?>%</span>
                                </div>
                                <div class="description item-desc hidden">
                                    <p><?= $value->description; ?></p>
                                </div>
                            </div>

                        </div><!-- right block -->
                        <div class="button-group">
                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title=""
                                    onclick="wishlist.add('42');" data-original-title="Add to Wish List"><i
                                        class="fa fa-heart"></i></button>
                            <button class="addToCart" type="button" data-toggle="tooltip" title=""
                                    onclick="cart.add('42', '1');" data-original-title="Add to Cart"><i
                                        class="fa fa-shopping-cart"></i> <span
                                        class="hidden-xs name-cart">Add to Cart</span></button>
                            <button class="compare" type="button" data-toggle="tooltip" title=""
                                    onclick="compare.add('42');" data-original-title="Compare this Product"><i
                                        class="fa fa-exchange"></i></button>
                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title=""
                               data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview"> <i
                                        class="fa fa-search"></i> </a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
        <!--// End Changed listings-->
        <!-- Filters -->
        <div class="product-filter product-filter-bottom filters-panel">
            <div class="row">
                <div class="col-md-2 hidden-sm hidden-xs">

                </div>
                <div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
                    <div class="form-group" style="margin: 3px 10px">Showing 1 to 9 of 10 (2 Pages)</div>
                </div>
                <div class="box-pagination col-md-3 col-sm-4 text-right">
<!--                    <ul class="pagination">-->
<!--                        <li class="active"><span>1</span></li>-->
<!--                        <li><a href="#">2</a></li>-->
<!--                        <li><a href="#">&gt;</a></li>-->
<!--                        <li><a href="#">&gt;|</a></li>-->
<!---->
<!--                    </ul>-->
                    <?=$links?>
                </div>

            </div>
        </div>
        <!-- //end Filters -->
    </div>
</div>
<!--Middle Part End-->
</div>
</div>
<!-- //Main Container -->