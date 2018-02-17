<?php
/**
 * The main template file
 *
 * @package Theme-Builder
 * @since Theme-Builder 0.1.0
 */

get_header(); ?>

<div role="main">

	<?php

	if ( have_posts() ) {
		/* Start the Loop */
		while ( have_posts() ) { the_post();
			get_template_part( 'content', get_post_format() );
		}

	} else {
		echo 'You have no posts.';

	} // End have_posts() check.

	?>

</div>

<?php get_footer();
