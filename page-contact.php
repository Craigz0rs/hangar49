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
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
            <div class="contact_background" id="contact_page_background" style="background-image: url(<?php echo $url; ?>);">
            <div class="content_wrapper" id="contact_wrapper">
                <h1>Contact</h1>
            <div class="contact_info_wrapper">
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
                    <h2>Contact Info</h2>
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
                        <li id="address_li"><div class="address"><?php echo $address; ?></div></li>
                        <li id="phone_li"><a href="tel:<?php echo $phone; ?>"><i class="fa  fa-phone" id="phone" aria-hidden="true"></i> <?php echo $phone; ?></a></li>
                        <?php if(get_field('fax')) {
                        echo '<li><a href="fax:' . $fax . '"><i class="fa fa-fax" aria-hidden="true"></i> ' . $fax . '</a></li>'; 
                            } ?>
                        <li><a href="email:<?php echo $email; ?>"><i class="fa  fa-envelope" id="envelope" aria-hidden="true"></i> <?php echo $email; ?></a></li>
                    </ul>
                </div>
                <div class="follow_us">
    <!--            Load social fields and assign them to variables    -->
                <?php
                    if(function_exists('get_field')){
                        if(get_field('facebook')){ 
                            $facebook = get_field('facebook');}
                        if(get_field('twitter')){ 
                            $twitter = get_field('twitter');}
                        if(get_field('instagram')){ 
                            $instagram = get_field('instagram');}
                        if(get_field('youtube')){ 
                            $youtube = get_field('youtube');}
                    } 
                ?>
                        <?php if($facebook || $twitter || $instagram || $youtube) {
                            } ?>
                    <ul>
                        <?php if($facebook) {
                        echo '<li><a href="' . $facebook . '"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>'; 
                            } ?>
                        <?php if($twitter) {
                        echo '<li><a href="' . $twitter . '"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>'; 
                            } ?>
                        <?php if($instagram) {
                        echo '<li><a href="' . $instagram . '"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>'; 
                            } ?>
                        <?php if($youtube) {
                        echo '<li><a href="' . $youtube . '"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>'; 
                            } ?>                            
                    </ul>
                </div>
            </div>
            <div class="contact_form">
                <h2>Send a Message</h2>
                <?php echo do_shortcode('[contact-form-7 id="87" title="Contact form 1"]'); ?>
            </div>

            </div>
               
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
