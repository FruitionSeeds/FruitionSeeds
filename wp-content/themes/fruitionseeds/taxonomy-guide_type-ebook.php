<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>

<?php get_template_part('template-parts/learn/ebook/banner'); ?>
<div class="container">
	<?php get_template_part('template-parts/learn/ebook/header'); ?>
	<div id="primary" class="content-area archive-php full-width-override">
		<main id="main" class="site-main" role="main">
			<div class="row boxes">
				<?php if ( have_posts() ) : ?>

					<?php
					get_template_part( 'loop' );

				else :

					get_template_part( 'content', 'none' );

				endif;
				?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
get_footer();
