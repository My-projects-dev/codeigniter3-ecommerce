<div class="col-md-3 col-sm-4 col-xs-12">
    <!-- MODULE BESTSELER -->
    <div class="moduletable module best-seller">
        <h3 class="modtitle"><span>Best Sellers</span></h3>
        <div id="sp_extra_slider_20796849091482058205" class="so-extraslider">
            <div class="extraslider-inner best-seller-slider">
                <div class="item ">
                    <?php foreach ($bestSeller as $key => $value): ?>
                        <div class="item-wrap style1">
                            <div class="item-wrap-inner media">
                                <div class="media-left">
                                    <div class="item-image">
                                        <div class="item-img-info">
                                            <a href="<?=base_url('product/'.$value->slug)?>" class="lt-image" target="_self"
                                               title="Bikum masen dumas">
                                                <img class="lazyload img-1 img-responsive" data-sizes="auto"
                                                     src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                     style="width: 90px; height: 90px;"
                                                     data-src="<?= base_url($value->path); ?>"
                                                     alt="<?=$value->title?>" title="<?=$value->title?>"/>
                                                <img class="lazyload img-2 img-responsive" data-sizes="auto"
                                                     src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                     style="width: 90px; height: 90px;"
                                                     data-src="<?= base_url($value->image); ?>"
                                                     alt="<?=$value->title?>" title="<?=$value->title?>"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="item-info">
                                        <div class="rating">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        </div>
                                        <div class="item-title">
                                            <a href="<?=base_url('product/'.$value->slug)?>" target="_self" title="<?=$value->title?>">
                                                <?=$value->title?> </a>
                                        </div>
                                        <!-- Begin item-content -->
                                        <div class="item-content">
                                            <div class="content_price">
                                                <span class="price product-price"><?=$value->sales_prices?></span>
                                            </div>
                                        </div>
                                        <!-- End item-content -->
                                    </div>
                                </div><!-- End item-info -->
                            </div>
                            <!-- End item-wrap-inner -->
                        </div>
                    <?php if($key==2){break;} endforeach; ?>
                    <!-- End item-wrap -->
                </div>
                <div class="item ">
                    <?php foreach ($bestSeller as $key => $value):
                        if ($key >2 and $key<6):?>
                        <div class="item-wrap style1">
                            <div class="item-wrap-inner media">
                                <div class="media-left">
                                    <div class="item-image">
                                        <div class="item-img-info">
                                            <a href="<?=base_url('product/'.$value->slug)?>" class="lt-image" target="_self"
                                               title="Bikum masen dumas">
                                                <img class="lazyload img-1 img-responsive" data-sizes="auto"
                                                     src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                     style="width: 90px; height: 90px;"
                                                     data-src="<?= base_url($value->path); ?>"
                                                     alt="<?=$value->title?>" title="<?=$value->title?>"/>
                                                <img class="lazyload img-2 img-responsive" data-sizes="auto"
                                                     src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                     style="width: 90px; height: 90px;"
                                                     data-src="<?= base_url($value->image); ?>"
                                                     alt="<?=$value->title?>" title="<?=$value->title?>"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="item-info">
                                        <div class="rating">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        </div>
                                        <div class="item-title">
                                            <a href="<?=base_url('product/'.$value->slug)?>" target="_self" title="<?=$value->title?>">
                                                <?=$value->title?> </a>
                                        </div>
                                        <!-- Begin item-content -->
                                        <div class="item-content">
                                            <div class="content_price">
                                                <span class="price product-price"><?=$value->sales_prices?></span>
                                            </div>
                                        </div>
                                        <!-- End item-content -->
                                    </div>
                                </div><!-- End item-info -->
                            </div>
                            <!-- End item-wrap-inner -->
                        </div>
                    <?php endif; endforeach; ?>
                    <!-- End item-wrap -->
                </div>
            </div>
        </div>
    </div>
    <!-- END  -->
</div>
</div>
</div>
</div>