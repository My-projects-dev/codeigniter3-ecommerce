<!-- Main Container  -->
		<div class="main-container container">
			<ul class="breadcrumb">
				<li><a href="<?= base_url('home/'); ?>"><i class="fa fa-home"></i></a></li>
                <?php foreach ($category as $key=>$value):?>
				<li><a href="<?= base_url('category/'.$value->slug); ?>"><?=$value->title?></a></li>
                <?php endforeach; ?>
			</ul>

			<div class="row">
				<!--Middle Part Start-->
				<div id="content" class="col-md-12 col-sm-12">

					<div class="product-view row">
						<div class="left-content-product col-lg-12 col-xs-12">
							<div class="row">
								<div class="content-product-left  col-sm-6 col-xs-12 ">
									<div id="thumb-slider-vertical" class="thumb-vertical-outer">
										<span class="btn-more prev-thumb nt"><i class="fa fa-chevron-up"></i></span>
										<span class="btn-more next-thumb nt"><i class="fa fa-chevron-down"></i></span>
										<ul class="thumb-vertical">
                                            <?php $first = '';
                                            foreach ($images as $key=>$value):
                                                if($key==0) {
                                                    $first = base_url($value->path);
                                                }?>
											<li class="owl2-item">
												<a data-index="0" class="img thumbnail" data-image="<?=base_url($value->path)?>" title="<?=$product->title?>">
													<img src="<?=base_url($value->path)?>" title="<?=$product->title?>" alt="<?=$product->title?>" style=" height: 90px;">
												</a>
											</li>
                                            <?php endforeach;?>
										</ul>
									</div>
									<div class="large-image  vertical">
										<img itemprop="image" class="product-image-zoom" src="<?=$first?>" data-zoom-image="" title="<?=$product->title?>" alt="<?=$product->title?>" style=" width: 100%;">

                                    </div>
<!--									<a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i class="fa fa-youtube-play"></i></a>-->

								</div>

								<div class="content-product-right col-sm-6 col-xs-12">
									<div class="title-product">
										<h1><?=$product->title?></h1>
									</div>
									<!-- Review ---->
									<div class="box-review form-group">
										<div class="ratings">
											<div class="rating-box">
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
											</div>
										</div>

										<a class="reviews_button" href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews</a>	|
										<a class="write_review_button" href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
									</div>

									<div class="product-label form-group">
										<div class="stock"><span>Availability:</span> <span class="status-stock">In Stock</span></div>
										<div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
											<span class="price-new" itemprop="price"><?=$product->sales_prices?></span>
											<span class="price-old"><?=$product->price?></span>
										</div>

									</div>

									<div class="product-box-desc">
										<div class="inner-box-desc">
											<div class="price-tax"><span>Ex Tax:</span> $60.00</div>
											<div class="brand"><span>Brand:</span><a href="#"> <?=$product->brandtitle?></a>		</div>
											<div class="model"><span>Product Code:</span> Product 15</div>
											<div class="reward"><span>Reward Points:</span> 100</div>
										</div>
									</div>


									<div id="product">
										<h4>Available Options</h4>
										<div class="image_option_type form-group required">
											<label class="control-label">Colors</label>
											<ul class="product-options clearfix"id="input-option231">
												<li class="radio active">
													<label>
														<input class="image_radio" type="radio" name="option[231]" value="33"> <img src="<?=base_url()?>assets/frontend/image/demo/colors/blue.jpg"
														data-original-title="blue +$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
														<label> </label>
													</label>
												</li>
												<li class="radio">
													<label>
														<input class="image_radio" type="radio" name="option[231]" value="34"> <img src="<?=base_url()?>assets/frontend/image/demo/colors/brown.jpg"
														data-original-title="brown -$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
														<label> </label>
													</label>
												</li>
												<li class="radio">
													<label>
														<input class="image_radio" type="radio" name="option[231]" value="35"> <img src="<?=base_url()?>assets/frontend/image/demo/colors/green.jpg"
														data-original-title="green +$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
														<label> </label>
													</label>
												</li>
												<li class="selected-option">
												</li>
											</ul>
										</div>



										<div class="form-group box-info-product">
											<div class="option quantity">
												<div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
													<label>Qty</label>
													<input class="form-control" type="text" name="quantity"
													value="1" id="quantity">
													<input type="hidden" name="product_id" value="50">
													<span class="input-group-addon product_quantity_down">−</span>
													<span class="input-group-addon product_quantity_up">+</span>
												</div>
											</div>
											<div class="cart">
												<input type="button" data-toggle="tooltip" title=""  onclick="cart.add('42');" value="Add to Cart" data-loading-text="Loading..." data-id="<?=$product->id?>" class="btn btn-mega btn-lg button-cart"  data-original-title="Add to Cart">
											</div>
<!--                                            --><?php //=($hasWishlist==true) ? "style=color:red" : ''?>
<!--                                            --><?php //(in_array($product->id, $wishID)==true) ? $hasWishlist=true : $hasWishlist=false ?>
											<div class="add-to-links wish_comp">
												<ul class="blank list-inline">
													<li class="wishlist">
														<a class="icon button-wishlist" data-id="<?=$product->id?>"  data-toggle="tooltip" title=""
                                                           onclick="wishlist.add('42');"
														  data-original-title="Add to Wish List"><i class="fa fa-heart" ></i>
														</a>
													</li>
													<li class="compare">
														<a class="icon" data-toggle="tooltip" title=""
														onclick="compare.add('50');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
														</a>
													</li>
												</ul>
											</div>
										</div>

									</div>
									<!-- end box info product -->
								</div>
							</div>
						</div>
					</div>

