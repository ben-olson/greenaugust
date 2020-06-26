<div class="blog-post">
  <div class="post-meta">
    <div class="post-feature-image">
      <?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),’thumbnail’ );
      echo '<img width="100%" src="' . $image_src[0] . '">'; ?>
    </div>
    <h2 class="post-title"><?php the_title(); ?></h2>
    <p class="post-date body-copy"><?php the_date(); ?>
      <?php $category = get_queried_object();
      if (term_exists($category->term_id, 'category')) {
        echo "&mdash;" . get_the_archive_title();
      }
      ?>
    </p>
    

    <hr class="post-hr">

  </div>

  <div class="body-copy">
    <?php the_content(); ?>
  </div>

</div>
