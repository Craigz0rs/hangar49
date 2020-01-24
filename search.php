<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Hangar_49
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="page_header_wrapper" id="news_header_wrapper">
		<?php
		if ( have_posts() ) : ?>

    			<header class="page_header" id="news_page_header">
                    <div class="page_header_overlay" id="news_page_header_overlay">
                    </div>
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'hangar49' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			     </header><!-- .page-header -->
            </div>
            <div class="page_main_wrapper" id="news_page_main_wrapper">
                <div class="article_listings_wrapper" id="news_article_listings_wrapper">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content-preview', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :
?>                <header class="page_header" id="news_page_header">
                    <div class="page_header_overlay" id="news_page_header_overlay">
                    </div>
				<h1 class="page-title">News</h1>
			     </header><!-- .page-header -->
                <div class="page_main_wrapper" id="news_page_main_wrapper">
                <div class="article_listings_wrapper" id="news_article_listings_wrapper">
<?php
			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
                </div><!-- #news_article_listings_wrapper -->
                <div class="sidebar_wrapper" id="news_archive_sidebar_wrapper">
                    <?php get_sidebar(); ?>
                </div><!-- #news_archive_sidebar_wrapper -->
            </div><!-- #news_page_main_wrapper -->
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
