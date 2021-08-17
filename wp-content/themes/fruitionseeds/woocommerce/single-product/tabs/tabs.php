<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper">
		<ul class="tabs wc-tabs" role="tablist">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<?php //echo '$key is: ' . $key; ?>
				<?php if( $key == 'additional_information' /*|| $key == 'ywtm_9722' || $key == 'ywtm_9717'*/ ) continue; ?>
				<li class="<?php echo esc_attr( $key ); ?> <?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', wrapReviewCount($product_tab['title']), $key ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>
			<?php get_template_part('template-parts/shop/product/tabs'); ?> <!-- CUSTOM -->
		</ul>
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<?php if( $key == 'additional_information' ) continue; ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php if($key == 'description'){

					get_template_part('template-parts/shop/product/panel_summary_title');
					get_template_part('template-parts/shop/product/panel_summary_notes');
					if ( isset( $product_tab['callback'] ) ) call_user_func( $product_tab['callback'], $key, $product_tab );
					get_template_part('template-parts/signature');

				} else {

					if ( isset( $product_tab['callback'] ) ) call_user_func( $product_tab['callback'], $key, $product_tab );

				} ?> <!-- CUSTOM -->

			</div>
		<?php endforeach; ?>
		<?php get_template_part('template-parts/shop/product/panels'); ?> <!-- CUSTOM -->
		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>
<?php endif; ?>
