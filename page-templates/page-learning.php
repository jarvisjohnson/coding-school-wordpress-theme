<?php
/*
Template Name: Learning With Us
*/
get_header(); ?>
<!-- Image Header -->
<?php if ( is_product() && get_field('header_image') )  {
$image = get_field('header_image');
} elseif ( is_page() && get_field('header_image') )  {
$image = get_field('header_image');
} else {
$image = get_field('courses_header_image', 'option');
} ?>
<header id="featured-hero" role="banner" style="background-image: url('<?php echo $image ?>')">
	<article class="wrap text-center">
		<h1 class="page-title">
		<?php if (is_product_tag()) {
			echo 'Learn: ';
			single_tag_title();
		} elseif ( is_product() )  {
			the_title();
		} elseif ( is_page() )  {
						the_title();
			}	else {
				woocommerce_page_title();
		} ?>
		
		</h1>
	</article>
</header>
<!-- // Image Header -->
<!-- Course Switcher -->
<?php get_template_part( 'template-parts/switcher' ); 
	get_template_part( 'template-parts/fixed-scroller' ); ?>
<!-- // Course Switcher -->
<article id="learn" class="text-center">
	<div class="wrap">
		<header>
			<div class="">
				<h2><?php the_field('learning_title'); ?></h2>
				<h4><?php the_field('learning_subheading'); ?></h4>
			</div>
		</header>
		<div class="row">
			<div class="image">
				<img src="<?php the_field('learning_image'); ?>">
			</div>
		</div>
	</div>
</article>
<article id="different">
	<div class="wrap">
		<header>
			<div class="text-center">
				<h2><?php the_field('different_title'); ?></h2>
				<h4><?php the_field('different_subheading'); ?></h4>
			</div>
		</header>
		<div class="leaver">
			<?php
				$rows = get_field('testimonial-slider');
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
							echo '<div class="slide ' . $classy . '"><blockquote class="cite">' . $row['testimonial'] . '</blockquote><p class="text-right">- ' . $row['testimonial_name'] .'</p></div>';
						}
					echo '</div>';
				}
			?>
			<?php
				$rows = get_field('testimonial-slider');
				if($rows)
				{
					$first = true;
					echo '<div class="sliderz" >';
						foreach($rows as $row)
						{
						if(!$first) {
						$classy = 'not-first-slide';
						} else {
						$first = false;
						$classy = '';
						}
							echo '<div class="slide ' . $classy . '"><img class="" src=" ' . $row['staff_image'] . '"/></div>';
							
						}
					echo '</div>';
				}
			?>
		</div>
	</article>
	<article class="text-center" id="you-learn">
	<div class="wrap">
		<header>
			<div class="">
				<h2><?php the_field('learning_title'); ?></h2>
				<h4><?php the_field('learning_subheading'); ?></h4>
			</div>
		</header>
		<div class="row">
			<div class="image">
				<img src="<?php the_field('learning_image'); ?>">
			</div>
		</div>
	</div>
</article>
<article id="us-different">
	<div class="wrap">
		<header>
			<div class="text-center">
				<h2><?php the_field('different_title'); ?></h2>
				<h4><?php the_field('different_subheading'); ?></h4>
			</div>
		</header>
		<div class="leaver">
			<?php
				$rows = get_field('testimonial-slider');
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
							echo '<div class="slide ' . $classy . '"><blockquote class="cite">' . $row['testimonial'] . '</blockquote><p class="text-right">- ' . $row['testimonial_name'] .'</p></div>';
						}
					echo '</div>';
				}
			?>
			<?php
				$rows = get_field('testimonial-slider');
				if($rows)
				{
					$first = true;
					echo '<div class="sliderz" >';
						foreach($rows as $row)
						{
						if(!$first) {
						$classy = 'not-first-slide';
						} else {
						$first = false;
						$classy = '';
						}
							echo '<div class="slide ' . $classy . '"><img class="" src=" ' . $row['staff_image'] . '"/></div>';
							
						}
					echo '</div>';
				}
			?>
		</div>
	</article>
	<?php get_footer(); ?>