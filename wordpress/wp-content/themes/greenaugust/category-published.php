<?php /**
* A Simple Category Template
*/
get_header(); ?>


<div class="container-fluid px-5 index justify-content-center">

<?php

if (have_posts()) :
  $query = new WP_Query( array('category_name' => 'published'));

?>

    <div class="row justify-content-center">

    <!-- Loops 4 most recent posts for the first category -->
    <?php while ($query->have_posts()) {
      $query->the_post();
      get_template_part( 'content', 'published' );
    }
    unset($query);
    ?>
    <!-- Ends Recent Loop -->

    </div>

<?php else :
  get_template_part( '404' );
?>

</div>

<?php endif; ?>

<?php get_footer(); ?>
