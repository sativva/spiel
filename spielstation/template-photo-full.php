<?php
/**
 * The template for displaying article.
 *
 *
 * @package spiestation
 */
/*
Template Name: Page PHOTO FULL
*/
get_header(); ?>

<?php get_template_part( 'components/banner/banner-photo-full'); ?>

<section class="Article">
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
