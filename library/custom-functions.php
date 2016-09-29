<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Allow upload of svgs's */
/*-----------------------------------------------------------------------------------*/
/*  enable svg images in media uploader
/*-----------------------------------------------------------------------------------*/
function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/*-----------------------------------------------------------------------------------*/
/*  display svg images on media uploader and feature images
/*-----------------------------------------------------------------------------------*/
function custom_admin_head() {
  $css = '';

  $css = 'td.media-icon img[src$=".svg"] { width: 100% !important; height: auto !important; }';

  echo '<style type="text/css">'.$css.'</style>';
}
add_action('admin_head', 'custom_admin_head');
/** 
	WooCommerce
**/

	/** Custom WooCommerce Button Text  **/

	add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );

	/**
	 * custom_woocommerce_template_loop_add_to_cart
	*/
	function custom_woocommerce_product_add_to_cart_text() {
		global $product;
		
		$product_type = $product->product_cat;
		
		switch ( $product_type ) {
			default:
				return __( 'Enrol Now', 'woocommerce' );
		}
		
	}
	/** Custom WooCommerce Button Text  **/

	/**
	 * custom_woocommerce_template_loop_add_to_cart
	*/
	function custom_woocommerce_shop_loop_item_title() {
		the_title();
	}		

	remove_action( 'woocommerce_shop_loop_item_title' , 'woocommerce_shop_loop_item_title', 10 );

	add_action( 'swish_woocommerce_shop_loop_item_title' , 'custom_woocommerce_shop_loop_item_title', 10 );

	
	/**
	 * Get Product Tag Images
	**/

		add_shortcode('taximage', 'taximage');
		function taximage($args) {
		global $post;
		return apply_filters( 'taxonomy-images-list-the-terms', '', array('post_id' => $post->ID, 'taxonomy' => $args['taxonomy']) );
		}

