<div class="feature-wrapper-text">
  <div class="tn-title feature-tn-title"><a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
  <?php the_title(); ?>
  </a></div>

  <div class="tn-meta feature-tn-meta"><?php the_date(); ?> &middot; <?php get_the_category(); ?></div>

  <div class="tn-excerpt feature-tn-excerpt">
    <?php

    $excerpt = get_the_excerpt();

    $excerpt = substr($excerpt, 0, 700);
    $result = substr($excerpt, 0, strrpos($excerpt, ' '));
    echo $result;

    ?>
  </div>
  <br>
</div>

<div class="tn-img feature-tn-img">
  <a class="thumbnail-image" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
    <?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),’thumbnail’ );
          echo '<img width="100%" src="' . $image_src[0] . '">'; ?>
  </a>
</div>
