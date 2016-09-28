<?php
/**
 * Basic WooCommerce support
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
get_header(); ?>

        <?php 

        $image = get_field('courses_header_image', 17); ?>

            <header id="featured-hero" role="banner" style="background-image: url('<?php echo $image ?>')">
                <h1 class="page-title">Courses</h1>
            </header>
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

 <div id="page" role="main">

    <?php do_action( 'foundationpress_before_content' ); ?>

	<?php do_action( 'foundationpress_before_content' ); ?>

	<article class="shop-header">
		
	</article>

	<?php while ( woocommerce_content() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</article>
	<?php endwhile;?>

	<?php do_action( 'foundationpress_after_content' ); ?>

</div>


  <?php get_template_part( 'template-parts/switcher' ); ?>


<?php get_footer();
