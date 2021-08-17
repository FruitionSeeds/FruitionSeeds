<?php
//
// This should ideally come from a template file but I couldn't get the template file content to play nice with Gutenberg blocks.
//
function reusable_block_shortcode($attr) {
  $type = $attr['type'];

  $block = get_page_by_path( $type, null, 'reusable_blocks' );
  $color = get_field('font_color', $block->ID);
  $image_id = get_field('background_image', $block->ID);
  $image_url = wp_get_attachment_image_src($image_id, 'large')[0];
  $bg_position = get_field('background_position', $block->ID);
  $extend_bg = get_field('extend_background', $block->ID);
  $bg_size = get_field('background_size', $block->ID);
  $shadow = get_field('shadow', $block->ID);
  $darken = get_field('darken_background_image', $block->ID);

  $styles = '';
  $classes = 'reusable-block ';
  if($color) $styles .= 'color:'.$color.';';
  if($image_id) $styles .= 'background-image:url('.$image_url.');background-repeat:no-repeat;';
  if($bg_position) $styles .= 'background-position:'.$bg_position.';';
  if($bg_size) $styles .= 'background-size:'.$bg_size.';';
  if(strtolower($shadow) == 'yes') $styles .= 'box-shadow: 0 2px 20px -5px #929292;margin:50px 0;';
  if(strtolower($darken) == 'yes') $classes .= 'darken ';

  $html = '';

  if($extend_bg == 'yes')  $html .= '</div>';

  $html .= '<section class="'.$classes.'" style="'.$styles.'">';
    $html .= '<div class="container">';
      $html .= $block->post_content;
    $html .= '</div>';
  $html .= '</section>';

  if($extend_bg == 'yes')  $html .= '<div class="container">';

  return $html;
}

//
//
//
function plant_now_shortcode($attr) {
  get_template_part('template-parts/learn/plant-now/all');
}

//
//
//
function growing_guides_shortcode($attr){
  get_template_part('template-parts/blocks/growing_guides');
}

?>
