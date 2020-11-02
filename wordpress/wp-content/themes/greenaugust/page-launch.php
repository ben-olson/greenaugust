<?php /* Template Name: Launch Page */ ?>
<?php get_header(); ?>

<div class="launch-page page">
  <?php	while ( have_posts() ) :
    the_post(); ?>
    <div class="post-body-copy body-copy">
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
