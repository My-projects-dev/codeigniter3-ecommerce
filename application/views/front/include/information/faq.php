<!-- Main Container  -->
		<div class="main-container container">
			<ul class="breadcrumb">
				<li><a href="<?=base_url('home/')?>"><i class="fa fa-home"></i></a></li>
				<li><a href="#">Account</a></li>
				<li><a href="#">Page</a></li>
				<li><a href="#">Faq</a></li>
			</ul>

			<div class="row">
				<div id="content" class="col-sm-12">
					<h3>Got Questions? We’ve Got Answers!</h3>
					<p>
						<br>
					</p>
					<div class="row">
						<div class="col-sm-12">
							<ul class="yt-accordion">
                                <?php foreach ($faq as $key=>$value):?>
								<li class="accordion-group">
									<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span><?=$value->question?></span></h3>
									<div class="accordion-inner">
										<p><?=$value->answer?></p>
									</div>
								</li>
                                <?php endforeach;?>
							</ul>
						</div>
					</div>


				</div>
			</div>
		</div>
		<!-- //Main Container -->