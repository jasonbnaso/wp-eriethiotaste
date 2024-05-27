<?php

	/*
	Template name: Policy
    Author: Jason Naso
	*/

	get_header();

	// Hero
	$policy	= get_field('policy');

?>

<main>
    <section class="policy section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?= $policy; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
	get_footer();
?>



