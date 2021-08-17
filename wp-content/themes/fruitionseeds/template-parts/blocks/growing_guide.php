<?php
$args = array(
	'post_type' => array('guide'),
  'tax_query' => array(
    array (
      'taxonomy' => 'guide_type',
      'field' => 'slug',
      'terms' => 'growing',
    )
  ),
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) { ?>
  <div class="thumbnail carousel">
    <?php while ( $query->have_posts() ) {
      $query->the_post();
      $files = get_field('files');
      ?>
      <div class="item" >
        <a href="<?php the_permalink(); ?>">
          <img src="<?php echo wp_get_attachment_image_src($files[0]['image'], 'medium')[0]; ?>" alt="Thumbnail of Growing Guide for <?php the_title(); ?>" />
        </a>
      </div>
    <?php } ?>
  </div>
<?php } ?>

<?php wp_reset_postdata(); ?>
