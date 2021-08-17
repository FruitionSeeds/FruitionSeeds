<?php if(get_field('files')){ ?>
  <section class="growing-guide">
    <div class="instructions">
      <?php the_field('webinar_page_growing_guide_instructions', 'options'); ?>
    </div>
    <div class="thumbnails">
      <?php
      $files = get_field('files');
      $i = 1;
      foreach( $files as $file ){
        if( $i > 4 ) break; ?>
        <div id="gg-btn-<?php echo $i; ?>" class="item dialog-btn" data-number="<?php echo $i; ?>">
          <img class="" src="<?php echo wp_get_attachment_image_src($file['image'], 'large')[0]; ?>" alt="Thumbnail of Growing Guide for <?php the_title(); ?>" />
        </div>
        <div id="gg-div-<?php echo $i; ?>" class="dialog-div">
          <img class="" src="<?php echo wp_get_attachment_image_src($file['image'], 'full')[0]; ?>" alt="Growing Guide for <?php the_title(); ?>" width="750" height="970" />
        </div>
      <?php $i++;
      } ?>
    </div>
  </section>
<?php } ?>
