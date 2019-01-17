<?php
/**
 * @package Hangar_49
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
            <div class="home_screen" id="home" style="background-image: url(<?php echo $url; ?>); background-size: cover;">
                <div class="content_wrapper" id="front_intro_wrapper">
                    <div class="intro">
                        <h1>Hangar 49</h1>
                        <h1>Warbirds</h1>
                        <?php
                            if(function_exists('have_rows')) {
                                if(have_rows('site_intro')) {
                                    while(have_rows('site_intro')) {
                                        the_row();
                                        $headline = get_sub_field('headline');
                                        $introText = get_sub_field('intro_text');
                                    }
                                }
                            }
                            if(function_exists('get_field')) {
                                $new_inventory_image = get_field('new_inventory_image');
                            }
                        ?>
                        <h2><?php echo $headline; ?></h2>
                        <p>
                            <?php echo $introText; ?>
                        </p>
                    </div>
                    <!-- .intro -->
                    <div class="page_header_overlay" id="page_header_overlay_front"></div>
                </div>
                <!-- .content_wrapper -->
                <div class="full_width_info_bar" id="home_services_info_bar">
                    <div class="info_bar_overlay"></div>
                    <?php
                    if(function_exists('have_rows')) {
                        if(have_rows('selling_features')) {
                            while(have_rows('selling_features')) {
                                the_row(); ?>
                        <div class="service_feature">
                            <div class="feature_icon">
                                <?php echo get_sub_field('selling_feature_icon'); ?>
                            </div>
                            <h2 class="detail_section_title"><?php echo get_sub_field('selling_feature_title'); ?></h2>
                            <p><?php echo get_sub_field('selling_feature_info'); ?></p>
                        </div>                            
                        
                    <?php
                            }    
                        }
                    }
                    ?>

                    
                </div>
                <div id="home_inventory_section">
                <div class="page_main_wrapper" id="home_main_wrapper">
                    <div class="latest_wrapper">
                    <?php
                        $args1 = array(
                            'post_type' => 'inventory',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        
                        $inventory = new WP_Query($args1);
                        
                        if($inventory) { ?>
                        <div id="home_latest_inventory" class="home_latest_list">
                            <h2 class="detail_section_title">Newest Inventory</h2>
                            <?php
                                while($inventory->have_posts()) {
                                    $inventory->the_post();
                                    $item_link = get_the_permalink();
                                    
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
                                } //end while $inventory         
                            ?>

                            
                        </div>
                        <!-- #home_latest_inventory -->
                        <div id="home_inventory_splash" style="background-image: url(<?php echo $new_inventory_image; ?>);">
                            <div id="home_inventory_splash_overlay"></div>
                            <div id="home_inventory_splash_overlay2"></div>
                        </div>
                            
                        <?php 
                            wp_reset_postdata();            
                        } //end if $inventory
                        
                        $args2 = array(
                            'post_type' => 'project',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                    
                        $projects = new WP_Query($args2);
                    
                        if($projects) { ?>
<!--
                        <div id="home_latest_projetcs" class="home_latest_list">
                            <h2 class="detail_section_title">Latest Projects</h2>
                            <?php
                                while($projects->have_posts()) {
                                    $projects->the_post();
                                    $project_url = get_the_permalink();
                                    
                                    
                                }
                            ?>
                        </div>
-->
                        <!-- #home_latest_projects -->                          
    
                        <?php    
                            wp_reset_postdata();
                        } //end if $projects
                    ?>
                    </div><!-- .latest_wrapper -->
                </div>
                <!-- #home_main_wrapper -->
            </div><!-- #home_inventory_section -->
            <?php
                $args3 = array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => -1,
                    'orderby' => 'rand'
                );

                $testimonials = new WP_Query($args3);

                if($testimonials) { 
            ?>
<!--
                    <div class="full_width_info_bar" id="home_testimonials_bar">
                        <div class="info_bar_overlay"></div>
                        <div class="flexslider testimonial_slider" id="testimonial_slider">
                            <ul class="slides">
                            <?php
                                while($testimonials->have_posts()) {
                                    $testimonials->the_post();
                                    $content = get_field('testimonial_text');
                                    $client_name = get_field('client_name');
                            ?>
                                <li>
                                     <p class="testimonial_text"><?php echo $content; ?></p>
                                    <p class="testimonial_name"><?php echo $client_name; ?></p>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>

                    </div> #home_testimonials_bar 
-->
            <?php
                }
            ?>
        </main>
        <!-- #main -->
        </div>
        <!-- #primary -->

        <?php
get_footer();
