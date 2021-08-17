<?php get_template_part('template-parts/shop/product/panel_summary_title'); ?>
<div class="woocommerce-rating">
  <span class="star five"></span> <?php the_field('reviews_text', 'options'); ?>
</div>
<?php get_template_part('template-parts/shop/product/panel_summary_notes'); ?>
<?php get_template_part('template-parts/shop/product/panel_summary_short_description'); ?>
<div class="woocommerce-product-table">
  <?php global $product; ?>
  <?php //echo do_shortcode('[product_table include="' . $product->id . '"  variations="separate" columns="attributes,price,stock,buy" cart_button="checkbox" quantities="true" links="none" page_length="false" search_box="false" reset_button="false" totals="false"]'); ?>
  <table>
    <thead>
      <tr>
        <?php if( $product->get_type() == 'subscription'  ){ ?>
          <th>Price</th>
        <?php } else { ?>
          <?php if( $product->get_attribute('pa_size') || $product->get_attribute('pa_quantity') || $product->get_attribute('pa_product')  ){ ?>
            <th>Size</th>
          <?php } ?>
          <th>Price</th>
          <th class="quantity"><span class="desktop">Quantity</span><span class="mobile">#</span></th>
          <th class="availability">Availability</th>
        <?php } ?>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if( $product->get_type() == 'simple' || $product->get_type() == 'subscription' ){ ?>
        <tr data-type="simple_or_subscription">
          <?php if( $product->get_type() == 'subscription' ){ ?>
            <td data-type="subscription"><?php echo $product->get_price_html(); ?></td>
          <?php } else { ?>
            <?php if( $product->get_attribute('pa_size') || $product->get_attribute('pa_quantity') || $product->get_attribute('pa_product') ){ ?>
              <td data-type="not_subscription">
                <?php
                if( $product->get_attribute('pa_size') ) echo formatVariationName($product->get_attribute('pa_size'));
                if( $product->get_attribute('pa_quantity') ) echo formatVariationName($product->get_attribute('pa_quantity'));
                if( $product->get_attribute('pa_product') ) echo formatVariationName($product->get_attribute('pa_product'));
                ?>
              </td>
            <?php } ?>
            <td><?php echo $product->get_price_html(); ?></td>
            <td>
              <input type="number" data-pid="<?php echo $product->get_id(); ?>" class="input-text qty text" step="1" min="1" max="" name="quantity" value="" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
            </td>
            <td>
              <?php if( $product->get_stock_status() == 'instock' ){ ?>
                <span>In stock</span>
              <?php } else { ?>
                <span class="out-of-stock"><?php the_field('out_of_stock_default_notice', 'options'); ?></span>
              <?php } ?>
            </td>
          <?php } ?>
          <td>
            <?php if( $product->get_stock_status() == 'instock' ){ ?>
              <form id="variations_table_form" action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" method="post" enctype="multipart/form-data">
                <div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-enabled">
                  <button type="submit" class="single_add_to_cart_button add_to_cart button alt">
                    <span class="desktop"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></span>
                    <span class="mobile">Buy</span>
                  </button>
                  <input type="hidden" name="quantity" class="quantity" data-vid="<?php echo $product->get_id(); ?>" value="">
                  <input type="hidden" name="add-to-cart" value="<?php echo get_the_ID(); ?>">
                  <input type="hidden" name="product_id" value="<?php echo get_the_ID(); ?>">
                  <input type="hidden" name="variation_id" class="variation_id" value="<?php echo $product->get_id(); ?>">
                </div>
              </form>
            <?php } else { ?>
              <div id="wc_bis_product_form" data-bis-product-id="<?php echo $product->get_id(); ?>">
                <p class="wc_bis_form_title">Want to be notified when this product is back in stock?</p>
                <?php if( !is_user_logged_in() ){ ?>
                  <input id="wc_bis_email" name="wc_bis_email" type="email" placeholder="Enter Email Address" />
                <?php } else { ?>
                <?php } ?>
                <button class="button wc_bis_send_form" id="wc_bis_send_form" name="wc_bis_send_form"><?php the_field('back_in_stock_notification_link_text', 'options'); ?></button>
              </div>
            <?php } ?>
          </td>
        </tr>
      <?php } elseif( $product->get_type() == 'variable' || $product->get_type() == 'variable-subscription' ){ ?>
        <?php $variations = $product->get_available_variations(); ?>
        <?php foreach ( $variations as $key => $value ) { ?>
          <?php $variation = wc_get_product($value['variation_id']); ?>
          <?php if( $value['variation_is_visible'] != 1 || $value['variation_is_active'] != 1 ) continue; ?>
          <tr data-type="variable_or_variable-subscription qwe">
            <td>
              <?php
              if( $value['attributes']['attribute_pa_quantity'] ){
                echo formatVariationName($value['attributes']['attribute_pa_quantity']);
              } elseif( $value['attributes']['attribute_pa_size'] ) {
                echo formatVariationName($value['attributes']['attribute_pa_size']);
              } else {
                echo formatVariationName($value['attributes']['attribute_pa_product']);
              }
              ?>
              <div style="display:none !important;">
                <?php print_r($value); ?>
              </div>
            </td>
            <td>
              <?php
              if( strlen($value['display_price']) > 0 ){
                echo '$' . $value['display_price'];
              } else {
                echo $value['price_html'];
              }
              ?>
            </td>
            <td>
              <input type="number" data-vid="<?php echo $value['variation_id']; ?>" class="input-text qty text" step="1" min="1" max="" name="quantity" value="" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
            </td>
            <td>
              <?php if( $value['is_in_stock'] == 1 ) { ?>
                <span>In stock</span>
              <?php } else { ?>
                <?php if( strlen($value['variation_description']) ){ ?>
                  <span class="out-of-stock"><?php echo $value['variation_description']; ?></span>
                <?php } else { ?>
                  <span class="out-of-stock"><?php the_field('out_of_stock_default_notice', 'options'); ?></span>
                <?php } ?>
              <?php } ?>
            </td>
            <td>
              <?php if( $value['is_in_stock'] == 1 ) { ?>
                <form id="variations_table_form" action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" method="post" enctype="multipart/form-data">
  								<div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-enabled">
  									<button type="submit" class="single_add_to_cart_button add_to_cart button alt">
                      <span class="desktop">Add to cart</span><span class="mobile">Buy</span>
                    </button>
                    <input type="hidden" name="quantity" class="quantity" data-vid="<?php echo $value['variation_id']; ?>" value="">
                    <input type="hidden" name="add-to-cart" value="<?php echo get_the_ID(); ?>">
  									<input type="hidden" name="product_id" value="<?php echo get_the_ID(); ?>">
  									<input type="hidden" name="variation_id" class="variation_id" value="<?php echo $value['variation_id']; ?>">
  								</div>
  							</form>
              <?php } else { ?>
                <div id="wc_bis_product_form" data-bis-product-id="<?php echo $value['variation_id']; ?>">
                  <p class="wc_bis_form_title">Want to be notified when this product is back in stock?</p>
                  <?php if( !is_user_logged_in() ){ ?>
                    <input id="wc_bis_email" name="wc_bis_email" type="email" placeholder="Your Email" />
                  <?php } else { ?>
                  <?php } ?>
                  <button class="button wc_bis_send_form" id="wc_bis_send_form" name="wc_bis_send_form"><?php the_field('back_in_stock_notification_link_text', 'options'); ?></button>
                </div>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      <?php } ?>
    </tbody>
  </table>
</div>
<div class="woocommerce-product-nav-row">
  <div class="nav-item previous-product">
    <!-- <a href="<?php echo getAdjacentProduct($post->ID, 'prev'); ?>"><i class="arrow"></i> Previous Product</a> -->
  </div>
  <div class="nav-item">
    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
  </div>
  <div class="nav-item next-product">
    <!-- <a href="<?php echo getAdjacentProduct($post->ID, 'next'); ?>">Next Product <i class="arrow"></i></a> -->
  </div>
</div>
