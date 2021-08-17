<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

<?php get_template_part('template-parts/learn/courses/hero'); ?>

<div class="container">
	<?php //get_template_part('template-parts/learn/courses/header'); ?>
	<div id="primary" class="content-area single-php course <?php echo (!sfwd_lms_has_access($post_id)) ? 'full-width-override' : ''; ?>">
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
	<?php if( sfwd_lms_has_access($post_id) ){ ?>
		<div id="secondary" class="widget-area course-sidebar" role="complementary">
			<div class="wrapper">
				<?php echo get_the_post_thumbnail( $post_id, 'medium' ); ?>
				<div class="course-title"><?php the_title(); ?></div>
				<?php echo do_shortcode('[learndash_course_progress]'); ?>
			</div>
			<?php dynamic_sidebar( 'course-filters' ); ?>
		</div>
	<?php } ?>
</div>
<?php get_footer();
