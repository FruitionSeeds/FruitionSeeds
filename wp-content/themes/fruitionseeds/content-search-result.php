<?php
/**
 * Template used to display post content.
 *
 * @package storefront
 */

?>

<div class="item posttype-<?php echo get_post_type(); ?>">
	<a class="thumbnail" href="<?php the_permalink(); ?>" style="<?php echo bgImgFromID($post->ID); ?>"></a>
	<a class="title" href="<?php the_permalink(); ?>">
    <?php echo truncate(get_the_title(), 50); ?>
  </a>
</div>
