<?php
/**
 * Template used to display post content.
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to storefront_loop_post action.
	 *
	 * @hooked storefront_post_header          - 10
	 * @hooked storefront_post_content         - 30
	 * @hooked storefront_post_taxonomy        - 40
	 */
	//do_action( 'storefront_loop_post' );
	//storefront_post_header();
	?>

	<div class="box" style="background:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; ?>) no-repeat center center #e3e3e3; background-size: cover;">
    <a href="<?php the_permalink(); ?>">
      <div class="title-box">
        <div class="line-2"><?php echo truncate(get_the_title(), 50); ?></div>
      </div>
    </a>
  </div>

</article><!-- #post-## -->
