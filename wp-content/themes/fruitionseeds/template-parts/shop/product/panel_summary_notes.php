<div class="woocommerce-product-notes">
  <?php $notes = get_field('product_notes');?>
  <?php if( $notes ) { ?>
    <?php foreach( $notes as $note ) { ?>
      <span class="<?php echo (in_array('italics', $note['style'])) ? 'italics' : ''; ?>">
        <?php echo $note['note']; ?>
      </span>
    <?php } ?>
  <?php } ?>
</div>
