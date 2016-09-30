<?php 


if ( is_product() ){  ?>

<article id="overview" class="text-center">
	<header>
		<div class="course-benefits">
			<h1 class="course-benefits__heading"><?php the_field('about_description'); ?></h1>
			<div class="course-benefits__tagline">Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. Tagline. </div>
			<div class="course-benefits__wrapper">
			<?php
			if( have_rows('benefits') ):
			    while ( have_rows('benefits') ) : the_row(); ?>
				<div class="course-benefits__benefit">
					<div class="course-benefits__image">
						<img src="<?php the_sub_field('benefit_image'); ?>">
					</div>
					<div class="course-benefits__details">
						<h2 class="course-benefits__title">
							<?php the_sub_field('benefit_heading'); ?>
						</h2>
						<p class="course-benefits__text">
							<?php the_sub_field('benefit_description'); ?>
						</p>
					</div>
				</div>
			    <?php endwhile;
			else :
			endif;
			?>
			</div>
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