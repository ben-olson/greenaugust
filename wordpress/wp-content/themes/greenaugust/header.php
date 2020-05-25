<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href= "<?php get_template_directory_uri . '/css/style.css' ?>"
    <?php wp_head(); ?>
  </head>
  <body>
    <div class="container-fluid header">
      <div class="row">
        <h1 class="blog-title col-sm"><a href="<?php echo get_bloginfo( 'wpurl' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
        <p class="lead blog-description col-sm"><?php echo get_bloginfo( 'description' ); ?></p>
        <div class="col-5 row nav-bar">
          <div id="about" class="button col-sm">About</div>
          <div id="published" class="button col-sm">Published</div>
          <div id="Social" class="button col-sm">Social</div>
          <div id="Search" class="button col-sm">Search</div>
        </div>
      </div>
    </div>
