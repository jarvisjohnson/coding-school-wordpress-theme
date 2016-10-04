<?php
/**
 * Basic WooCommerce support
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
get_header(); ?>

	<!-- Image Header -->

	 <?php if ( is_product() )  {
	  $image = get_field('header_image'); 
	  } else {
	  $image = get_field('courses_header_image', 17); 
	  } ?>

    <header id="featured-hero" role="banner" style="background-image: url('<?php echo $image ?>')">
        <article class="wrap text-center">
        	<h1 class="page-title">
		        <?php if (is_product_tag()) {
		        	echo 'Learn: ';	
		        } elseif ( is_product() )  {
		        	the_title();
		        }	else {
				 woocommerce_page_title(); 
		        } ?>
        	
        	</h1>
        </article>
    </header>

	<!-- // Image Header -->
    <!-- Course Switcher -->
<?php get_template_part( 'template-parts/switcher' ); ?>

	<!-- // Course Switcher -->

	<!-- Text Header -->

<?php get_template_part( 'template-parts/woocommerce-header' ); ?>		
	<!-- // Text Header -->	


		    <?php do_action( 'foundationpress_before_content' );


	        if ( is_singular( 'product' ) ) {

	            while ( have_posts() ) : the_post();

	                wc_get_template_part( 'content', 'single-product' );

	            endwhile;

	        } else { ?>


	<!-- Content Wrapper -->

	<div id="page" role="main">


 	    <article class="products">

	            <?php // do_action( 'woocommerce_archive_description' ); ?>

	            <?php if ( have_posts() ) : ?>


	                <?php // do_action('woocommerce_before_shop_loop'); ?>

	               	<?php // woocommerce_product_loop_start(); ?>

	                    <?php woocommerce_product_subcategories(); ?>

	                    <?php while ( have_posts() ) : the_post(); ?>

	                        <?php wc_get_template_part( 'content', 'product' ); ?>

	                    <?php endwhile; // end of the loop. ?>

	                <?php // woocommerce_product_loop_end(); ?>

	                <?php do_action('woocommerce_after_shop_loop'); ?>


	            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

	                <?php wc_get_template( 'loop/no-products-found.php' ); ?>

	            <?php endif;

				do_action( 'foundationpress_after_content' ); ?>

	    </article>

	</div>

	<!-- // Content Wrapper -->

	<?php }?>





<?php get_footer();

 get_template_part( 'template-parts/fixed-scroller' ); 