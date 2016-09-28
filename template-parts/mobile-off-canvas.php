<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="off-canvas position-left" id="mobile-menu" data-off-canvas data-position="left" role="navigation">
	<div class="upper">
		<form action="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
			<button type="submit">
			Free Online Course
			</button>
		</form>
		 <?php if ( is_user_logged_in() ) { ?>
		 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><i class="fa fa-user"></i></a>
		 <?php } 
		 else { ?>
		 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><i class="fa fa-user"></i></a>
		 <?php } ?>
	 </div>
  <?php foundationpress_mobile_nav(); ?>
</nav>

<div class="off-canvas-content" data-off-canvas-content>
