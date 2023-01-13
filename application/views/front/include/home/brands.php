            <!--Block Spotlight5  -->
			<div class="so-spotlight5">
				<div class="container">
					<div class="block-brand">
						<div class="brand-slider">
                            <?php foreach ($brands as $key=>$value): ?>
							<div class="item-manu">
								<a href="#" title="<?=$value->title?>">
									<img style="height: 50px" class="lazyload img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?= base_url($value->logo); ?>" alt="<?=$value->title?>">
								</a>
							</div>
                            <?php endforeach;?>
						</div>
					</div>
				</div>
			</div>
		</main >
		<!-- //Main Container -->