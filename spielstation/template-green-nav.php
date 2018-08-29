<?php
/**
 * The template for displaying article presentation.
 *
 *
 * @package spiestation
 */
/*
Template Name: Page GREEN w. NAV
*/
get_header(); ?>


<?php get_template_part( 'components/banner/banner-green'); ?>

<section class="Article Article--green">
  <div class="container">
    <div class="row">

      <?php get_template_part('components/article/article', 'menu'); ?>
      <?php
        while ( have_posts() ) : the_post();
      ?>
      <div id="js-article" class="Article-content col-xs-12 col-sm-7 col-md-8">
        <?php the_content();?>
      </div>

      <div class="Article--white"></div>

      <?php endwhile;?>
    </div>
  </div>
</section>

<?php
get_footer();
