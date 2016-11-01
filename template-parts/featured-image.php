<?php
	// If a feature image is set, get the id, so it can be injected as a css background property
	if ( has_post_thumbnail( $post->ID ) ) :
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$image = $image[0];
	else :
		$image = get_field('courses_header_image', 'option');
	endif; ?>

	<header id="featured-hero" role="banner" style="background-image: url('<?php echo $image ?>')">
	    <article class="wrap text-center">
			<h1 class="page-title"><?php the_title(); ?></h1>
	    </article>
	</header>

