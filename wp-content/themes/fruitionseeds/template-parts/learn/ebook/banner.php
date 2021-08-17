<?php if(get_field('guide_banner_image')){ ?>
	<div id="hero_banner" style="<?php echo bgImgFromID(get_field('guide_banner_image'), 'full'); ?>"></div>
<?php } elseif(get_field('ebook_landing_page_banner', 'options')){ ?>
	<div id="hero_banner" style="<?php echo bgImgFromID(get_field('ebook_landing_page_banner', 'options'), 'full'); ?>"></div>
<?php } ?>
