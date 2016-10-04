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
<article id="details" <?php post_class(); ?>>

	<?php $campuses = get_field('campus'); ?>

	<div class="wrap">

	   <?php if( $campuses ): ?>

		<div class="rows">	
		<h2>Upcoming dates for: </h2> 				
			<select class="campus-toggle" data-target=".courses">
				<?php foreach( $campuses as $campus ):
					$lowerCamp = strtolower($campus); ?>
						<option value="<?php echo $campus; ?>" data-show=".<?php echo $lowerCamp; ?>" data-update=".update-campus"><?php echo $campus; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

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
					<div class="hide campus <?php echo $campus; ?> small-centered medium-centered">
						<div class="header text-center">
							<?php 			        // display a sub field value
					        the_sub_field('start_date');
					        echo ' - ';
					        the_sub_field('end_date');
					        ?>							
						</div>
						<div class="extra-wrap">
							<div class="details">
								<div class="days text-left">
									<strong><?php the_field('days_of_week'); ?></strong>
								</div>
								<div class="times text-right">
									<strong><?php the_field('times'); ?></strong>
								</div>
							</div>
							<div class="details">
								<div class="days text-left">
									Coursework hours: <strong><?php the_field('coursework_hours'); ?></strong>
								</div>
								<div class="times text-right">
									Contact hours: <strong><?php the_field('contact_hours'); ?></strong>
								</div>
							</div>	
							<hr>					
							<div class="contact-purchase">
								<div class="contact text-left">
									<p>
										Call us on:
									</p>
									<strong>
									<a href="tel:<?php the_field('phone_number' , 'option'); ?>">
										<?php the_field('phone_number' , 'option'); ?>
									</a>
									</strong>
								</div>
								<div class="purchase text-right">
									<?php
									do_action( 'woocommerce_before_add_to_cart_button' );
									?>								
									<?php
									do_action( 'woocommerce_single_product_summary' );
									?>
								</div>							
							</div>
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
	     	<?php// echo $campus; ?>
	     <?php endforeach; ?>

		</div>
		<?php else: ?>
				<div class="signup">
					<h5 class="collapse">Stay Connected With Us</h5>
					<div>
						<?php echo do_shortcode('[contact-form-7 id="258" title="Course Updates"]') ?>
					</div>
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

<?php endif; ?>  

<meta itemprop="url" content="<?php the_permalink(); ?>" />


<?php do_action( 'woocommerce_after_single_product' ); ?>



<script>
jQuery(document).on('change', '.campus-toggle', function() {
  var target = $(this).data('target');
  var show = $("option:selected", this).data('show');
  var update = $("option:selected", this).data('update');
  var course = $(this).val();
  $(target).children().addClass('hide');
  $(show).removeClass('hide');
  jQuery(update).val(course);  
});
jQuery(document).ready(function(){
    $('.campus-toggle').trigger('change');
});
</script>