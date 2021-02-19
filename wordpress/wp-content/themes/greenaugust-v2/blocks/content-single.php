<article class="[ post ] [ flow:wide ]">

  <h2 class="[ post__title ] [ upper font-size:s5 font:light ]"><?php the_title(); ?></h2>
  <?php 
    if (has_excerpt()) {
      $excerpt = get_the_excerpt();
      echo '<p class="[ font-size:s1 ]"><em>' . $excerpt . '</em></p>';
    }
  ?>
  <div class="[ post__dates ] [ upper ] ">
    <p>Published on <?php the_date(); ?></p>
    <?php echo show_last_modified_date(); ?>
  </div>
  <hr>
  
  <img class="[ post__feature-img ]" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Thumbnail">


  <section class="[ post__body ] [ flow ]">
    <?php the_content(); ?>
  </section>


  <!-- <p class="post-categories body-copy">
    <strong>Categories</strong>:
    <?php $categories = get_the_category();
    if ($categories) {
      foreach ($categories as $category) {
        $catstring = $catstring . " " . $category->name . ",";
      }
      $catstring = rtrim($catstring, ",");
      echo $catstring;
    }
    ?>
  </p>

  <p class="post-tags body-copy">
    <strong>Tags</strong>:
  </p> -->

  </article>
