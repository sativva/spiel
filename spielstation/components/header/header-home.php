<!-- HEADER HOME -->

<section class="Header">
  <div class="Header-menu Header-menu--home clearfix">

    <div class="container">
      <a href="<?php bloginfo('url');?>"><img class="Header-logo pull-left" src="<?php echo get_template_directory_uri();?>/assets/img/nav/logo-spiel-noir.svg" alt=""></a>
      <div class="MobileNavIcon js-MobileNav hidden-lg"><img src="<?php echo get_template_directory_uri();?>/assets/img/nav/bars.svg" alt="" /></div>

      

      <div class="Header-nav">
        <div class="Header-menu-icons">
          <div class="SearchForm-Header SearchForm-Header--black">
            <span class="js-showSearchInput">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/nav/icon-loupe-noir.svg" alt="">
            </span>
            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input type="text" pattern=".{3,}" placeholder="SUCHEN" value="<?php echo get_search_query(); ?>" name="s" required>
            </form>
          </div>
          <a href="<?php bloginfo('home'); ?>/kontakt"><img src="<?php echo get_template_directory_uri();?>/assets/img/nav/icon-mail-noir.svg" alt=""></a>
        </div>
      
        <?php wp_nav_menu( array(
            'theme_location' => 'top'
          ) ); ?>
      </div>

    </div>
  </div>

  <!--  SEARCH FORM -->
  <div class="Header-searchForm">
    <div class="container">
      <form action="<?php echo esc_url( home_url( '/finder/' ) ); ?>" method="GET">
        <fieldset>
          <input id="start" type="text" name="start" placeholder="Stadt oder PLZ eingeben.">
          <input id="submit" type="submit" value="Suchen">
        </fieldset>
      </form>
    </div>
  </div>
</section>
