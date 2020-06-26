<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href= "<?php get_template_directory_uri . '/css/style.css' ?>">
    <?php wp_head(); ?>
  </head>
  <body>
    <div id="#top" class="header">
      <div class="header-row row">
        <h1 class="site-title col-sm"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
        <!-- <p class="lead blog-description col-sm"><?php echo get_bloginfo( 'description' ); ?></p> -->
        <div class="nav-bar">
          <?php wp_nav_menu( array(
            'theme_location' => 'nav-menu',
            'items_wrap' => '%3$s',
            'menu_class' => 'navigation-menu'
          )); ?>
        </div>
      </div>
    </div>
