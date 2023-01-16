<!-- Block Spotlight2  -->
<div class="so-spotlight2 ">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <!-- DEAL -->
                <div class="module so-deals">
                    <h3 class="modtitle"><span>Hot Deals</span></h3>
                    <div class="modcontent">
                        <div id="so_deals_14513931681482050581"
                             class="so-deal modcontent products-list grid clearfixbutton-type1 style2">
                            <div class="extraslider-inner product-layout deal-slider">
                                <?php foreach ($hotDeals as $key => $value): ?>
                                    <div class="product-thumb transition product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container">
                                                <div class="image">
                                                    <span class="label label-sale">Sale</span>
                                                    <a class="lt-image" href="<?=base_url('product/'.$value->id)?>" target="_self">
                                                        <img class="lazyload img-1 img-responsive" data-sizes="auto"
                                                             style="height: 170px; width: 100%"
                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                             data-src="<?= base_url($value->path); ?>"
                                                             alt="<?=$value->title?>" title="<?=$value->title?>"/>
                                                        <img class="lazyload img-2 img-responsive" data-sizes="auto"
                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                             data-src="<?= base_url($value->image); ?>"
                                                             alt="<?=$value->title?>" title="<?=$value->title?>"
                                                             style="height: 170px; width: 100%"/>
                                                    </a>
                                                    <div class="item-time">
                                                        <div class="item-timer">
                                                            <div class="defaultCountdown-30"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                <h4><a href="<?=base_url('product/'.$value->id)?>" target="_self" title="<?=$value->title?>">Elivers
                                                        chukalen..</a></h4>
                                                <p class="price">
                                                    <span class="price-new"><?=$value->sales_prices?></span> <span class="price-old"><?=$value->price?></span>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- End right block -->
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div><!--/.modcontent-->
                </div>
                <!-- END DEAL -->
            </div>
