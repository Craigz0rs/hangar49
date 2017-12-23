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
            <div class="page_header" id="inventory_page_header">
                <div class="page_header_overlay" id="inventory_page_header_overlay">
                </div>
                <h1>Inventory</h1>
                <h2>warbirds for sale</h2>
            </div>
            <div class="archive_sorting" id="inventory_sorting">
<!--                <img src="<?php echo get_template_directory_uri() ?>/images/inventory_background2.jpg">-->
                <a href="#inventory" class="smoothScroll">see all warbirds</a>
            </div>

              <div class="inventory_tiles" id="inventory">
                    <?php 

                    $posts = get_posts(array(
                        'posts_per_page'	=> -1,
                        'post_type'			=> 'inventory'
                    ));

                    if( $posts ): ?>
                        <ul class="inventory_list">
                    
                        <?php foreach( $posts as $post ): 

                            setup_postdata( $post );

                            $planes = get_field('inventory_aircraft');
                            if( $planes ) {
                                
                                foreach ( $planes as $post ):
                                    setup_postdata($post);
                                    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                                    echo '<li><div class="aircraft_tile inventory_tile"'; 
                                    echo '><a href="' . get_the_permalink() . '">';
                                    if( $feat_image ) : ?>
                                    <img src="<?php echo $feat_image; ?>">
                                    <?php
                                    endif;
                                    echo '<span class="tile_overlay"></span>';
                                    echo '<h3>' . get_field('manufacture_year') . ' ' . get_field('manufacturer') . ' ' . get_field('model') . '</h3>';
                                    echo '<span class="read_more">learn more</class>';
                                    echo '</a></li>';
                                endforeach;
                                
                                wp_reset_postdata();
                            }

                            ?>

                        <?php endforeach; ?>

                        
                        <?php wp_reset_postdata(); ?>
                        </ul>
                    <?php endif; ?>
                </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
