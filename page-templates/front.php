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
            while ( have_rows('highlights') ) : the_row(); 
        		$highlight = get_sub_field('highlight_link'); 
        		$link =  get_permalink( $highlight ); 
        		$id = $highlight->ID; ?>
        		<div class="highlight">
        			<a href="<?php echo $link; ?>">
						 <?php if (get_field('header_image' , $id) )  {
						  $image = get_field('header_image' , $id ); 
						  } else {
						  $image = get_field('courses_header_image', 'option'); 
						  } ?>
		                <button style="background-image: url('<?php echo $image ?>')">
		                  <strong style="color: white;"><?php the_sub_field('highlight_text'); ?></strong>
		                </button>
	                </a>
                </div>
            <?php endwhile;
        else :
        endif;
      ?>

</article>


<article class="courses">
	<div class="wrap">
		<div class="item-wrap">
			<header>
				<div class="icon text-center">
					<i class="fa fa-calendar-o"></i>
				</div>
				<div class="upcoming text-left">
					<h5>Upcoming Courses</h5>
				</div> 
			</header>
			<?php echo do_shortcode('[featured_products per_page="6"]');?>
		</div>
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
               <?php $skill = get_sub_field('tag_link'); 
        		$link =  get_term_link( $skill );
        		$name = $skill->slug; ?>
        		<a class="button" href="<?php echo $link; ?>">
	                  Check out <strong style="color: white;"><?php echo $name; ?></strong> courses
	            </a>            
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
