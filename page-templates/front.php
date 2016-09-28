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
			<h5 class="collapse">Stay Connected With Us</h5>
			<div>
				<?php echo do_shortcode('[contact-form-7 id="158" title="Stay connected with us"]') ?>
			</div>
		</div>
	</div>

</header>

<?php do_action( 'foundationpress_before_content' ); ?>


<article class="highlights">
	<header>
		<h2><?php the_field('highlights_title'); ?></h2>
	</header>
	 <?php
        if( have_rows('highlights') ):
            while ( have_rows('highlights') ) : the_row(); ?>
        		<div class="highlight">
	                <button href="<?php the_sub_field('highlight_link'); ?>">
	                  <?php the_sub_field('highlight_text'); ?>
	                </button>
                </div>
            <?php endwhile;
        else :
        endif;
      ?>

</article>


<article class="courses">

	<div class="inner">

	<?php
	   if( have_rows('upcoming_courses') ): ?>
		<table>
		  <thead>
		    <tr class="border">
		      <th width="200" class="icon">
		      	<i class="fa fa-calendar-o" />
		      </th>
		      <th>Upcoming Courses</th>
		      <th></th>
		    </tr>
		    <tr height="1px" bgcolor="black"></tr>
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

		          <?php $date = get_field('course_date');
					$date2 = date("F j Y", strtotime($date)); 
					$location = get_field('course_location'); ?>

				    <tr class="border">
				      <td class="icon">
				      	<img src="<?php the_field('course_icon') ?>">
				      </td>
				      <td>
				      	<h4 class="title"><?php the_title() ?></h4>
				      	<h6>
					      	<span><?php echo $date2; ?> - </span><span><?php the_field('course_duration') ?> weeks</span><br>
					      	<span><?php echo $location['address']; ?></span><br>
				          	<span>$<?php the_field('course_cost') ?></span>
			          	</h6>
				      </td>
				      <td class="course-button">
				      	<a href="<?php echo esc_url( get_permalink() ); ?>" class="upcoming-courses__learn-more">Learn More</a>
				      </td>
				    </tr>
				   	<tr height="1px"></tr>
			        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		        <?php endif; ?>
	    	<?php endwhile; ?>
		  </tbody>
		</table>
	<?php else :
	endif;
	?> 
	</div>

</article>

<article class="skills">
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

</article>


<article class="testimonial-video">
	<div class="leaver">

		<?php

			$rows = get_field('testimonial');
			if($rows)
			{
				$first = true;
				echo '<div class="slidez" style="background-image: url(' . get_template_directory_uri() . '/assets/images/global/quote-icon.svg">';

				foreach($rows as $row)
				{
				    if(!$first) {
				      $classy = 'not-first-slide';
				    } else {
				      $first = false;
				      $classy = '';
				    }
					echo '<div class="slide ' . $classy . '"><blockquote class="cite">' . $row['testimonial_texts'] . '</blockquote><p class="text-right">- ' . $row['testimonial_names'] .'</p></div>';
				}
				echo '</div>';
		 	}
		 ?>

	    <div class="video">
		   <?php the_field('video'); ?>
		   <p>
			<strong><?php the_field('video_presenter'); ?></strong>
			<span> <?php the_field('video_presenter_title'); ?></span>
		   </p>
	    </div>
    </div>

</article>



<?php get_footer();
