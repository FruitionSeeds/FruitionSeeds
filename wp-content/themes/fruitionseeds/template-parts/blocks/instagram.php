<section class="section instagram">
  <div class="container">
    <div class="row">
      <div class="col">
        <p class="title"><?php the_field('instagram_title'); ?></p>
        <p class="subtitle"><?php the_field('instagram_subtitle'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <?php echo do_shortcode('[instagram-feed]'); ?>
      </div>
    </div>
  </div>
</section>
