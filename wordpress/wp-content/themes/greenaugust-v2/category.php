<?php /**
* A Simple Category Template
*/
get_header(); ?>
<?php get_template_part('templates/template', 'header'); ?>

<div class="categories">

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
    <?php echo get_the_archive_title(); ?>
  </div>

    <div class="category-posts">

    <?php while ($query->have_posts()) {
      $query->the_post();
      get_template_part( 'blocks/content', 'thumbnail' );
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
<?php get_template_part('templates/template', 'footer'); ?>
<?php get_footer(); ?>
