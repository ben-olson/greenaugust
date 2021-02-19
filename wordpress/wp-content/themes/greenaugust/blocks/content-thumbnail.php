<div class="post-thumbnail">
  <div class="tn-img-cntnr">
    <?php if ( has_post_thumbnail()) : ?>
    <div class="tn-img">
      <?php echo get_the_image_permalink($post->ID); ?>
    </div>
    <div class="tn-meta">
      <?php
      echo get_the_date();
      $categories = get_the_category();
      if ( !empty( $categories ) ) {
        echo ' &middot; ' . esc_html( $categories[0]->name );
      }
      ?>

    </div>
    <?php endif; ?>
  </div>
  <div class="tn-text-cntnr">
    <div class="tn-title">
      <?php echo get_post_meta($post->ID, "Published Article Link", true); ?>
    </div>

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
