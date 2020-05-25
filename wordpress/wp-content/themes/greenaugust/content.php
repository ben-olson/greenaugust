<div class="post-thumbnail col-xs-12 col-md-6 col-lg-3">
  <?php if ( has_post_thumbnail()) : ?>

    <a class="thumbnail-image" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
      <?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),’thumbnail’ );
            echo '<img width="100%" src="' . $image_src[0] . '">'; ?>
    </a>
  <?php endif; ?>
  <h2 class="blog-post-title"><?php the_title(); ?></h2>
  <p class="blog-post-meta"><?php the_date(); ?></a></p>
  <?php the_excerpt(); ?>

</div>
