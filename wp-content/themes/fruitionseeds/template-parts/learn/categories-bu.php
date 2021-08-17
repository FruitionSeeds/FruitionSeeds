<?php
$terms = get_terms( array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
    'parent' => get_term_by('name', 'Learn', 'product_cat')->term_id
) );
?>
<section class="categories">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="thumbnail carousel">
          <?php foreach( $terms as $term ) { ?>
            <div class="item" >
              <a href="<?php echo $term->name; ?>">
                <p class="title">
                  <?php echo $term->name; ?>
                </p>
              </a>
              <div class="bg" style="<?php echo bgImgFromID(get_field('thumbnail_image', 'product_cat_' . $term->term_id)); ?>"></div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
