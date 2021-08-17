<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header();
?>

<?php get_template_part('template-parts/learn/ebook/banner'); ?>

<div class="container">
	<div id="primary" class="content-area single-php single-guide full-width-override">
		<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) :
			the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'single-ebook' );

			do_action( 'storefront_single_post_after' );

		endwhile; // End of the loop.
		?>
		<?php
		if( has_term('growing', 'guide_type') ){
	    get_template_part('template-parts/learn/growing/guides');
	    get_template_part('template-parts/learn/growing/signup');
		}
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

</div>
<?php get_footer();
