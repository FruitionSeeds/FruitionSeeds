<?php
require_once(__DIR__ . '/inc/utils.php');                   // Utility Functions
require_once(__DIR__ . '/inc/data.php');                    // Data Structure (i.e. custom posts, taxonomies, etc)
require_once(__DIR__ . '/inc/shortcodes.php');              // Shortcodes container/executer
require_once(__DIR__ . '/inc/klaviyo_integration.php');     // Functions to integrate with Klaviyo

//
// Child Theme CSS & JS Files
//
function fs_enqueue_files() {
  wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/dist/css/style.min.css', array(), '1.24');
  wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/main.js', array('jquery', 'jqueryui', 'slippry', 'slick'), '1.8');
}
add_action('wp_enqueue_scripts', 'fs_enqueue_files');

//
// Bootstrap CSS
//
function fs_enqueue_bootstrap() {
  wp_enqueue_style('datatables', get_stylesheet_directory_uri() . '/vendor/bootstrap/bootstrap.min.css');
  //wp_enqueue_script('datatables', get_stylesheet_directory_uri() . '/vendor/bootstrap/bootstrap.bundle.min.js');
}
add_action('wp_enqueue_scripts', 'fs_enqueue_bootstrap');

//
// Slippry jQuery Plugin - For slideshows on Shop and Learn pages
//
function fs_enqueue_slippry() {
  wp_enqueue_style('slippry', get_stylesheet_directory_uri() . '/vendor/slippry/slippry.css');
  wp_enqueue_script('slippry', get_stylesheet_directory_uri() . '/vendor/slippry/slippry.min.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'fs_enqueue_slippry');

//
// Slick jQuery Plugin - For carousels on various pages
//
function fs_enqueue_slick() {
  wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/vendor/slick/slick.css');
  wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/vendor/slick/slick.min.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'fs_enqueue_slick');

//
// jQuery UI
//
function fs_enqueue_jqueryui() {
  wp_enqueue_style('jqueryui', get_stylesheet_directory_uri() . '/vendor/jquery-ui/jquery-ui.min.css');
  wp_enqueue_script('jqueryui', get_stylesheet_directory_uri() . '/vendor/jquery-ui/jquery-ui.min.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'fs_enqueue_jqueryui');


//
// Admin Theme CSS & JS Files
//

function enqueuing_admin_scripts(){
  wp_enqueue_style('fs-admin-css', get_stylesheet_directory_uri().'/dist/css/admin.min.css');
  wp_enqueue_script('fs-admin-script', get_stylesheet_directory_uri().'/dist/js/admin.js', array('jquery'));
}
add_action( 'admin_enqueue_scripts', 'enqueuing_admin_scripts' );

//
//
//

function enqueuing_login_scripts() {
  wp_enqueue_style( 'fs-login-css', get_stylesheet_directory_uri() . '/dist/css/login.min.css' );
}
add_action( 'login_enqueue_scripts', 'enqueuing_login_scripts' );

//
// Create Fruition Seed's Theme Options Page
//

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
		'page_title' 	=> 'Fruition Seeds',
		'menu_title'	=> 'Fruition Seeds',
		'menu_slug' 	=> 'fruition_seeds_config',
		'capability'	=> 'manage_options',
    'icon_url'    => 'dashicons-carrot',
    'position'    => 3
	));
}

//
// Create Widget Areas
//
if ( function_exists('register_sidebar') ){

  register_sidebar(array(
    'name' => 'Course Filters',
    'id' => 'course-filters',
    'before_widget' => '<div class="course-filters widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'name' => 'Learn Filters',
    'id' => 'learn-filters',
    'before_widget' => '<div class="learn-filters widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'name' => 'Blog Filters',
    'id' => 'blog-filters',
    'before_widget' => '<div class="blog-filters widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'name' => 'Products Sidebar',
    'id' => 'product-sidebar',
    'before_widget' => '<div class="product-sidebar widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

}

//
// Remove Widget Areas
//
function register_widget_footer_column_5() {
  unregister_sidebar('header-1');
  unregister_sidebar('footer-1');
  unregister_sidebar('footer-2');
  unregister_sidebar('footer-3');
  unregister_sidebar('footer-4');
  unregister_sidebar('footer-5');
  register_sidebar(
    array(
      'id' => 'footer-column-1',
      'name' => esc_html__( 'Footer Column 1', 'fruition-seeds' ),
      'description' => esc_html__( 'Footer widget', 'fruition-seeds' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
      'after_title' => '</h3></div>'
    )
  );
  register_sidebar(
    array(
      'id' => 'footer-column-2',
      'name' => esc_html__( 'Footer Column 2', 'fruition-seeds' ),
      'description' => esc_html__( 'Footer widget', 'fruition-seeds' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
      'after_title' => '</h3></div>'
    )
  );
  register_sidebar(
    array(
      'id' => 'footer-column-3',
      'name' => esc_html__( 'Footer Column 3', 'fruition-seeds' ),
      'description' => esc_html__( 'Footer widget', 'fruition-seeds' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
      'after_title' => '</h3></div>'
    )
  );
  register_sidebar(
    array(
      'id' => 'footer-column-4',
      'name' => esc_html__( 'Footer Column 4', 'fruition-seeds' ),
      'description' => esc_html__( 'Footer widget', 'fruition-seeds' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
      'after_title' => '</h3></div>'
    )
  );
  register_sidebar(
    array(
      'id' => 'footer-column-5',
      'name' => esc_html__( 'Footer Column 5', 'fruition-seeds' ),
      'description' => esc_html__( 'Footer widget', 'fruition-seeds' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
      'after_title' => '</h3></div>'
    )
  );
  register_sidebar(
    array(
      'id' => 'footer-bottom-row',
      'name' => esc_html__( 'Footer Bottom Row', 'fruition-seeds' ),
      'description' => esc_html__( 'Footer widget', 'fruition-seeds' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
      'after_title' => '</h3></div>'
    )
  );
}
add_action( 'widgets_init', 'register_widget_footer_column_5', 11 );


//
// Create Menu Locations
//
function fs_custom_menu_locations() {
  unregister_nav_menu('primary');
  unregister_nav_menu('secondary');
  unregister_nav_menu('handheld');
  register_nav_menu('primary-menu-left',__( 'Primary Menu Left' ));
  register_nav_menu('primary-menu-right',__( 'Primary Menu Right' ));
  register_nav_menu('secondary-menu',__( 'Secondary Menu' ));
  register_nav_menu('top-bar-left',__( 'Top Bar Left Menu' ));
  register_nav_menu('footer-left-menu',__( 'Footer Left Menu' ));
  register_nav_menu('footer-center-menu',__( 'Footer Center Menu' ));
  register_nav_menu('footer-right-menu',__( 'Footer Right Menu' ));
  register_nav_menu('shop-menu',__( 'Shop Menu' ));
  register_nav_menu('learn-menu',__( 'Learn Menu' ));
  register_nav_menu('mobile-main-menu',__( 'Mobile Main Menu' ));
}
add_action( 'init', 'fs_custom_menu_locations' );

//
// Allow svg filetypes
//
function custom_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  $mimes['webp'] = 'image/webp';

  return $mimes;
}
add_filter( 'upload_mimes', 'custom_mime_type' );

//
// Remove breadcrumbs from the default location (to add them manually elsewhere)
//
function wc_remove_storefront_breadcrumbs() {
  remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10 );
}
add_action( 'init', 'wc_remove_storefront_breadcrumbs');

//
// WooCommerce Breadcrumps
//
function woocommerce_breadcrumbs() {
  return array(
    'delimiter'   => ' | ',
    'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
    'wrap_after'  => '</nav>',
    'before'      => '',
    'after'       => '',
    'home'        => null,
  );
}
add_filter( 'woocommerce_breadcrumb_defaults', 'woocommerce_breadcrumbs' );

//
// Remove Price from Product Category Archive page
//
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

//
// Remove "Select options" button from (variable) products on WooCommerce shop page or category pages.
//
add_filter( 'woocommerce_loop_add_to_cart_link', function( $product ) {
	global $product;
	if ( is_shop() && 'variable' === $product->product_type ) {
		return '';
	} else {
		sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( $product->add_to_cart_text() )
		);
	}
} );

//
// Remove related products from product page
//
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

//
// Create [fruition_block] Shortcode to inserting reusable blocks of content into other pages/posts
//
add_shortcode( 'fruition_block', 'reusable_block_shortcode' );

//
// Create [plant_now_tabs] Shortcode
//
add_shortcode( 'plant_now_tabs', 'plant_now_shortcode' );

//
// Create [growing_guide_slider] Shortcode
//
add_shortcode( 'growing_guides_slider', 'growing_guides_shortcode' );

//
//
//
add_action('init','remove_parent_theme_items');
function remove_parent_theme_items() {
  remove_action( 'storefront_post_content_before', 'storefront_post_thumbnail', 10 );
  remove_action( 'storefront_single_post_bottom', 'storefront_post_nav', 10 );
}

//
//
//
function storefront_remove_google_fonts() {
  wp_dequeue_style( 'storefront-fonts' );
}
add_action( 'wp_enqueue_scripts', 'storefront_remove_google_fonts', 100);

//
//
//
function my_custom_my_account_menu_items( $items ) {
	$new_items = array();
  $new_items['subscriptions'] = __( 'Recurring Charges', 'woocommerce' );
  $new_items['my-courses'] = __( 'Courses', 'woocommerce' );
  $new_items['my-wishlist'] = __( 'Wishlist', 'woocommerce' );
	return my_custom_insert_after_helper( $items, $new_items, 'orders' );
}
add_filter( 'woocommerce_account_menu_items', 'my_custom_my_account_menu_items' );

//
//
//
function my_custom_insert_after_helper( $items, $new_items, $after ) {
	$position = array_search( $after, array_keys( $items ) ) + 1;
	$array = array_slice( $items, 0, $position, true );
	$array += $new_items;
	$array += array_slice( $items, $position, count( $items ) - $position, true );
  return $array;
}


//
//
//
// ** DO NOT UNCOMMENT THIS IN PRODUCTION **
// load_all_vimeo_thumbnails -
//
// function load_all_vimeo_thumbnails() {
//   $args = array(
//     'post_type' => 'product',
//     'numberposts' => -1
//   );
//   $all_posts = get_posts($args);
//   foreach ($all_posts as $single_post){
// 		$videos_urls = get_field('videos_urls', $single_post->ID);
//     if( have_rows('videos_urls', $single_post->ID) ):
//         while( have_rows('videos_urls', $single_post->ID) ) : the_row();
//             $vimeo_url = get_sub_field('vimeo_url');
//             $thumbnail_url = get_sub_field('thumbnail_url');
//             if(($vimeo_url && !$thumbnail_url)){
//               $id  =  substr(strrchr($vimeo_url, '/'), 1 );
//               $vimeo = unserialize(file_get_contents('http://vimeo.com/api/v2/video/'.$id.'.php'));
//               $medium = $vimeo[0]['thumbnail_medium'];
//               update_sub_field('thumbnail_url', $medium);
//             }
//         endwhile;
//     endif;
//     //wp_update_post( $single_post );
// 		do_action( 'acf/save_post', $single_post->ID );
// 		do_action( 'acf/validate_save_post', $single_post->ID );
//   }
// }
// add_action( 'wp_loaded', 'load_all_vimeo_thumbnails' );

//
// ** DO NOT UNCOMMENT THIS IN PRODUCTION **
// load_all_vimeo_thumbnails -
//
// function load_all_vimeo_thumbnails() {
//   $args = array(
//     'post_type' => 'product',
//     'numberposts' => -1,
//     'include' => array(8607)
//   );
//   $all_posts = get_posts($args);
//   foreach ($all_posts as $single_post){
//     $existing_rows = get_field('videos_urls', $single_post->ID);
//     if( !empty($existing_rows) ){
//       for( $index = count($existing_rows); $index > 0; $index-- ){
//         delete_row('videos_urls', $index, $single_post->ID);
//       }
//     }
// 		do_action( 'acf/save_post', $single_post->ID );
// 		do_action( 'acf/validate_save_post', $single_post->ID );
//   }
// }
// add_action( 'wp_loaded', 'load_all_vimeo_thumbnails' );

//
//
//

if ( ! function_exists( 'woocommerce_subcategory_thumbnail' ) ) {

	/**
	 * Show subcategory thumbnails.
	 *
	 * @param mixed $category Category.
	 */
	function woocommerce_subcategory_thumbnail( $category ) {
		$small_thumbnail_size   = apply_filters( 'subcategory_archive_thumbnail_size', 'woocommerce_thumbnail' );
		$dimensions             = wc_get_image_size( $small_thumbnail_size );
    $default_thumbnail_id   = get_term_meta( $category->term_id, 'thumbnail_id', true );
    $override_thumbnail_id  = get_field( 'thumbnail_image', 'product_cat_' . $category->term_id );

    if ( $override_thumbnail_id ) {
			$image        = wp_get_attachment_image_src( $override_thumbnail_id, $small_thumbnail_size );
			$image        = $image[0];
			$image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $override_thumbnail_id, $small_thumbnail_size ) : false;
			$image_sizes  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $override_thumbnail_id, $small_thumbnail_size ) : false;
		} else if ( $default_thumbnail_id ) {
			$image        = wp_get_attachment_image_src( $default_thumbnail_id, $small_thumbnail_size );
			$image        = $image[0];
			$image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $default_thumbnail_id, $small_thumbnail_size ) : false;
			$image_sizes  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $default_thumbnail_id, $small_thumbnail_size ) : false;
		} else {
			$image        = wc_placeholder_img_src();
			$image_srcset = false;
			$image_sizes  = false;
		}

		if ( $image ) {
			$image = str_replace( ' ', '%20', $image );
      echo '<div class="img-container" style="background:url(' . esc_url( $image ) . ') no-repeat center center;background-size:cover;"></div>';
		}
	}
}

//
//
//
remove_action( 'storefront_page', 'storefront_page_header', 10 );

//
// Display landing page content for visitors on the course page
//
add_action(
  'learndash-course-after',
  function( $post_id ) {
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) echo get_template_part('template-parts/learn/courses/congratulations');
    if( !sfwd_lms_has_access($post_id) ){
      echo get_template_part('template-parts/learn/courses/visitors');
    }
  }
);

add_action(
  'learndash-course-before',
  function( $post_id ) {
    if( sfwd_lms_has_access($post_id) ) echo get_template_part('template-parts/learn/courses/enrollees');
  }
);

//
//
//
function myprefix_search_posts_per_page($query) {
  if ( $query->is_search ) $query->set( 'posts_per_page', '20' );
  return $query;
}
add_filter( 'pre_get_posts','myprefix_search_posts_per_page' );

//
//
//
add_action(
  'learndash-lesson-row-title-before',
  function( $post_id ) {
    echo '<style>
    .ld-lesson-item-'.$post_id.' .ld-item-name .ld-item-title:before {
      display: block; content: ""; width: 100px; height: 70px; float: left; margin-right: 15px;'.bgImgFromID( get_post_thumbnail_id( $post_id ) ).'
    }
    </style>';
  }
);

//
//
//
function wpdocs_theme_setup() {
  add_image_size( 'square-thumb', 300, 300, true );
  add_image_size( 'guide-thumb', 348, 450, true );
  add_image_size( 'guide-full', 1500, 1500, false );
  add_image_size( 'page-banner', null, 300, true );
  remove_image_size( '1536x1536' );
  remove_image_size( '2048x2048' );
}
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );

