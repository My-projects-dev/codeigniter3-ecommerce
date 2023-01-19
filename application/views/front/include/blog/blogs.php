<!--Middle Part Start-->
<div id="content" class="col-md-9 col-sm-8">
    <div class="blog-listitem">
        <?php foreach ($blogs as $key => $value): ?>
            <div class="blog-item ">
                <div class="itemBlogImg col-md-4 col-sm-12">
                    <div class="article-image banners">
                        <div>
                            <a class="popup-gallery" href="<?= base_url($value->image); ?>"><img
                                        src="<?= base_url($value->image); ?>"
                                        alt="<?= $value->title ?>"
                                        style="height: 170px">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="itemBlogContent col-md-8 col-sm-12">
                    <div class="article-title">
                        <h4>
                            <a href="<?= base_url('blog/' . $value->slug); ?>"><?= $value->title ?></a>
                        </h4>

                    </div>
                    <div class="article-sub-title">
								<span class="article-date">
									<i class="fa fa-calendar"></i>

                                    <?=substr($value->created_at, 0, 10); ?>
								</span>
                    </div>
                    <div class="article-description"><?= substr($value->description, 0, 300) ?>...</div>
                    <div class="blog-meta">
<!--								<span class="comment_count">-->
<!--                                    <a href="#">0 Comments</a>-->
<!--								</span>-->
                        <span class="author">
									<span>Post by </span>Admin
								</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <ul class="pagination">
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#>&gt;</a></li>
						<li><a href=" #">&gt;|</a></li>
        </ul>

    </div>
</div>
</div>
<!--Middle Part End-->
</div>
<!-- //Main Container -->