<div class="carousel">
  <!-- Starts the main Loop for categories/tags from the primary nav menu -->
  <?php
  $menuItems = wpb_get_menu_items('headers');
  foreach ($menuItems as $item) :

    // Determines if the menu term is a category or tag
    if (term_exists($item->title, 'post_tag')) {
      $args = array(
        'posts_per_page' => 5,
        'tag_id' => $item->object_id
      );

    } elseif (term_exists($item->title, 'category')) {
      $args = array(
        'posts_per_page' => 5,
        'cat' => $item->object_id
      );
    }

  ?>

  <div class="category-heading heading">
    <div>See more on &nbsp;</div>
    <div class="animate__animated animate__bounceInDown"><a href="<?php echo esc_url(get_category_link($item->object_id)); ?>">
          <?php echo ucfirst((string)$item->title); ?></a></div>
    <div>.</div>
  </div>

  <div class="carousel-cell category-row">
    <?php
    $query = new WP_Query($args);
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part( 'blocks/content', 'thumbnail' );
    }
    unset($args);
    ?>
  </div>

  <?php endforeach; ?>

</div>