//
// When a user registers, check the URL for a redirect parameter and send them there instead of to their account pages
//
function filter_woocommerce_registration_redirect( $var ) {
  if(strpos($var, 'redirect_to') !== false){
    return substr($var, strpos($var, "redirect_to=") + 12);
  } else {
    return $var;
  }
};
add_filter( 'woocommerce_registration_redirect', 'filter_woocommerce_registration_redirect', 10, 1 );

//
// When a user enrolls in a course, add them to a segment in Klaviyo
//
add_action(
  'learndash_update_course_access',
  function( $user_id, $course_id, $course_access_list, $remove ) {
    $user_info = get_userdata($user_id);
    $courses = learndash_user_get_enrolled_courses($user_id);
    $coursesArr = array();
    foreach($courses as $course){
      $coursesArr[] = preg_replace( "/[^A-Za-z0-9 ]/", '', html_entity_decode( get_the_title( $course )));
    }
    updateUserCoursesInKlaviyo($user_info->user_email, implode(', ', $coursesArr));
  },
  10,
  4
);

//
// When a user's subscription has ended, update their courses in Klaviyo
//
// add_action(
//   'woocommerce_scheduled_subscription_end_of_prepaid_term',
//   function( $subscription_id ) {
//     $subscription = new WC_Subscription( $subscription_id );
//     $user_id = $subscription->get_user_id();
//     $user_info = get_userdata($user_id);
//     $courses = learndash_user_get_enrolled_courses($user_id);
//     $coursesArr = array();
//     foreach($courses as $course){
//       $coursesArr[] = preg_replace( "/[^A-Za-z0-9 ]/", '', html_entity_decode( get_the_title( $course )));
//     }
//     updateUserCoursesInKlaviyo($user_info->user_email, implode(', ', $coursesArr));
//   },
//   10,
//   4
// );

