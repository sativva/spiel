<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package spielstation
 */

get_header(); ?>


<?php get_template_part('components/search/search', 'form'); ?>

		<?php //query_posts($query_string . '&showposts=5'); ?>



		<section class="SearchHeader">
			<div class="Container--small">
				<div class="SearchHeader-title">
					 <?php printf( esc_html__( 'Ihr suchergebnis für: %s', 'spielstation' ), '<span class="SearchHeader-title--italic">' . get_search_query() . '</span>' ); ?>
				</div>
			</div>
		</section>

		<section class="SearchResult">
      <div class="Container--small">


		<?php
			/* Start the Loop */
			if ( have_posts() ) : while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'components/search/search', 'content' );

			endwhile;?>

		</div>
		<div class="Pager">
				<?php //theme_pagination(); ?>
				<?php
				global $wp_query;
		 		$max = $wp_query->max_num_pages;

					the_posts_pagination(
						array(
							'screen_reader_text'=>' ',
							'prev_text' => __( '« ', 'textdomain' ),
							'next_text' => __( 'nächste Seite »<a href="'.esc_url( get_pagenum_link( $max ) ).'"> letzte Seite</a>', 'textdomain' ),

						)
					);

				?>


			</div>
	</section>

		<?php
		else :
		?>

		<div class="Container--small">
			<div class="Search-NoResult">
				<p>keine Suchergebnisse</p>
			</div>
		</div>

	<?php
		endif; ?>



<?php
get_footer();
