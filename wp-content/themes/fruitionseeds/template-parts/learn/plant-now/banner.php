<?php if(get_field('guide_banner_image')){ ?>
	<div id="hero_banner" style="<?php echo bgImgFromID(get_field('guide_banner_image'), 'page-banner'); ?>"></div>
<?php } elseif(get_field('plant_now_landing_page_banner', 'options')){ ?>
	<div id="hero_banner" style="<?php echo bgImgFromID(get_field('plant_now_landing_page_banner', 'options'), 'page-banner'); ?>"></div>
<?php } ?>
