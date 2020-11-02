<div class="blog-post">

  <div class="post-attr">

    <div class="post-attr-cntnr">
      <h2 class="post-title"><?php the_title(); ?></h2>
      <!-- <div class="post-author">
        <div class="avatar">
          <?php echo get_avatar( get_the_author_meta('ID'), '70');  ?>
        </div>
        <div class="meta-copy">
          <?php echo get_the_author_meta('display_name'); ?>
          <?php wp_nav_menu( array(
            'theme_location' => 'social-media',
            'items_wrap' => '%3$s',
            'menu_class' => 'icons'
          )); ?>
        </div>
      </div> -->
      <div class="dates">
        <div class="post-date body-copy">Published on <?php the_date(); ?></div>
        <?php echo show_last_modified_date(); ?>
      </div>
    </div>



  </div>

  <div class="post-body-copy body-copy">
    <?php the_content(); ?>
  </div>


  <p class="post-categories body-copy">
    <strong>Categories</strong>:
    <?php $categories = get_the_category();
    if ($categories) {
      foreach ($categories as $category) {
        $catstring = $catstring . " " . $category->name . ",";
      }
      $catstring = rtrim($catstring, ",");
      echo $catstring;
    }
    ?>
  </p>

  <p class="post-tags body-copy">
    <strong>Tags</strong>:
  </p>


</div>
