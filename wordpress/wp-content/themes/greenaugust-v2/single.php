<?php get_header(); ?>
<?php get_template_part('templates/template', 'header'); ?>


<?php
  if ( have_posts() ) : while ( have_posts() ) : 
    
    the_post();

    if (get_field('published-article-url')) {
      get_template_part( 'blocks/content', 'redirect' );
    } else {
      get_template_part( 'blocks/content', 'single' );
    }
  
    $next_post = get_adjacent_post(false,'',true)->ID;
    $prev_post = get_adjacent_post(false,'',false)->ID;
    $next_term = is_published($next_post);
    $prev_term = is_published($prev_post);
    $next_tag = get_the_article_permalink_pag_next(get_the_ID());
    $prev_tag = get_the_article_permalink_pag_prev(get_the_ID());
?>

  <div class="[ pagination ] [ flex ]">
    

    <div class="[ post__prev ] [ post-link ]">

      <h3 class="[ upper font:light ]">
        <?php echo $prev_tag; ?>
      </h3>

      <?php if ($prev_term && $prev_tag != '&nbsp;') : ?>

        <p class="[ upper font:regular font-size:s-1 ]">Written for <em class="[ font:regular ]"><?php echo get_cat_name($prev_term); ?></em></p>

      <?php endif; ?>

    </div>

    <div class="[ post__next ] [ post-link ]">

      <h3 class="[ upper font:light ]">
        <?php echo $next_tag; ?>
      </h3>

      <?php if ($next_term) : ?>

        <p class="[ upper font:regular font-size:s-1 ]">Written for <em class="[ font:regular ]"><?php echo get_cat_name($next_term); ?></em></p>

      <?php endif; ?>

    </div>


  </div>

  <?php endwhile; endif;?>


<?php get_template_part('templates/template', 'footer'); ?>
<?php get_footer(); ?>
