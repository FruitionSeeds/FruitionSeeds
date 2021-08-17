<?php

//
// bgImgFromID
// Take an image ID and generate the inline css for a background image
//
function bgImgFromID( $id, $size = 'large', $xalign = 'center', $yalign = 'center', $bgsize = 'cover', $bgcolor = '#e3e3e3' ){
  //if(!$id) return '';
  if(has_post_thumbnail($id)){
    $url = wp_get_attachment_image_src(get_post_thumbnail_id($id), $size)[0];
  } elseif( wp_get_attachment_image_src($id) ) {
    $url = wp_get_attachment_image_src($id, $size)[0];
  } elseif( get_field('files', $id) ) {
    $files = get_field('files');
    $url = wp_get_attachment_image_src($files[0]['image'], $size)[0];
  }
  if(!$url) return 'background-color:' . $bgcolor . ';';
  if($url) return 'background:url(' . $url . ') no-repeat ' . $xalign . ' ' . $yalign . ' ' . $bgcolor . '; background-size: ' . $bgsize . ';';
  return '';
}

//
// wrapReviewCount
// This is kind of a hack, but it takes the tab title for Reviews - i.e. Reviews (0) - and wraps the count in a span tag.
//
function wrapReviewCount( $string ){
  if( strpos(strtolower($string), 'reviews') !== false ){
    $segments = explode('(', $string);
    $newString = $segments[0] . '<span>(' . $segments[1] . '</span>';
  } else {
    $newString = $string;
  }
  return $newString;
}

//
// getMainCategoryFromList
// Since a product can be in many categories, this sorts through them to get the main category to use when pulling in related content
//
function getMainCategoryFromList( $terms ){
  $category_list = [];
  $vegetables_id = get_term_by('slug', 'vegetables', 'product_cat');
  array_push($category_list,$vegetables_id->term_id);

  $herbs_id = get_term_by('slug', 'herbs', 'product_cat');
  array_push($category_list,$herbs_id->term_id);

  $flowers_id = get_term_by('slug', 'flowers', 'product_cat');
  array_push($category_list,$flowers_id->term_id);

  $return_list = [];

  foreach ($terms as $term) {
    $top_parent = get_term_top_most_parent($term, 'product_cat');
    if (in_array($top_parent->term_id, $category_list) && $term->parent != 0){
      array_push($return_list,$term->term_id);
    }
  }

  return array_unique($return_list);
}

//
// get_term_top_most_parent
// Get the most top level parent of a taxonomy term
// link: https://wordpress.stackexchange.com/a/25035
//
function get_term_top_most_parent( $term, $taxonomy ) {
  $parent  = get_term( $term, $taxonomy );
  while ( $parent->parent != '0' ) {
    $term_id = $parent->parent;
    $parent  = get_term( $term_id, $taxonomy);
  }
  return $parent;
}

//
//
//
function getNonMainCategoriesFromList( $categories ){
  $ids = array_unique(wp_list_pluck($categories, 'term_id'));
  echo '$ids is [' . implode(',', $ids) . '] <br /><br />';
  //[3299,3116,3090,3018,2993,3088,3089,3287,3115,3117,3225,3121,2992,2994,3112]
  //$main_ids = getMainCategoryFromList( $categories );
  //echo '$main_ids is [' . implode(',', $main_ids) . '] <br /><br />';
  // foreach( $main_ids as $id ){
  //   unset( $ids[ array_search($id,$ids) ] );
  // }
  array_shift($ids);
  return $ids;
}

//
//
//
function getAdjacentProduct($product_id, $direction){
  // get_posts in same custom taxonomy
  $postlist_args = array(
     'posts_per_page'  => -1,
     'orderby'         => 'menu_order title',
     'order'           => 'ASC',
     'post_type'       => 'product',
     'product_cat'     => 'Spinach'
  );
  $postlist = get_posts( $postlist_args );

  // get ids of posts retrieved from get_posts
  $ids = array();
  foreach ($postlist as $thepost) {
     $ids[] = $thepost->ID;
  }
  //print_r($ids);

  // get and echo previous and next post in the same taxonomy
  $thisindex = array_search($product_id, $ids);
  $previd = $ids[$thisindex-1];
  $nextid = $ids[$thisindex+1];
  if ( !empty($previd) && $direction == 'prev' ) {
     echo get_permalink($previd);
  }
  if ( !empty($nextid) && $direction == 'next' ) {
     echo get_permalink($nextid);
  }
}

