<?php
/**
 * The template for displaying moodle course archive page.
 */

 get_header(); ?>

        <?php 

        $image = get_field('courses_header_image', 'option'); ?>

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

		<?php
            // our template loader


            $plugin_template_loader = new app\wisdmlabs\edwiserBridge\EbTemplateLoader(
                app\wisdmlabs\edwiserBridge\edwiserBridgeInstance()->getPluginName(),
                app\wisdmlabs\edwiserBridge\edwiserBridgeInstance()->getVersion()
            );
        ?>

		<?php do_action('eb_before_course_archive'); ?>

<?php

if (have_posts()) {


    // Start the Loop.
            while (have_posts()) :
                the_post();
                $plugin_template_loader->wpGetTemplatePart('content', get_post_type());
                // End the loop.
            endwhile;

    // Previous/next page navigation.
            the_posts_pagination(
                array(
                'prev_text' => __('Previous page', 'eb-textdomain'),
                'next_text' => __('Next page', 'eb-textdomain'),
                'before_page_number' => '<span class="meta-nav screen-reader-text">'.
                __('Page', 'eb-textdomain').' </span>',
                )
            );

        // If no content, include the "No posts found" template.
} else {
    $plugin_template_loader->wpGetTemplatePart('content', 'none');
}
?>

		<?php do_action('eb_after_course_archive'); ?>

</div>



<?php get_footer();
