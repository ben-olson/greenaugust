<?php get_header(); ?>

<div class="container-fluid body justify-content-center">

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

  <div class="category-footer">
    <a href="#">
      See All Posts
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="thumbnail-arrow"
       viewBox="0 0 6.5 10.4" width="1rem" height="1rem" xml:space="preserve">
        <polygon points="6.5,5.2 4,7.7 1.3,10.4 0,9.1 3.9,5.2 0.4,1.7 0,1.3 1.3,0 2.9,1.7 "/>
        <polygon points="6.5,5.2 6.5,5.2 5.2,3.9 "/>
      </svg>
    </a>
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

    <div class="category-footer">
      <a href="<?php echo esc_url(get_category_link($item->object_id)); ?>">
        See More <?php echo ucfirst((string)$item->title); ?> Posts
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="thumbnail-arrow"
         viewBox="0 0 6.5 10.4" width="1rem" height="1rem" xml:space="preserve">
          <polygon points="6.5,5.2 4,7.7 1.3,10.4 0,9.1 3.9,5.2 0.4,1.7 0,1.3 1.3,0 2.9,1.7 "/>
          <polygon points="6.5,5.2 6.5,5.2 5.2,3.9 "/>
        </svg>
      </a>
    </div>

  <?php endforeach; ?>
  <!-- Ends the main Loop -->

</div>

<?php endif; ?>

<?php get_footer(); ?>
