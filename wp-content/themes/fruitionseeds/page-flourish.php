<?php
/**
 *
 * Template Name: Flourish Landing Page
 *
 * @package storefront
 */

get_header();

$course = get_page_by_title('Flourish Garden Club', null, 'sfwd-courses');
$enrolled = (sfwd_lms_has_access( $course->ID )) ? true : false;
$linked_product_id = get_field('associated_product');
$linked_course_id = get_field('associated_course');
global $wp;
$current_slug = home_url( $wp->request );
?>

	<div id="primary" class="content-area page-php full-width-override">
		<main id="main" class="site-main" role="main">
				<?php
				while ( have_posts() ) :
					the_post(); ?>
					<?php if( get_field('banner_background_image') || get_field('banner_logo') ){ ?>
						<header style="<?php echo bgImgFromID( get_field('banner_background_image'), 'large', 'center', 'center', 'cover', get_field('banner_background_color') ); ?>">
							<div class="container">
								<?php if( get_field('banner_logo') ){ ?>
									<img src="<?php echo wp_get_attachment_image_src(get_field('banner_logo'), 'large')[0]; ?>" alt="Flourish Garden Club logo" />
								<?php } ?>
							</div>
						</header>
					<?php } ?>
					<section class="intro">
						<div class="container">
							<div class="row">
								<div class="col-10 offset-1 col-md-8 offset-md-2">
									<?php if( $enrolled ){ ?>
										<button class="member-welcome">
											<a href="<?php the_permalink($linked_course_id); ?>">
												<?php the_field('page_title_button_text_for_members'); ?>
											</a>
										</button>
									<?php } else { ?>
										<h1 class="page-title"><?php the_field('page_title'); ?></h1>
									<?php } ?>
									<div class="description">
										<?php the_field('introduction'); ?>
									</div>
									<div class="video">
										<?php the_field('video'); ?>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="signup" style="<?php echo bgImgFromID(get_field('signup_bg_image'), 'medium', 'right', 'bottom', 'none'); ?>">
						<div class="container">
							<div class="row">
								<div class="col-10 offset-1 col-md-5 offset-md-0 image" style="<?php echo bgImgFromID(get_field('sign_up_image')); ?>"></div>
								<div class="col-10 offset-1 col-md-7 offset-md-0 wrapper">
									<div class="title">
										<?php the_field('sign_up_title'); ?>
									</div>
									<div class="description">
										<?php the_field('sigh_up_description'); ?>
									</div>
									<div class="form">
										<button class="course-checkout">
									    <a href="<?php echo $current_slug; ?>/?add-to-cart=<?php echo $linked_product_id; ?>">
									      <?php the_field('signup_add_to_cart_button_text'); ?>
									    </a>
									  </button>
									</div>
									<?php if( get_field('show_signature') == 'yes' ){ ?>
										<?php get_template_part('template-parts/signature'); ?>
									<?php } ?>
								</div>
							</div>
						</div>
					</section>
					<section class="testimonials" style="<?php echo bgImgFromID(get_field('testimonial_bg_image')); ?>;background-color:<?php the_field('testimonial_bg_color'); ?>;">
						<div class="container">
							<div class="row">
								<div class="col-10 offset-1 col-md-6 offset-md-3">
									<div class="wrapper carousel">
										<?php while( have_rows('testimonials') ): the_row(); ?>
								      <div class="item">
							          <div class="quote"><?php the_sub_field('quote'); ?></div>
												<div class="speaker"><?php the_sub_field('name'); ?></div>
												<div class="description"><?php the_sub_field('description'); ?></div>
								      </div>
								    <?php endwhile; ?>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="faq">
						<div class="container">
							<div class="row">
								<div class="col-10 offset-1 col-md-8 offset-md-2">
									<div class="title taste-title">
										<?php the_field('taste_title'); ?>
									</div>
									<div class="description">
										<?php the_field('taste_description'); ?>
									</div>
									<div class="video">
										<?php the_field('taste_video'); ?>
									</div>
								</div>
							</div>
							<div class="title faq-title">
								<?php the_field('faq_title'); ?>
							</div>
							<div class="row">
								<div class="col-10 offset-1 col-md-5 offset-md-0 image" style="<?php echo bgImgFromID(get_field('faq_image')); ?>"></div>
								<div class="col-10 offset-1 col-md-6 offset-md-1 wrapper">
									<?php the_field('faq_text'); ?>
								</div>
							</div>
						</div>
					</section>
					<section class="join" style="<?php echo bgImgFromID(get_field('join_background_image')); ?>">
						<div class="container">
							<div class="title">
								<?php the_field('join_title'); ?>
							</div>
							<button class="course-checkout">
								<a href="<?php echo $current_slug; ?>/?add-to-cart=<?php echo $linked_product_id; ?>">
									<?php the_field('join_button_text'); ?>
								</a>
							</button>
						</div>
					</section>
					<section class="testimonial" style="<?php echo bgImgFromID(get_field('quote_background_image'), 'medium', 'left', 'center', 'none'); ?>">
						<div class="container">
							<div class="row">
								<div class="col-10 offset-1 col-md-6 offset-md-3">
									<div class="quote"><?php the_field('closing_testimonial'); ?></div>
									<div class="speaker"><?php the_field('closing_testimonial_speaker'); ?></div>
									<div class="description"><?php the_field('closing_testimonial_speaker_description'); ?></div>
								</div>
							</div>
						</div>
					</section>
					<section class="closing" style="<?php echo bgImgFromID(get_field('final_quote_background_image')); ?>">
						<div class="container">
							<div class="quote"><?php the_field('final_quote'); ?></div>
							<div class="speaker">&mdash; <?php the_field('final_quote_speaker'); ?></div>
						</div>
					</section>

				<?php endwhile; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
