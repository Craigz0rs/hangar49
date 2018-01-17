<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hangar_49
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="footer_wrapper">
        <div class="footer_branding">
            <p>Hangar 49</p>
            <p>Warbirds</p>
        </div>
        <div class="footer_line_div">
            <span class="footer_line"></span>
        </div>
        <div class="footer_contact" id="contact">
            <strong class="footer_heading">Contact Us</strong>
            <p>Have any questions or want to inquire about one of our warbirds? Give us a shout!</p>
            <!--            Load contact info fields and assign them to variables    -->
            <?php
                if(function_exists('get_field')){
                    if(get_field('phone_number', 24)){ 
                        $phone = get_field('phone_number', 24);}
                    if(get_field('email', 24)){ 
                        $email = get_field('email', 24);}
                } 
            ?>
            <ul>
                <li><a href="tel:<?php echo $phone; ?>"><i class="fa  fa-phone" id="phone" aria-hidden="true"></i> <?php echo $phone; ?></a></li>
                <li><a href="email:<?php echo $email; ?>"><i class="fa  fa-envelope" id="envelope" aria-hidden="true"></i> <?php echo $email; ?></a></li>
            </ul>
        </div>
        <div class="footer_nav">
            <strong class="footer_heading">Navigate</strong>
        <?php if (is_front_page()) { ?>
            <ul>
                <li><a href="#home" class="smoothScroll">Home</a></li>
                <li><a href="<?php echo get_post_type_archive_link( 'inventory' ); ?>" class="smoothScroll">Inventory</a></li>
                <li><a href="<?php echo get_post_type_archive_link( 'projects' ); ?>" class="smoothScroll">Projects</a></li>
                <li><a href="<?php echo get_page_link(24); ?>">Contact</a></li>
            </ul>
        <?php } else { ?>
            <ul>
                <li><a href="<?php echo get_home_url() ?>/#home">Home</a></li>
                <li><a href="<?php echo get_post_type_archive_link( 'inventory' ); ?>">Inventory</a></li>
                <li><a href="<?php echo get_post_type_archive_link( 'projects' ); ?>">Projects</a></li>
                <li><a href="<?php echo get_page_link(24); ?>">Contact</a></li>
            </ul>
        <?php } ?>
        </div>
        <div class="footer_social">
            <strong class="footer_heading">Follow us</strong>
<!--            Load social fields and assign them to variables    -->
            <?php
                if(function_exists('get_field')){
                    if(get_field('facebook', 24)){ 
                        $facebook = get_field('facebook', 24);}
                    if(get_field('twitter', 24)){ 
                        $twitter = get_field('twitter', 24);}
                    if(get_field('instagram', 24)){ 
                        $instagram = get_field('instagram', 24);}
                    if(get_field('youtube', 24)){ 
                        $youtube = get_field('youtube', 24);}
                } 
            ?>
                <ul class="footer_social-list">
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
        <div class="footer_copyright">
            <p>Copyright 2017-2018 Hangar 49</p>
<!--            <p>Website by <a href="www.craigdarcy.ca">Company</a></p>-->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo get_bloginfo( 'template_directory' ); ?>/js/jquery.flexslider.js"></script>

<script type="text/javascript" charset="utf-8">
  $(window).on("load", function() {
    $('#featured_slider').flexslider({
        animation: "slide",
//        controlNav: "thumbnails"
    });
    $('#gallery_slider').flexslider({
        animation: "fade",
        controlNav: "thumbnails"
    });
    $('#interior_slider, #exterior_slider').flexslider({
        animation: "fade",
        controlNav: "thumbnails"
    });
  });
</script>

<script src="<?php echo get_bloginfo( 'template_directory' ); ?>/scripts/scripts.js"></script>
<script src="<?php echo get_bloginfo( 'template_directory' ); ?>/scripts/hoverscript.js"></script>
</body>
</html>
