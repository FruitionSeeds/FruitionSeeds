<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

$args = array(
	'post_type' => 'sfwd-courses',
	'order' => 'ASC',
	'orderby' => 'title',
	'posts_per_page' => -1
);
if($_GET['category'] && $_GET['category'] != 'all'){
	$args['tax_query'] = array(
    array(
      'taxonomy' => 'product_cat',
      'field' => 'slug',
      'terms' => $_GET['category']
    )
  );
}

$courses_query = new WP_Query( $args );

$categories = get_hierarchical_terms_by_post_type( array('product_cat'), array('sfwd-courses') );

get_header(); ?>

<?php get_template_part('template-parts/learn/courses/banner'); ?>

<div class="container">
	<?php get_template_part('template-parts/learn/courses/header'); ?>
	<div id="primary" class="content-area archive-php full-width-override">
		<hr />
		<div class="filter-row vertical-sidebar">
			<div class="row">
				<div class="filter-col col-8 offset-2 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
					<label class="screen-reader-text">Filter by:</label>
					<select class="learn-categories" name="">
						<option value="all">All Categories</option>
						<?php foreach($categories as $category){ ?>
							<option value="<?php echo $category['slug']; ?>" <?php echo ($category['slug'] == $_GET['category']) ? 'selected="selected"' : ''; ?>><?php echo $category['name']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<main id="main" class="site-main" role="main">
			<div class="courses row boxes">
				<?php if ($courses_query->have_posts()) : ?>
					 <?php while ($courses_query->have_posts()) : ?>
							<?php $courses_query->the_post(); ?>
							<div class="col-12 col-sm-6 col-lg-4">
								<div class="box" style="background:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; ?>) no-repeat center center #e3e3e3; background-size: cover;">
									<a href="<?php the_permalink(); ?>">
										<div class="title-box">
											<div class="line-2"><?php echo get_the_title(); ?></div>
										</div>
									</a>
								</div>
							</div>
					 <?php endwhile; ?>
				<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php //do_action( 'storefront_sidebar' ); ?>
</div>

<?php
get_footer();
