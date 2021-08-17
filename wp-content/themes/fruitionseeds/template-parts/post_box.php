<div class="col-4">
  <div class="box" style="background:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; ?>) no-repeat center center #e3e3e3; background-size: cover;">
    <a href="<?php the_permalink(); ?>">
      <div class="title-box">
        <div class="line-2"><?php echo truncate(get_the_title(), 45); ?></div>
      </div>
    </a>
  </div>
</div>
