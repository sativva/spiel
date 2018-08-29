<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package spielstation
 */

get_header(); ?>

<section class="ArticleList">
  <div class="container">
    <div class="row">

    	<div class="col-xs-12">
			<div class="ArticleListWrap">

				<div class="row">

				<?php
				if ( have_posts() ) :

					$args = array(
	                'ignore_sticky_posts' => 1,
	                'posts_per_page'=>'8'
	                );
	              query_posts( $args );

					while ( have_posts() ) : the_post();

						//get_template_part( 'components/post/content', get_post_format() );
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

					the_posts_navigation();

				else :

					get_template_part( 'components/post/content', 'none' );

				endif; ?>      

				</div>

			</div>
		</div>

    </div>
  </div>
</section>

<?php
get_footer();
