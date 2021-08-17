<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="homepage" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			do_action( 'storefront_page_before' );

			while ( have_posts() ) :
				the_post();
				?>

				<?php get_template_part('template-parts/blocks/slideshow'); ?>

				<?php get_template_part('template-parts/blocks/categories'); ?>

				<section class="section learn">
					<div class="container">
						<div class="row">
							<div class="col">
								<p class="title"><?php the_field('learn_title'); ?></p>
							</div>
						</div>
						<div class="row boxes">
							<?php $boxes = get_field('boxes'); ?>
							<?php foreach( $boxes as $box ) {
								$bg = wp_get_attachment_image_src($box['thumb_img'], 'medium')[0]; ?>
								<div class="col-10 offset-1 col-md-4 offset-md-0">
									<div class="box" style="background:url(<?php echo $bg; ?>) no-repeat center center; background-size: cover;">
										<a href="<?php echo $box['link']; ?>">
											<div class="title-box">
												<div class="line-1"><?php echo $box['title_line_1']; ?></div>
												<div class="line-2"><?php echo $box['title_line_2']; ?></div>
											</div>
										</a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</section>

				<?php get_template_part('template-parts/blocks/seed_signup'); ?>

				<?php get_template_part('template-parts/blocks/growing_guides'); ?>

				<?php get_template_part('template-parts/blocks/story'); ?>

				<?php get_template_part('template-parts/blocks/ebook_signup'); ?>

				<?php get_template_part('template-parts/blocks/instagram'); ?>

				<?php
				/**
				 * Functions hooked in to storefront_page_after action
				 *
				 * @hooked storefront_display_comments - 10
				 */
				do_action( 'storefront_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
