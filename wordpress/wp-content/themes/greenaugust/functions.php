<?php

function greenaugust_scripts() {
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
  wp_enqueue_style( 'flickity-css', get_template_directory_uri() . '/css/flickity.css', array(), NULL, 'all' );
  wp_enqueue_script('index-js', get_template_directory_uri() . '/js/index.js');
  wp_enqueue_script('flickity', get_template_directory_uri() . '/js/flickity.pkgd.min.js');
}

function wpb_custom_new_menus() {
  register_nav_menus(
    array(
      'headers' => __( 'Primary Headers', 'greenaugust' ),
      'nav-menu' => __( 'Navigation Bar Menu', 'greenaugust' ),
      'social-media' => __( 'Social Media Links', 'greenaugust' ),
      'footer-menu' => __( 'Footer Menu', 'greenaugust'),
    )
  );
}

function wpb_get_menu_items($location_id){
    $menus = wp_get_nav_menus();
    $menu_locations = get_nav_menu_locations();

    if (isset($menu_locations[ $location_id ]) && $menu_locations[ $location_id ]!=0) {
        foreach ($menus as $menu) {
            if ($menu->term_id == $menu_locations[ $location_id ]) {
                $menu_items = wp_get_nav_menu_items($menu);
                break;
            }
        }
        return $menu_items;
    }
}

function get_the_base_permalink($post_id) {
  $href = get_post_meta($post_id, 'Published Article Link', true);
  if (empty($href)) {
    $href = get_permalink($post_id);
  }
  return $href;
}

function get_the_title_permalink($post_id) {

  $href = get_post_meta($post_id, 'Published Article Link', true);
  $target = "_blank";
  $tab = "external";
  $rel = "noopener";
  if (empty($href)) {
    $href = get_permalink($post_id);
    $target = "_self";
    $tab = "internal";
  }
  $title = get_the_title($post_id);
  $alt = get_the_title($post_id);
  return "<a href=" . $href . " target="
    . $target . "&quot; rel=" . $rel . ">" . $title . "</a>";
}

function get_the_image_permalink($post_id) {

  $href = get_post_meta($post_id, 'Published Article Link', true);
  $target = "_blank";
  $tab = "external";
  $rel = "noopener";
  if (empty($href)) {
    $href = get_permalink($post_id);
    $target = "_self";
    $tab = "internal";
    $rel = "";
  }
  $title = get_the_title($post_id);
  $alt = get_the_title($post_id);
  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), ’thumbnail’ );
  return "<a class='thumbnail-image' href='" . $href . "' target='"
    . $target . "' rel='" . $rel . "'><img width='100%' src='" . $src[0] . "' alt='"
      . $title . "'></a>";
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

function bac_wp_strip_header_tags_only( $excerpt ) {

    $regex = '#(<h([1-6])[^>]*>)\s?(.*)?\s?(<\/h\2>)#';
    $excerpt = preg_replace($regex,'', $excerpt);
    return $excerpt;
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

add_action( 'init', 'wpb_custom_new_menus' );
add_action( 'wp_enqueue_scripts', 'greenaugust_scripts' );
add_action( 'wp_print_styles', 'startwordpress_google_fonts' );



?>
