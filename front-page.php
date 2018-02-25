<?php
/**
 * @package Hangar_49
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
            <div class="home_screen" id="home" style="background-image: url(<?php echo $url; ?>);">
                <div class="content_wrapper">
                    <div class="intro">
                        <h1>Hangar 49</h1>
                        <h1>Warbirds</h1>
                        <h2>maintenance • restorations • sales</h2>
                        <p>Our full site is under construction but we're adding more content each week! Check back often for updates.</p>
                       <?php if (function_exists('newsletter_form')) newsletter_form(); ?>
    <!--                    <p class="subscribe_disclaimer">We promise not to spam you!</p>-->
                    </div><!-- .intro -->
                </div><!-- .content_wrapper -->
                <div class="home_navigation">
<!--
                    <div class="home_nav_block"><a href="<?php echo get_post_type_archive_link( 'inventory' ); ?>" class="smoothScroll"><i class="fa fa-fighter-jet" id="fighterjet" aria-hidden="true"></i><br>Inventory</a></div>
                    <div class="home_nav_block"><a href="<?php echo get_post_type_archive_link( 'projects' ); ?>" class="smoothScroll"><i class="fa fa-wrench" id="wrench" aria-hidden="true"></i><br>Projects</a></div>
                    <div class="home_nav_block"><a href="<?php echo get_page_link(24); ?>" class="smoothScroll"><i class="fa fa-envelope" id="envelope" aria-hidden="true"></i><br>Contact</a></div>
-->
                </div><!-- .home_navigation -->
            </div><!-- .home_screen -->
<!--
            <div class="inventory">
                <div class="inventory_title section_title" id="inventory">
                    <h2>Inventory</h2>
                </div>
                <div class="inventory_tiles">
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
            </div>
-->
<!--
            <div class="projects">
                <div class="projects_title section_title" id="projects">
                    <h2>Projects</h2>
                </div>
                <div class="project_tiles">
                    <?php 

                    $projects = get_posts(array(
                        'posts_per_page'	=> -1,
                        'post_type'			=> 'projects'
                    ));

                    if( $projects ): ?>

                        <ul class="project_list">

                        <?php foreach( $projects as $post ): 
                            
                            setup_postdata( $post );

                            echo '<li><div class="aircraft_tile project_tile"><a href="' . get_the_permalink() . '">';
                            
                            $planes = get_field('aircraft');
                            if( $planes ) {
                               foreach ( $planes as $post ):
                                    setup_postdata($post);
                                    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                                    if( $feat_image ) : ?>
                                    <img src="<?php echo $feat_image; ?>">
                                    <?php
                                    endif;
                                    echo '<span class="tile_overlay"></span>';
                                    echo '<h3>' . get_field('manufacture_year') . ' ' . get_field('manufacturer') . ' ' . get_field('model') . '</h3>';
                                    echo '<span class="read_more">see project</class>';
                                endforeach;
                                wp_reset_postdata();
                            }
                            echo '</a></div></li>';
                            ?>

                        <?php endforeach; ?>

                        </ul>

                        <?php wp_reset_postdata(); ?>

                    <?php endif; ?>
                </div>     
            </div>
-->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
