<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Hangar_49
 */

get_header('archive'); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
                while ( have_posts() ) : the_post();
                
                        if(function_exists('get_field')){
                            if(get_field('manufacture_year')){ 
                                $year = get_field('manufacture_year');}
                            if(get_field('manufacturer')){ 
                                $manufacturer = get_field('manufacturer');}
                            if(get_field('model')){ 
                                $model = get_field('model');}
                            if(get_field('serial_number')){ 
                                $serial_number = get_field('serial_number');}
                            if(get_field('registration_number')){ 
                                $registration_number = get_field('registration_number');}
                            if(get_field('special_info')){
                                $special_info = get_field('special_info');}
                            if(get_field('price')){ 
                                $price = get_field('price');}
                            if(get_field('airframe')){ 
                                $airframe = get_field('airframe');}
                            if(get_field('engine')){ 
                                $engine = get_field('engine');}
                            if(get_field('propeller')){ 
                                $propeller = get_field('propeller');}
                            if(get_field('avionics')){ 
                                $avionics = get_field('avionics');}
                            if(get_field('exterior')){ 
                                $exterior = get_field('exterior');}
                            if(get_field('interior')){ 
                                $interior = get_field('interior');}
                            if(get_field('equipment')){ 
                                $equipment = get_field('equipment');}
                            if(get_field('history')){ 
                                $history = get_field('history');}
                            if(get_field('location')){ 
                                $location = get_field('location');}
                            if(get_field('misc')){ 
                                $misc = get_field('misc');}
                            $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                        } 
                ?>
                <div class="page_header_wrapper" id="aircraft_header_wrapper">
                    <div class="page_header" id="aircraft_page_header" style="background-image: url(<?php echo $featured_image; ?>)">
                        <div class="page_header_overlay" id="news_page_header_overlay">
                        </div>
                        <h1>
                            <?php echo $year . ' ' . $manufacturer . ' ' . $model; ?>
                        </h1>
                        <div id="project_header_info_box" class="header_info_box">
                            <span>
                            <p class="aircraft_header_serial"><?php 
                                if($serial_number){
                                    echo 'S/N: ' . $serial_number . ' • ';
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
                        </span>
                        </div>
                        <div class="archive_sorting project_sorting" id="aircraft_sorting">
                            <a href="#gallery" class="smoothScroll">view gallery</a>
                            <a href="#project_sidebar_wrapper" class="smoothScroll">see details</a>
                        </div>
                    </div>
                    <!-- .page_header -->
                </div>
                <!-- .page_header_wrapper -->
                <div class="page_main_wrapper" id="aircraft_page_main_wrapper">
                    <div class="article_listings_wrapper" id="inventory_plane_wrapper">
                        <div class="aircraft_gallery" id="gallery">
                            <div class="page_main_wrapper" id="project_gallery_main_wrapper">
                                <?php if( have_rows('image_gallery') ): ?>
                                <div class="flexslider gallery_slider" id="gallery_slider">
                                    <ul class="slides gallery_slides">
                                        <?php while( have_rows('image_gallery') ): the_row();
                                                $image = get_sub_field('aircraft_gallery_image');
                                                $title = $image['title'];
                                                $description = $image['description'];
                                                $caption = $image['caption'];

                                                $url = $image['url'];
                                                $alt = $image['alt'];


                                                $size = 'full';
                                                $myimage = $image['sizes'][ $size ];
                                                $width = $image['sizes'][ $size . '-width' ];
                                                $height = $image['sizes'][ $size . '-height' ];

                                            ?>
                                        <li data-thumb="<?php echo $url; ?>">
                                            <div class="aircraft_slider_image">
                                                <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
                                            </div>
                                        </li>
                                        <?php endwhile; ?>
                                    </ul>
                                    <span id='scroll_L_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_L', 'gallery')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
                                    <span id='scroll_R_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_R', 'gallery')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    <span id='scroll_U_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_U', 'gallery')"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                    <span id='scroll_D_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_D', 'gallery')"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                                </div>

                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="aircraft_sidebar_wrapper sidebar_wrapper" id="project_sidebar_wrapper">
                            <section id="aircraft_specifications_2" class="widget widget_search aircraft_specifications_2">
                                <h2 class="widget-title sidebar_title">Aircraft Specifications</h2>
                                <div class="spec_item">
                                    <strong class="spec_title">Year:</strong>
                                    <p class="spec_value">
                                        <?php echo $year; ?>
                                    </p>
                                </div>
                                <div class="spec_item">
                                    <strong class="spec_title">Manufacturer:</strong>
                                    <p class="spec_value">
                                        <?php echo $manufacturer; ?>
                                    </p>
                                </div>
                                <div class="spec_item">
                                    <strong class="spec_title">Model:</strong>
                                    <p class="spec_value">
                                        <?php echo $model; ?>
                                    </p>
                                </div>
                                <div class="spec_item">
                                    <strong class="spec_title">Serial Number:</strong>
                                    <p class="spec_value">
                                        <?php echo $serial_number; ?>
                                    </p>
                                </div>
                                <div class="spec_item">
                                    <strong class="spec_title">Registration Number:</strong>
                                    <p class="spec_value">
                                        <?php echo $registration_number; ?>
                                    </p>
                                </div>
                                <?php if ( $price ) { ?>
                                <div class="spec_item">
                                    <strong class="spec_title">Price:</strong>
                                    <p class="spec_value">
                                        <?php echo $price; ?>
                                    </p>
                                </div>
                                <?php } ?>
                                <div class="spec_item">
                                    <strong class="spec_title">Location:</strong>
                                    <p class="spec_value">
                                        <?php echo $location; ?>
                                    </p>
                                </div>
                            </section>
                        </div>
                        <section id="inventory_aircraft_details" class="widget aircraft_details">
                            <?php if( $history ) { ?>
                            <div class="detail_item" id="aircraft_history">
                                <h2 class="detail_section_title">Aircraft History</h2>
                                <p class="detail_value">
                                    <?php echo $history; ?>
                                </p>
                            </div>
                            <?php } ?>
                            <div id="main_detail_section">
                                <h2 class="detail_section_title">Aircraft Details</h2>
                                <?php if( $airframe ) { ?>
                                <div class="detail_item">
                                    <h3 class="detail_title">Airframe:</h3>
                                    <p class="detail_value">
                                        <?php echo $airframe; ?>
                                    </p>
                                </div>
                                <?php } ?>
                                <?php if( $engine ) { ?>
                                <div class="detail_item">
                                    <strong class="detail_title">Engine(s):</strong>
                                    <p class="detail_value">
                                        <?php echo $engine; ?>
                                    </p>
                                </div>
                                <?php } ?>
                                <?php if( $propeller ) { ?>
                                <div class="detail_item">
                                    <strong class="detail_title">Propeller(s):</strong>
                                    <p class="detail_value">
                                        <?php echo $propeller; ?>
                                    </p>
                                </div>
                                <?php } ?>
                                <?php if( $exterior ) { ?>
                                <div class="detail_item">
                                    <strong class="detail_title">Exterior:</strong>
                                    <div class="detail_with_slider">
                                        <p class="detail_value">
                                            <?php echo $exterior; ?>
                                        </p>
                                        <?php if( have_rows('exterior_image_gallery') ): ?>
                                        <div class="flexslider gallery_slider" id="exterior_slider">
                                            <ul class="slides gallery_slides">
                                                <?php while( have_rows('exterior_image_gallery') ): the_row();
                                                $image = get_sub_field('exterior_gallery_image');
                                                $title = $image['title'];
                                                $description = $image['description'];
                                                $caption = $image['caption'];

                                                $url = $image['url'];
                                                $alt = $image['alt'];


                                                $size = 'full';
                                                $myimage = $image['sizes'][ $size ];
                                                $width = $image['sizes'][ $size . '-width' ];
                                                $height = $image['sizes'][ $size . '-height' ];

                                            ?>
                                                <li data-thumb="<?php echo $url; ?>">
                                                    <div class="exterior_slider_image">
                                                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
                                                    </div>
                                                </li>
                                                <?php endwhile; ?>
                                            </ul>
                                            <span id='scroll_L_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_L', 'exterior')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
                                            <span id='scroll_R_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_R', 'exterior')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                            <span id='scroll_U_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_U', 'exterior')"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                            <span id='scroll_D_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_D', 'exterior')"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if( $interior ) { ?>
                                <div class="detail_item">
                                    <strong class="detail_title">Interior:</strong>
                                    <div class="detail_with_slider">
                                        <p class="detail_value">
                                            <?php echo $interior; ?>
                                        </p>
                                        <?php if( have_rows('interior_image_gallery') ): ?>
                                        <div class="flexslider gallery_slider" id="interior_slider">
                                            <ul class="slides gallery_slides">
                                                <?php while( have_rows('interior_image_gallery') ): the_row();
                                                $image = get_sub_field('interior_gallery_image');
                                                $title = $image['title'];
                                                $description = $image['description'];
                                                $caption = $image['caption'];

                                                $url = $image['url'];
                                                $alt = $image['alt'];


                                                $size = 'full';
                                                $myimage = $image['sizes'][ $size ];
                                                $width = $image['sizes'][ $size . '-width' ];
                                                $height = $image['sizes'][ $size . '-height' ];

                                            ?>
                                                <li data-thumb="<?php echo $url; ?>">
                                                    <div class="interior_slider_image">
                                                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
                                                    </div>
                                                </li>
                                                <?php endwhile; ?>
                                            </ul>
                                            <span id='scroll_L_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_L', 'interior')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
                                            <span id='scroll_R_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_R', 'interior')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                            <span id='scroll_U_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_U', 'interior')"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                            <span id='scroll_D_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_D', 'interior')"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if( $avionics ) { ?>
                                <div class="detail_item">
                                    <strong class="detail_title">Avionics:</strong>
                                    <p class="detail_value">
                                        <?php echo $avionics; ?>
                                    </p>
                                </div>
                                <?php } ?>
                                <?php if( $equipment ) { ?>
                                <div class="detail_item">
                                    <strong class="detail_title">Equipment:</strong>
                                    <p class="detail_value">
                                        <?php echo $equipment; ?>
                                    </p>
                                </div>
                                <?php } ?>
                                <?php if( $misc ) { ?>
                                <div class="detail_item">
                                    <strong class="detail_title">Miscellaneous:</strong>
                                    <p class="detail_value">
                                        <?php echo $misc; ?>
                                    </p>
                                </div>
                                <?php } ?>
                            </div>
                        </section>


                    </div>
                    <!-- .article_listings_wrapper -->
                    <div class="aircraft_sidebar_wrapper sidebar_wrapper" id="project_sidebar_wrapper">
                        <section id="search-2" class="widget widget_search aircraft_specifications_1">
                            <h2 class="widget-title sidebar_title">Aircraft Specifications</h2>
                            <div class="spec_item">
                                <strong class="spec_title">Year:</strong>
                                <p class="spec_value">
                                    <?php echo $year; ?>
                                </p>
                            </div>
                            <div class="spec_item">
                                <strong class="spec_title">Manufacturer:</strong>
                                <p class="spec_value">
                                    <?php echo $manufacturer; ?>
                                </p>
                            </div>
                            <div class="spec_item">
                                <strong class="spec_title">Model:</strong>
                                <p class="spec_value">
                                    <?php echo $model; ?>
                                </p>
                            </div>
                            <div class="spec_item">
                                <strong class="spec_title">Serial Number:</strong>
                                <p class="spec_value">
                                    <?php echo $serial_number; ?>
                                </p>
                            </div>
                            <div class="spec_item">
                                <strong class="spec_title">Registration Number:</strong>
                                <p class="spec_value">
                                    <?php echo $registration_number; ?>
                                </p>
                            </div>
                            <?php if ( $price ) { ?>
                            <div class="spec_item">
                                <strong class="spec_title">Price:</strong>
                                <p class="spec_value">
                                    <?php echo $price; ?>
                                </p>
                            </div>
                            <?php } ?>
                            <div class="spec_item">
                                <strong class="spec_title">Location:</strong>
                                <p class="spec_value">
                                    <?php echo $location; ?>
                                </p>
                            </div>
                        </section>
                        <section id="inventory_contact" class="widget">
                            <h2 class="widget-title sidebar-title">Enquire Now</h2>
                            <div class="widget_content_area">
                                <p>Interested in this plane? Contact us now</p>

                                <?php
                if(function_exists('get_field')){
                    if(get_field('phone_number', 24)){ 
                        $phone = get_field('phone_number', 24);}
                    if(get_field('email', 24)){ 
                        $email = get_field('email', 24);}
                } 
            ?>
                                    <ul>
                                        <li><a href="tel:<?php echo $phone; ?>"><i class="fa  fa-phone" id="phone" aria-hidden="true"></i> <?php echo $phone; ?></a></li>
                                        <li><a href="email:<?php echo $email; ?>"><i class="fa  fa-envelope" id="envelope" aria-hidden="true"></i> <?php echo $email; ?></a></li>
                                    </ul>
                                    <p>Send us a message</p>
                                    <?php echo do_shortcode('[contact-form-7 id="87" title="Contact form 1"]'); ?>
                            </div>
                        </section>
                    </div>
                    <!-- .aircraft_sidebar_wrapper -->
                </div>
                <!-- .page_main_wrapper -->
                <!--
   
            <div class="aircraft_specifications" id="aircraft_info">
                <div class="aircraft_content_wrap">
                    <div class="content_wrapper" id="aircraft_wrapper">
                        <span class="specification_overlay"></span>
                        <div class="spec_item">
                            <strong class="spec_title">Year:</strong>
                            <p class="spec_value"><?php echo $year; ?></p>
                        </div>
                        <div class="spec_item">
                            <strong class="spec_title">Manufacturer:</strong>
                            <p class="spec_value"><?php echo $manufacturer; ?></p>
                        </div>
                        <div class="spec_item">
                            <strong class="spec_title">Model:</strong>
                            <p class="spec_value"><?php echo $model; ?></p>
                        </div>
                        <div class="spec_item">
                            <strong class="spec_title">Serial Number:</strong>
                            <p class="spec_value"><?php echo $serial_number; ?></p>
                        </div>
                        <div class="spec_item">
                            <strong class="spec_title">Registration Number:</strong>
                            <p class="spec_value"><?php echo $registration_number; ?></p>
                        </div>
                        <div class="spec_item">
                            <strong class="spec_title">Price:</strong>
                            <p class="spec_value"><?php echo $price; ?></p>
                        </div>
                        <div class="spec_item">
                            <strong class="spec_title">Location:</strong>
                            <p class="spec_value"><?php echo $location; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
             
            
            <div class="aircraft_details" id="details">
                <div class="aircraft_content_wrap">
                    <div class="content_wrapper" id="aircraft_wrapper">
                        <div class="detail_item">
                            <strong class="detail_title">History:</strong>
                            <p class="detail_value"><?php echo $history; ?></p>
                        </div>
                        <div class="detail_item">
                            <strong class="detail_title">Airframe:</strong>
                            <p class="detail_value"><?php echo $airframe; ?></p>
                        </div>
                        <div class="detail_item">
                            <strong class="detail_title">Engine(s):</strong>
                            <p class="detail_value"><?php echo $engine; ?></p>
                        </div>
                        <div class="detail_item">
                            <strong class="detail_title">Propeller(s):</strong>
                            <p class="detail_value"><?php echo $propeller; ?></p>
                        </div>
                        <div class="detail_item">
                            <strong class="detail_title">Exterior:</strong>
                            <div class="detail_with_slider">
                                <p class="detail_value"><?php echo $exterior; ?></p>
                                <?php if( have_rows('exterior_image_gallery') ): ?>
                                <div class="flexslider gallery_slider" id="exterior_slider">
                                        <ul class="slides gallery_slides">
                                            <?php while( have_rows('exterior_image_gallery') ): the_row();
                                                $image = get_sub_field('exterior_gallery_image');
                                                $title = $image['title'];
                                                $description = $image['description'];
                                                $caption = $image['caption'];

                                                $url = $image['url'];
                                                $alt = $image['alt'];


                                                $size = 'full';
                                                $myimage = $image['sizes'][ $size ];
                                                $width = $image['sizes'][ $size . '-width' ];
                                                $height = $image['sizes'][ $size . '-height' ];

                                            ?>
                                            <li data-thumb="<?php echo $url; ?>">
                                                <div class="exterior_slider_image">
                                                     <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                                                </div>
                                            </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <span id='scroll_L_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_L', 'exterior')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
                                    <span id='scroll_R_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_R', 'exterior')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    <span id='scroll_U_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_U', 'exterior')"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                    <span id='scroll_D_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_D', 'exterior')"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="detail_item">
                            <strong class="detail_title">Avionics:</strong>
                            <p class="detail_value"><?php echo $avionics; ?></p>
                        </div>
                        <div class="detail_item">
                            <strong class="detail_title">Equipment:</strong>
                            <p class="detail_value"><?php echo $equipment; ?></p>
                        </div>
                        <div class="detail_item">
                            <strong class="detail_title">Interior:</strong>
                            <div class="detail_with_slider">
                                <p class="detail_value"><?php echo $interior; ?></p>
                                <?php if( have_rows('interior_image_gallery') ): ?>
                                <div class="flexslider gallery_slider" id="interior_slider">
                                        <ul class="slides gallery_slides">
                                            <?php while( have_rows('interior_image_gallery') ): the_row();
                                                $image = get_sub_field('interior_gallery_image');
                                                $title = $image['title'];
                                                $description = $image['description'];
                                                $caption = $image['caption'];

                                                $url = $image['url'];
                                                $alt = $image['alt'];


                                                $size = 'full';
                                                $myimage = $image['sizes'][ $size ];
                                                $width = $image['sizes'][ $size . '-width' ];
                                                $height = $image['sizes'][ $size . '-height' ];

                                            ?>
                                            <li data-thumb="<?php echo $url; ?>">
                                                <div class="interior_slider_image">
                                                     <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                                                </div>
                                            </li>
                                            <?php endwhile; ?>
                                        </ul>
                            <span id='scroll_L_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_L', 'interior')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
                            <span id='scroll_R_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_R', 'interior')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                            <span id='scroll_U_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_U', 'interior')"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                            <span id='scroll_D_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_D', 'interior')"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="detail_item">
                            <strong class="detail_title">Miscellaneous:</strong>
                            <p class="detail_value"><?php echo $misc; ?></p>
                        </div>
                    </div>
                </div>
            </div>
-->



                <?php
                endwhile; // End of the loop.
                ?>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->
    <?php
get_footer();