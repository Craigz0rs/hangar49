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
            <div class="content_wrapper">
            <div class="location">

            <?php
            if(function_exists('get_field')){
                if(get_field('location')){
                    echo '<h2>Where We Operate</h2>';
                    the_field('location');
                    }
                }
            ?>    
            </div>
            <div class="contact_info">
<!--            Load contact info fields and assign them to variables    -->
            <?php
                if(function_exists('get_field')){
                    if(get_field('phone_number')){ 
                        $phone = get_field('phone_number');}
                    if(get_field('fax')){ 
                        $fax = get_field('fax');}
                    if(get_field('email')){ 
                        $email = get_field('email');}
                    if(get_field('address')){ 
                        $address = get_field('address');}
                } 
            ?>
                <ul>
                    <li><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></li>
                    <?php if(get_field('fax')) {
                    echo '<li><a href="fax:' . $fax . '">' . $fax . '</a></li>'; 
                        } ?>
                    <li><a href="email:<?php echo $email; ?>"><?php echo $email; ?></a></li>
                    <li><?php echo $address; ?></li>

                </ul>
            </div>
            <div class="follow_us">
                <ul>
                    <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="contact_form">
                <?php echo do_shortcode('[contact-form-7 id="87" title="Contact form 1"]'); ?>
            </div>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
