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
//                                    echo '<br>' . $price;
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
                        <?php if( $work_update_entries ) { ?>
                        <a href="#all_project_posts" class="smoothScroll">latest updates</a>
                        <?php } else { ?>
                        <a href="#project_wrapper" class="smoothScroll">see project</a>
                        <?php } ?>
                        <a href="#gallery" class="smoothScroll">project gallery</a>
                        <a href="#search-2" class="smoothScroll">aircraft details</a>
                    </div>
                </div>
            </div>
            <div class="project_section" id="project_section">
                <div class="page_main_wrapper" id="aircraft_page_main_wrapper">
                    <div class="article_listings_wrapper" id="project_wrapper">
                        <div class="detail_item" id="overview">
                            <strong class="detail_title">About the Project</strong>
                            <p class="detail_value">
                                <?php echo $project_overview; ?>
                            </p>
                        </div>
                        <div class="aircraft_gallery" id="gallery">
                            <div class="page_main_wrapper" id="project_gallery_main_wrapper">
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
                                                <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
                                            </div>
                                        </li>

                                        <?php  } ?>
                                    </ul>
                                    <span id='scroll_L_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_L', 'gallery')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
                                    <span id='scroll_R_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_R', 'gallery')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    <span id='scroll_U_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_U', 'gallery')"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                    <span id='scroll_D_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_D', 'gallery')"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                                </div>
                                <?php
                        } 
                ?>
                            </div>
                            <!-- #project_gallery_main_wrapper -->
                        </div>
                        <!-- #gallery -->
                        <div id="all_project_posts">
                            <?php
                            if( $work_update_entries ) {
                                foreach( $work_update_entries as $row ){
                                    $entry_title = $row['entry_title'];
                                    $entry_date = $row['entry_date'];
                                    $work_entry = $row['work_entry']; 
                                    $work_gallery = $row['project_update_gallery']; ?>

                                <article class="project_post">
                                    <div class="article_side">
                                        <p>
                                            <?php echo $entry_date; ?>
                                        </p>
                                    </div>

                                    <div class="article_preview_content">
                                        <header class="article_header" id="single_news_post_header">
                                            <div class="article_title">
                                                <h2>
                                                    <?php echo $entry_title; ?>
                                                </h2>
                                            </div>
                                            <div class="entry-meta">
                                                <ul class="article_meta_list">
                                                    <li><i class="far fa-user"></i> by
                                                        <?php echo get_the_author('display_name'); ?>
                                                    </li>
                                                    <li><i class="far fa-calendar"></i> on
                                                        <?php echo $entry_date; ?>
                                                    </li>
                                                </ul>

                                            </div>
                                            <!-- .entry-meta -->
                                        </header>
                                        <div class="news_article_content">

                                            <p>
                                                <?php echo $work_entry; ?>
                                            </p>
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
                                                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
                                                    </div>
                                                </li>
                                                <?php
                                                } ?>
                                            </ul>
                                            <span id='scroll_L_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_L', 'project')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
                                            <span id='scroll_R_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_R', 'project')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                            <span id='scroll_U_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_U', 'project')"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></span>
                                            <span id='scroll_D_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_D', 'project')"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></span>
                                        </div>
                                        <?php
                                            } ?>


                                    </div>
                                </article>
                                <?php
                                }
                            }
                        ?>

                        </div>
                    </div>

                    <div class="aircraft_sidebar_wrapper sidebar_wrapper" id="project_sidebar_wrapper">
                        <aside id="secondary" class="widget-area">
                            <section id="search-2" class="widget widget_search">
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
                            <section id="project_aircraft_details" class="widget">
                                <h2 class="widget-title sidebar_title">Aircraft Details</h2>
                                <?php if( $history ) { ?>
                                <div class="detail_item">
                                    <strong class="detail_title">Aircraft History</strong>
                                    <p class="detail_value">
                                        <?php echo $history; ?>
                                    </p>
                                </div>
                                <?php } ?>
                                <?php if( $airframe ) { ?>
                                <div class="detail_item">
                                    <strong class="detail_title">Airframe:</strong>
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
                                    <p class="detail_value">
                                        <?php echo $exterior; ?>
                                    </p>
                                </div>
                                <?php } ?>
                                <?php if( $interior ) { ?>
                                <div class="detail_item">
                                    <strong class="detail_title">Interior:</strong>
                                    <p class="detail_value">
                                        <?php echo $interior; ?>
                                    </p>
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
                            </section>
                        </aside>
                        <!-- #secondary -->
                    </div>
                    <!-- #project_sidebar_wrapper -->
                </div>

            </div>

            <?php                        
                    endforeach;
                    wp_reset_postdata();
                }
        ?>

        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php
get_footer();