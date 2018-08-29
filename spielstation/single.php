<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package spielstation
 */

get_header(); ?>


<section class="Article">
  <div class="container">
    <div class="row">

      <?php get_template_part('components/article/article', 'menu'); ?>
      <?php
        while ( have_posts() ) : the_post();
      ?>

      <div class="Article-content Article-content--thumbnail col-xs-12 col-sm-7 col-md-8">
        <div class="Article-content--thumbnailImg"><img src="<?php the_post_thumbnail_url();?>" class="img-responsive" /></div>

        <div id="js-article">
        	<?php the_content();?>
    	</div>
      </div>

      <div class="Article--white"></div>

      <?php endwhile;?>
    </div>
  </div>
</section>


<?php
get_footer();
