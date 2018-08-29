<?php
/**
 * The template for displaying article.
 *
 *
 * @package spiestation
 */
/*
Template Name: Page SLIDER
*/
get_header(); ?>

<?php get_template_part( 'components/banner/banner-slider'); ?>

<section class="Article Article--photoFull">
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
