<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package spielstation
 */

?>

<div class="JobDetail-banner"></div>

<section class="JobDetail">

      <div class="Container--small">
        <div class="JobDetail-content clearfix">
          <a class="btn btn--turquoise pull-right" href="">Zurück</a>

          <div class="JobDetail-title"><?php the_title();?></div>

          <?php
            $terms = get_the_terms( $post->ID, 'stations_category');

            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
          ?>

            <div class="JobDetail-subtitle">Kategorie :
              <?php
                foreach ( $terms as $term ) {
                  echo  $term->name . " " ;
                };
              ?>
            </div>

          <?php
            }
          ?>
          <div class="JobDetail-date"> Jobangebot vom <?php the_date('d.m.Y');?> </div>


          <a class="btn btn--purple" href="">Hier bewerben</a>

          <div class="JobDescription">
            <?php the_content(); ?>

          </div>

          <a class="btn btn--purple" href="">Hier bewerben</a>

        </div>
      </div>

  </section>
