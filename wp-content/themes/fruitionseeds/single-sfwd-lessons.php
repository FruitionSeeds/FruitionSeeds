<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

<?php get_template_part('template-parts/learn/lessons/hero'); ?>

<div class="container">
	<?php //get_template_part('template-parts/learn/courses/header'); ?>
	<div id="primary" class="content-area single-php">
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
	<div id="secondary" class="widget-area course-sidebar" role="complementary">
		<div class="wrapper">
			<?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
			<div class="course-title"><?php the_title(); ?></div>
			<?php echo do_shortcode('[learndash_course_progress]'); ?>
			<a class="back-to-course" href="<?php echo get_permalink(learndash_get_course_id($post->ID)); ?>">&laquo; Back to Course</a>
		</div>
		<?php dynamic_sidebar( 'course-filters' ); ?>
	</div>
</div>
<?php get_footer();
