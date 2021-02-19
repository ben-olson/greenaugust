<?php get_header(); ?>
<?php get_template_part('templates/template', 'header'); ?>
<div class="page">
  <?php	while ( have_posts() ) :
    the_post(); ?>
    <div class="post-body-copy body-copy">
      <?php the_content(); ?>
    </div>



  <?php endwhile; ?>
</div>
<?php get_template_part('templates/template', 'footer'); ?>
<?php get_footer(); ?>
