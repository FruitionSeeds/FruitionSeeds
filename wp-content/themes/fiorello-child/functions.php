<?php

/*** Child Theme Function  ***/
add_action('wp_enqueue_scripts', function () {
    $parent_style = 'fiorello-mikado-default-style';
    wp_enqueue_style(
        'fiorello-mikado-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
    // Replace woocomm styles from parent theme
    if(fiorello_mikado_is_woocommerce_installed() && fiorello_mikado_load_woo_assets()) {
        wp_dequeue_style('fiorello-mikado-woo');
        wp_enqueue_style('fiorello-mikado-woo', get_stylesheet_directory_uri() . '/css/woocommerce.css');
        if(fiorello_mikado_is_responsive_on()) {
            wp_dequeue_style('fiorello-mikado-woo-responsive');
            wp_enqueue_style('fiorello-mikado-woo-responsive', get_stylesheet_directory_uri() . '/css/woocommerce-responsive.css');
        }
    }
    wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/script.js');

});

/*** Add "Pay For Order" capability to administrator role  ***/
add_action('init', function() {
    $role = get_role('administrator');
    $role->add_cap('pay_for_order', true);
}, 10);

/*** Add Continue Shopping and Proceed to Checkout button before cart table ***/
add_action('woocommerce_before_cart_table', function(){
    $shop_page_url = get_permalink(wc_get_page_id('shop'));
    $checkout_page_url = get_permalink(wc_get_page_id('checkout'));
    echo '<div class="woocommerce-cart-buttons clearfix">';
        echo '<a href="'.$shop_page_url.'" class="button">Continue Shopping</a>';
        echo '<a href="'.$checkout_page_url.'" class="button">Proceed to Checkout</a>';
    echo '</div>';
});

/* If the product is in stock, replace the availability with the phrase 'In stock' */
function custom_override_get_availability( $availability, $_product ) {
  if ( $_product->is_in_stock() ) $availability['availability'] = __('In stock', 'woocommerce');
  return $availability;
}
add_filter( 'woocommerce_get_availability', 'custom_override_get_availability', 10, 2);

/*
 * reset_default_shipping_method - This hook runs in the Checkout page on initialization, I'm overriding the default selection for shipping, which was Local PickUp, and setting it to the regular shipping method.
 */
function reset_default_shipping_method( $method, $available_methods ) {

    $method = 'wf_multi_carrier_shipping:flatrate_primary'; //wf_multi_carrier_shipping:flatrate_primary

    return $method;
}

add_filter('woocommerce_shipping_chosen_method', 'reset_default_shipping_method', 10, 2);

/*
 * add_localpickup_notes -
 */
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
//
//
function allow_mime_types( $mimes ) {
	$mimes['webp'] = 'image/webp';
	return $mimes;
}
add_filter( 'upload_mimes', 'allow_mime_types' );

//
//
//
// if ( !is_page('maintenance') && !is_admin() ) {
//   wp_redirect( 'https://www.fruitionseeds.com/maintenance/', 301 );
//   exit;
// }
