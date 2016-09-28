<?php
/*
Template Name: All Courses
*/

 get_header(); ?>

 <section class="site-section site-section--course-type site-section--offline">
   <div class="site-section__row">
     <div class="course-type">
       <h1 class="course-type__heading"><?php the_field('campus_courses_heading'); ?></h1>
       <p class="course-type__text"><?php the_field('campus_courses_description'); ?></p>
     </div>
   </div>
 </section><section class="site-section site-section--course-type site-section--online">
   <div class="site-section__row">
     <div class="course-type">
       <h1 class="course-type__heading"><?php the_field('online_courses_heading'); ?></h1>
       <p class="course-type__text"><?php the_field('online_courses_desciptions'); ?></p>
     </div>
   </div>
 </section>
 <section class="site-section site-section--all-courses">
   <div class="site-section__row">
     <div class="individual-courses">
       <div class="individual-courses__wrapper">
       <?php
       if( have_rows('courses') ):
           while ( have_rows('courses') ) : the_row(); ?>
               <?php

               $post_object = get_sub_field('course');

               if( $post_object ): 

                 // override $post
                 $post = $post_object;
                 setup_postdata( $post ); 

                 ?>

                  <div class="individual-courses__course">
                    <div class="individual-courses__header">
                      <div class="individual-courses__icon"><img src="<?php the_field('course_icon'); ?>"></div>
                      <h2 class="individual-courses__title"><?php the_title() ?></h2>
                    </div>
                    <div class="individual-courses__info">
                      <div class="individual-courses__date"><span>Date</span> 
                        <?php
                        if( have_rows('upcoming_dates') ):
                            while ( have_rows('upcoming_dates') ) : the_row(); ?>
                                <?php

                                $inner_post_object = get_sub_field('upcoming_course');

                                if( $inner_post_object ): 

                                  // override $post
                                  $post = $inner_post_object;
                                  setup_postdata( $post ); 

                                  ?>
                                    <?php the_field('start_date'); ?>
                                    <!-- Important - Sets post object up one level -->
                                    <?php 
                                    $post = $post_object;
                                    setup_postdata( $post );
                                    ?>
                                <?php endif; ?>
                            <?php endwhile;
                        else :
                        endif;
                        ?>
                      </div>
                      <div class="individual-courses__duration"><span>Duration</span> <?php the_field('course_duration'); ?></div>
                      <div class="individual-courses__cost"><span>Cost</span> $<?php the_field('course_cost'); ?></div>
                    </div>
                    <p class="individual-courses__details"></p>
                    <div class="individual-courses__footer">
                      <div class="individual-courses__skills-wrapper">
                        <h3 class="individual-courses__key-skills">Key skills</h3>
                        <?php
                        if( have_rows('key_skills') ):
                            while ( have_rows('key_skills') ) : the_row(); ?>
                                <div class="individual-courses__skill">
                                  <img src="<?php the_sub_field('key_skill_image'); ?>">
                                </div>
                            <?php endwhile;
                        else :
                        endif;
                        ?>
                      </div>
                      <div class="individual-courses__apply-now">
                        <a href="<?php echo esc_url( get_permalink() ); ?>">Learn More</a>
                      </div>
                    </div>
                  </div>
                   <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
               <?php endif; ?>
           <?php endwhile;
       else :
       endif;
       ?>
         
       </div>
     </div>
   </div>
 </section>


 <?php do_action( 'foundationpress_after_content' ); ?>

 <?php get_footer();
