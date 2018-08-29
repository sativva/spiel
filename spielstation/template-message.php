<?php
/**
 * The template for displaying message page.
 *
 *
 * @package spiestation
 */
/*
Template Name: Message
*/
get_header(); ?>

<?php
while ( have_posts() ) : the_post();
?>

<section class="UserQuestions">
  <div class="Container--small">

    <?php the_content() ;?>

  </div>
</section>

<section class="UserMessage">
  <div class="Container--small">


      <?php 

        echo do_shortcode('[contact-form-7 id="1234" title="Ihre Meinung"]');

      ?>
    

  </div>
</section>
<?php endwhile; // End of the loop. ?>

<?php
get_footer();
