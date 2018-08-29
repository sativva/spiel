<?php
/**
 * The template for displaying message page.
 *
 *
 * @package spiestation
 */
/*
Template Name: Kontaktaufnahme
*/
get_header(); ?>

<?php
while ( have_posts() ) : the_post();
?>

	<div class="Kontaktaufnahme">
		<section class="UserQuestions UserQuestions--Kontaktaufnahme">
		  <div class="Container--small">
		  	<h2><?php the_title(); ?></h2>

		    <?php the_content() ;?>

		  </div>
		</section>

		<section class="UserMessage Kontaktaufnahme-wrap">

			<div class="Kontaktaufnahme-container">
				<?php echo do_shortcode('[contact-form-7 id="1259" title="KONTAKTAUFNAHME"]'); ?>
			</div>

			<div class="Kontaktaufnahme-container">
			  <?php echo do_shortcode('[contact-form-7 id="1575" title="SPIELERSCHUTZANGEBOT"]'); ?>
			</div>
			
		</section>
	</div>

<?php endwhile; // End of the loop. ?>

<?php
get_footer();
