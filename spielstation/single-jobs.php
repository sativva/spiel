<?php
/**
 * The template for displaying all jobs posts.
 *
 *
 * @package spielstation
 */

get_header(); ?>


	<?php
  	while ( have_posts() ) : the_post();

  		get_template_part( 'components/post/content', 'jobs' );

  	endwhile; // End of the loop.
	?>


<?php
get_footer();
