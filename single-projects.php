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
            setup_postdata( $post );
            if(function_exists('get_field')){
                if(get_field('project_overview')){
                    $project_overview = get_field('project_overview');
                }
                if(get_field('work_update_entry')){
                    $work_update_entries = get_field('work_update_entry');
                }
                if(get_field('project_gallery')){
                    $project_gallery = get_field('project_gallery');
                }
            } 
            

            $planes = get_field('aircraft');                           
                if( $planes ) {
                    foreach ( $planes as $post ):
                    setup_postdata($post);
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
                <div class="page_header" id="aircraft_page_header">
                    <div class="flexslider gallery_slider" id="featured_slider">
                    <?php if( have_rows('featured_image_gallery') ) { ?>
                    <div class="page_header_overlay" id="featured_slider_overlay">
                        <ul class="slides gallery_slides">
                            <?php while( have_rows('featured_image_gallery') ): the_row();
                                $image = get_sub_field('featured_image');
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
                                <div class="slider_image">
                                     <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>    
                    <?php } else { ?>    
                    <div class="page_header_overlay" id="featured_slider_overlay">
                        <ul class="slides gallery_slides">
                            <li>
                                <div class="slider_image">
                                    <img src="<?php echo $featured_image; ?>"/>
                                </div>
                            </li>
                        </ul>
                    </div>
				    <?php } ?>
                </div>
                    <h1><?php echo $year . ' ' . $manufacturer . ' ' . $model; ?></h1>
                    <div class="aircraft_content_wrap">
                        <div id="project_header_info_box" class="header_info_box">
                        <span id="project_info_box_span">
                            <p><?php 
                                if($serial_number){
                                    echo 'S/N: ' . $serial_number . ' • ';
                                }
                                if($registration_number){
                                    echo 'R/N: ' . $registration_number;
                                }
                                if($price){
//                                    echo '<br>' . $price;
                                } ?>   
                            </p>
                            <p class="special_info"><?php
                                if($special_info){
                                    echo $special_info;
                                } ?>
                            </p>
                        </span>
                        <div class="archive_sorting project_sorting" id="aircraft_sorting">
                            <a href="#project_section" class="smoothScroll">see project</a>
                            <a href="#gallery" class="smoothScroll">view gallery</a>
                            <a href="#aircraft_info" class="smoothScroll">see details</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project_section" id="project_section">
                 <div class="aircraft_section_heading">
                    <div class="aircraft_content_wrap">
                        <h2>project</h2>
                    </div>
                </div>
                <span class="aircraft_section_line"></span>
                <div class="aircraft_content_wrap">
                    <div class="content_wrapper" id="project_wrapper">
                        <div class="detail_item" id="overview">
                            <strong class="detail_title">Overview:</strong>
                            <p class="detail_value"><?php echo $project_overview; ?></p>
                        </div>
                        <?php
                            if( $work_update_entries ) {
                                foreach( $work_update_entries as $row ){
                                    $entry_title = $row['entry_title'];
                                    $entry_date = $row['entry_date'];
                                    $work_entry = $row['work_entry']; 
                                    $work_gallery = $row['project_update_gallery']; ?>
                                    <article class="detail_item project_post">
                                        <div class="detail_title project_post_title">
                                            
                                            <p><?php echo $entry_date; ?></p>
                                        </div>
                                        <div class="detail_with_slider project_post_content">
                                            <div class="detail_value project_post_text">
                                                <h3><?php echo $entry_title; ?></h3>
                                                <p><?php echo $work_entry; ?></p>
                                            </div>
                                            <?php if( $work_gallery ) { ?>
                                            <div class="flexslider gallery_slider" id="project_slider">
                                                <ul class="slides gallery_slides">
                                            <?php foreach( $work_gallery as $row ) {
                                                    $image = $row['project_update_gallery_image'];
                                                    $title = $image['title'];
                                                    $description = $image['description'];
                                                    $caption = $image['caption'];
                                                    $url = $image['url'];
                                                    $alt = $image['alt']; 
                                            ?>
                                                   <li data-thumb="<?php echo $url; ?>">
                                                    <div class="exterior_slider_image">
                                                         <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                                                    </div>
                                                    </li>                                                 
                                            <?php
                                                } ?>
                                                </ul>
                                            <span id='scroll_L_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_L', 'project')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
                                            <span id='scroll_R_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_R', 'project')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                            <span id='scroll_U_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_U', 'project')"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                            <span id='scroll_D_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_D', 'project')"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                                            </div> <?php
                                            } ?>
                                            
                                            
                                        </div>
                                    </article> <?php
                                }
                            }
                        ?>

                    </div>
                </div>
            </div>
            <div class="aircraft_gallery" id="gallery">
                <div class="aircraft_section_heading">
                    <div class="aircraft_content_wrap">
                        <h2 id="project_gallery_title">project gallery</h2>
                    </div>
                </div>
                <span class="aircraft_section_line"></span>
                <?php if($project_gallery) { ?>
                        <div class="flexslider gallery_slider" id="gallery_slider">
                                <ul class="slides gallery_slides">
                                    <?php foreach( $project_gallery as $row ) {
                                                    $image = $row['project_gallery_image'];
                                                    $title = $image['title'];
                                                    $description = $image['description'];
                                                    $caption = $image['caption'];
                                                    $url = $image['url'];
                                                    $alt = $image['alt'];                           
                                    ?>
                                    <li data-thumb="<?php echo $url; ?>">
                                        <div class="aircraft_slider_image">
                                             <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                                        </div>
                                    </li>
                                    
                                    <?php  } ?>
                                </ul>
                            <span id='scroll_L_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_L', 'gallery')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
                            <span id='scroll_R_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_R', 'gallery')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                            <span id='scroll_U_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_U', 'gallery')"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                            <span id='scroll_D_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_D', 'gallery')"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                           </div> <?php
                        } 
                ?>
            </div>  
            <div class="aircraft_specifications" id="aircraft_info">
                <div class="aircraft_section_heading">
                    <div class="aircraft_content_wrap">
                        <h2>specifications</h2>
                    </div>
                </div>
                <span class="aircraft_section_line"></span>
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
                <div class="aircraft_section_heading">
                    <div class="aircraft_content_wrap">
                        <h2>details</h2>
                    </div>
                </div>
                <span class="aircraft_section_line"></span>
                <div class="aircraft_content_wrap">
                    <div class="content_wrapper" id="aircraft_wrapper">
                        <?php if( $history ) { ?>
                        <div class="detail_item">
                            <strong class="detail_title">History:</strong>
                            <p class="detail_value"><?php echo $history; ?></p>
                        </div>
                        <?php } ?>
                        <?php if( $airframe ) { ?>
                        <div class="detail_item">
                            <strong class="detail_title">Airframe:</strong>
                            <p class="detail_value"><?php echo $airframe; ?></p>
                        </div>
                        <?php } ?>
                        <?php if( $engine ) { ?>
                        <div class="detail_item">
                            <strong class="detail_title">Engine(s):</strong>
                            <p class="detail_value"><?php echo $engine; ?></p>
                        </div>
                        <?php } ?>
                        <?php if( $propeller ) { ?>
                        <div class="detail_item">
                            <strong class="detail_title">Propeller(s):</strong>
                            <p class="detail_value"><?php echo $propeller; ?></p>
                        </div>
                        <?php } ?>
                        <?php if( $exterior ) { ?>
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
                        <?php } ?>
                        <?php if( $avionics ) { ?>
                        <div class="detail_item">
                            <strong class="detail_title">Avionics:</strong>
                            <p class="detail_value"><?php echo $avionics; ?></p>
                        </div>
                        <?php } ?>
                        <?php if( $equipment ) { ?>
                        <div class="detail_item">
                            <strong class="detail_title">Equipment:</strong>
                            <p class="detail_value"><?php echo $equipment; ?></p>
                        </div>
                        <?php } ?>
                        <?php if( $interior ) { ?>
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
                        <?php } ?>
                        <?php if( $misc ) { ?>
                        <div class="detail_item">
                            <strong class="detail_title">Miscellaneous:</strong>
                            <p class="detail_value"><?php echo $misc; ?></p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>                             
        <?php                        
                    endforeach;
                    wp_reset_postdata();
                }
        ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
