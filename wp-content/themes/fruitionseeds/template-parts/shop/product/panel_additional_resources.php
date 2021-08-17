<?php
$main_category_ids = getMainCategoryFromList( get_the_terms( $post->ID, 'product_cat' ) );
$all_products = get_term_by('name', 'All Products', 'product_cat');
array_push($main_category_ids, $all_products->term_id);
?>
<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_resources panel entry-content wc-tab" id="tab-additional_resources" role="tabpanel" aria-labelledby="tab-title-additional_resources">
  <div id="additional_resources">
    <div id="related-courses" class="related">
      <h3 class="woocommerce-additional_resources-title">
        Related Courses
      </h3>
      <?php
      $args = array(
        'post_type' => array('sfwd-courses'),
        'posts_per_page' => 6,
        'orderby' => 'product_cat',
        'order' => 'DESC',
        'tax_query' => array(
          array (
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $main_category_ids,
          )
        ),
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) { ?>
        <div class="thumbnail carousel">
          <?php while ( $query->have_posts() ) {
            $query->the_post(); ?>
            <div class="item">
              <a href="<?php the_permalink(); ?>">
                <div class="image-box" style="<?php echo bgImgFromID( get_post_thumbnail_id(), 'medium'); ?>"></div>
                <div class="title-box"><?php echo get_the_title(); ?></div>
              </a>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
      <?php wp_reset_postdata(); ?>
    </div>
    <div id="related-blogs" class="related">
      <h3 class="woocommerce-additional_resources-title">
        Related Blogs
      </h3>
      <?php
      $args = array(
        'post_type' => array('post'),
        'posts_per_page' => 6,
        'orderby' => 'product_cat',
        'order' => 'DESC',
        'tax_query' => array(
          array (
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $main_category_ids,
          )
        ),
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) { ?>
        <div class="thumbnail carousel">
          <?php while ( $query->have_posts() ) {
            $query->the_post(); ?>
            <div class="item">
              <a href="<?php the_permalink(); ?>">
                <div class="image-box" style="<?php echo bgImgFromID( get_post_thumbnail_id(), 'medium'); ?>"></div>
                <div class="title-box"><?php echo get_the_title(); ?></div>
              </a>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
      <?php wp_reset_postdata(); ?>
    </div>
    <div id="related-webinars" class="related">
      <h3 class="woocommerce-additional_resources-title">
        Related Webinars
      </h3>
      <?php
      $args = array(
        'post_type' => array('webinar'),
        'posts_per_page' => 6,
        'orderby' => 'product_cat',
        'order' => 'DESC',
        'tax_query' => array(
          array (
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $main_category_ids,
          )
        ),
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) { ?>
        <div class="thumbnail carousel">
          <?php while ( $query->have_posts() ) {
            $query->the_post(); ?>
            <div class="item">
              <a href="<?php the_permalink(); ?>">
                <div class="image-box" style="<?php echo bgImgFromID( get_post_thumbnail_id(), 'medium'); ?>"></div>
                <div class="title-box"><?php echo truncate(get_the_title(), 40); ?></div>
              </a>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
</div>
