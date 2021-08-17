<section class="section story" style="<?php echo bgImgFromID( get_field('story_bg_image'), null, 'top', 'left', 'contain', 'transparent' ); ?>">
  <div class="container">
    <div class="row">
      <div class="col-10 offset-1 col-sm-6 offset-sm-3">
        <p class="title"><?php the_field('story_title'); ?></p>
        <div class="description"><?php the_field('story_body'); ?></div>
        <button class="link" data-link="<?php the_field('story_button_link'); ?>"><?php echo the_field('story_button_text'); ?></button>
      </div>
    </div>
  </div>
</section>
