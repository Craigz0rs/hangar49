<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hangar_49
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="page_header_wrapper" id="news_header_wrapper">
		<?php
		if ( have_posts() ) : ?>
                <header class="page_header" id="news_page_header">
                    <div class="page_header_overlay" id="news_page_header_overlay">
                    </div>
                    <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="archive-description">', '</div>' );
                    ?>
                </header><!-- .page-header -->
            </div>
            <div class="page_main_wrapper" id="news_page_main_wrapper">
                <div class="article_listings_wrapper" id="news_article_listings_wrapper">
			<?php
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
                </div><!-- #news_article_listings_wrapper -->
                <div class="sidebar_wrapper" id="news_archive_sidebar_wrapper">
                    <?php get_sidebar(); ?>
                </div><!-- #news_archive_sidebar_wrapper -->
            </div><!-- #news_page_main_wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
