<?php
/**
 * The template for displaying article.
 *
 *
 * @package spiestation
 */
/*
Template Name: Article w. Picture
*/
get_header(); ?>

<section class="Article">
  <div class="container">
    <div class="row">

      <?php get_template_part('components/article/article', 'menu'); ?>
      <?php
        while ( have_posts() ) : the_post();
      ?>

      <div id="js-article" class="Article-content Article-content--thumbnail col-xs-12 col-sm-7 col-md-8">
        <div class="Article-content--thumbnailImg"><img src="<?php the_post_thumbnail_url();?>" class="img-responsive" /></div>

        <?php the_content();?>
      </div>

      <div class="Article--white"></div>

      <?php endwhile;?>
    </div>
  </div>
</section>



<?php
get_footer();
