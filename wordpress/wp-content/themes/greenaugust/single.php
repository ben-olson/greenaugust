<?php get_header(); ?>
<?php get_template_part('templates/template', 'header'); ?>

<div class="post">

<?php
  if ( have_posts() ) : while ( have_posts() ) : the_post();
    get_template_part( 'blocks/content', 'single' );
  endwhile; endif;
?>

<?php get_template_part( 'blocks/content', 'postcarousel' ); ?>

</div>


<?php get_template_part('templates/template', 'footer'); ?>
<?php get_footer(); ?>
