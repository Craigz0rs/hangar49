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

            <div class="page_header" id="projects_page_header">
                <div class="page_header" id="projects_page_header">
                    <div class="page_header_overlay" id="projects_page_header_overlay">
                    </div>
                        <h1>Projects</h1>
                    </div>
                    <div class="archive_sorting" id="project_sorting">
                        <a href="#projects" class="smoothScroll">see all projects</a>
                    </div>
                </div>
                <div class="project_tiles aircraft_tiles" id="projects">
                    <?php 

                    $projects = get_posts(array(
                        'posts_per_page'	=> -1,
                        'post_type'			=> 'projects'
                    ));

                    if( $projects ): ?>

                        <ul class="project_list aircraft_list">

                        <?php foreach( $projects as $post ): 
                            
                            setup_postdata( $post );
                            
                            $project_link = get_the_permalink();

                            echo '<li><div class="aircraft_tile project_tile">';
                            
                            $planes = get_field('aircraft');
                            if( $planes ) {
                               foreach ( $planes as $post ):
                                    setup_postdata($post);
                                    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                                    if( $feat_image ) : ?>
                                    <img src="<?php echo $feat_image; ?>">
                                    <?php
                                    endif;
                                    echo '<a href="' . $project_link . '"><span class="tile_overlay"></span></a>';
                                    echo '<h3>' . get_field('manufacture_year') . ' ' . get_field('manufacturer') . ' ' . get_field('model') . '</h3>';
                                    echo '<a href="' . $project_link . '"><span class="read_more">see project</class></a>';
                                endforeach;
                                wp_reset_postdata();
                            }
                            echo '</div></li>';
                            ?>

                        <?php endforeach; ?>

                        </ul>

                        <?php wp_reset_postdata(); ?>

                    <?php endif; ?>
                </div>   

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
