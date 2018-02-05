<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hangar_49
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="article-media">
        <?php 
            $thumbnail_id = get_post_thumbnail_id( $post->ID );
            $title = get_post(get_post_thumbnail_id())->post_title; 
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
            $caption = get_post(get_post_thumbnail_id())->post_excerpt;   
            $description = get_post(get_post_thumbnail_id())->post_content; // The Description
        ?>
        <img src="<?php the_post_thumbnail_url( 'medium_large' );  ?>" title="<?php echo $title ?>" alt="<?php echo $alt; ?>"/>
    </div>
    <div class="article_excerpt">
        <div class="article_excerpt_title">
            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;     
            ?>
        </div>
        <?php if ( is_singular() ) : ?>
        <div class="article_content">
            <?php
                the_content( sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hangar49' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hangar49' ),
                    'after'  => '</div>',
                ) );
            ?>            
        </div><!-- .article_content -->               
        <?php
        else :
             the_excerpt();
        endif;   
        ?>    
        </div>
    
    
    
	<header class="entry-header">
		<?php

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php hangar49_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hangar49' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hangar49' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hangar49_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
