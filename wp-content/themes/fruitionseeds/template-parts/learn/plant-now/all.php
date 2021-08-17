<?php
$plant_now_category_id = get_term_by('slug', 'what-to-plant-now', 'product_cat');
$categories = get_terms( array(
  'taxonomy' => 'product_cat',
  'child_of' => $plant_now_category_id->term_id
) );
?>
<div class="plant-now-tabs" id="tabs">
  <ul>
    <?php $a = 1; foreach($categories as $category){ ?>
      <li><a href="#tabs-<?php echo $a; ?>"><?php echo $category->name; ?></a></li>
    <?php $a++; } ?>
  </ul>
  <?php $b = 1; foreach($categories as $category){ ?>
    <div id="tabs-<?php echo $b; ?>">
      <h2><?php echo $category->name; ?></h2>
      <?php include( locate_template( 'template-parts/learn/plant-now/month.php', false, false ) ); ?>
    </div>
  <?php $b++; } ?>
</div>
