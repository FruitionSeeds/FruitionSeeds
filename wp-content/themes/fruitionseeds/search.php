<?php
/**
 * The template for displaying search results pages.
 *
 * @package storefront
 */

get_header(); ?>
<div class="container search-wrapper">
	<div id="primary" class="content-area search-page full-width-override">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<h1 class="page-title">&ldquo;<?php echo get_search_query(); ?>&rdquo; <i class="fas fa-pencil-alt"></i></h1>
				<input type="text" value="<?php echo get_search_query(); ?>" id="search-terms" /><button class="search-link">Search</button>
				<div class="results-in-shop"><?php echo $wp_query->found_posts; ?> Results</div>
				<div class="result-filters row">
					<div class="col-10 offset-1 col-sm-6 offset-sm-0 col-md-5 offset-md-1 search-type-wrapper">
						<label class="search">Search: </label>
						<span id="shop" class="search_type">
							<input type="radio" name="search_type" <?php if($_GET['search_type'] == 'shop'){ echo 'checked="checked"'; } ?> />
							<label for="shop">Shop</label>
						</span>
						<span id="learn" class="search_type">
							<input type="radio" name="search_type" <?php if($_GET['search_type'] == 'learn'){ echo 'checked="checked"'; } ?> />
							<label for="learn">Learn</label>
						</span>
						<span id="all" class="search_type">
							<input type="radio" name="search_type" <?php if(!isset($_GET['search_type']) || ($_GET['search_type'] != 'shop' && $_GET['search_type'] != 'learn')){ echo 'checked="checked"'; } ?> />
							<label for="all">Everything</label>
						</span>
					</div>
					<div class="col-10 offset-1 col-sm-6 offset-sm-0 col-md-5 offset-md-0 sort-by-wrapper">
						<div class="select-wrapper">
							<label class="screen-reader-text">Sort By</label>
							<select id="sort-by">
								<option>Best match</option>
								<option value="alpha" <?php if($_GET['sort'] == 'alpha'){ echo 'selected="selected"'; } ?> >Alphabetical (A to Z)</option>
								<option value="alphaRev" <?php if($_GET['sort'] == 'alphaRev'){ echo 'selected="selected"'; } ?>>Reserve Alphabetical (Z to A)</option>
								<option value="dateNew" <?php if($_GET['sort'] == 'dateNew'){ echo 'selected="selected"'; } ?>>Date (Newest first)</option>
								<option value="dateOld" <?php if($_GET['sort'] == 'dateOld'){ echo 'selected="selected"'; } ?>>Date (Oldest first)</option>
							</select>
						</div>
					</div>
				</div>
				<hr />
			</header><!-- .page-header -->
			<div class="results-wrapper searchtype-<?php echo ($_GET['search_type']) ? $_GET['search_type'] : 'all'; ?>">
				<?php get_template_part( 'loop-search' ); ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php //do_action( 'storefront_sidebar' ); ?>
</div>
<?php
get_footer();
