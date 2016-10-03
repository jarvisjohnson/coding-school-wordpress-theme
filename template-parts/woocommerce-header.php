<?php 


if ( is_product() ){  ?>

<article id="overview" class="text-center">
	<header>
		<div class="wrapper">
		<h2 class="heading"><?php the_field('about_heading'); ?></h2>
		<p class="tagline"><?php the_field('course_tagline'); ?></p>
			<?php
			if( have_rows('benefits') ):
			  while ( have_rows('benefits') ) : the_row(); ?>
			<div class="wrap">
				<div class="benefit small-centered">
					<div class="inner-wrap">
						<div class="image">
							<img src="<?php the_sub_field('benefit_image'); ?>">
						</div>
						<div class="details text-left">
							<h4>
								<?php the_sub_field('benefit_heading'); ?>
							</h4>
							<p>
								<?php the_sub_field('benefit_description'); ?>
							</p>
						</div>
					</div>
				</div>
				</div>
		    <?php endwhile;
		else :
		endif;
		?>
		</div>
	</header>
</article>


<?php } else { ?>


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


<?php } ?>