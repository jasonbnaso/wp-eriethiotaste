<?php
	$footer_bg					= get_field("footer_bg", 'options');
	$facebook					= get_field('facebook', 'options');
	$insta						= get_field('insta', 'options');

?>
		<footer class="wrapper" style="background-color:<?= $footer_bg; ?>">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 d-flex justify-content-around py-5">
						<a target="_blank" href="<?= $facebook; ?>">
							<i class="fa fa-facebook fa-2x"></i>
						</a>
						<a target="_blank" href="<?= $insta; ?>">
							<i class="fa fa-instagram fa-2x"></i>
						</a>
					</div>
				</div>
				<div class="skapad text-center"><a target="_blank" href="http://jasonnaso.com">Skapad med &hearts; av Jason Naso</a></div>
			</div>
			<?php wp_footer(); ?>
		</footer>
	</body>
</html>