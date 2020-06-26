<?php get_header(); ?>

<div class="container-fluid body p-0 index justify-content-center">

<?php

if (have_posts()) :
  // Gets the menu items associated with the primary headers on the homepage and
  // sets the the posts per category to 4
  $menuItems = wpb_get_menu_items('headers');
  $args = array('posts_per_page' => 4);
  $query = new WP_Query($args);

?>
  <div class="category-header">
    <a href="#">Recent Posts</a>
  </div>
  <div class="category-row">

  <!-- Loops 4 most recent posts for the first category -->
  <?php while ($query->have_posts()) {
    $query->the_post();
    get_template_part( 'content', 'thumbnail' );
  }
  unset($query);
  ?>
  <!-- Ends Recent Loop -->

  </div>

  <!-- Starts the main Loop for categories/tags from the primary nav menu -->
  <?php
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
    <!-- Displays the category/tag as the header -->
    <div class="category-header">
      <a href="<?php echo esc_url(get_category_link($item->object_id)); ?>">
            <?php echo ucfirst((string)$item->title); ?></a>
    </div>
    <!-- Declares rows for displaying posts -->
    <div class="category-row">

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
  <!-- Ends the main Loop -->

</div>

<?php endif; ?>

<?php get_footer(); ?>
