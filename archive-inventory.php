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
            <div class="page_header_wrapper" id="inventory_header_wrapper">
                <div class="page_header" id="inventory_page_header">
                    <div class="page_header_overlay" id="inventory_page_header_overlay">
                    </div>
                    <h1>Inventory</h1>
                    <h2>warbirds for sale</h2>
                    <div class="archive_sorting" id="inventory_sorting">
                        <a href="#inventory" class="smoothScroll">see all warbirds</a>
                    </div>
                </div>
               
            </div>
              <div class="inventory_tiles aircraft_tiles" id="inventory">
                    <?php
                    $airplanes = get_posts(array(
                        'posts_per_page'	=> -1,
                        'post_type'			=> 'inventory'
                    ));
                    if( $airplanes ): ?>
                        <ul class="inventory_list aircraft_list"> 
                        <?php foreach( $airplanes as $post ) { 
                            setup_postdata( $post );
                            $planes = get_field('inventory_aircraft');
                            if( $planes ) {
                                foreach ( $planes as $post ){
                                    setup_postdata( $post );
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
                                        <div class="aircraft_tile inventory_tile" style="background-image: url('<?php echo $feat_image; ?>')">  
                                        <img src="<?php echo $feat_image; ?>">
                                <?php } else { ?>
                                        <div class="aircraft_tile inventory_tile">  
                                <?php } ?>
                                        <a href="<?php echo get_the_permalink(); ?>">
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
                                        <a href="<?php echo get_the_permalink(); ?>">
                                            <span class="read_more">learn more</span>
                                        </a>
                                    </div>
                                </li>
                            <?php 
                                    }
                            wp_reset_postdata();
                            }
                    } ?>

                    </ul>
                    <?php endif; ?>
                </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
