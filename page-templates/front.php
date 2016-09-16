<?php
/*
Template Name: Front
*/
get_header(); ?>

<header id="front-hero" role="banner">
	<div class="greeter">
		<div class="tagline">
			<h1><?php the_field('call_to_action_title'); ?></h1>
			<p class="subheader"><?php the_field('call_to_action_description'); ?></p>
		</div>
		<div class="signup">
			<h2>Stay Connected With Us</h2>
			<div>
				<?php echo do_shortcode('[contact-form-7 id="158" title="Stay connected with us"]') ?>
			</div>
		</div>
	</div>

</header>

<?php do_action( 'foundationpress_before_content' ); ?>


<section class="highlights">
	<header>
		<h2><?php the_field('highlights_title'); ?></h2>
	</header>
	 <?php
        if( have_rows('highlights') ):
            while ( have_rows('highlights') ) : the_row(); ?>
        		<div class="highlight">
	                <a href="<?php the_sub_field('highlight_link'); ?>">
	                  <p><?php the_sub_field('highlight_text'); ?></p>
	                </a>
                </div>
            <?php endwhile;
        else :
        endif;
      ?>

</section>


<section class="courses">

	<?php
	   if( have_rows('upcoming_courses') ): ?>
		<table>
		  <thead>
		    <tr>
		      <th width="200">Icon</th>
		      <th>Upcoming Courses</th>
		      <th></th>
		    </tr>
		  </thead>
		  <tbody>
		   <?php while ( have_rows('upcoming_courses') ) : the_row(); ?>
	        <?php

	        $post_object = get_sub_field('upcoming_course');

		        if( $post_object ): 

		          // override $post
		          $post = $post_object;
		          setup_postdata( $post ); 

		          ?>
				    <tr>
				      <td>
				      	<img src="<?php the_field('course_icon') ?>">
				      </td>
				      <td>
				      	<h2 class="upcoming-courses__title"><?php the_title() ?></h2>
			          	<span class="upcoming-courses__cost">$<?php the_field('course_cost') ?></span>
				      </td>
				      <td>
				      	<a href="<?php echo esc_url( get_permalink() ); ?>" class="upcoming-courses__learn-more">Learn More</a>
				      </td>
				    </tr>
			        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		        <?php endif; ?>
	    	<?php endwhile; ?>
		  </tbody>
		</table>
	<?php else :
	endif;
	?> 

</section>

<section class="skills">
	<header>
		<h2><?php the_field('awesome_skills_title'); ?></h2>
		<h4><?php the_field('awesome_skills_description'); ?></h4>
	</header>

	<?php
    if( have_rows('awesome_skills') ):
        while ( have_rows('awesome_skills') ) : the_row(); ?>
			<div class="skill">
                <img src="<?php the_sub_field('skill_image'); ?>">
              <p>
                <?php the_sub_field('skill_description'); ?>
              </p>
              <a href="<?php the_sub_field('highlight_link'); ?>">Learn more here</a>             
            </div>
        <?php endwhile;
    else :
    endif;
    ?>

</section>


<section class="testimonial-video">
	<div class="leaver">

		<?php

			$rows = get_field('testimonial');
			if($rows)
			{
				$first = true;
				echo '<div class="slider">';

				foreach($rows as $row)
				{
				    if(!$first) {
				      $classy = 'not-first-slide';
				    } else {
				      $first = false;
				      $classy = '';
				    }
					echo '<div class="slide ' . $classy . '"><blockquote class="cite">' . $row['testimonial_texts'] . '</blockquote><p>' . $row['testimonial_names'] .'</p></div>';
				}
				echo '</div>';
		 	}
		 ?>

	    <div class="video">
		   <?php the_field('video'); ?>
		   <p><?php the_field('video_description'); ?></p>
	    </div>
    </div>

</section>



<?php get_footer();
