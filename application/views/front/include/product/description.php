<div class="col-lg-9 col-md-8  col-xs-12">
								<!-- Product Tabs -->
								<div class="producttab ">
									<div class="tabsslider  col-xs-12">
										<ul class="nav nav-tabs">
											<li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
											<li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews (1)</a></li>
											<li class="item_nonactive"><a data-toggle="tab" href="#tab-4">Tags</a></li>
											<li class="item_nonactive"><a data-toggle="tab" href="#tab-5">Custom Tab</a></li>
										</ul>
										<div class="tab-content col-xs-12">
											<div id="tab-1" class="tab-pane fade active in">
												<?=$product->description?>
											</div>
											<div id="tab-review" class="tab-pane fade">
												<form>
													<div id="review">
														<table class="table table-striped table-bordered">
															<tbody>
																<tr>
																	<td style="width: 50%;"><strong>Super Administrator</strong></td>
																	<td class="text-right">29/07/2015</td>
																</tr>
																<tr>
																	<td colspan="2">
																		<p>Best this product opencart</p>
																		<div class="ratings">
																			<div class="rating-box">
																				<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																				<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																				<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																				<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																				<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																			</div>
																		</div>
																	</td>
																</tr>
															</tbody>
														</table>
														<div class="text-right"></div>
													</div>
													<h2 id="review-title">Write a review</h2>
													<div class="contacts-form">
														<div class="form-group"> <span class="icon icon-user"></span>
															<input type="text" name="name" class="form-control" value="Your Name" onblur="if (this.value == '') {this.value = 'Your Name';}" onfocus="if(this.value == 'Your Name') {this.value = '';}">
														</div>
														<div class="form-group"> <span class="icon icon-bubbles-2"></span>
															<textarea class="form-control" name="text" onblur="if (this.value == '') {this.value = 'Your Review';}" onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea>
														</div>
														<span style="font-size: 11px;"><span class="text-danger">Note:</span>						HTML is not translated!</span>

														<div class="form-group">
														 <b>Rating</b> <span>Bad</span>&nbsp;
														<input type="radio" name="rating" value="1"> &nbsp;
														<input type="radio" name="rating"
														value="2"> &nbsp;
														<input type="radio" name="rating"
														value="3"> &nbsp;
														<input type="radio" name="rating"
														value="4"> &nbsp;
														<input type="radio" name="rating"
														value="5"> &nbsp;<span>Good</span>

														</div>
														<div class="buttons clearfix"><a id="button-review" class="btn buttonGray">Continue</a></div>
													</div>
												</form>
											</div>
											<div id="tab-4" class="tab-pane fade">
												<a href="#">Monitor</a>,
												<a href="#">Apple</a>
											</div>
											<div id="tab-5" class="tab-pane fade">
												<table class="data-table" style="width: 100%;" border="1">
													<tbody>
													<tr>
													<td><?=$product->brandtitle?></td>
													<td><img  src="<?=base_url($product->logo)?>"  title="<?=$product->brandtitle?>" class="img-1 img-responsive" style="width: 70px; height: 70px;"/></td>
													</tr>
													<tr>
													<td>History</td>
													<td><?=$product->history; ?></td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- //Product Tabs -->