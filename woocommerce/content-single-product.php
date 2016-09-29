<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<arcticle id="overview" class="text-center">
	<div class="site-section__row">
		<div class="course-benefits">
			<h1 class="course-benefits__heading"><?php the_field('about_description'); ?></h1>
			<div class="course-benefits__tagline">Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. </div>
			<div class="course-benefits__wrapper">
			<?php
			if( have_rows('benefits') ):
			    while ( have_rows('benefits') ) : the_row(); ?>
				<div class="course-benefits__benefit">
					<div class="course-benefits__image">
						<img src="<?php the_sub_field('benefit_image'); ?>">
					</div>
					<div class="course-benefits__details">
						<h2 class="course-benefits__title">
							<?php the_sub_field('benefit_heading'); ?>
						</h2>
						<p class="course-benefits__text">
							<?php the_sub_field('benefit_description'); ?>
						</p>
					</div>
				</div>
			    <?php endwhile;
			else :
			endif;
			?>
			</div>
		</div>
	</div>
</arcticle>
<article id="outcomes" class="text-center">
	<div class="site-section__row">
		<div class="course-outcomes">
			<h1 class="course-outcomes__heading">
				Outcomes
			</h1>
			<div class="course-outcomes__tagline">
				<?php the_field('learning_outcomes_description'); ?>
			</div>
			<div class="course-outcomes__wrapper">
				<?php
				if( have_rows('learning_outcomes') ):
				    while ( have_rows('learning_outcomes') ) : the_row(); ?>
						<div class="course-outcomes__row">
							<div class="course-outcomes__outcome">
								<div class="course-outcomes__image">
									<img src="<?php the_sub_field('outcome_image'); ?>">
								</div>
								<div class="course-outcomes__details">
									<div class="h2_title">
										<?php the_sub_field('outcome_heading'); ?>
									</div>
									<div class="p course-outcomes__text">
										<?php the_sub_field('outcome_desciption'); ?>
									</div>
								</div>
							</div>
						</div>
				    <?php endwhile;
				else :
				endif;
				?>
			</div>
		</div>
	</div>  
</article>
<article id="dates" class="text-center">

</article>
<article id="faqs" class="text-center">
	<div class="site-section__row">
		<h2>Course Heading</h2>	
	</div>
</article>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
