<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

<?php get_template_part('template-parts/learn/blog/banner'); ?>

<div class="container">
	<?php //get_template_part('template-parts/learn/blog/header'); ?>
	<br /><br />
	<div id="primary" class="content-area single-php full-width-override">
		<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) :
			the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'single' );

			do_action( 'storefront_single_post_after' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div>
<?php get_footer();
