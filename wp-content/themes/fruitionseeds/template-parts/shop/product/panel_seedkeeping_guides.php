<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--seedkeeping_guide panel entry-content wc-tab" id="tab-seedkeeping_guide" role="tabpanel" aria-labelledby="tab-title-seedkeeping_guide">
  <div id="seedkeeping_guides">
    <h2 class="woocommerce-seedkeeping_guide-title">
      <?php the_field('seedkeeping_panel_title', 'options'); ?>
    </h2>
    <div class="woocommerce-panel-content">
      <?php the_field('seedkeeping_panel_description', 'options'); ?>
      <br /><br />
      <?php
      if( get_field('seedkeeping_guide_show_sign_up_btn', 'options') != 'no' ){
        get_template_part( 'template-parts/course_signup', null, array(
          'class' => 'course_signup',
          'data'  => array(
            'course_id' => get_field('seedkeeping_guide_sign_up_btn_course', 'options')
          ))
        );
      }
      ?>
    </div>
    <?php
    $main_category_ids = getMainCategoryFromList( get_the_terms( $post->ID, 'product_cat' ) );
    $args = array(
      'post_type' => array('guide'),
      'tax_query' => array(
        array (
          'taxonomy' => 'guide_type',
          'field' => 'slug',
          'terms' => 'seedkeeping',
        ),
        array (
          'taxonomy' => 'product_cat',
          'field' => 'term_id',
          'terms' => $main_category_ids,
        )
      ),
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) { ?>
      <div class="thumbnails">
        <?php while ( $query->have_posts() ) {
          $query->the_post();
          $files = get_field('files');
          $i = 1;
          foreach($files as $file){ ?>
            <div id="sk-btn-<?php echo $i; ?>" class="item dialog-btn" data-number="<?php echo $i; ?>">
              <img class="" src="<?php echo wp_get_attachment_image_src($file['image'], 'large')[0]; ?>" alt="Thumbnail of Growing Guide for <?php the_title(); ?>" />
            </div>
            <div id="sk-div-<?php echo $i; ?>" class="dialog-div">
              <img class="" src="<?php echo wp_get_attachment_image_src($file['image'], 'full')[0]; ?>" alt="Growing Guide for <?php the_title(); ?>" width="750" height="970" />
            </div>
          <?php $i++; } ?>
        <?php } ?>
      </div>
    <?php }
    wp_reset_postdata(); ?>
  </div>
</div>
