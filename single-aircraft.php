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
            <div class="content_wrapper" id="aircraft_wrapper">      
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
                        } 
                ?>
                <?php if( have_rows('image_gallery') ): ?>
				<div class="flexslider gallery_slider" id="slider">
					<ul class="slides gallery_slides">
						<?php while( have_rows('image_gallery') ): the_row();
							$image = get_sub_field('slider_image');
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
						<li>
                            <div class="slider_image">
							<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                            </div>
						</li>
                        <?php endwhile; ?>
					</ul>
				</div>
                <div id="carousel" class="flexslider">
					<ul class="slides gallery_slides">
						<?php while( have_rows('image_gallery') ): the_row();
							$image = get_sub_field('slider_image');
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
						<li>
                            <div class="slider_image">
							<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                            </div>
						</li>
                        <?php endwhile; ?>
					</ul>
                </div>
                <?php endif; ?>
                <h1><?php echo $year . ' ' . $manufacturer . ' ' . $model; ?></h1>
                <div class="aircraft_status">
                    <strong class="spec_title">FOR SALE</strong>
                    <p class="spec_value"><?php echo '$' . $price; ?></p>                 
                </div>
                <div class="aircraft_specifications">
                    <h2>Specifications</h2>
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
                </div>
                <div class="aircraft_details">
                    <h2>Details</h2>
                    <div class="detail_item">
                        <strong class="detail_title">Airframe</strong>
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
                        <strong class="detail_title">Avionics:</strong>
                        <p class="detail_value"><?php echo $avionics; ?></p>
                    </div>
                    <div class="detail_item">
                        <strong class="detail_title">Exterior:</strong>
                        <p class="detail_value"><?php echo $exterior; ?></p>
                    </div>
                    <div class="detail_item">
                        <strong class="detail_title">Interior</strong>
                        <p class="detail_value"><?php echo $interior; ?></p>
                    </div>
                    <div class="detail_item">
                        <strong class="detail_title">Equipment:</strong>
                        <p class="detail_value"><?php echo $equipment; ?></p>
                    </div>
                    <div class="detail_item">
                        <strong class="detail_title">Miscellaneous:</strong>
                        <p class="detail_value"><?php echo $misc; ?></p>
                    </div>
                </div>   
                <?php
                endwhile; // End of the loop.
                ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
