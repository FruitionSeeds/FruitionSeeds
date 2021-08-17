<section class="section ebook bg-image" style="<?php echo bgImgFromID( get_field('ebook_bg_image') ); ?>">
  <div class="container">
    <div class="row">
      <div class="col-10 offset-1 col-md-6 offset-md-0">
        <p class="title"><?php the_field('ebook_title'); ?></p>
        <div class="description"><?php the_field('ebook_body'); ?></div>
      </div>
      <div class="col-10 offset-1 col-md-6 offset-md-0">
        <?php echo the_field('ebook_signup_form'); ?>
      </div>
    </div>
  </div>
</section>
