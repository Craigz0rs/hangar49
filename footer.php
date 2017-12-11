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
        <div class="footer_branding">
            <p>Hangar 49</p>
            <p>Warbirds</p>
        </div>
<!--
        <div class="footer_about">
            <p>About Us</p>
            <p>Based on Vancouver Island on the west coast of Canada, we authentically restore classic warbirds, provide aircraft maintenance services and broker aircraft locally and internationally.</p>
        </div>
-->
        <div class="footer_contact" id="contact">
            <h2>Contact Us</h2>
            <p>Have any questions or want to inquire about one of our warbirds? Give us a shout!</p>
            <ul>
                <li><a href="tel:15878885001"><i class="fa  fa-phone" id="phone" aria-hidden="true"></i> 587-888-5001</a></li>
                <li><a href="email:contact@hangar49warbirds.com"><i class="fa  fa-envelope" id="envelope" aria-hidden="true"></i> contact@hangar49warbirds.com</a></li>
            </ul>
        </div>
        <div class="footer_nav">
            <p>Navigate</p>
        <?php if (is_front_page()) { ?>
            <ul>
                <li><a href="#home" class="smoothScroll">Home</a></li>
                <li><a href="<?php echo get_post_type_archive_link( 'inventory' ); ?>" class="smoothScroll">Inventory</a></li>
                <li><a href="<?php echo get_post_type_archive_link( 'projects' ); ?>" class="smoothScroll">Projects</a></li>
            </ul>
        <?php } else { ?>
            <ul>
                <li><a href="<?php echo get_home_url() ?>/#home">Home</a></li>
                <li><a href="<?php echo get_post_type_archive_link( 'inventory' ); ?>">Inventory</a></li>
                <li><a href="<?php echo get_post_type_archive_link( 'projects' ); ?>">Projects</a></li>
            </ul>
        <?php } ?>
        </div>
<!--
        <div class="footer_social">
            <p>Follow us</p>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
-->
        <div class="footer_copyright">
            <p>Copyright 2017-2018 Hangar 49</p>
<!--            <p>Website by <a href="www.craigdarcy.ca">Company</a></p>-->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo get_bloginfo( 'template_directory' ); ?>/scripts/scripts.js"></script>
</body>
</html>
