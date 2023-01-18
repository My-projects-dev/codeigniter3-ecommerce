<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Blog</a></li>

		</ul>

		<div class="row">
			<!--Left Part Start -->
			<aside class="col-sm-4 col-md-3" id="column-left">
				<div class="module latest-product titleLine">
				   <h3 class="modtitle"><span>Latest Product</span></h3>
				   <div class="modcontent ">
                       <?php foreach ($latestProduct as $key=>$value):?>
						<div class="product-latest-item">
							<div class="media">
							   <div class="media-left">
								  <a href="#"><img src="<?= base_url($value->path); ?>"alt="<?= $value->title ?>"title="<?= $value->title ?>"class="img-responsive" style="width: 90px; height: 90px;"></a>
							   </div>
							   <div class="media-body">
								  <div class="caption">
									 <h4><a href="<?= base_url('blog/' . $value->slug); ?>"><?= $value->title ?></a></h4>

									 <div class="price">
										<span class="price-new"><?= $value->sales_prices ?></span>
									 </div>
									 <div class="ratings">
										<div class="rating-box">
										   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
										   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
										   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
										   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
										   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
										</div>
									 </div>
								  </div>

							   </div>
							</div>
						</div>
                       <?php endforeach; ?>
				   </div>
				</div>
			</aside>
			<!--Left Part End -->