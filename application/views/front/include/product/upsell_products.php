<!-- Upsell Products -->
								<div class="related upsell titleLine products-list grid module ">
									<h3 class="modtitle"><span>Upsell Products</span></h3>
									<div class="upsell-products ">
                                        <?php foreach ($upsell as $key=>$value):?>
										<div class="product-layout">
											<div class="product-item-container">
												<div class="left-block">
													<div class="product-image-container second_img ">
														<img  src="<?=base_url($value->path)?>"  title="<?=$value->title?>" class="img-1 img-responsive" style="height: 170px;"/>
														<img  src="<?=base_url($value->image)?>"  title="<?=$value->title?>" class="img-2 img-responsive" style="height: 170px;"/>
													</div>
													<!--Sale Label-->
													<span class="label label-sale">Sale</span>

												</div>
												<div class="button-group">
													<button class="wishlist btn-button button-wishlist" type="button" data-id="<?=$value->id?>" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
													<button class="addToCart button-cart" data-id="<?=$value->id?>" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"></span></button>
													<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
													<a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview"> <i class="fa fa-search"></i> </a>
												</div>

												<div class="right-block">
													<div class="caption">
														<h4><a href="<?=base_url('product/'.$value->slug)?>"><?=$value->title?></a></h4>
														<div class="ratings">
															<div class="rating-box">
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
															</div>
														</div>

														<div class="price">
															<span class="price-new"><?=$value->sales_prices?></span>
															<span class="price-old"><?=$value->price?></span>
															<span class="label label-percent"><?= round(($value->sales_prices * 100 / $value->price) - 100) ?>%</span>
														</div>
														<div class="description item-desc hidden">
															<p><?=substr($value->price, 0, 100)?>...</p>
														</div>
													</div>
												</div><!-- right block -->

											</div>
										</div>
                                        <?php endforeach;?>
									</div>
								</div>
							</div>
						</div>
					</div>


					<script type="text/javascript">
						$(document).ready(function() {
							var zoomCollection = '.large-image img';
							$( zoomCollection ).elevateZoom({
								zoomType    : "inner",
								lensSize    :"200",
								easing:true,
								gallery:'thumb-slider-vertical',
								cursor: 'pointer',
								galleryActiveClass: "active"
							});
							$('.large-image').magnificPopup({
								items: [
									{src: '<?=base_url()?>assets/frontend/image/demo/shop/product/1.png' },
									{src: '<?=base_url()?>assets/frontend/image/demo/shop/product/f9.jpg' },
									{src: '<?=base_url()?>assets/frontend/image/demo/shop/product/2.png' },
									{src: '<?=base_url()?>assets/frontend/image/demo/shop/product/3.png' },
									{src: '<?=base_url()?>assets/frontend/image/demo/shop/product/j9.jpg' },
								],
								gallery: { enabled: true, preload: [0,2] },
								type: 'image',
								mainClass: 'mfp-fade',
								callbacks: {
									open: function() {

										var activeIndex = parseInt($('#thumb-slider-vertical .img.active').attr('data-index'));
										var magnificPopup = $.magnificPopup.instance;
										magnificPopup.goTo(activeIndex);
									}
								}
							});
							$("#thumb-slider-vertical .owl2-item").each(function() {
								$(this).find("[data-index='0']").addClass('active');
							});

							$('.thumb-video').magnificPopup({
							  type: 'iframe',
							  iframe: {
								patterns: {
								   youtube: {
									  index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
									  id: 'v=', // String that splits URL in a two parts, second part should be %id%
									  src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
										},
									}
								}
							});

							$('.product-options li.radio').click(function(){
								$(this).addClass(function() {
									if($(this).hasClass("active")) return "";
									return "active";
								});

								$(this).siblings("li").removeClass("active");
								$(this).parent().find('.selected-option').html('<span class="label label-success">'+ $(this).find('img').data('original-title') +'</span>');
							});

							var _isMobile = {
							  iOS: function() {
							   return navigator.userAgent.match(/iPhone/i);
							  },
							  any: function() {
							   return (_isMobile.iOS());
							  }
							};

							$(".thumb-vertical-outer .next-thumb").click(function () {
								$( ".thumb-vertical-outer .lSNext" ).trigger( "click" );
							});

							$(".thumb-vertical-outer .prev-thumb").click(function () {
								$( ".thumb-vertical-outer .lSPrev" ).trigger( "click" );
							});

							$(".thumb-vertical-outer .thumb-vertical").lightSlider({
								item: 4,
								autoWidth: false,
								vertical:true,
								slideMargin: 7,
								verticalHeight:425,
					            pager: false,
								controls: true,
					            prevHtml: '<i class="fa fa-chevron-up"></i>',
					            nextHtml: '<i class="fa fa-chevron-down"></i>',
								responsive: [
									{
										breakpoint: 1199,
										settings: {
											verticalHeight: 330,
											item: 4,
										}
									},
									{
										breakpoint: 1024,
										settings: {
											verticalHeight: 235,
											item: 2,
											slideMargin: 5,
										}
									},
									{
										breakpoint: 768,
										settings: {
											verticalHeight: 340,
											item: 3,
										}
									}
									,
									{
										breakpoint: 480,
										settings: {
											verticalHeight: 100,
											item: 1,
										}
									}

								]

					        });



							// Product detial reviews button
							$(".reviews_button,.write_review_button").click(function (){
								var tabTop = $(".producttab").offset().top;
								$("html, body").animate({ scrollTop:tabTop }, 1000);
							});
						});

					</script>


				</div>


			</div>
			<!--Middle Part End-->
		</div>
		<!-- //Main Container -->