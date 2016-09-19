<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>
		<div id="footer-container">
			<footer id="footer">
				<?php do_action( 'foundationpress_before_footer' ); ?>
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
					<div class="newsletter">
						<p class="">
							<?php the_field('footer_text', 'option'); ?>
						</p>
						<div class="footer-details__social-icons">
							<a href="<?php the_field('facebook', 'option'); ?>" class="icon">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="<?php the_field('twitter', 'option'); ?>" class="icon">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="<?php the_field('google_plus', 'option'); ?>" class="icon">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="<?php the_field('linkedin', 'option'); ?>" class="icon">
								<i class="fa fa-facebook"></i>
							</a>
						</div>
						<?php echo do_shortcode('[contact-form-7 id="106" title="Footer Signup"]') ?>
					</div>
					<div class="left">
						<h3><?php echo get_theme_mod( 'wpt_footer_left_text' , 'Left Footer Menu' ); ?></h3>
						<?php foundationpress_footer_nav_left(); ?>
					</div>

					<div class="right">
						<h3><?php echo get_theme_mod( 'wpt_footer_right_text' , 'Right Footer Menu' ); ?></h3>
						<?php foundationpress_footer_nav_right(); ?>
					</div>
				<?php do_action( 'foundationpress_after_footer' ); ?>
			</footer>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
<?php if ( is_front_page() ) { ?>
	<script>
	jQuery(document).ready(function($) {

	    //Slick Slider
	    $('.slidez').slick({
	        autoplay: true,
	        arrows: false, //Set these to whatever you need
	    });

	});
	</script>	
<?php }; ?>
  <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0sUqymNDz0cX3iNniU1LziNjBcVaFuRU&callback=initMap">
    </script>
</body>
</html>
