<section class="download-form" style="<?php echo bgImgFromID( get_field('form_bg_img'), 'full' ); ?>">
  <div class="row">
    <div class="col-0 col-lg-5 col-md-7"></div>
    <div class="col-12 col-lg-7 col-md-5">
      <div class="form-wrapper">
        <div class="title"><?php the_field('form_title'); ?></div>
        <div class="subtitle"><?php the_field('form_subtitle'); ?></div>
        <?php get_template_part( 'template-parts/learn/growing_library_signup' ); ?>
      </div>
    </div>
  </div>
</section>
