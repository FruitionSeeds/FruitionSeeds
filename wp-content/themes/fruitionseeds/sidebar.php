<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package storefront
 */

// if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_archive() ) {
// if ( ! is_archive() ) {
// 	return;
// }
$tax = $wp_query->get_queried_object();
if( (get_post_type() == 'product' && $tax->slug == 'what-to-plant-now') || is_search()) return;

?>
<div id="secondary" class="widget-area product-cat-sidebar post-type-<?php echo get_post_type(); ?> tax-<?php echo $tax->slug; ?>" role="complementary">

	<?php if ( is_tax('product_cat') ) { ?>

		<?php echo do_shortcode('[wcpf_filters id="9426"]'); ?>

	<?php } elseif ( get_post_type() == 'post' ) { ?>

		<?php dynamic_sidebar( 'blog-filters' ); ?>

	<?php } elseif ( get_post_type() == 'product' || is_tax('product_cat') ) { ?>

		<?php dynamic_sidebar( 'product-sidebar' ); ?>

	<?php } elseif ( is_archive() && (get_post_type() == 'webinar' || get_post_type() == 'sfwd-courses') ) { ?>

		<?php //dynamic_sidebar( 'learn-filters' ); ?>

	<?php } else { ?>

		<?php echo do_shortcode('[wcpf_filters id="9426"]'); ?>

	<?php } ?>

</div><!-- #secondary -->
