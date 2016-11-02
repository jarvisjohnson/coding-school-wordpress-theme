<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php if (!(is_front_page())){ ?>
<div <?php post_class(); ?> >
	<div class="product-new">
		<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		//do_action( 'woocommerce_before_shop_loop_item' );

		/**
		 * woocommerce_before_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		//do_action( 'woocommerce_before_shop_loop_item_title' );
		
		?>
	<!-- Customisation -->
		<div class="title">
			<div class="image">
				<span class="icon"><?php echo $product->get_image($size = 'shop_thumbnail' ); ?></span>
			</div>
			<div class="full-title text-left">
				<a href="<?php the_permalink(); ?>"><h3>
					<?php	
					/**
					 * woocommerce_shop_loop_item_title hook.
					 *
					 * @hooked woocommerce_template_loop_product_title - 10
					 */
					do_action( 'swish_woocommerce_shop_loop_item_title' );		
					/**
					 * woocommerce_after_shop_loop_item_title hook.
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					// do_action( 'woocommerce_after_shop_loop_item_title' );
					?>
				</h3></a>
			</div>
		</div>	
		<div class="details">
				<span class="part">
					<strong>Days</strong>
					<span> <?php the_field('days_of_week'); ?></span>
				</span>	
				<span class="part text-center">
					<strong>Duration</strong>
					<span> <?php the_field('course_duration'); ?> Weeks</span>
				</span>	
				<span class="part text-right">
					<strong>Cost</strong>
					<span><?php echo $product->get_price_html(); ?></span>
				</span>					
		  </div>
		<div class="short">
			<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
		</div>
		<div class="skills-buy">
			<div class="left text-left">
				<h5>Key Skills</h5>
				<?php // echo do_shortcode('[product_tags]'); 
				echo do_shortcode(' [taximage taxonomy="product_tag"]');
				?>
			</div>
			<div class="right text-right">
				<a  class="button" href="<?php the_permalink(); ?>">Learn More</a> 
				<?php	
				/**
				 * woocommerce_after_shop_loop_item hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item' );	
				?>
			</div>
		</div>	
	<!-- // Customisation -->

	</div>
</div>
<?php } 
else { ?>

<!-- 	<div class="product-wrap"> -->
		<div <?php post_class(); ?> >
			<?php
			/**
			 * woocommerce_before_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			//do_action( 'woocommerce_before_shop_loop_item' );

			/**
			 * woocommerce_before_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			//do_action( 'woocommerce_before_shop_loop_item_title' );
			
			?>
		<!-- Customisation -->
				<div class="icon">
					<?php echo $product->get_image($size = 'shop_thumbnail' ); ?>
						
				</div>
				<div class="content">
					<a href="<?php the_permalink(); ?>"><h4>
						<?php	
						/**
						 * woocommerce_shop_loop_item_title hook.
						 *
						 * @hooked woocommerce_template_loop_product_title - 10
						 */
						do_action( 'swish_woocommerce_shop_loop_item_title' );		
						/**
						 * woocommerce_after_shop_loop_item_title hook.
						 *
						 * @hooked woocommerce_template_loop_rating - 5
						 * @hooked woocommerce_template_loop_price - 10
						 */
						// do_action( 'woocommerce_after_shop_loop_item_title' );


						?>
					</h4></a>
					<div class="campuses mono">
						<?php $campuses = get_field('campus'); 
						if ($campuses):
							foreach ($campuses as $campus):
								echo '- ' . $campus . '&nbsp';
								// echo
							endforeach; 
						endif ?>
					</div>
					<div class="price mono">
						<span><?php echo $product->get_price_html(); ?></span>
					</div>
				</div>
				<div class="right text-right">
					<a  class="button" href="<?php the_permalink(); ?>">Learn More</a> 
					<?php	
					/**
					 * woocommerce_after_shop_loop_item hook.
					 *
					 * @hooked woocommerce_template_loop_product_link_close - 5
					 * @hooked woocommerce_template_loop_add_to_cart - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item' );	
					?>
				</div>
		<!-- // Customisation -->

<!-- 		</div> -->
	</div>

<?php } ?>
