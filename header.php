<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
<style>
form div.wpcf7-response-output {
    margin: 1em 0.5em 1em!important;
}
#rqa_text_field_row, #rqa_text_field_row_2 {
    display: block;
}
</style>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="title-bar" data-responsive-toggle="site-navigation" style="display:block!important;">
			<icon class="menu-icon left" type="button" data-toggle="mobile-menu">
				<i class="fa fa-bars"></i>
			</icon>
			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

				<img src="<?php bloginfo('template_directory'); ?>/assets/images/global/svcs-logo.svg" onerror="this.onerror=null; this.src='<?php bloginfo('template_directory'); ?>/assets/images/global/svcs-logo.png'">
					

				</a>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="top-bar-left">
				<ul class="menu">
					<li class="home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/global/svcs-logo.svg" onerror="this.onerror=null; this.src='<?php bloginfo('template_directory'); ?>/assets/images/global/svcs-logo.png'">
						
					</a></li>
				</ul>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
