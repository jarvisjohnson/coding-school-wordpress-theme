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

	
	add_action( 'swish_checkout_button' , 'woocommerce_template_single_add_to_cart' );


	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_title' , 5 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating' , 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price' , 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt' , 20 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_meta' , 40 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing' , 50 );	


	
	/**
	 * Get Product Tag Images
	**/

		add_shortcode('taximage', 'taximage');
		function taximage($args) {
		global $post;
		return apply_filters( 'taxonomy-images-list-the-terms', '', array('post_id' => $post->ID, 'taxonomy' => $args['taxonomy']) );
		}

	/**
	 * Get On Campus / Online Course Type
	**/	

		add_shortcode('course_type', 'course_type');
		function course_type() {
			$courseType = '';
			$cats = get_the_terms( $post->ID, 'product_cat' );
			foreach ( $cats as $cat ) $categories[] = $cat->slug;
				if ( in_array( 'on-campus', $categories ) ) {
				  $courseType = 'campus';
				} elseif ( in_array( 'online', $categories ) ) {
				  $courseType = 'online';
				} else {
				  $courseType = 'none-other';
				}
			if ( $courseType == "campus" )	{
				get_template_part( 'template-parts/course-on-campus' );	
			} elseif ( $courseType == "online" ) {
				get_template_part( 'template-parts/course-online' );
			}
			else {}	 
		}

		/** https://www.philowen.co/blog/make-woocommerce-products-sold-individually-by-default/ **/
		
		function default_no_quantities( $individually, $product ){
			$individually = true;
			return $individually;
		}
		add_filter( 'woocommerce_is_sold_individually', 'default_no_quantities', 10, 2 );


/** ACF dynamically load campuses for each course based on those available in options page **/
/** from: https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/ **/

function acf_load_campus_field_choices( $field ) {
    
    // reset choices
    $field['choices'] = array();


    // if has rows
    if( have_rows('all_campuses', 'option') ) {
        
        // while has rows
        while( have_rows('all_campuses', 'option') ) {
            
            // instantiate row
            the_row();
            
            
            // vars
            $value = get_sub_field('value');
            $label = get_sub_field('label');

            
            // append to choices
            $field['choices'][ $value ] = $label;
            
        }
        
    }


    // return the field
    return $field;
    
}

add_filter('acf/load_field/name=campus', 'acf_load_campus_field_choices');

// function acf_load_campus_address( $field ) {
    
//     // reset choices
//     $field['address'] = array();


//     // if has rows
//     if( have_rows('all_campuses', 'option') ) {
        
//         // while has rows
//         while( have_rows('all_campuses', 'option') ) {
            
//             // instantiate row
//             the_row();
            
            
//             // vars
//             $campus_address = get_sub_field('campus_address');
//             $address = get_sub_field('label');

            
//             // append to choices
//             $field['address'] = $campus_address;
            
//         }
        
//     }


//     // return the field
//     return $field;
    
// }

// add_filter('acf/load_field/name=perth', 'acf_load_campus_address');

