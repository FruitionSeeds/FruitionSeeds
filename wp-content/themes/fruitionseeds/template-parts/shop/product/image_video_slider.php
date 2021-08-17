<?php
global $product;
$slides = array();
$attachment_ids  = $product->get_gallery_image_ids();
$image_urls      = array();
$image_id        = $product->get_image_id();
if ( $image_id ) {
    $image_url = wp_get_attachment_image_url( $image_id, 'full' );
    $image_urls[ 0 ] = $image_url;
    array_unshift($attachment_ids, $image_id);
}
if( get_field('videos_urls') ){
  $video_urls = get_field('videos_urls');

  $slides[0] = $attachment_ids[0];
  array_shift($attachment_ids);
  $slides[1] = $video_urls[0];
  array_shift($video_urls);

  $slides = array_merge($slides, $attachment_ids, $video_urls);
} else {
  $slides = $attachment_ids;
}

?>
<div class="product-image-slider">
  <?php fruition_woocommerce_product_label(); ?>
  <script src="https://player.vimeo.com/api/player.js"></script>

  <ul id="thumbnails">
    <?php $i = 1; foreach($slides as $slide){ ?>
      <li>
        <a href="#slide<?php echo $i; ?>">
          <?php if( isset($slide['vimeo_url']) ){ ?>
            <div id="video-embed-<?php echo $i; ?>"></div>
            <script>
              var options<?php echo $i; ?> = {
                url: '<?php echo $slide['vimeo_url']; ?>',
                width: '100%',
                responsive: true
              };
              var video<?php echo $i; ?>Player = new Vimeo.Player('video-embed-<?php echo $i; ?>', options<?php echo $i; ?>);
            </script>
          <?php } else { ?>
            <img src="<?php echo wp_get_attachment_image_src($slide, 'large')[0]; ?>">
          <?php } ?>
        </a>
      </li>
    <?php $i++; } ?>
  </ul>
  <div class="thumb-box">
    <ul class="thumbs">
      <?php $i = 1; foreach($slides as $slide){ ?>
        <?php if( isset($slide['vimeo_url']) ){ ?>
          <li class="video-thumb" style="background:url(<?php echo $slide['thumbnail_url']; ?>) no-repeat center center; background-size: cover;">
            <a href="#<?php echo $i; ?>" data-slide="<?php echo $i; ?>">
              <i class="fas fa-play-circle"></i>
            </a>
          </li>
        <?php } else { ?>
          <li class="image-thumb" style="<?php echo bgImgFromID( $slide, 'thumbnail' ); ?>">
            <a href="#<?php echo $i; ?>" data-slide="<?php echo $i; ?>"></a>
          </li>
        <?php } ?>
      <?php $i++; } ?>
    </ul>
  </div>
</div>
