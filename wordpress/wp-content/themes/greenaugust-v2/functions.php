<?php

function greenaugust_scripts() {
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
  // wp_enqueue_style( 'flickity-css', get_template_directory_uri() . '/css/flickity.css', array(), NULL, 'all' );
  // wp_enqueue_script('index-js', get_template_directory_uri() . '/js/index.js');
  // wp_enqueue_script('flickity', get_template_directory_uri() . '/js/flickity.pkgd.min.js');
}

function is_published($post_id) {
  $terms_published = get_term_children(get_cat_ID('Published'), 'category');

  $terms_raw = get_the_category($post_id); 
  $terms = [];

  for ($i = 0; $i < count($terms_raw); $i++) {
    $terms[$i] = $terms_raw[$i]->term_id;
  }

  $terms_result= array_intersect($terms_published,$terms);
  $term = array_values($terms_result)[0];

  if ($term) {
    return $term;
  } 
  return null;
  
}

function get_the_article_permalink($post_id) {
  $link = get_field('published-article-url', $post_id);
  $target = "_blank";
  $tab = "external";
  $rel = "noopener";
  if (empty($link)) {
    $target = "_self";
    $tab = "internal";
    $link = get_permalink($post_id);
  }
  $title = get_the_title($post_id);
  return '<a href="' . $link . '" target="'
  . $target . '"&quot; rel="' . $rel . '">' . $title . '</a>';
}

function get_the_article_permalink_pag_prev($post_id) {
  $prev = get_adjacent_post(false, '', false);
  if (!empty($prev)) {
    $prev = $prev->ID;
    $link = get_field('published-article-url', $prev);
    $target = "_blank";
    $tab = "external";
    $rel = "noopener";
    if (empty($link)) {
      $target = "_self";
      $tab = "internal";
      $link = get_permalink($prev);
    }
    $title = get_the_title($prev);
    return '<a class="left" href="' . $link . '" target="'
    . $target . '"&quot; rel="' . $rel . '">&larr;&nbsp;' . $title . '</a>';
  }
  return '&nbsp;';
}

function get_the_article_permalink_pag_next($post_id) {
  $next = get_adjacent_post(false, '', true);
  if (!empty($next)) {
    $next = $next->ID;
    $link = get_field('published-article-url', $next);
    $target = "_blank";
    $tab = "external";
    $rel = "noopener";
    if (empty($link)) {
      $target = "_self";
      $tab = "internal";
      $link = get_permalink($next);
    }
    $title = get_the_title($next);
    return '<a class="right" href="' . $link . '" target="'
    . $target . '"&quot; rel="' . $rel . '">' . $title . '&nbsp;&rarr;</a>';
  }
  return '&nbsp;';
}

function show_last_modified_date() {
  $original_time = get_the_time('U');
  console.log($original_time);
  $modified_time = get_the_modified_time('U');
  if ($modified_time >= $original_time + 86400) {
    $updated_time = get_the_modified_time('h:i a');
    $updated_day = get_the_modified_time('F jS, Y');
    $modified_content .= '<div class="modified-date body-copy">Last updated on '. $updated_day . '</div>';
  }
  console.log($modified_content);
  return $modified_content;
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 300;
}

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}

// add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
add_filter( 'get_the_modified_date', 'show_last_modified_date' );
// add_filter( 'get_the_excerpt', 'bac_wp_strip_header_tags_keep_other_formatting', 5);

//Wordpress Titles
add_theme_support('title-tag');
//Post thumbnails & featured images
add_theme_support('post-thumbnails');
set_post_thumbnail_size(700, 9999);
add_image_size( 'homepage-thumbnail', 300, 300); // Soft Crop Mode


add_action( 'wp_enqueue_scripts', 'greenaugust_scripts' );
add_action( 'wp_print_styles', 'startwordpress_google_fonts' );

?>
