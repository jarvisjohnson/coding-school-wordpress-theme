<?php

if (! empty($product_id)) {

    $product_options = get_post_meta($product_id, 'product_options', true);

    if (! empty($product_options)) {

        if (isset($product_options['moodle_post_course_id']) && is_array($product_options['moodle_post_course_id']) && ! empty($product_options['moodle_post_course_id'])) {

            ?>
                <h4><?php _e('Associated Courses', 'bridge-woocommerce'); ?></h4>
                <ul class="bridge-woo-available-courses">
                    <?php
                    foreach ($product_options['moodle_post_course_id'] as $single_course_id) {
                        ?>
							<li><?php echo get_the_title($single_course_id); ?></li>
                            <?php
                    }
                    ?>
                </ul>
            <?php
        }
    }
}
