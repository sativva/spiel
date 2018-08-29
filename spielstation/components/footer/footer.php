<section class="Footer col-xs-12">
      <div class="container">
        <a class="Footer-logoWrapper" href="<?php bloginfo('url');?>"><img class="Footer-logo" src="<?php echo get_template_directory_uri();?>/assets/img/nav/logo-spiel-blanc.svg" alt=""></a>
        <?php wp_nav_menu( array(
            'theme_location' => 'footer'
          ) ); ?>
      </div>
</section>
