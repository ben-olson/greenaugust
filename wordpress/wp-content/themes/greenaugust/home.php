<?php get_header(); ?>
<div class="body-wrapper">

  <div class="feature">
    <?php if (have_posts()) : ?>
    <div class="heading">Hot off the press.</div>
    <br>

    <div class="feature-wrapper">

      <?php
        $args = array('posts_per_page' => 1);
        $query = new WP_Query($args);
        while ($query->have_posts()) {
          $query->the_post();
          get_template_part( 'content', 'feature' );
        }
        unset($query);
      ?>

    </div>

    <div class="hr-text">
      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="10px">
        <defs>
          <marker id="e-arrowhead" markerWidth="10" markerHeight="7"
          refX="0" refY="3.5" orient="auto">
            <polygon points="0 0, 10 3.5, 0 7" />
          </marker>
        </defs>
        <line x1="0%" y1="50%" x2="calc(100% - 10px)" y2="50%" stroke="#000"
        stroke-width="1" marker-end="url(#e-arrowhead)" />
      </svg>
      <span>Read More</span>
    </div>
  <?php endif; ?>
  </div>

  <br>

  <div class="lower-section">

    <?php get_template_part( 'content', 'postcarousel' ); ?>

  </div>
</div>
<?php get_footer(); ?>
