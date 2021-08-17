<?php
/**
 *
 * Template Name: Learn Archives
 *
 * @package storefront
 */

 $args = array(
 	'post_type' => array('webinar','post','sfwd-courses'),
 	'order' => 'ASC',
 	'orderby' => 'title',
 	'posts_per_page' => -1
 );
 if($_GET['category'] && $_GET['category'] != 'all'){
 	$cat_obj = get_term_by('slug', $_GET['category'], 'product_cat');
 	$args['tax_query'] = array(
     array(
       'taxonomy' => 'product_cat',
       'field' => 'slug',
       'terms' => $_GET['category']
     )
   );
 }

 $learn_query = new WP_Query( $args );

 $categories = get_hierarchical_terms_by_post_type( array('product_cat'), array('webinar', 'post', 'sfwd-courses'), 'learn' );

 get_header(); ?>

 <?php if(get_field('webinar_landing_page_banner', 'options')){ ?>
 	<div id="hero_banner" style="<?php echo bgImgFromID(get_field('learn_archives_page_banner', 'options'), 'full'); ?>"></div>
 <?php } ?>

 <div class="container">
 	<header class="page-header">
 		<h1 class="page-title">
 			<?php the_field('learn_archives_page_title', 'options'); ?><?php if(isset($cat_obj)){ echo ': ' . $cat_obj->name; } ?>
 		</h1>
 	</header><!-- .page-header -->
 	<div id="primary" class="content-area archive-php archive-webinar full-width-override">
 		<hr />
 		<div class="filter-row vertical-sidebar row">
 			<div class="filter-col col-12 offset-0 col-md-4 offset-md-4" style="flex: unset;">
 				<label class="screen-reader-text">Filter by:</label>
 				<select class="learn-categories" name="">
 					<option value="all">All Categories</option>
 					<?php foreach($categories as $category){ ?>
 						<option value="<?php echo $category['slug']; ?>" <?php echo ($category['slug'] == $_GET['category']) ? 'selected="selected"' : ''; ?>><?php echo $category['name']; ?></option>
 					<?php } ?>
 				</select>
 			</div>
 		</div>
 		<main id="main" class="site-main" role="main">
 				<section class="section">
 				  <div class=" boxes row">
 						<?php if ($learn_query->have_posts()) : ?>
 						   <?php while ($learn_query->have_posts()) : ?>
 						      <?php $learn_query->the_post(); ?>
 									<div class="col-12 col-sm-6 col-md-4 col-lg-3">
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
 					</div>
 				</section>
 		</main><!-- #main -->
 	</div><!-- #primary -->
 	<?php //do_action( 'storefront_sidebar' ); ?>
 </div>

 <?php
 get_footer();
