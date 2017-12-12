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
           <div class="page_header" id="contact_page_header">
            <div class="page_header_overlay" id="contact_page_header_overlay">
            </div>
                <h1>Contact Us</h1>
<!--
                <p>Interested in one of our planes or looking for more information on the services we offer?</p>
                <p>Give us a shout!</p>
-->
            </div>
            <div class="location">

            <?php
            if(function_exists('get_field')){
                if(get_field('location')){
//                    echo '<h2>Skype Sessions</h2>';
                    the_field('location');
                    }
                }
            ?>    

            </div>
            <div class="contact_info">

                
                
                
<!--
                <?php if( have_rows('repeater_field_name') ): ?>

	<ul class="slides">

	<?php while( have_rows('repeater_field_name') ): the_row(); 

		// vars
		$image = get_sub_field('image');
		$content = get_sub_field('content');
		$link = get_sub_field('link');

		?>

		<li class="slide">

			<?php if( $link ): ?>
				<a href="<?php echo $link; ?>">
			<?php endif; ?>

				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

			<?php if( $link ): ?>
				</a>
			<?php endif; ?>

		    <?php echo $content; ?>

		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>
-->
                
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
