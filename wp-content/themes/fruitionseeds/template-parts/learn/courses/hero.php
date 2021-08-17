<header id="hero_banner" class="courses_header" style="<?php echo bgImgFromID(get_post_thumbnail_id( $post_id, 'large' ), 'full'); ?>">
	<div class="content">
		<?php if(get_field('courses_landing_page_title', 'options')){ ?>
	    <h1 class="page-title courses-title">
	      <?php the_title(); ?>
	    </h1>
	  <?php } ?>
	  <div class="page-description courses-description"><?php the_content(); ?></div>
		<?php //echo do_shortcode('[ld_course_resume label="Resume Course"]'); ?>
	</div>
</header>
