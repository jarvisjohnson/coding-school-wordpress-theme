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

/**
 * The following hook will add a input field right before "add to cart button"
 * will be used for getting Name on t-shirt 
 */
function add_product_campus_field() {
	$date = get_sub_field('start_date');
    echo '<input type="hidden" class="update-campus" name="course-campus" value="" />';
    echo '<input type="hidden" name="start-date" value="' . $date . '" />';
}
add_action( 'woocommerce_before_add_to_cart_button', 'add_product_campus_field', '40' );

function save_campus_field( $cart_item_data, $product_id ) {
    if( isset( $_REQUEST['course-campus'] ) ) {
        $cart_item_data[ 'course-campus' ] = $_REQUEST['course-campus'];
        $cart_item_data[ 'start-date' ] = $_REQUEST['start-date'];
        /* below statement make sure every add to cart action as unique line item */
        $cart_item_data['unique_key'] = md5( microtime().rand() );
    }
    return $cart_item_data;
}
add_action( 'woocommerce_add_cart_item_data', 'save_campus_field', 10, 2 );

function render_meta_on_cart_and_checkout( $cart_data, $cart_item = null ) {
    $custom_items = array();
    /* Woo 2.4.2 updates */
    if( !empty( $cart_data ) ) {
        $custom_items = $cart_data;
    }
    if( isset( $cart_item['course-campus'] ) ) {
        $custom_items[] = array( "name" => 'Campus', "value" => $cart_item['course-campus'] );
    }
    if( isset( $cart_item['start-date'] ) ) {
        $custom_items[] = array( "name" => 'Start Date', "value" => $cart_item['start-date'] );
    }    
    return $custom_items;
}
add_filter( 'woocommerce_get_item_data', 'render_meta_on_cart_and_checkout', 10, 2 );

function campus_order_meta_handler( $item_id, $values, $cart_item_key ) {
    if( isset( $values['course-campus'] ) ) {
        wc_add_order_item_meta( $item_id, "Campus", $values['course-campus'] );
    }
    if( isset( $values['start-date'] ) ) {
        wc_add_order_item_meta( $item_id, "Start Date", $values['start-date'] );
    }    
}
add_action( 'woocommerce_add_order_item_meta', 'campus_order_meta_handler', 1, 3 );


