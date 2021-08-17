<?php
if($category->slug){
  $month_category = get_term_by('slug', $category->slug, 'product_cat');
} else {
  $month_category = get_term_by('slug', $_GET['month'], 'product_cat');
}

$args = array(
  'post_type' => array('guide'),
  'tax_query' => array(
    array (
      'taxonomy' => 'guide_type',
      'field' => 'slug',
      'terms' => 'plant-now',
    ),
    array (
      'taxonomy' => 'product_cat',
      'field' => 'term_id',
      'terms' => $month_category->term_id,
    )
  ),
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) { ?>
  <div class="plant-now thumbnails">
    <?php while ( $query->have_posts() ) {
      $query->the_post();
      $files = get_field('files');
      $i = 1;
      foreach($files as $file){ ?>
        <div id="pn-btn-<?php echo $category->slug; ?>-<?php echo $i; ?>" class="item dialog-btn" data-number="<?php echo $i; ?>">
          <img class="" src="<?php echo wp_get_attachment_image_src($file['image'], 'guide-thumb')[0]; ?>" alt="Thumbnail of Growing Guide for <?php the_title(); ?>" />
        </div>
        <div id="pn-div-<?php echo $category->slug; ?>-<?php echo $i; ?>" class="dialog-div">
          <img class="" src="<?php echo wp_get_attachment_image_src($file['image'], 'full')[0]; ?>" alt="Growing Guide for <?php the_title(); ?>" />
        </div>
      <?php $i++; } ?>
    <?php } ?>
  </div>
<?php } else { ?>
  Sorry, we've got no Plant Now Guides for this month - check back soon though!
<?php } ?>
<?php wp_reset_postdata(); ?>
