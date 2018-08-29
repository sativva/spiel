<!--  HEADER GENERAL -->
<div class="Header-menu clearfix">
  <div class="container">
      <?php //get_template_part( 'components/search/search-form-header' ); ?>
    <a href="<?php bloginfo('url');?>"><img class="Header-logo pull-left" src="<?php echo get_template_directory_uri();?>/assets/img/nav/logo-spiel-noir.svg" alt=""></a>
    <div class="MobileNavIcon js-MobileNav hidden-lg">
      <img src="<?php echo get_template_directory_uri();?>/assets/img/nav/bars.svg" alt="" />
    </div>
    

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
