<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
  </head>
  <body id="#top">
    <div class="site-wrapper">
      <div class="header">
        <h1 class="site-title"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
        <p class="site-description"><?php echo get_bloginfo( 'description' ); ?></p>
        <div class="header-menu">
            <?php wp_nav_menu( array(
              'theme_location' => 'nav-menu',
              'items_wrap' => '%3$s',
              'menu_class' => 'navigation-menu'
            )); ?>
          <div class="btn" id="search-btn">Search</div>
        </div>
      </div>
