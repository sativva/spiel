<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package spielstation
 *
 * Template Name: List 360° POSTS
 */

get_header(); ?>

<section class="ArticleList">
  <div class="container">
    <div class="row">

    	<div class="col-xs-12">
			<div class="ArticleListWrap">

				<div class="row">


		<?php

			$args = array(
			    'post_type'      => 'page',
			    'posts_per_page' => -1,
			    'post_parent'    => 932,
			    'order'          => 'ASC'
			 );


			$parent = new WP_Query( $args );

			if ( $parent->have_posts() ) :

		?>

			<?php 
				while ( $parent->have_posts() ) : $parent->the_post();
			?>

			    	<div class="ArticleList-item">
						<div class="row">
						<div class="col-xs-4">
							<div class="ArticleList-img" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
						</div>
						<div class="col-xs-8">
							<div class="ArticleList-date"><?php echo get_the_date('d.m.Y'); ?></div>
							<div class="ArticleList-title"><?php the_title(); ?></div>
							<div class="ArticleList-excerpt"><?php the_excerpt(); ?></div>
							<a href="<? the_permalink()?>" class="btn btn--yellow">Mehr</a>
						</div>
						</div>
					</div>

			<?php 
				endwhile;
			?>

		<?php 
			endif; wp_reset_query(); 
		?>

				</div>

			</div>
		</div>

    </div>
  </div>
</section>
        



<?php
get_footer();
?>
