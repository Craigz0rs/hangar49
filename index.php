<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hangar_49
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="page_header_wrapper" id="news_header_wrapper">
                <div class="page_header" id="news_page_header">
                    <div class="page_header_overlay" id="news_page_header_overlay">
                    </div>
                    <h1>News</h1>
                </div>
            </div>
            <div class="page_main_wrapper" id="news_page_main_wrapper">
                <div class="article_listings_wrapper" id="news_article_listings_wrapper">
                    <?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
                        <!--
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
-->

                        <?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();
                
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-preview', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
                </div>
                <!-- #news_article_listings_wrapper -->
                <div class="sidebar_wrapper" id="news_archive_sidebar_wrapper">
                    <?php get_sidebar(); ?>
                </div>
                <!-- #news_archive_sidebar_wrapper -->
            </div>
            <!-- #news_page_main_wrapper -->
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php
get_footer();