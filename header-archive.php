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
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo get_bloginfo( 'template_directory' ); ?>/flexslider.css" type="text/css">
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
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( '<span></span><br>Menu', 'hangar49' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">