<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>

<?php get_template_part('template-parts/learn/plant-now/banner'); ?>
<div class="container">
	<?php get_template_part('template-parts/learn/plant-now/header'); ?>
	<div id="primary" class="content-area archive-php full-width-override">
		<main id="main" class="site-main" role="main">
			<?php
			get_template_part('template-parts/learn/plant-now/all');
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
get_footer();
