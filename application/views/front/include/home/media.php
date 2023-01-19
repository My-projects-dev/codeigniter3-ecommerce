<!--Block Spotlight4  -->
<div class="so-spotlight4">
    <div class="container">
        <div class="row">
            <div class="module so-latest-blog latest-blog col-md-4 col-sm-6 col-xs-12">
                <h3 class="modtitle"><span>News Updates</span></h3>
                <div id="so_latest_blog_180" class="so-blog-external button-type2 button-type2">
                    <div class="blog-external-simple">
                        <?php foreach ($lastBlogs as $key => $value): ?>
                            <div class="media">
                                <div class="item">
                                    <div class="media-body">

                                        <div class="media-date-added">
                                            <?php
                                            $date = date_create($value->created_at);
                                            echo date_format($date, "j");
                                            ?>
                                            <br>
                                            <span>
                                            <?php
                                            $date = date_create($value->created_at);
                                            echo date_format($date, "M");
                                            ?>
                                        </span>
                                        </div>
                                        <div class="media-content">
                                            <h4 class="media-heading">
                                                <a href="<?= base_url('blog/' . $value->slug) ?>"
                                                   title="<?= $value->title ?>"
                                                   target="_blank"><?= $value->title ?></a>
                                            </h4>
                                            <div class="description">
                                                <?= substr($value->description, 0, 100) ?>...
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="bestseller col-md-4 col-sm-6 col-xs-12">
                <div class="bestseller-inner">
                    <div>
                        <h3>Bestsellers</h3>
                        <?php foreach ($bestSeller as $key => $value):
                            if ($key > 5):?>
                                <div class="product-layout ">
                                    <div class="product-thumb transition">
                                        <div class="image"><a href="<?= base_url('product/' . $value->slug) ?>"><img
                                                        class="lazyload img-1 img-responsive" data-sizes="auto"
                                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        style="height: 46px"
                                                        data-src="<?= base_url($value->image); ?>"
                                                        title="<?= $value->title ?>" alt="<?= $value->title ?>"/></a>
                                        </div>
                                        <div class="caption">
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                            </div>
                                            <h4>
                                                <a href="<?= base_url('product/' . $value->slug) ?>"><?= $value->title ?></a>
                                            </h4>

                                            <p class="price">
                                                <span class="price-new"> <?= $value->sales_prices ?></span>
                                                <span class="price-old"><?= $value->price ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="module testimonial col-md-4 col-sm-12 col-xs-12">
                <div class="clients_say">
                    <div class="block-title"><h3>Testimonial</h3></div>
                    <div class="slider-clients-say">
                        <div class="block_content">
                            <div class="image"><img class="lazyload img-responsive" data-sizes="auto"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="<?= base_url(); ?>assets/frontend/image/demo/cms/clients_say.png"
                                                    alt="">
                            </div>
                            <div class="block-info">
                                <div class="text">"Aliquam ut tellus dignissim, cursus erat ultricies tellus cursus erat
                                    ultricies tellus.. Nulla tempus sollicitudin mauris cursus dictum. Commodo laoreet
                                    semper lorem."
                                </div>
                                <div class="info">
                                    <div class="author">- BonBon Supper</div>
                                </div>
                            </div>
                        </div>
                        <div class="block_content">
                            <div class="image"><img class="lazyload img-responsive" data-sizes="auto"
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="<?= base_url(); ?>assets/frontend/image/demo/cms/clients_say.png"
                                                    alt="">
                            </div>
                            <div class="block-info">
                                <div class="text">"Dignissim ut tellus Aliquam, cursus erat ultricies tellus cursus erat
                                    ultricies tellus.. Nulla tempus sollicitudin mauris cursus dictum. Commodo laoreet
                                    semper lorem."
                                </div>
                                <div class="info">
                                    <div class="author">- Aliquam Tellus</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>