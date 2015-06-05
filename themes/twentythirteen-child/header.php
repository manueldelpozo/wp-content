<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<style type="text/css">
	.nav-menu li {
		padding-right: 3% !important; 
		text-transform: uppercase !important;
	}
	.search-form {
		position: absolute !important;
		right: 0 !important;
		top: -34px !important;
	}
	</style>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" role="banner">
			<a href="<?php echo esc_url( home_url( '/magazine/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="http://localhost:8888/wordpress/wp-content/uploads/2015/06/GPU_Logotype_RGB.png" alt="go—popup-logo" width="100px">
				<span class="site-title" style="font-size: 31px;font-weight: lighter;color: #444;margin-left: 1px;position: absolute;top: -4px;"><?php bloginfo( 'name' ); ?></span>
			</a>
			
			<div id="navbar" class="navbar" style="position:relative;">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></button>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
					
				</nav><!-- #site-navigation -->
				<?php get_search_form(); ?>
			</div><!-- #navbar -->
		</header><!-- #masthead -->

		<div id="main" class="site-main">
