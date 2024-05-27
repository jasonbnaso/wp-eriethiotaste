<?php

// $logo 		  		= get_field('logo', 'options');
// $logo_electrolux	= get_field('logo_electrolux', 'options');
// $logo_electrolux_excellence	= get_field('logo_electrolux_excellence', 'options');

$header_logo		= get_field('header_logo', 'options');
$header_logo_text	= get_field('header_logo_text', 'options');
$hero_title			= get_field('hero_title');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="<?php bloginfo('charset'); ?>" />
	<?php wp_head(); ?>
	<!-- META -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- CSS -->
	<link rel="stylesheet" id="font-awesome-css" href="https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css?ver=5.0.1" type="text/css" media="all">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">
	<!-- <script defer src="/your-path-to-fontawesome/js/brands.js"></script>
  		<script defer src="/your-path-to-fontawesome/js/solid.js"></script>
  		<script defer src="/your-path-to-fontawesome/js/fontawesome.js"></script> -->
</head>

<body <?php body_class(); ?>>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
			<div class="container">
				<a href="/" class="navbar-brand navbar-logo d-inline-flex">
					<?php if ($header_logo) : ?>
						<img class="img-fluid custom-logo" src="<?= $header_logo['url']; ?>" alt="<?= $header_logo['alt']; ?>">
					<?php endif; ?>
					<div id="logoText" class="logo-text"><?= $header_logo_text; ?></div>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">

					<?php wp_nav_menu(array(

						'container'       => 2,
						'container_id'    => 0,
						'container_class' => 'collapse navbar-collapse',
						'menu_id'         => false,
						'menu_class'      => 'navbar-nav ml-auto',
						'depth'           => 1, //1 = no dropdown 2 = with dropdown
						'fallback_cb'     => '__return_false',
						'walker'          => new WP_Bootstrap_Navwalker()

					)); ?>

				</div>
			</div>
		</nav>
	</header>