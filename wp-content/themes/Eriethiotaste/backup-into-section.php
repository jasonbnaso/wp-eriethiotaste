	<?php if ($locations_repeater) : ?>
		<section class="locations section-padding" style="background-color:<?= $locations_bg; ?>">
			<div class="container">
				<div class="row justify-content-center">
                <?php foreach ($locations_repeater as $k => $r) : ?>
						<div class="col-lg-3 text-center fade-element hover-effect">
							<a target="_blank" href="<?= $r["instagram_link"]; ?>">
								<div class="post-thumb">
									<figure><img class="img-fluid location-img" src="<?= $r["location_image"]["url"]; ?>" alt="<?= $r["location_image"]["alt"]; ?>"></figure>
									<div class="caption-text">
										<h2><?= $r["location_title"]; ?></h2>
										<p><?= $r["location_text"]; ?></p>
									</div>
								</div>
							</a>
							<div class="location-info py-3 font-color-light">
								<?= $r["location_info"]; ?>
								<?php
								$string = $r["telephone"];
								$string = preg_replace("/[\s-]+/", "", $string);
								?> 
								<a href="tel:+46<?= $string; ?>"><?= $r["telephone"]; ?></a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section> 
	<?php endif; ?>		