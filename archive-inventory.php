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
<!--                    <h2>warbirds for sale</h2>-->
                    <div class="archive_sorting" id="inventory_sorting">
                        <p class="now_viewing">all inventory</p>
                    </div>
                </div>
               
            </div>
            <div class="page_main_wrapper" id="news_page_main_wrapper">
                <div class="article_listings_wrapper" id="news_article_listings_wrapper">
                <?php
                   if ( have_posts()) {
                       while (have_posts()) {
                            the_post();
                            if(function_exists('get_field')) {
                                $inv_price = get_field('price');
                                $saleInfo = get_field('sale_info');
                                $inventory_feat_image = get_field('featured_image');
                                $list_date = strtotime(get_the_date());
                                $today = strtotime(date('F d, Y'));
                                $coming_soon = get_field('coming_soon');
                                $price_reduced = get_field('price_reduced');
                            }
                           
                                $plane = get_field('inventory_aircraft');
                                    if($plane) {
                                        foreach($plane as $post) {
                                            setup_postdata($post);
                                            $planeURL = get_the_permalink();
                                            if(get_field('manufacture_year' , $post->ID)){ 
                                                $inv_year = get_field('manufacture_year' , $post->ID);} else { $year = ''; }
                                            if(get_field('manufacturer' , $post->ID)){ 
                                                $inv_manufacturer = get_field('manufacturer' , $post->ID);} else { $manufacturer = ''; }
                                            if(get_field('model' , $post->ID)){ 
                                                $inv_model = get_field('model' , $post->ID);} else { $model = ''; }
                                            if(get_field('serial_number' , $post->ID)){ 
                                                $inv_serial_number = get_field('serial_number' , $post->ID);} else { $serial_number = ''; }
                                            if(get_field('registration_number' , $post->ID)){ 
                                                $inv_registration_number = get_field('registration_number' , $post->ID);} else { $registration_number = ''; }
                                            if(get_field('special_info' , $post->ID)){
                                                $inv_special_info = get_field('special_info' , $post->ID);} else { $special_info = ''; }
                                            $inv_aircraft_feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                            if(get_field('image_gallery', $post->ID)) {
                                                $rows = get_field('image_gallery', $post->ID);
                                                $first_row = $rows[0];
                                                $inv_aircraft_gallery_image = $first_row['aircraft_gallery_image']; 
                                            }
                                        }  
                                    }
                                    
                                    $inv_image;   
                                    if($inventory_feat_image) {
                                        $inv_image = $inventory_feat_image;
                                    } else if($inv_aircraft_feat_image) {
                                        $inv_image_url = $inv_aircraft_feat_image;
                                    } else if($inv_aircraft_gallery_image) {
                                        $inv_image = $inv_aircraft_gallery_image;
                                    }

                                    if($inv_image) {
                                        $inv_image_url = $inv_image['url'];
                                        $inv_image_alt = $inv_image['alt'];
                                    }
                                ?>

                                <article class="home_list_item home_latest_aircraft_item inventory_listing">
                                    <div class="list_item_image">
                                        <img src="<?php echo $inv_image_url; ?>" alt="<?php echo $inv_image_alt; ?>" />
                                    </div>
                                    <div class="list_item_info">
                                        <div class="list_item_overlay"></div>
                                        <div class="list_item_overlay2"></div>
                                        <?php
                                            if($inv_year || $inv_manufacturer || $inv_model) { ?>
                                                <div class="article_excerpt_title">
                                                    <h1 class="entry-title"><a href="<?php echo $planeURL; ?>"><?php echo $inv_year . ' ' . $inv_manufacturer . ' ' . $inv_model; ?></a></h1>
                                                </div>
                                            <?php
                                            }

                                            if($inv_price) { ?>
<!--
                                                <p>
                                                    <?php echo $inv_price; ?>
                                                </p>
-->
                                            <?php
                                            }
                                            if($saleInfo) { ?>
                                            <div class="list_item_pitch">
                                                <p>
                                                    <?php echo $saleInfo; ?>
                                                </p>
                                            </div>
                                            <?php
                                            }
                                        ?>
                                        <footer class="list_item_footer">
                                            <div class="list_item_meta">
                                                
                                                <?php
                                                    $list_status;
                                                    $list_status_class;
                                                    if($coming_soon) {
                                                        $list_status = 'COMING SOON';
                                                        $list_status_class = 'coming_soon';                   
                                                    } else if($price_reduced) {
                                                        $list_status = 'PRICE REDUCED';
                                                        $list_status_class = 'price_reduced';                 
                                                    } else if(($today - $list_date) < 2592000) {
                                                        $list_status = 'NEW LISTING';
                                                        $list_status_class = 'new_listing';
                                                    } else {
                                                        
                                                    }
                                                ?>
                                                <p class="list_item_status <?php echo $list_status_class; ?>">
                                                    <?php echo $list_status; ?>
                                                </p>
                                            </div>
                                            <div class="article_read_more">
                                                <a href="<?php echo $planeURL; ?>">learn more</a>
                                            </div>
                                        </footer>
                                    </div>
                                </article>
                                <?php                          
                           
                       }
                   } else {
                       get_template_part( 'template-parts/content', 'none' );
                   }   
                ?>
                     
                     
<!--
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
-->

<!--                    </ul>-->
<!--                    <?php endif; ?>-->
                </div>
                <div class="sidebar_wrapper" id="news_archive_sidebar_wrapper">
<!--                    <?php dynamic_sidebar('inventory_sidebar'); ?>-->
<!--
                    <div>   
                        <h3>Search players</h3>
                        <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
                            <input type="text" name="s" placeholder="Search players"/>
                            <input type="hidden" name="post_type" value="inventory" />  // hidden 'players' value 
                            <input type="submit" alt="Search" value="Search" />
                         </form>
                     </div>
-->
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
