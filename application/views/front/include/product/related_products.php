<div class="bototm-detail">
    <div class="row">
        <div class="col-lg-3 col-md-4  col-xs-12">
            <div class="module releate-horizontal">
                <h3 class="modtitle"><span>Related Products</span></h3>
                <div class="releate-product ">
                    <div class="product-item-container">
                        <?php foreach ($related as $key => $value): ?>
                            <div class="item-element clearfix">
                                <div class="image">
                                    <img src="<?= base_url($value->path) ?>" title="<?= $value->title ?>"
                                         class="img-1 img-responsive" style="width: 90px; height: 90px;"/>
                                </div>
                                <div class="caption">

                                    <div class="ratings">
                                        <div class="rating-box">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        </div>
                                    </div>
                                    <h4><a href="<?= base_url('product/'.$value->id); ?>"><?= $value->title ?></a></h4>
                                    <div class="price">
                                        <span class="price-new"><?= $value->sales_prices ?></span>
                                        <span class="price-old"><?= $value->price ?></span>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>

