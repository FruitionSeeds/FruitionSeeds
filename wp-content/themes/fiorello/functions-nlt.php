<?php

/**
 * Owned by NLT
 * Starting to add random things here so that we can eventually
 * pull this directly out into the child theme, and split
 * things out appropriately.
 *
 * Also should reduce git conflicts.
 *
 * - Move fast and don't break things ;)
*/

// Would love to remove this from emails as well.
function remove_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Hi,', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'remove_howdy',25 );

/**
 * Disable page caching in WP Rocket.
 *
 * @link http://docs.wp-rocket.me/article/61-disable-page-caching
 */
add_filter( 'do_rocket_generate_caching_files', '__return_false' );

// Change color of admin bar based on environment
add_action('admin_head', function() {
    $color = 'purple'; // default if we aren't on bedrock
    if (defined('WP_ENV')) {
        switch (WP_ENV) {
            case 'production': $color = null; break; // no changes
            case 'development': $color = 'blue'; break;
            case 'staging': $color = 'green'; break;
            default: $color = 'red'; break; // should never get here
        }
    }
    if ($color) {
        echo "<style>#wpadminbar { background-color: $color; }</style>";
    }
});

/* NLT: Yoast Replacement */
if (! function_exists('yoast_breadcrumb') && function_exists( 'rank_math_the_breadcrumbs' ) ) {

    function yoast_breadcrumb($before, $after) {
        rank_math_the_breadcrumbs();
    }

}

/**
 * Function for adding Out Of Stock Template
 *
 * @return string
 */
function fiorello_mikado_woocommerce_product_out_of_stock() {
    global $product;
    $text = '';
    $default = 'Sold Out';

    // https://app.clickup.com/t/m8xtjc */
    if ( ! $product->is_in_stock() ) {
        $text = $default;
    }

    if (function_exists('get_field')) {
        $override_text = get_field( 'product_image_banner_text' );
        if ( $override_text ) {
            $text = $override_text;
        }
    }

    if ($text) {
        print '<span class="mkdf-out-of-stock">' . esc_html__( $text, 'fiorello' ) . '</span>';
    }
}

add_filter( 'woocommerce_product_thumbnails', 'fiorello_mikado_woocommerce_product_out_of_stock', 20 );
add_action( 'woocommerce_before_shop_loop_item_title', 'fiorello_mikado_woocommerce_product_out_of_stock', 10 );

/**
 * Disable appending the query string in the redirection URL.
 *
 * @param int $number
 */
add_filter( 'rank_math/redirection/add_query_string', '__return_false' );


