<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Hangar_49
 */




get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="page_header_wrapper" id="single_news_header_wrapper">
                <div class="page_header" id="single_news_page_header">
                    <div class="page_header_overlay" id="single_news_page_header_overlay">
                    </div>
<!--                    <h1>News</h1>-->
                </div>
            </div>
            <div class="page_main_wrapper" id="news_page_main_wrapper">
                <div class="article_listings_wrapper" id="news_article_listings_wrapper">
		<?php
		


			/* Start the Loop */
			while ( have_posts() ) : the_post();
                
			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

            endwhile;
        ?>
                </div><!-- #news_article_listings_wrapper -->
                <div class="sidebar_wrapper" id="news_archive_sidebar_wrapper">
                    <?php get_sidebar(); ?>
                </div><!-- #news_archive_sidebar_wrapper -->
            </div><!-- #news_page_main_wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer(); ?>