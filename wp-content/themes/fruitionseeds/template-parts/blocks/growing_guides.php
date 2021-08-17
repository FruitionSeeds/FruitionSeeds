<section class="section guides">
	<div class="container">
		<div class="row">
			<div class="col">
				<p class="title"><?php the_field('guides_title'); ?></p>
				<p class="subtitle"><?php the_field('guides_subtitle'); ?></p>
				<?php
		    if( get_field('guides_show_course_sign_up_button') != 'no' ){
		      get_template_part( 'template-parts/course_signup', null, array(
		        'class' => 'course_signup',
		        'data'  => array(
		          'course_id' => get_field('guides_course_sign_up')
		        ))
		      );
		    }
		    ?>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<?php
				$args = array(
					'post_type' => array('guide'),
					'posts_per_page' => 4,
				  'tax_query' => array(
				    array (
				      'taxonomy' => 'guide_type',
				      'field' => 'slug',
				      'terms' => 'growing',
				    )
				  ),
				);
				$query = new WP_Query( $args );

				if ( $query->have_posts() ) { ?>
				  <div class="thumbnail carousel">
				    <?php while ( $query->have_posts() ) {
				      $query->the_post();
				      $files = get_field('files');
				      ?>
				      <div class="item guide">
				        <a href="<?php the_permalink(); ?>" data-image="<?php echo $files[0]['image']; ?>">
				          <img src="<?php echo wp_get_attachment_image_src($files[0]['image'], 'large')[0]; ?>" alt="Thumbnail of Growing Guide for <?php the_title(); ?>" />
				        </a>
				      </div>
				    <?php } ?>
				  </div>
				<?php } ?>

				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>
