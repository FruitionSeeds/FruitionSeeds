<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header();

$args = array(
	'post_type' => 'guide',
	'tax_query' => array(
      array (
          'taxonomy' => 'guide_type',
          'field' => 'slug',
          'terms' => 'growing',
      )
  ),
	'order' => 'ASC',
	'orderby' => 'title',
	'posts_per_page' => -1
);

$guide_query = new WP_Query( $args );
?>

<?php get_template_part('template-parts/learn/growing/banner'); ?>
<div class="container">
	<?php get_template_part('template-parts/learn/growing/header'); ?>
	<div id="primary" class="content-area archive-php full-width-override">
		<main id="main" class="site-main" role="main">
			<div class="row boxes growing guides">
				<?php if ($guide_query->have_posts()) : ?>
					 <?php while ($guide_query->have_posts()) : ?>
							<?php $guide_query->the_post(); ?>
							<?php get_template_part('template-parts/learn/growing/title_box'); ?>
					 <?php endwhile; ?>
				<?php endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
get_footer();
