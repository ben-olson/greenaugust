<?php /* Template Name: About Page */ ?>
<?php get_header(); ?>

<div class="[ about ]">
  <?php	while ( have_posts() ) :
    the_post(); ?>
    <article class="[ post ] [ flow ]">
      <h2 class="[ post__title ] [ upper font-size:s5 font:light ]">What is Green August?</h2>
      <?php the_content(); ?>
    </article>
  <?php endwhile; ?>
</div>

<?php get_template_part('templates/template', 'footer'); ?>
<?php get_footer(); ?>
