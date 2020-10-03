<div class="carousel">
  <!-- Starts the main Loop for categories/tags from the primary nav menu -->
  <?php
  $menuItems = wpb_get_menu_items('headers');
  foreach ($menuItems as $item) :

    // Determines if the menu term is a category or tag
    if (term_exists($item->title, 'post_tag')) {
      $args = array(
        'posts_per_page' => 4,
        'tag_id' => $item->object_id
      );

    } elseif (term_exists($item->title, 'category')) {
      $args = array(
        'posts_per_page' => 4,
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
      get_template_part( 'content', 'thumbnail' );
    }
    unset($args);
    ?>
  </div>

  <?php endforeach; ?>

</div>

  <div class="hr-text">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="10px">
      <defs>
        <marker id="e-arrowhead" markerWidth="10" markerHeight="7"
        refX="0" refY="3.5" orient="auto">
          <polygon points="0 0, 10 3.5, 0 7" />
        </marker>
        <marker id="s-arrowhead" markerWidth="10" markerHeight="7"
        refX="0" refY="3.5" orient="auto">
          <polygon points="10 0, 10 7, 0 3.5" />
        </marker>
      </defs>
      <line x1="0%" y1="50%" x2="calc(100% - 10px)" y2="50%" stroke="#000"
      stroke-width="1" marker-end="url(#e-arrowhead)" marker-start="url(#s-arrowhead)" />
    </svg>
    <span>Try Swiping</span>


  </div>
