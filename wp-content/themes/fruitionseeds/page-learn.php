<?php
/**
 *
 * Template Name: Learn Landing Page
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area page-php full-width-override">
		<main id="main" class="site-main" role="main">
			<?php get_template_part('template-parts/blocks/slideshow'); ?>

			<div class="container">

				<?php get_template_part('template-parts/learn/categories'); ?>

				<?php get_template_part('template-parts/learn/boxes'); ?>

				<?php get_template_part('template-parts/blocks/seed_signup'); ?>

				<?php get_template_part('template-parts/blocks/growing_guides'); ?>

			</div>
			<?php get_template_part('template-parts/blocks/story'); ?>
			<?php get_template_part('template-parts/blocks/ebook_signup'); ?>
			<div class="container">
				<?php get_template_part('template-parts/blocks/instagram'); ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
