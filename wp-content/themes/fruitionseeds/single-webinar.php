<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area single-webinar single-php full-width-override">
		<main id="main" class="site-main" role="main">
			<?php if(get_field('hero_banner')){ ?>
				<div id="hero_banner" style="<?php echo bgImgFromID(get_field('hero_banner'), 'full'); ?>"></div>
			<?php } ?>

			<div class="container">

				<?php
				while ( have_posts() ) :
					the_post();

					do_action( 'storefront_single_post_before' ); ?>

					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="video">
						<?php the_field('video_embeo'); ?>
					</div>

					<?php if( get_field('growing_guide') ){ ?>
						<?php if(get_field('files', get_field('growing_guide'))){ ?>
							<section class="growing-guide">
								<div class="instructions">
									<?php the_field('webinar_page_growing_guide_instructions', 'options'); ?>
								</div>
								<div class="thumbnails">
									<?php
						      $files = get_field('files', get_field('growing_guide'));
									$i = 1;
									foreach( $files as $file ){
										if( $i > 4 ) break; ?>
										<div id="gg-btn-<?php echo $i; ?>" class="item dialog-btn" data-number="<?php echo $i; ?>">
				              <img class="" src="<?php echo wp_get_attachment_image_src($file['image'], 'guide-thumb')[0]; ?>" alt="Thumbnail of Growing Guide for <?php the_title(); ?>" />
				            </div>
				            <div id="gg-div-<?php echo $i; ?>" class="dialog-div">
				              <img class="" src="<?php echo wp_get_attachment_image_src($file['image'], 'guide-full')[0]; ?>" alt="Growing Guide for <?php the_title(); ?>" width="750" height="970" />
				            </div>
				          <?php $i++;
									} ?>
								</div>
							</section>
							<section class="download-form" style="<?php echo bgImgFromID( get_field('form_bg_img', get_field('growing_guide')) ); ?>">
							  <div class="row">
							    <div class="col-0 col-md-7"></div>
							    <div class="col-12 col-md-5">
							      <div class="form-wrapper">
							        <div class="title"><?php the_field('form_title', get_field('growing_guide')); ?></div>
							        <div class="subtitle"><?php the_field('form_subtitle', get_field('growing_guide')); ?></div>
											<?php get_template_part( 'template-parts/learn/growing_library_signup' ); ?>
							      </div>
							    </div>
							  </div>
							</section>
						<?php } ?>
					<?php } ?>

					<?php wp_reset_postdata(); ?>

					<?php the_content(); ?>

					<?php do_action( 'storefront_single_post_after' );

				endwhile; // End of the loop.
				?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
