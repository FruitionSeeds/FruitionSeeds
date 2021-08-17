<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package storefront
 */

//if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_archive() ) {
if ( ! is_archive() ) {
	return;
}

?>
<div style="display:none;" id="secondary1" class="widget-area product-cat-sidebar" role="complementary">

	<?php
	$featured = get_term_by('slug', 'featured', 'product_cat');
	$solution = get_term_by('slug', 'solution', 'product_cat');

	$all_categories = get_terms( ['taxonomy' => 'product_cat', 'parent' => get_queried_object_id()] );
	$featured_categories = get_terms( ['taxonomy' => 'product_cat', 'parent' => $featured->term_id] );
	$solution_categories = get_terms( ['taxonomy' => 'product_cat', 'parent' => $solution->term_id] );
	?>

	<?php if(	count($all_categories) > 0 ){ ?>
		<div class="categories-wrapper">
			<div class="header">Types <i class="fas fa-chevron-left"></i></div>
			<div class="list" data-type="product-category">
				<?php foreach( $all_categories as $category ){ ?>
					<div class="item" data-value="<?php echo $category->slug; ?>">
						<?php echo $category->name; ?>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>

	<div class="categories-wrapper">
		<div class="header">Featured <i class="fas fa-chevron-left"></i></div>
		<div class="list" data-type="featured">
			<?php foreach( $featured_categories as $category ){ ?>
				<div class="item" data-value="<?php echo $category->slug; ?>">
					<?php echo $category->name; ?>
				</div>
			<?php } ?>
		</div>
	</div>

	<div class="categories-wrapper">
		<div class="header">Shop by Solution <i class="fas fa-chevron-left"></i></div>
		<div class="list" data-type="solutions">
			<?php foreach( $solution_categories as $category ){ ?>
				<div class="item" data-value="<?php echo $category->slug; ?>">
					<?php echo $category->name; ?>
				</div>
			<?php } ?>
		</div>
	</div>

</div><!-- #secondary -->
