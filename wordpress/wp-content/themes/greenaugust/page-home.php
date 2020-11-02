<?php get_header(); ?>
<?php get_template_part('templates/template', 'header'); ?>
<div class="home">

  <div class="feature">
    <?php if (have_posts()) : ?>
    <div class="heading">Hot off the press.</div>
    <br>

    <div class="feature-wrapper">

      <?php
        $args = array(
          'posts_per_page' => 1,
        );
        $query = new WP_Query($args);
        while ($query->have_posts()) {
          $query->the_post();
          get_template_part( 'blocks/content', 'feature' );
        }
        unset($query);
      ?>

    </div>

  <?php endif; ?>
  </div>
  <div class="home-carousel">

    <?php get_template_part( 'blocks/content', 'postcarousel' ); ?>

  </div>
  <?php get_template_part( 'blocks/content', 'about') ?>
</div>
<?php get_template_part('templates/template', 'footer'); ?>
<?php get_footer(); ?>
