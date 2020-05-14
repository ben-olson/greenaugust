<div class="blog-post">
  <?php if ( has_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>
    </a>
  <?php endif; ?>
  <h2 class="blog-post-title"><?php the_title(); ?></h2>
  <p class="blog-post-meta"><?php the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>
  <?php the_excerpt(); ?>

</div>
