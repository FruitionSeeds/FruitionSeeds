<?php
$files = get_field('files');
$image_id = $files[0]['image'];
$bg = wp_get_attachment_image_src($image_id, 'large')[0];
?>
<div class="box col-3" >
  <a style="background:url(<?php echo $bg; ?>) no-repeat top center #e3e3e3; background-size: cover;" href="<?php echo the_permalink(); ?>">
   <?php print_r($file); ?>
  </a>
</div>
