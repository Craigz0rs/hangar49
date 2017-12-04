<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hangar_49
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <div class="contact_splash">
                <h1>Contact Us</h1>
                <p>Interested in one of our planes or looking for more information on the services we offer?</p>
                <p>Give us a shout!</p>
            </div>
            <div class="contact_info">
                <tel></tel>
                <email>contact@hangar49warbirds.com</email>
            </div>
            <div class="contact_form">
                <?php echo do_shortcode('[contact-form-7 id="87" title="Contact form 1"]'); ?>
            </div>
            

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
