<?php get_header(); ?>
<div class="container">

<?php
  if (have_posts()) :

    $argsArray = array(
      array(
        'posts_per_page' => 4
      ),
      array(
        'category_name' => 'interview',
        'posts_per_page' => 4
      ),
      array(
        'category_name' => 'freewrite',
        'posts_per_page' => 4
      ),
      array(
        'category_name' => 'culture',
        'posts_per_page' => 3
      ),
      array(
        'category_name' => 'travel',
        'posts_per_page' => 4
      )
    );
  ?>
    <?php foreach ($argsArray as $args) : ?>
      <div class="row">
        <?php
          $query = new WP_Query($args);
          while ($query->have_posts()) :
        ?>
            <div class="col-sm">
            <?php
              $query->the_post();
              get_template_part( 'content', get_post_format() );
            ?>
            </div>
          <?php
          endwhile;
          unset($args);
          ?>
      </div>
    <?php endforeach; ?>
  </div>

<?php endif; ?>

<div class="container">
  <div class="row">
    <div class="col">
      1 of 2
    </div>
    <div class="col">
      2 of 2
    </div>
  </div>
  <div class="row">
    <div class="col">
      1 of 3
    </div>
    <div class="col">
      2 of 3
    </div>
    <div class="col">
      3 of 3
    </div>
  </div>
</div>

<?php get_footer(); ?>
