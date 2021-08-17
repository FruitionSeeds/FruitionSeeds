<section class="section">
  <div class="boxes row">
    <?php $boxes = get_field('boxes'); ?>
    <?php foreach( $boxes as $box ) {
      $bg = wp_get_attachment_image_src($box['thumb_img'], 'medium')[0]; ?>
      <div class="col-4">
        <div class="box" style="background:url(<?php echo $bg; ?>) no-repeat center center #DBE5AC; background-size: cover;">
          <a href="<?php echo $box['link']; ?>">
            <div class="title-box">
              <div class="line-1"><?php echo $box['title_line_1']; ?></div>
              <div class="line-2"><?php echo $box['title_line_2']; ?></div>
            </div>
          </a>
        </div>
      </div>
    <?php } ?>
  </div>
</section>
