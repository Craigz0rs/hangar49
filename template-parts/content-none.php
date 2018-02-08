<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hangar_49
 */

?>

<section class="no-results not-found">
	<header class="page_header" id="news_page_header">
        <div class="page_header_overlay" id="news_page_header_overlay">
        </div>
		<h1 class="page-title">News</h1>
	</header><!-- .page-header -->
    </div><!-- .page-header_wrapper -->
    <div class="page_main_wrapper" id="news_page_main_wrapper">
        <div class="article_listings_wrapper" id="news_article_listings_wrapper">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hangar49' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
			?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'hangar49' ); ?></p>
			<?php
//				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hangar49' ); ?></p>
			<?php
//				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
