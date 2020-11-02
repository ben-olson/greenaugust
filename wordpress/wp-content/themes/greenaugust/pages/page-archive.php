<?php get_header(); ?>
<?php get_template_part('templates/template', 'header'); ?>

<div class="archive">
  <?php if (have_posts()) : ?>
  <?php
    $args = array(
      'orderby' => 'date',
      'posts_per_page' => -1
    );
    $query = new WP_Query($args);
  ?>
  <?php while ($query->have_posts()) {
    $query->the_post();
    get_template_part( 'blocks/content', 'thumbnail' );
  }
  unset($query);
  ?>
<?php endif; ?>
</div>

<?php get_template_part('templates/template', 'footer'); ?>
<?php get_footer(); ?>
