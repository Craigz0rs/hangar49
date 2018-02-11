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
                        <p class="now_viewing">all projects</p>
                    </div>
                </div>
                <div class="page_main_wrapper aircraft_tile_main_wrapper" id="project_page_main_wrapper">
                <div class="project_tiles aircraft_tiles" id="projects">
                    <?php 

                    $projects = get_posts(array(
                        'posts_per_page'	=> -1,
                        'post_type'			=> 'projects'
                    ));

                    if( $projects ){ ?>

                        <ul class="project_list aircraft_list">

                        <?php foreach( $projects as $post ){ 
                            
                            setup_postdata( $post );
                            
                            $project_link = get_the_permalink();
                            
                            $planes = get_field('aircraft');
                            if( $planes ) {
                               foreach ( $planes as $post ){
                                    setup_postdata($post);
                                    if(function_exists('get_field')){
                                        if(get_field('manufacture_year' , $post->ID)){ 
                                            $year = get_field('manufacture_year' , $post->ID);} else { $year = ''; }
                                        if(get_field('manufacturer' , $post->ID)){ 
                                            $manufacturer = get_field('manufacturer' , $post->ID);} else { $manufacturer = ''; }
                                        if(get_field('model' , $post->ID)){ 
                                            $model = get_field('model' , $post->ID);} else { $model = ''; }
                                        if(get_field('serial_number' , $post->ID)){ 
                                            $serial_number = get_field('serial_number' , $post->ID);} else { $serial_number = ''; }
                                        if(get_field('registration_number' , $post->ID)){ 
                                            $registration_number = get_field('registration_number' , $post->ID);} else { $registration_number = ''; }
                                        if(get_field('special_info' , $post->ID)){
                                            $special_info = get_field('special_info' , $post->ID);} else { $special_info = ''; }
                                        if(get_field('price' , $post->ID)){ 
                                            $price = get_field('price' , $post->ID);} else { $price = ''; }
                                        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                    }
                                ?>
                                <li>

                                <?php if( $feat_image ) { ?>
                                        <div class="aircraft_tile project_tile" style="background-image: url('<?php echo $feat_image; ?>')">  
                                        <img src="<?php echo $feat_image; ?>">
                                <?php } else { ?>
                                        <div class="aircraft_tile project_tile">  
                                <?php } ?>                                
                                      <a href="<?php echo $project_link; ?>">
                                            <span class="tile_overlay"></span> 
                                            <h3><?php
                                                if( $year ){
                                                    echo $year . ' ';
                                                }
                                                if( $manufacturer ){
                                                    echo $manufacturer . ' ';
                                                }
                                                if( $model ){
                                                    echo $model;
                                                } ?>
                                            </h3>
                                            <div class="aircraft_brief">
                                                <p><?php 
                                                    if($serial_number){
                                                        echo 'S/N: ' . $serial_number;
                                                    }
                                                    if($serial_number && $registration_number){
                                                        echo ' • ';
                                                    }
                                                    if($registration_number){
                                                        echo 'R/N: ' . $registration_number;
                                                    }
                                                    if($price){
                                                        echo '<br>' . $price;
                                                    } ?>   
                                                </p>
                                                <p class="special_info"><?php
                                                    if($special_info){
                                                        echo $special_info;
                                                    } ?>
                                                </p>
                                            </div>
                                        </a>
                                        <a href="<?php echo $project_link; ?>">
                                            <span class="read_more">see project</span>
                                        </a>
                                    </div>
                                    
                                </li>
                            <?php 
                                } //end foreach $planes as $post
                            wp_reset_postdata();
                            } //end if $planes
                        } //end foreach $projects as $post
                            ?>

                        </ul>
                    <?php } //end if $projects ?>
                </div>   
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
