<?php

//
// Data Structure Functions
//



//
// Register Custom Taxonomy
//
function create_custom_taxonomy_guide_type() {
	$labels = array(
		'name'                       => _x( 'Guide Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Guide Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Guide Types', 'text_domain' ),
		'all_items'                  => __( 'All Guide Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		'rewrite'										 => array('slug' => 'learn/guides/type', 'with_front' => false),
	);
	register_taxonomy( 'guide_type', array( 'guide' ), $args );
}
add_action( 'init', 'create_custom_taxonomy_guide_type', 0 );

//
// Add the product category taxonomy to other post types
//
add_action( 'init', 'add_taxonomies_to_post_types' );
function add_taxonomies_to_post_types() {
  register_taxonomy_for_object_type( 'product_cat', 'webinar' );
  register_taxonomy_for_object_type( 'product_cat', 'guide' );
  register_taxonomy_for_object_type( 'product_cat', 'post' );
  register_taxonomy_for_object_type( 'product_cat', 'sfwd-courses' );

  //unregister_taxonomy_for_object_type( 'category', 'post' );
}





//
// Register Custom Post Type
//
function create_custom_post_type_blocks() {
	$labels = array(
		'name'                  => _x( 'Reusable Content Blocks', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Reusable Content Block', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Reusable Content Blocks', 'text_domain' ),
		'name_admin_bar'        => __( 'Reusable Content Block', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New Item', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Items', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Reusable Content Block', 'text_domain' ),
		'description'           => __( 'Reusable Content Blocks', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields', 'page-attributes'),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-screenoptions',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'reusable_blocks', $args );
}
add_action( 'init', 'create_custom_post_type_blocks', 0 );

//
// Register Custom Post Type
//
function create_custom_post_type_webinar() {
	$labels = array(
		'name'                  => _x( 'Webinars', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Webinar', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Webinars', 'text_domain' ),
		'name_admin_bar'        => __( 'Webinar', 'text_domain' ),
		'archives'              => __( 'Webinar Archives', 'text_domain' ),
		'attributes'            => __( 'Webinar Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Webinar:', 'text_domain' ),
		'all_items'             => __( 'All Webinars', 'text_domain' ),
		'add_new_item'          => __( 'Add New Webinar', 'text_domain' ),
		'add_new'               => __( 'Add New Webinar', 'text_domain' ),
		'new_item'              => __( 'New Webinar', 'text_domain' ),
		'edit_item'             => __( 'Edit Webinar', 'text_domain' ),
		'update_item'           => __( 'Update Webinar', 'text_domain' ),
		'view_item'             => __( 'View Webinar', 'text_domain' ),
		'view_items'            => __( 'View Webinars', 'text_domain' ),
		'search_items'          => __( 'Search Webinars', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into webinar', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this webinar', 'text_domain' ),
		'items_list'            => __( 'Webinars list', 'text_domain' ),
		'items_list_navigation' => __( 'Webinars list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter webinars list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Webinar', 'text_domain' ),
		'description'           => __( 'Webinar descriptive summary', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'product_cat' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'								=> array('slug' => 'learn/webinars'),
	);
	register_post_type( 'webinar', $args );
}
add_action( 'init', 'create_custom_post_type_webinar', 0 );

//
// Register Custom Post Type
//
function create_custom_post_type_guides() {
	$labels = array(
		'name'                  => _x( 'Guides', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Guide', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Guides', 'text_domain' ),
		'name_admin_bar'        => __( 'Guide', 'text_domain' ),
		'archives'              => __( 'Guide Archives', 'text_domain' ),
		'attributes'            => __( 'Guide Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Guide:', 'text_domain' ),
		'all_items'             => __( 'All Guides', 'text_domain' ),
		'add_new_item'          => __( 'Add New Guide', 'text_domain' ),
		'add_new'               => __( 'Add New Guide', 'text_domain' ),
		'new_item'              => __( 'New Guide', 'text_domain' ),
		'edit_item'             => __( 'Edit Guide', 'text_domain' ),
		'update_item'           => __( 'Update Guide', 'text_domain' ),
		'view_item'             => __( 'View Guide', 'text_domain' ),
		'view_items'            => __( 'View Guides', 'text_domain' ),
		'search_items'          => __( 'Search Guides', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into guide', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this guide', 'text_domain' ),
		'items_list'            => __( 'Guides list', 'text_domain' ),
		'items_list_navigation' => __( 'Guides list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter guides list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Guide', 'text_domain' ),
		'description'           => __( 'Guide descriptive summary', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', 'featured_image' ),
		'taxonomies'            => array( 'product_cat' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-media-document',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'								=> array('slug' => 'learn/guides'),
	);
	register_post_type( 'guide', $args );
}
add_action( 'init', 'create_custom_post_type_guides', 0 );

//
// Rename Wordpress's Blog Category Taxonomy - to differentiate between product categories
//
function change_blog_category_object() {
  global $wp_taxonomies;
  $labels = &$wp_taxonomies['category']->labels;
  $labels->name = 'Blog Category';
  $labels->singular_name = 'Blog Categories';
  $labels->add_new = 'Add Blog Category';
  $labels->add_new_item = 'Add Blog Category';
  $labels->edit_item = 'Edit Blog Category';
  $labels->new_item = 'Blog Category';
  $labels->view_item = 'View Blog Category';
  $labels->search_items = 'Search Blog Categories';
  $labels->not_found = 'No Blog Categories found';
  $labels->not_found_in_trash = 'No Blog Categories found in Trash';
  $labels->all_items = 'All Blog Categories';
  $labels->menu_name = 'Blog Categories';
  $labels->name_admin_bar = 'Blog Category';
}
add_action( 'init', 'change_blog_category_object' );

//
// Rename WooCommerce's Product Category Taxonomy - to differentiate between blog categories
//
function change_product_category_object() {
  global $wp_taxonomies;
  $labels = &$wp_taxonomies['product_cat']->labels;
  $labels->name = 'Product Category';
  $labels->singular_name = 'Product Categories';
  $labels->add_new = 'Add Product Category';
  $labels->add_new_item = 'Add Product Category';
  $labels->edit_item = 'Edit Product Category';
  $labels->new_item = 'Product Category';
  $labels->view_item = 'View Product Category';
  $labels->search_items = 'Search Product Categories';
  $labels->not_found = 'No Product Categories found';
  $labels->not_found_in_trash = 'No Product Categories found in Trash';
  $labels->all_items = 'All Product Categories';
  $labels->menu_name = 'Product Categories';
  $labels->name_admin_bar = 'Product Category';
}
add_action( 'init', 'change_product_category_object' );


//
// Force Product Category to show in rest API (i.e. sidebar in edit page)
//
function wc_product_category_add_tax_to_api() {
  $mytax = get_taxonomy( 'product_cat' );
  $mytax->show_in_rest = true;
}
add_action( 'init', 'wc_product_category_add_tax_to_api', 30 );

//
//
//
add_filter( 'post_post_type_args', '_my_rewrite_slug' );
  function _my_rewrite_slug( $args ) {
  $args['rewrite']['slug'] = 'learn/blog';
  return $args;
}

//
//
//
// function update_product_cat_taxonony() {
// 	$args = array(
// 		'show_admin_column' => true,
// 		'show_in_quick_edit' => true
// 	);
// 	register_taxonomy( 'product_cat', array( 'guide', 'webinar', 'post', 'sfwd-courses' ), $args );
// }
// add_action( 'init', 'update_product_cat_taxonony', 0 );

add_filter( 'manage_webinar_posts_columns', 'fruition_filter_webinar_columns' );
function fruition_filter_webinar_columns( $columns ) {
  $columns['product_cat'] = __( 'Product Category' );
  return $columns;
}

add_action( 'manage_webinar_posts_custom_column', 'fruition_webinar_column', 10, 2);
function fruition_webinar_column( $column, $post_id ) {
  if ( 'product_cat' === $column ) echo join(', ', wp_list_pluck(get_the_terms( $post_id, 'product_cat' ), 'name'));
}

//

add_filter( 'manage_guide_posts_columns', 'fruition_filter_guide_columns' );
function fruition_filter_guide_columns( $columns ) {
  $columns['product_cat'] = __( 'Product Category' );
  return $columns;
}

add_action( 'manage_guide_posts_custom_column', 'fruition_guide_column', 10, 2);
function fruition_guide_column( $column, $post_id ) {
  if ( 'product_cat' === $column ) echo join(', ', wp_list_pluck(get_the_terms( $post_id, 'product_cat' ), 'name'));
}

//

add_filter( 'manage_post_posts_columns', 'fruition_filter_post_columns' );
function fruition_filter_post_columns( $columns ) {
  $columns['product_cat'] = __( 'Product Category' );
  return $columns;
}

add_action( 'manage_post_posts_custom_column', 'fruition_post_column', 10, 2);
function fruition_post_column( $column, $post_id ) {
  if ( 'product_cat' === $column ) echo join(', ', wp_list_pluck(get_the_terms( $post_id, 'product_cat' ), 'name'));
}

//

add_filter( 'manage_sfwd-courses_posts_columns', 'fruition_filter_sfwdcourses_columns' );
function fruition_filter_sfwdcourses_columns( $columns ) {
  $columns['product_cat'] = __( 'Product Category' );
  return $columns;
}

add_action( 'manage_sfwd-courses_posts_custom_column', 'fruition_sfwdcourses_column', 10, 2);
function fruition_sfwdcourses_column( $column, $post_id ) {
  if ( 'product_cat' === $column ) echo join(', ', wp_list_pluck(get_the_terms( $post_id, 'product_cat' ), 'name'));
}



?>