//
//
//
function truncate($input, $length = 100){
  return (strlen($input) > $length) ? substr($input,0,$length)."..." : $input;
}

//
//
//
function formatVariationName($string){
  //return preg_replace('-', ' ', $string);
  return ucwords(str_replace("-", " ", $string));
}

//
//
//
function getVimeoIdFromUrl($vimeo){
  if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $vimeo, $output_array)) {
    echo $output_array[5];
  }
}

//
//
//
function isLearn(){
  $post_types = array('post','webinar','guide','sfwd-courses','sfwd-lessons','sfwd-topic','sfwd-quiz','sfwd-question','sfwd-certificates','groups','sfwd-transactions','sfwd-essays','sfwd-assignment','wcpf_project','wcpf_item');
  if( (!is_front_page() && is_home())
    || is_page('Learn')
    || is_page('flourish-garden-club')
    || is_page('events')
    || is_singular($post_types)
    || is_category()
    || is_tag()
    || is_tax('guide_type')
    || is_post_type_archive($post_types) ) return true;
  return false;
}

function get_terms_id_by_post_type( $taxonomies, $post_types ) {
  global $wpdb;
  $query = $wpdb->get_col( "SELECT t.term_id from $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id WHERE p.post_type IN('" . join( "', '", $post_types ) . "') AND tt.taxonomy IN('" . join( "', '", $taxonomies ) . "') GROUP BY t.term_id");
  return $query;
}

function get_hierarchical_terms_by_post_type( $taxonomies, $post_types, $parent_slug = null ){
  $term_ids = get_terms_id_by_post_type( $taxonomies, $post_types );
  $term_list = ! empty($term_ids) ? implode(',', $term_ids) : false;
  $terms = get_terms( 'product_cat', array(
    'hide_empty' => false,
    'hierarchical' => true,
    'include' => $term_list,
    'orderby' => 'name',
    'order' => 'ASC'
  ) );
  $parents = wp_list_pluck( $terms, 'parent' );
  $parents = array_unique($parents);
  $hierarchical_terms = array();
  $parent_obj = get_term_by('slug', $parent_slug, 'product_cat');
  $offset = (!$parent_slug) ? ' &nbsp; &nbsp;' : '';
  foreach($parents as $parent){
    $current = get_term_by('id', $parent, 'product_cat');
    if($parent == 0 || $parent == null) continue;
    if( $parent_slug && ( $parent != $parent_obj->term_id ) ) continue; // if parent is passed in, don't show other children
    $current = get_term_by('id', $parent, 'product_cat');

    // if parent is passed in, don't include the parent itself
    if( !$parent_slug ){
      array_push($hierarchical_terms, array(
        'id' => $parent,
        'slug' => $current->slug,
        'name' => $current->name
      ));
    }

    foreach($terms as $term){
      if($term->parent == $parent){
         array_push($hierarchical_terms, array(
           'id' => $term->term_id,
           'slug' => $term->slug,
           'name' => $offset . $term->name
         ));
      }
    }
  }
  return $hierarchical_terms;
}


//
//
//
function formatCourseButtonText($string){
  if (strpos($string, 'log in or register') !== false) {
    $needle = 'log in or register';
    $haystack = '<span class="login-link">log in</span> or <span class="register-link">register</span>';
  } elseif (strpos($string, 'login or register') !== false) {
    $needle = 'login or register';
    $haystack = '<span class="login-link">login</span> or <span class="register-link">register</span>';
  } elseif (strpos($string, 'LOGIN or REGISTER') !== false) {
    $needle = 'LOGIN or REGISTER';
    $haystack = '<span class="login-link">LOGIN</span> or <span class="register-link">REGISTER</span>';
  }
  return str_replace($needle,$haystack,$string);
}

//
//
//
function generateCourseButtonText($id, $title, $type){
  $growing_course_id = get_field('growing_library_course', 'option');
  $flourish_course_id = get_field('flourish_garden_club_course', 'option');

  $text = get_field('default_course_sign_up_button_text', 'option');

  if( $id && $id == $growing_course_id ){
    $text = get_field('growing_library_course_sign_up_button_text', 'option');
  }

  if( $type && ($type != 'free' || $id == $flourish_course_id ) ){
    $text = get_field('paid_course_sign_up_button_text', 'option');
  }

  return formatCourseButtonText($text);
}
