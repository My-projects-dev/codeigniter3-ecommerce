<div class="block-banner banners banner-sn-1 wow fadeInUp">
    <?php
    if ($underSliderBanner):
    foreach ($underSliderBanner as $key => $value): ?>
        <div class="img-1 banner1-1 col-md-3">
            <a title="<?= $value->title ?>" href="<?= $value->link ?>"><img class="lazyload img-responsive"
                                                                            data-sizes="auto"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                            data-src="<?= base_url($value->image); ?>"
                                                                            alt="<?= $value->title ?>"
                                                                            style="height: 180px; width: 100%"></a>

        </div>
        <?php  endforeach; endif;?>
</div>
</div>
</div>