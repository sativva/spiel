<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package spielstation
 */

?>

<?php $urlForm = get_post_meta( $post->ID, 'urlForm', true ); ?>

<div class="JobDetail-banner" 
  <?php 
  if ( has_post_thumbnail() ) {
  ?>
    style="background-image: url(<?php the_post_thumbnail_url(); ?>);"
  <?php
  }
  else {
  ?>
    style="background-image: url(<?php bloginfo('home'); ?>/wp-content/themes/spielstation/assets/img/home/home-start.jpg);"
  <?php
  }
  ?>
></div>

<section class="JobDetail">

      <div class="Container--small">
        <div class="JobDetail-content clearfix">

          <?php
            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
          ?>
          <a class="btn btn--yellow pull-right" href="<?php echo $url; ?>">Zurück</a>

          <div class="JobDetail-title"><?php the_title();?></div>

          <div class="JobDetail-date hidden-xs"> &nbsp; <!-- Jobangebot vom <?php // the_date('d.m.Y');?> --> </div>


        <?php
          if ($urlForm != '') {
        ?>
            <a class="btn btn-inlineblock btn--purple" target="_blank" href="<?php echo $urlForm; ?>">Hier bewerben</a>
        <?php 
          }
        ?>

          <div class="JobDescription">
            <?php the_content(); ?>
          </div>
        <?php
          if ($urlForm != '') {
        ?>
          <a class="btn btn-inlineblock btn--purple" target="_blank" href="<?php echo $urlForm; ?>">Hier bewerben</a>
        <?php 
          }
        ?>

        </div>
      </div>

  </section>
