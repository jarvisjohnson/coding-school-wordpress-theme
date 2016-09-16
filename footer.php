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
						<?php echo do_shortcode('[contact-form-7 id="106" title="Footer Signup"]') ?>
					</div>

					<div class="left">
						<?php foundationpress_footer_nav_left(); ?>
					</div>

					<div class="right">
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
	    $('.slider').slick({
	        autoplay: true,
	        arrows: false, //Set these to whatever you need
	    });

	});
	</script>	
<?php }; ?>
</body>
</html>
