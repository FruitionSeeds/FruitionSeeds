<?php
$main_category_ids = getMainCategoryFromList( get_the_terms( $post->ID, 'product_cat' ) );
$args = array(
  'post_type' => array('guide'),
  'tax_query' => array(
    array (
      'taxonomy' => 'guide_type',
      'field' => 'slug',
      'terms' => 'growing',
    ),
    array (
      'taxonomy' => 'product_cat',
      'field' => 'term_id',
      'terms' => $main_category_ids,
    )
  ),
);
$query = new WP_Query( $args );
?>
<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--growing_guide panel entry-content wc-tab" id="tab-growing_guide" role="tabpanel" aria-labelledby="tab-title-growing_guide">
  <div id="how_to_grow">
    <?php if( get_field('download_guide_title', 'options') ){ ?>
      <h2 class="woocommerce-panel-title woocommerce-growing-title">
        <?php the_field('growing_guide_panel_title', 'options'); ?>
      </h2>
    <?php } ?>
    <?php echo (get_field('how_to_grow')) ? get_field('how_to_grow') . '<br /><br />' : ''; ?>
  </div>
  <div id="growing_guides">
    <?php if ( $query->have_posts() ) { ?>
      <?php if( get_field('download_guide_title', 'options') ){ ?>
        <h2 class="woocommerce-panel-title woocommerce-Reviews-title">
          <?php the_field('download_guide_title', 'options'); ?>
        </h2>
        <br /><br />
      <?php } ?>
      <?php echo (get_field('growing_guide_description', 'options')) ? get_field('growing_guide_description', 'options') . '<br /><br />' : ''; ?>
      <?php
      if( get_field('growing_guide_show_sign_up_btn', 'options') != 'no' ){
        get_template_part( 'template-parts/course_signup', null, array(
          'class' => 'course_signup',
          'data'  => array(
            'course_id' => get_field('growing_guide_sign_up_btn_course', 'options')
          ))
        );
      }
      ?>
      <div class="woocommerce-panel-content">
        <div class="thumbnails">
          <?php while ( $query->have_posts() ) {
            $query->the_post();
            $files = get_field('files');
            $i = 1;
            foreach($files as $file){
              if($i < 5) {?>
              <div id="gg-btn-<?php echo $i; ?>" class="item dialog-btn" data-number="<?php echo $i; ?>">
                <img class="" src="<?php echo wp_get_attachment_image_src($file['image'], 'large')[0]; ?>" alt="Thumbnail of Growing Guide for <?php the_title(); ?>" />
              </div>
              <div id="gg-div-<?php echo $i; ?>" class="dialog-div">
                <img class="" src="<?php echo wp_get_attachment_image_src($file['image'], 'full')[0]; ?>" alt="Growing Guide for <?php the_title(); ?>"  width="750" height="970" />
              </div>
            <?php } $i++; } ?>
          <?php } ?>
        </div>
      </div>
    <?php } else { ?>
      <div>
        <center>
          We don't have any growing guides for this product... yet!
        </center>
        <br />
        <?php
        if( get_field('growing_guide_show_sign_up_btn', 'options') != 'no' ){
          get_template_part( 'template-parts/course_signup', null, array(
            'class' => 'course_signup',
            'data'  => array(
              'course_id' => get_field('growing_guide_sign_up_btn_course', 'options')
            ))
          );
        }
        ?>
      </div>
    <?php } ?>
    <?php wp_reset_postdata(); ?>
  </div>
</div>