//
// After a user registers on the site, sign them up to receive our emails.
//
function post_registration_klaviyo_subscription( $user_id ){
  $user_info = get_userdata($user_id);
  registerUsersToNewsletter($user_info->user_email, $user_info->first_name, $user_info->last_name);
}
add_action( 'user_register', 'post_registration_klaviyo_subscription', 10, 1 );

//
// Search Filters
//
add_action( 'pre_get_posts', function( WP_Query $q ){
  if( !is_admin() && $q->is_main_query() && $q->is_search() ){
    $search_type = $_GET['search_type'];
    $sort = $_GET['sort'];
    $q->set( 'post_type', array('product','post','webinar') );
    if( isset( $_GET['search_type'] ) && $search_type == 'shop' ){
      $q->set( 'post_type', array('product') );
    } elseif( isset( $_GET['search_type'] ) && $search_type == 'learn' ){
      $q->set( 'post_type', array('post','webinar') );
    }
    if( isset( $sort )){
      switch ($sort) {
        case 'alpha':
          $q->set( 'orderby', 'title' );
          $q->set( 'order', 'ASC' );
          break;
        case 'alphaRev':
          $q->set( 'orderby', 'title' );
          $q->set( 'order', 'DESC' );
          break;
        case 'dateNew':
          $q->set( 'orderby', 'date' );
          $q->set( 'order', 'ASC' );
          break;
        case 'dateOld':
          $q->set( 'orderby', 'date' );
          $q->set( 'order', 'DESC' );
          break;
      }
    }
  }
});

