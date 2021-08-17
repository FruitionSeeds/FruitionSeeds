<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header();


$learn_category = get_term_by('name', 'Learn', 'product_cat');

$categories = get_term_children( $learn_category->term_id, 'product_cat' );

$learn_categories = array();

foreach ($categories as $category){
	$term = get_term_by('id', $category , 'product_cat');
	array_push($learn_categories, array(
		'id' => $term->term_id,
		'name' => $term->name,
		'slug' => $term->slug
	));
}

?>

<?php get_template_part('template-parts/learn/blog/banner'); ?>

<div class="post-archive container">
	<?php get_template_part('template-parts/learn/blog/header'); ?>
	<hr />
	<div class="vertical-sidebar row">
		<div class="row">
			<div class="filter-col col-10 offset-1 col-md-4 offset-md-1">
				<label class="screen-reader-text">Filter by:</label>
				<select class="learn-product-categories" name="">
					<option value="all">All Categories</option>
					<?php foreach($learn_categories as $category){ ?>
						<option value="<?php echo $category['slug']; ?>" <?php echo ($category['slug'] == $_GET['category']) ? 'selected="selected"' : ''; ?>><?php echo $category['name']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="filter-col col-10 offset-1 col-md-4 offset-md-2">
				<form role="search" method="get" class="search-form" action="">
					<label>
						<span class="screen-reader-text">Search for:</span>
						<input type="search" class="search-field" placeholder="Search …" value="<?php echo $_GET['s']; ?>" name="s">
					</label>
					<input type="submit" class="search-submit" value="Search">
				</form>
			</div>
		</div>
	</div>
	<div id="primary" class="content-area full-width-override">
		<main id="main" class="site-main" role="main">
			<div class="square-boxes row">

				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						?>
						<div class="item">
							<a class="thumbnail" href="<?php the_permalink(); ?>" style="background:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'square-thumb')[0]; ?>) no-repeat center center #e3e3e3; background-size: cover;">

						  </a>
							<a class="title" href="<?php the_permalink(); ?>">
						    <?php echo truncate(get_the_title(), 150); ?>
						  </a>
						</div>
						<?php
					endwhile;

				else :
					get_template_part( 'content', 'none' );
				endif;
				?>
			</div>
			<?php the_posts_pagination(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

</div>

<?php get_footer(); ?>
