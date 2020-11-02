<div class="feature-wrapper-text">
  <div class="tn-title feature-tn-title">
    <?php echo get_the_title_permalink($post->ID); ?>
  </div>

  <div class="tn-meta feature-tn-meta"><?php
  echo get_the_date();
  $categories = get_the_category();
  if ( !empty( $categories ) ) {
    echo ' &middot; ' . esc_html( $categories[0]->name );
  }
  ?></div>

  <div class="tn-excerpt feature-tn-excerpt">
    <?php

    $excerpt = get_the_excerpt();

    $excerpt = substr($excerpt, 0, 700);
    $result = substr($excerpt, 0, strrpos($excerpt, ' '));
    $result = $result .'&hellip;' . '<a class="read-more" href="'.
    get_the_base_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
    echo $result;

    ?>
  </div>
  <br>
</div>

<div class="tn-img feature-tn-img">
  <?php echo get_the_image_permalink($post->ID); ?>
</div>
