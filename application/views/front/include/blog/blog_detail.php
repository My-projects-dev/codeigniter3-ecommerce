
			<!--Middle Part Start-->
			<div id="content" class="col-md-9 col-sm-8">
				<div class="article-info">
					<div class="blog-header">
						<h3><?= $blog->title ?></h3>
					</div>
					<div class="article-sub-title">
						<span class="article-author">Post by: <a href="#"> Admin</a></span>
						<span class="article-date">Created Date: <?= $blog->created_at ?></span>
						<span class="article-comment">0  Comments</span>
					</div>
					<div class="form-group">
						<a href="<?= base_url($blog->image); ?>" class="image-popup"><img src="<?= base_url($blog->image); ?>"></a>
					</div>

					<div class="article-description">
                        <?= $blog->description ?>
					</div>

<!--					<div class="panel panel-default related-comment">-->
<!--						<div class="panel-body">-->
<!--							<div class="form-group">-->
<!--								<div id="comments" class="blog-comment-info">-->
<!---->
<!--									<h3 id="review-title">Leave your comment  </h3>-->
<!--									<input type="hidden" name="blog_article_reply_id" value="0" id="blog-reply-id">-->
<!--									<div class="comment-left contacts-form row">-->
<!--										<div class="col-md-6">-->
<!--											<b>Your Name:</b>-->
<!--											<br>-->
<!--											<input type="text" name="name" value="" class="form-control">-->
<!--											<br>-->
<!--										</div>-->
<!--										<div class="col-md-12">-->
<!--											<b>Your Comment:</b>-->
<!--											<br>-->
<!--											<textarea rows="6" cols="50" name="text" class="form-control"></textarea>-->
<!--											<span style="font-size: 11px;">Note: HTML is not translated!</span>-->
<!--											<br>-->
<!--											<br>-->
<!--										</div>-->
<!--										<div class="col-md-4">-->
<!--											<b>Enter the code in the box below:</b>-->
<!--											<br>-->
<!--											<input type="text" name="captcha" style=""-->
<!--											value="" class="form-control">-->
<!--											<br>-->
<!--											<div class="form-group">-->
<!--												<img src="--><?php //= base_url(); ?><!--assets/frontend/image/demo/content/captcha.jpg" alt=""-->
<!--												id="captcha">-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--									<br>-->
<!--									<div class="text-left"><a id="button-comment"-->
<!--										class="btn buttonGray"><span>Submit</span></a>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
				</div>
			</div>
		</div>
		<!--Middle Part End-->
	</div>
	<!-- //Main Container -->