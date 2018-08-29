<section class="HomeNews">
  <div class="container">
    <div class="Container--small">

      <div class="col-xs-3">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="#" class="img-responsive" />
      </div>

      <div class="col-xs-9">
        <h3 class="HomeNews-h3">Aktuelles</h3>
        <div class="HomeNews-date">25.08.2016</div>
        <div class="HomeNews-title"><?php the_title(); ?></div>
        <div class="HomeNews-excerpt">
          <?php the_excerpt(); ?>
        </div>
        <div>
          <a href="<?php the_permalink(); ?>" class="btn btn--yellow">Mehr</a>
          <!-- <a href="<?php // bloginfo('url'); ?>/unsere-spielstationen/aktuelles/" class="btn btn--yellow">Alle</a> -->
        </div>
      </div>

    </div>
  </div>
</section>