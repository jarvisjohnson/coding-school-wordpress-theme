<?php
/**
 * Basic WooCommerce support
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
get_header(); ?>

	<!-- Image Header -->

	 <?php $image = get_field('courses_header_image', 17); ?>

    <header id="featured-hero" role="banner" style="background-image: url('<?php echo $image ?>')">
        <div class="wrap">
        	<h1 class="page-title">Courses</h1>
        </div>
    </header>

	<!-- // Image Header -->
    <!-- Course Switcher -->

	    <div class="switcher">
	        <div class="switch">
	            <a id="online-courses" class="active">
	                <span>Online Courses</span>
	           </a>
	            <a id="campus-courses">
	                <span>On Campus Courses</span>
	           </a>             
	        </div>                 
	    </div>

	<!-- // Course Switcher -->

	<!-- Text Header -->	

	<article class="online-on-campus text-center">
		<header>
			<div class="hidden">
				<h2><?php the_field('awesome_skills_title'); ?>Online Courses Heading</h2>
				<h4><?php the_field('awesome_skills_description'); ?>Online Courses Subheading</h4>
			</div>
			<div class="online active">
				<h2><?php the_field('awesome_skills_title'); ?>Online Courses Heading</h2>
				<h4><?php the_field('awesome_skills_description'); ?>Online Courses Subheading</h4>
			</div>
			<div class="offline">
				<h2><?php the_field('awesome_skills_title'); ?>Offline Courses Heading</h2>
				<h4><?php the_field('awesome_skills_description'); ?>Offline Courses Subheading</h4>
			</div>	
		</header>		
	</article>

	<!-- // Text Header -->	

	<!-- Content Wrapper -->

	<div id="page" role="main">

	    <article class="products">

		    <?php do_action( 'foundationpress_before_content' );


	        if ( is_singular( 'product' ) ) {

	            while ( have_posts() ) : the_post();

	                wc_get_template_part( 'content', 'single-product' );

	            endwhile;

	        } else { ?>

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
	        }?>

			<?php do_action( 'foundationpress_after_content' ); ?>

	    </article>

	</div>

	<!-- // Content Wrapper -->


<?php get_template_part( 'template-parts/switcher' ); ?>


<?php get_footer();
