<section class="categories">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="thumbnail carousel">
          <?php $categories = get_field('categories'); ?>
          <?php foreach( $categories as $category ) { ?>
            <?php
            $product_category = get_term_by( 'id', $category['product_categories'], 'product_cat');
            $thumbnail_id     = get_woocommerce_term_meta( $category['product_categories'], 'thumbnail_id', true );
            $image_id         = ($category['image']) ? $category['image'] : $thumbnail_id;
            $link             = ($category['tile_link']) ? $category['tile_link'] : '/shop/product-category/' . $product_category->slug;
            ?>
            <div class="item">
              <a href="<?php echo $link; ?>">
                <p class="title">
                  <?php echo ($category['category_name']) ? $category['category_name'] : $product_category->name; ?>
                </p>
              </a>
              <div class="bg" style="<?php echo bgImgFromID($image_id); ?>"></div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
