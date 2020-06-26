<div class="thumbnail col-xs-6 col-lg-3">
  <?php if ( has_post_thumbnail()) : ?>
    <div class="thumbnail-image-box">
      <a class="thumbnail-image" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
        <?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),’thumbnail’ );
              echo '<img width="100%" src="' . $image_src[0] . '">'; ?>
      </a>
    </div>

  <?php endif; ?>

  <div class="thumbnail-text-box">
    <h2 class="thumbnail-title">
      <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
      <?php the_title(); ?>
      </a>
    </h2>

    <p class="thumbnail-date body-copy">
      <?php the_date(); ?>
    </p>

    <hr class="thumbnail-hr">

    <div class="excerpt body-copy">
      <?php the_excerpt(); ?>
    </div>

    <a href="<?php the_permalink(); ?>" alt"<?php the_title_attribute(); ?>">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="thumbnail-arrow"
       viewBox="0 0 6.5 10.4" width="1.5rem" height="1.5rem" xml:space="preserve">
        <polygon points="6.5,5.2 4,7.7 1.3,10.4 0,9.1 3.9,5.2 0.4,1.7 0,1.3 1.3,0 2.9,1.7 "/>
        <polygon points="6.5,5.2 6.5,5.2 5.2,3.9 "/>
      </svg>
    </a>

  </div>

</div>
