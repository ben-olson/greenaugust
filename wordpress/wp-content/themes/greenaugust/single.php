<?php get_header(); ?>

<div class="post">

<?php
  if ( have_posts() ) : while ( have_posts() ) : the_post();
    get_template_part( 'content', 'single' );
  endwhile; endif;
?>

<?php get_template_part( 'content', 'postcarousel' ); ?>

</div>



<?php get_footer(); ?>
