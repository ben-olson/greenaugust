<div class="header">
  <h1 class="site-title"><a href="<?php echo get_bloginfo( 'wpurl' ) . '/home'; ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
  <p class="site-description"><?php echo get_bloginfo( 'description' ); ?></p>
  <br>
  <div class="header-menu">
      <?php wp_nav_menu( array(
        'theme_location' => 'nav-menu',
        'items_wrap' => '%3$s',
        'menu_class' => 'navigation-menu'
      )); ?>
    <!-- <div class="btn" id="search-btn">Search</div> -->
  </div>
</div>