function add_cors_http_header(){
  header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header');

//
// reset_default_shipping_method - This hook runs in the Checkout page on initialization, I'm overriding the default selection for shipping, which was Local PickUp, and setting it to the regular shipping method.
//
function reset_default_shipping_method( $method, $available_methods ) {
  $method = 'wf_multi_carrier_shipping:flatrate_primary';
  return $method;
}
add_filter('woocommerce_shipping_chosen_method', 'reset_default_shipping_method', 10, 2);

//
//
//
function shipstation_custom_field_2() {
	return 'local_pickup_note';
}
add_filter( 'woocommerce_shipstation_export_custom_field_2', 'shipstation_custom_field_2' );

//
//
//
function shipstation_custom_field_3() {
	return 'wholesale_note';
}
add_filter( 'woocommerce_shipstation_export_custom_field_3', 'shipstation_custom_field_3' );

//
// allow_mime_types
//
function allow_mime_types( $mimes ) {
	$mimes['webp'] = 'image/webp';
	return $mimes;
}
add_filter( 'upload_mimes', 'allow_mime_types' );

//
// add_localpickup_notes
//
function add_localpickup_notes( $order_id = null,  $posted_data = null,  $order = null  ) {
  $is_local = $is_wholesale = false;
  $order = wc_get_order( $order_id );
  foreach( $order->get_items( 'shipping' ) as $item_id => $item ){
    $item_data = $item->get_data();
    if($item->get_method_id() == 'local_pickup'){
      $is_local = true;
    }
  }

  $user_meta = get_userdata($order->get_user_id());
  $user_roles_str = implode(',', $user_meta->roles);

  if( strpos($user_roles_str, 'wholesale') !== false ){
    $is_wholesale = true;
  }

  if($is_local){
    $note = 'Local Pick Up: This order is for local pick up.';
    $order->add_order_note($note);
    update_field('local_pickup_note', $note, $order_id );
  }

  if($is_wholesale){
    $note = 'Wholesale Account Order';
    update_field('wholesale_note', $note, $order_id );
  }
}
add_action( 'woocommerce_checkout_order_processed', 'add_localpickup_notes',  1, 1  );


//
// Add "Pay For Order" capability to administrator role
//
add_action('init', function() {
    $role = get_role('administrator');
    $role->add_cap('pay_for_order', true);
}, 10);

//
// Shipping logic for heavy items
//
/*
function add_weight_surcharge($rates, $package) {
	$debug = '1 - ';
	$weight_surcharge_a = 0;
	$weight_surcharge_b = 0;
	foreach (WC()->cart->get_cart() as $cart_item){
		if($cart_item['data']->get_weight() >= 10 && $cart_item['data']->get_weight() < 20){
			$weight_surcharge_a = 10*$cart_item['quantity'];
		}
		if($cart_item['data']->get_weight() >= 20){
			$weight_surcharge_b = 15*$cart_item['quantity'];
		}
	}
	foreach($rates as $key => $rate){
		if( $rates[$key]->method_id != 'local_pickup'
			&& $rates[$key]->method_id != 'free_shipping' )
				$rates[$key]->cost = $rates[$key]->cost + $weight_surcharge_a + $weight_surcharge_b;
	}
    return $rates;
}
add_filter('woocommerce_package_rates', 'add_weight_surcharge', 10, 2);

//
//
*/


add_filter( 'woocommerce_package_rates', 'additional_shipping_weight_costs', 10, 2 );
function additional_shipping_weight_costs( $rates, $package ) {
    $extra_cost   = (10 + 0); // Here define your extra shipping fee
    $total_weight = WC()->cart->get_cart_contents_weight(); // Get total weight

    if ( $total_weight > 10 ) {
        // Loop through available shipping rates
        foreach( $rates as $rate_key => $rate ){
            // Excluding free shipping methods
            if( 'free_shipping' !== $rate->method_id ){
                $has_taxes    = false; // Initializing
                $taxes        = array(); // Initializing

                $initial_cost = $rate->cost;
                $new_cost     = $rate->cost + $extra_cost;

                $rates[$rate_key]->cost = $new_cost;
            }
        }
    }
    return $rates;
}


//
//
//
function fruition_woocommerce_product_label() {
	global $product;
  $text = '';

  if ( ! $product->is_in_stock() ) $text = get_field( 'out_of_stock_default_notice', 'option' );

  if ( get_field( 'banner_text' ) ) $text = get_field( 'banner_text' );

  if ($text) print '<span class="product-label out-of-stock">' . $text . '</span>';
}
add_filter( 'woocommerce_product_thumbnails', 'fruition_woocommerce_product_label', 99 );
add_action( 'woocommerce_before_shop_loop_item_title', 'fruition_woocommerce_product_label', 99 );
