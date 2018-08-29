<?php
/**
 * The template for displaying article presentation.
 *
 *
 * @package spiestation
 */
/*
Template Name: Page PURPLE
*/
get_header(); ?>


<?php get_template_part( 'components/banner/banner-purple'); ?>

<section class="Article Article--purple">
  <div class="container">
  	
    <div class="ArticlePresentation-content">
      <?php
      while ( have_posts() ) : the_post();
      ?>
      <?php the_content();?>
      <?php endwhile; // End of the loop. ?>
    </div>
    
  </div>
</section>

<?php
get_footer();
