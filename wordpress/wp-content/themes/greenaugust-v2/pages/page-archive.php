<?php /* Template Name: Archive Page */ ?>

<?php get_header(); ?>
<?php get_template_part('templates/template', 'header'); ?>
<div class="">
  <div class="[ intro ]">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati accusantium porro voluptates commodi id nisi, doloribus inventore deserunt, voluptas quod corporis iste, autem excepturi numquam harum nostrum necessitatibus modi nesciunt.</p>
    <br>
    <hr>
    <br>

  </div>

  <div class="[ home__posts ] [ flow ]">

    <?php $q = new WP_Query( array('posts_per_page' => -1,'order' => 'DESC' ));?>

    <?php if( $q->have_posts()) : ?>

      <?php while( $q->have_posts() ) : ?>

        <?php $q->the_post(); ?>
        
        <?php $term = is_published($q->ID);?>

        <?php $current_month = get_the_date('F'); ?>
        <?php $ahead = $q->posts[$q->current_post + 1]; ?>
        <?php
            $f = $q->current_post + 1;
            $r = $q->current_post - 1;       
            $old_date = mysql2date( 'F', $q->posts[$r]->post_date ); 
            $new_date = mysql2date( 'F', $q->posts[$f]->post_date ); 
        ?> 

        <?php if ( $q->current_post === 0 ) : ?>

          <div class="[ pcon ] [ flex ]">

            <div class="[ pcon__month ] [ upper font:bold font-size:s5 ]">
              <?php echo strtoupper(substr(get_the_date( 'F' ), 0, 3)); ?>
            </div>

            <div class="[ pcon__posts ] [ flex:column ] [ flow ]">

        <?php endif; ?>
        
        <?php if ( $ahead ) : ?>

          <?php if ( $current_month != $old_date && $q->current_post != 0 ) : ?> 

            <div class="[ pcon ] [ flex ]">

              <div class="[ pcon__month ] [ upper font:bold font-size:s5 ]">
                <?php echo strtoupper(substr(get_the_date( 'F' ), 0, 3)); ?>
              </div>

              <div class="[ pcon__posts ] [ flex:column ] [ flow ]">

          <?php endif; ?>

          <?php if ($current_month === $new_date) : ?>
            
            <div class="[ pcon__posts__post ]">

              <h3 class="[ upper font-size:s1 ]">
                <?php echo get_the_title_permalink($q->ID); ?>
              </h3>

              <?php if ($term) : ?>

                <p class="[ upper font:regular font-size:s-1 ]">Written for <em class="[ font:regular ]"><?php echo get_cat_name($term); ?></em></p>

              <?php endif; ?>

            </div>

          <?php else : ?>

            <div class="[ pcon__posts__post ]">

              <h3 class="[ upper font-size:s1 ]">
                <?php echo get_the_title_permalink($q->ID); ?>
              </h3>

              <?php if ($term) : ?>

                <p class="[ upper font:regular font-size:s-1 ]">Written for <em class="[ font:regular ]"><?php echo get_cat_name($term); ?></em></p>

              <?php endif; ?>

            </div>

            </div>
            </div>

          <?php endif; ?>
        
        <?php else : ?>

          <?php if ($current_month != $old_date) : ?>

            <div class="[ pcon ] [ flex ]">

              <div class="[ pcon__month ] [ upper font:bold font-size:s5 ]">
                <?php echo strtoupper(substr(get_the_date( 'F' ), 0, 3)); ?>
              </div>

              <div class="[ pcon__posts ] [ flex:column ] [ flow ]">

          <?php endif; ?>

          <div class="[ pcon__posts__post ]">

            <h3 class="[ upper font-size:s1 ]">
              <?php echo get_the_title_permalink($q->ID); ?>
            </h3>

            <?php if ($term) : ?>

              <p class="[ upper font:regular font-size:s-1 ]">Written for <em class="[ font:regular font-size:s-1 ]"><?php echo get_cat_name($term); ?></em></p>

            <?php endif; ?>

          </div>

          </div>
          </div>

        <?php endif; ?>

      <?php endwhile; ?>

    <?php endif; ?>

  </div>

</div>
<?php get_template_part('templates/template', 'footer'); ?>
<?php get_footer(); ?>
