<?php
/**
 * Template used to display post content.
 *
 * @package storefront
 */

?>

<div class="item">
	<a class="thumbnail" href="<?php the_permalink(); ?>" style="background:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; ?>) no-repeat center center #e3e3e3; background-size: cover;">

  </a>
	<a class="title" href="<?php the_permalink(); ?>">
    <?php echo truncate(get_the_title(), 50); ?>
  </a>
</div>
