<?php /**
* A Simple Category Template
*/
get_header(); ?>


<div class="container-fluid thumbnail-body p-0 index justify-content-center">

<?php

if (have_posts()) :

  $category = get_queried_object();

  if (term_exists($category->term_id, 'category')) :
    $args = array(
      'cat' => $category->term_id
    );
    $query = new WP_Query($args);

?>
  <!-- Displays the category/tag as the header -->
  <div class="category-header">
    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
          <?php echo ucfirst((string)get_the_archive_title()); ?></a>
  </div>

    <div class="category-row">

    <?php while ($query->have_posts()) {
      $query->the_post();
      get_template_part( 'content', 'thumbnail' );
    }
    unset($query);
    ?>
    <!-- Ends Recent Loop -->

    </div>

  <?php else :
    get_template_part( '404' );
  ?>

  <?php endif; ?>



</div>

<?php endif; ?>

<?php get_footer(); ?>
