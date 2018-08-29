<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package spielstation
 */

get_header(); ?>


	<section class="error-404 not-found">

		<div class="container">
			<div class="row">

				<div class="col-xs-12">
					<div style="padding: 220px 0 280px;text-align: center;">
						<div style="font-size: 58px;">Die angeforderte Seite wurde leider nicht gefunden !</div>
						<div style="margin-top: 30px;"><a href="<?php bloginfo('home'); ?>" class="btn btn--yellow">Züruck</a></div>
					</div>
				</div>

			</div>
		</div>


	</section>

<?php
get_footer();
