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

    // vars 
    $sections = get_field('sections_to_display');
   // check
   if( $sections ): ?>
     <?php foreach( $sections as $section ): ?>
     <?php endforeach; ?>
   <?php endif; ?>  

<?php if ( in_array( 2, $sections ) ) { ?>
<article id="outcomes" class="text-center">
	<div class="wrap">
			<h2>
				Outcomes
			</h2>
			<p>
				<?php the_field('learning_outcomes_description'); ?>
			</p>
			<div class="wrapper">
				<?php
				if( have_rows('learning_outcomes') ):
				    while ( have_rows('learning_outcomes') ) : the_row(); ?>
							<div class="outcome">
								<div class="inner-wrap">
									<div class="image">
										<img src="<?php the_sub_field('outcome_image'); ?>">
									</div>
									<div class="details text-left">
										<h4>
											<?php the_sub_field('outcome_heading'); ?>
										</h4>
										<p>
											<?php the_sub_field('outcome_desciption'); ?>
										</p>
									</div>
								</div>
							</div>
				    <?php endwhile;
				else :
				endif;
				?>
			</div>
	</div>  
</article>
<?php } ?>
<?php
//Is it an online or on-campus product?
echo do_shortcode ('[course_type]');
?>

<?php if ( in_array( 3, $sections ) ) { ?>
<article id="description" class="text-center">
	<div class="wrap">
		<h2>Syllabus</h2>	
		<div class="content">
			<?php the_content(); ?>
		</div>
	</div>
</article>
<?php }; if ( in_array( 4, $sections ) ) { ?>
<article id="details" class="text-center">

	<?php $campuses = get_field('campus'); ?>

	<div class="wrap">

	   <?php if( $campuses ): ?>

		<h2>Upcoming dates for 				
			<select class="campus-toggle" data-target=".courses">
				<?php foreach( $campuses as $campus ):
					$lowerCamp = strtolower($campus); ?>
						<option value="<?php echo $campus; ?>" data-show=".<?php echo $lowerCamp; ?>"><?php echo $campus; ?></option>
				<?php endforeach; ?>
			</select>
		</h2>

		<?php endif; ?>


	   <?php if( $campuses ): ?>
	   	<div class="courses">
	     <?php foreach( $campuses as $campus ):
	     $campus = strtolower($campus);

			// check if the repeater field has rows of data
			if( have_rows($campus) ): ?>



			 	<?php 
			 	// loop through the rows of data
			    while ( have_rows($campus) ) : the_row(); ?>
					<div class="<?php echo $campus; ?> hide">
						<div class="header text-center">
							<?php 			        // display a sub field value
					        the_sub_field('start_date'); - the_sub_field('end_date');
					        ?>							
						</div>
						<div class="details">
							<div class="days text-left"></div>
							<div class="times text-right"></div>
						</div>
						<div class="address text-left">
							<?php the_field('campus_address');?>
						</div>
						<div class="contact-purchase">
							<div class="contact text-left"></div>
							<div class="purchase text-right"></div>							
						</div>
					</div>	

			    <?php endwhile; ?>


			<?php else : ?>

				<div class="signup">
					<h5 class="collapse">Stay Connected With Us</h5>
					<div>
						<?php echo do_shortcode('[contact-form-7 id="258" title="Course Updates"]') ?>
					</div>
				</div>

			<?php endif;

		?>	
	     	<?php echo $campus; ?>
	     <?php endforeach; ?>

		</div>
	   <?php endif; ?>

	</div>
</article>
<?php }; if ( in_array( 5, $sections ) ) { ?>
<article id="faqs" class="text-center">
	<header>
		<div class="wrapper">
		<h2 class="heading">FAQs</h2>
			<?php
			if( have_rows('faqs') ): ?>
			<ol class="wrap">
			  <?php while ( have_rows('faqs') ) : the_row(); ?>

				<li class="benefit small-centered">
						<div class="details text-left">
							<h4>
								<?php the_sub_field('faq_heading'); ?>
							</h4>
							<p>
								<?php the_sub_field('faq_description'); ?>
							</p>
						</div>
				</li>
		    <?php endwhile; ?>
		   </ol>
		<?php else :
		endif;
		?>
		</div>
	</header>
</article>
<?php } ?>

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
		//do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>


<script>
jQuery(document).on('change', '.campus-toggle', function() {
  var target = $(this).data('target');
  var show = $("option:selected", this).data('show');
  $(target).children().addClass('hide');
  $(show).removeClass('hide');
});
jQuery(document).ready(function(){
    $('.campus-toggle').trigger('change');
});
</script>