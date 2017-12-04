<?php
/**
 * @package Hangar_49
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="home_screen">
                <div class="intro">
                    <h1>Hangar 49</h1>
                    <h2>Warbrid Maintenance, Restorations, and Sales</h2>
                    <p>Our full site is under construction for a January 2018 takeoff.<br>Want to know when we launch? Signup for our newsletter.</p>
                   <?php if (function_exists('newsletter_form')) newsletter_form(); ?>
                    <p class="disclaimer">We promise not to spam you!</p>
                </div><!-- .intro -->
                <div class="home_navigation">
                    <a href="#inventory">
                        <div class="home_nav_link" id="home_nav_inventory">
                            <p>Inventory</p>
                        </div>
                    </a>
                    <a href="#projects">
                        <div class="home_nav_link" id="home_nav_projects">
                            <p>Projects</p>
                        </div>
                    </a>
                    <a href="http://localhost/hangar49/contact/">
                        <div class="home_nav_link" id="home_nav_contact">
                            <p>Contact</p>
                        </div>
                    </a>
                </div><!-- .home_navigation -->
            </div><!-- .home_screen -->
            <div class="inventory">
                <div class="inventory_title" id="inventory">
                    <h2>Inventory</h2>
                </div>
                <div class="inventory_tiles">
                    <?php 

                    $posts = get_posts(array(
                        'posts_per_page'	=> -1,
                        'post_type'			=> 'inventory'
                    ));

                    if( $posts ): ?>

                    

                        <?php foreach( $posts as $post ): 

                            setup_postdata( $post );

                            $planes = get_field('inventory_aircraft');
                            if( $planes ) {
                                echo '<ul class="inventory_list">';
                                foreach ( $planes as $post ):
                                    setup_postdata($post);
                                    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                                    echo '<div class="banner-image"'; 
                                    if( $feat_image ) : ?>
                                    style="background-image: url(<?php echo $feat_image; ?>);"
                                    <?php
                                    endif;
                                    echo '><li><a href="' . get_the_permalink() . '">';
                                    echo '<h3>' . get_field('manufacture_year') . ' ' . get_field('manufacturer') . ' ' . get_field('model') . '</h3>';
                                    echo '</a></li></div>';
                                endforeach;
                                echo '</ul>';
                                wp_reset_postdata();
                            }

                            ?>

                        <?php endforeach; ?>

                        
                        <?php wp_reset_postdata(); ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="projects">
                <div class="projects_title" id="projects">
                    <h2>Projects</h2>
                </div>
                <div class="project_tiles">
                    <?php 

                    $projects = get_posts(array(
                        'posts_per_page'	=> -1,
                        'post_type'			=> 'projects'
                    ));

                    if( $projects ): ?>

                        <ul>

                        <?php foreach( $projects as $post ): 

                            setup_postdata( $post );

                            echo '<li><a href="' . get_the_permalink() . '"';
                            
                            $planes = get_field('aircraft');
                            if( $planes ) {
                               foreach ( $planes as $post ):
                                    setup_postdata($post);
                                    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                                    if( $feat_image ) : ?>
                                    style="background-image: url(<?php echo $feat_image ?>)"
                                    <?php
                                    endif;
                                    echo '><h3>' . get_field('manufacture_year') . ' ' . get_field('manufacturer') . ' ' . get_field('model');
                                    echo '</h3>';
                                endforeach;
                                wp_reset_postdata();
                            }
                            echo '</a></li>';
                            ?>

                        <?php endforeach; ?>

                        </ul>

                        <?php wp_reset_postdata(); ?>

                    <?php endif; ?>
                </div>     
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
