<?php

/*
	Template name: Menu
    Author: Jason Naso
	*/

get_header();
// BG Color
$page_bg    = get_field('page_bg');
// Hero
$hero_image    = get_field('hero_image');
$hero_title = get_field('hero_title');
// Menu
$title  = get_field('title');
$price  = get_field('price');
$food_list_repeater  = get_field('food_list_repeater');

?>
<style>
    .hero-image {
        background-image: url('<?= $hero_image['sizes']['medium']; ?>');
    }

    @media only screen and (min-width: 300px) {
        .hero-image {
            background-image: url('<?= $hero_image['sizes']['medium_large']; ?>');
        }
    }

    @media only screen and (min-width: 768px) {
        .hero-image {
            background-image: url('<?= $hero_image['url']; ?>');
        }
    }
</style>

<main class="menu">
    <section class="hero">
        <div class="hero-image">
            <div class="hero-image-overlay">
                <div class="container">
                    <h1 id="heroTitle" class="hero-title font-color-light"><?= $hero_title; ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="flag section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title text-center margin-top"><?= $title; ?></div>
                </div>
            </div>
            <?php if ($food_list_repeater) : ?>
                <?php foreach ($food_list_repeater as $r) : ?>
                    <div class="row margin-bottom align-items-center">
                        <div class="col-lg-3 image-center d-flex justify-content-center">
                            <div class="image-border">
                                <img class="circle-image" src="<?= $r["item_image"]["url"]; ?>" alt="<?= $r["item_image"]["alt"]; ?>">
                            </div>
                        </div>
                        <div class="col-lg-9 align-items-center item-description">
                            <?= $r["item_description"]; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <div class="price text-center"><?= $price; ?></div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>