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
	  $image = get_field('courses_header_image', 17); 
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
<?php get_template_part( 'template-parts/switcher' ); ?>

	<!-- // Course Switcher -->


<article class="you-learn" id="you-learn">
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
						  $image = get_field('courses_header_image', 17); 
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


<article class="testimonial" id="us-different">
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
				echo '<div class="slidez" style="background-image: url(' . get_template_directory_uri() . '/assets/images/global/quote-icon.svg">';

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

</article>



<?php get_footer();

 get_template_part( 'template-parts/fixed-scroller' ); 