<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Page</a></li>
			<li><a href="#"><?=$title?></a></li>
		</ul>
		<div class="row">
			<div id="content" class="col-sm-12">

				<div class="about-us about-demo-1">
					<div class="row">
						<div class="col-lg-5 col-md-5 about-image"> <img src="<?=base_url($about->image)?>" alt="<?=$about->title?>"> </div>
						<div class="col-lg-7 col-md-7 about-info">
							<h2 class="about-title"><span><?=$title?></span></h2>
							<div class="about-text">
								<p><?=$about->description?></p>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
	<!-- //Main Container -->