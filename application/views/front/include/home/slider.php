	<!-- Main Container  -->
		<main id="content" class="page-main">
			<!-- Block Spotlight1  -->
			<div class="so-spotlight1 ">
				<div class="container">
					<div class="row">
						<div id="yt_header_right" class="col-lg-offset-3 col-lg-9 col-md-12">
							<div class="slider-container ">
								<div id="so-slideshow" class="">
									<div class="module slideshow no-margin">
										<?php foreach ($sliders as $key=>$value): ?>
										<div class="item">
											<a href="<?= $value->link?>"><img src="<?= base_url($value->background); ?>" alt="slider1" style="height: 444px;"></a>
											<div class="sohomeslider-description">
												<img class="image image-sl12 pos-left img-active" src="<?= base_url($value->image); ?>" alt="slideshow" style="max-height: 222px">
												<div class="text pos-right text-sl12">
												<h3 class="tilte modtitle-sl12 title-active"><?= $value->message?></h3>
												<h4 class="titleh4 h4-active"><?= $value->title?></h4>
												<p class="des des-sl11 des-active"><?= $value->description?></p>
												</div>
											</div>
										</div>
                                        <?php endforeach; ?>
									</div>
									<div class="loadeding"></div>

								</div>
							</div>
						</div>
					</div>