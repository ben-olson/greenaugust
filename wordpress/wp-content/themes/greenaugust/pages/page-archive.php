<?php /* Template Name: Archive Page */ ?>

<?php get_header(); ?>
<?php get_template_part('templates/template', 'header'); ?>

<div class="archive">
  <?php 
  $q = new WP_Query( array('posts_per_page' => 10,'order' => 'DESC' ));

  if( $q->have_posts() ) {
      while( $q->have_posts() ) {
  
          $q->the_post();
  
          $current_month = get_the_date('F');
  
          if( $q->current_post === 0 ) { 
  
             echo strtoupper(substr(get_the_date( 'F' ), 0, 3));
  
          }else{ 
  
              $f = $q->current_post - 1;       
              $old_date =   mysql2date( 'F', $q->posts[$f]->post_date ); 
  
              if($current_month != $old_date) {
  
                echo strtoupper(substr(get_the_date( 'F' ), 0, 3));

  
              }
  
          }
  
          // the_title();
  
      }
  
  }
  
  ?>
</div>

<?php get_template_part('templates/template', 'footer'); ?>
<?php get_footer(); ?>
