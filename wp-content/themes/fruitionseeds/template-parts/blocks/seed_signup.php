<section class="section join" style="<?php echo bgImgFromID( get_field('join_bg_image'), null, null, 'right', 'contain', 'transparent' ); ?>">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 image" style="<?php echo bgImgFromID( get_field('join_image'), 'large', 'center', 'center', 'cover', '#DBE5AC' ); ?>">
      </div>
      <div class="col-12 col-md-6">
        <p class="title"><?php the_field('join_title'); ?></p>
        <div class="description"><?php the_field('join_body'); ?></div>
        <?php
		    if( get_field('join_show_course_sign_up_button') != 'no' ){
		      get_template_part( 'template-parts/course_signup', null, array(
		        'class' => 'course_signup',
		        'data'  => array(
		          'course_id' => get_field('join_course_sign_up')
		        ))
		      );
		    }
		    ?>
      </div>
    </div>
  </div>
</section>
