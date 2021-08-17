<?php
$plant_now_category_id = get_term_by('slug', 'what-to-plant-now', 'product_cat');
$categories = get_terms( array(
  'taxonomy' => 'product_cat',
  'child_of' => $plant_now_category_id->term_id
) );
?>
<div class="row boxes months">
  <?php foreach($categories as $category){ ?>
    <div class="col-3 month">
      <a href="/learn/guides/type/plant-now/?month=<?php echo $category->slug; ?>">
        <?php echo $category->name; ?>
      </a>
    </div>
  <?php } ?>
</div>
