<section class="section slideshow">
  <?php if( have_rows('slides') ): ?>
    <div id="slider">
      <ul>
      <?php while( have_rows('slides') ): the_row();
        $bg = wp_get_attachment_image_src(get_sub_field('image'), 'large')[0]; ?>
        <li style="background:url(<?php echo $bg; ?>) no-repeat center center; background-size: cover;"
          class="<?php echo (get_sub_field('slide_link')) ? 'linked' : 'not-linked'; ?>"
          data-link="<?php echo (get_sub_field('slide_link')) ? get_sub_field('slide_link') : ''; ?>" >
          <div class="container">
            <p class="title"><?php the_sub_field('title'); ?></p>
            <p class="subtitle"><?php the_sub_field('subtitle'); ?></p>
            <?php if( get_sub_field('button_text') ){ ?>
              <button><?php the_sub_field('button_text'); ?></button>
            <?php } ?>
          </div>
        </li>
      <?php endwhile; ?>
      </ul>
    </div>
  <?php endif; ?>
</section>
