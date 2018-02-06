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
    <div class="article_side">
        <p><?php echo get_the_date(); ?></p>
    </div>
    <div class="article_preview_content">
        <header class="article_header" id="single_news_post_header">
                <?php
                if ( is_singular() ) : ?>
                <div class="article_title">
                <?php    
                    the_title( '<h1 class="entry-title">', '</h1>' );
                else : ?>
                <div class="article_excerpt_title">
                <?php    
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;     
                ?>
            </div><!-- .article_title .article_excerpt_title -->
            <?php 
                if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <ul class="article_meta_list">
                    <li><i class="far fa-user"></i> by <?php echo get_the_author('display_name'); ?></li>
                    <li><i class="far fa-calendar"></i> on  <?php echo get_the_date(); ?></li>
                </ul>
                <div class="article_category_list">
                    <i class="fas fa-tags"></i> <?php echo get_the_category_list(); ?>
                </div>
            </div><!-- .entry-meta -->
            <?php endif; ?>       
        </header>    
        <?php if ( has_post_thumbnail() ) { ?>
        <div class="article_media">
            <?php 
                $thumbnail_id = get_post_thumbnail_id( $post->ID );
                $title = get_post(get_post_thumbnail_id())->post_title; 
                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
                $caption = get_post(get_post_thumbnail_id())->post_excerpt;   
                $description = get_post(get_post_thumbnail_id())->post_content; // The Description
            ?>
            <figure>
                <img src="<?php the_post_thumbnail_url( 'medium_large' );  ?>" title="<?php echo $title ?>" alt="<?php echo $alt; ?>"/>
                <figcaption><?php echo $caption; ?></figcaption>
            </figure>          
        </div><!-- .article_media -->
        <?php } else {} ?>
        <div class="news_article_content">
        <?php if ( is_singular() ) : ?>
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
            
        else : ?>
            <div class="article_excerpt">
                 <?php the_excerpt(); ?>
            </div> <?php
        endif; ?> 
<!--        </div> .news_article_content    -->
        <footer class="entry-footer">

<!--            <?php hangar49_entry_footer(); ?>-->
        </footer><!-- .entry-footer -->    
    </div><!-- .article_preview_content -->
</article><!-- #post-<?php the_ID(); ?> -->
