<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hangar_49
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Jura:700|Metrophobic|Orbitron" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_bloginfo( 'template_directory' ); ?>/fonts/font-awesome/css/font-awesome.min.css" />

	<?php wp_head(); ?>
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hangar49' ); ?></a>

	<header id="masthead" class="site-header">
        <div class="nav_wrap">
		<nav id="site-navigation" class="main-navigation">
            <a href="<?php echo get_home_url() ?>" class="nav_branding smoothScroll"><span>Hangar 49</span><br><span>Warbrids</span></a>
        <?php if (is_front_page()) { ?>
            <ul>
                <li><a href="<?php echo get_post_type_archive_link( 'inventory' ); ?>" class="smoothScroll"><i class="fa fa-fighter-jet" id="fighterjet" aria-hidden="true"></i><br>Inventory</a></li>
                <li><a href="<?php echo get_post_type_archive_link( 'projects' ); ?>" class="smoothScroll"><i class="fa fa-wrench" id="wrench" aria-hidden="true"></i><br>Projects</a></li>
                <li><a href="<?php echo get_page_link(24); ?>" class="smoothScroll"><i class="fa fa-envelope" id="envelope" aria-hidden="true"></i><br>Contact</a></li>
            </ul>
        <?php } else { ?>
            <ul>
<!--                <li><a href="<?php echo get_home_url() ?>/#home"><span>Hangar 49</span><br><span>Warbrids</span></a></li>-->
                <li><a href="<?php echo get_post_type_archive_link( 'inventory' ); ?>"><i class="fa fa-fighter-jet" id="fighterjet" aria-hidden="true"></i><br>Inventory</a></li>
                <li><a href="<?php echo get_post_type_archive_link( 'projects' ); ?>"><i class="fa fa-wrench" id="wrench" aria-hidden="true"></i><br>Projects</a></li>
                <li><a href="<?php echo get_page_link(24); ?>" class="smoothScroll"><i class="fa fa-envelope" id="envelope" aria-hidden="true"></i><br>Contact</a></li>
            </ul>
        <?php } ?>
<!--			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'hangar49' ); ?></button>-->
<!--
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
-->
		</nav><!-- #site-navigation -->
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
