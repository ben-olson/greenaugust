<div class="post-thumbnail">
  <div class="tn-img-cntnr">
    <?php if ( has_post_thumbnail()) : ?>
    <div class="tn-img">
      <a class="thumbnail-image" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
        <?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), ’thumbnail’ );
              echo '<img width="100%" src="' . $image_src[0] . '">'; ?>
      </a>
    </div>
    <div class="tn-meta">
      <?php if (the_date()) {
        the_date();
      }
      if (get_the_category() == false) {
        echo ' &middot ';
        get_the_category();
      }
      ?>

    </div>
    <?php endif; ?>
  </div>
  <div class="tn-text-cntnr">
    <div class="tn-title"><a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
    <?php the_title(); ?>
    </a></div>

    <div class="tn-excerpt">
      <?php
      $excerpt = get_the_excerpt();

      $excerpt = substr($excerpt, 0, 100);
      $result = substr($excerpt, 0, strrpos($excerpt, ' '));
      echo $result;
      ?>
   </div>
  </div>
</div>
