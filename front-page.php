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

                     $args = array( 
                     'post_type' => 'inventory',
                     );
                     $the_query = new WP_Query( $args );

                ?>

                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                     <div class="each_plane">
                     <h1 class="aircraft_name"><?php the_title() ;?></h1>
                         <?php 
                            $post = the_post();
                            setup_postdata($post);
                         ?>
                         <p><?php the_field('manufacture_year'); ?></p>
                     </div>

                     <?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
            <div class="projects">
                <div class="projects_title" id="projects">
                    <h2>Projects</h2>
                </div>
                <div class="project_tiles">
                
                </div>     
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
