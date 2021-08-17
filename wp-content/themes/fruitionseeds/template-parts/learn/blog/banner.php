<?php if(get_field('blog_landing_page_banner', 'options')){ ?>
	<div id="hero_banner" style="<?php echo bgImgFromID(get_field('blog_landing_page_banner', 'options'), 'page-banner'); ?>"></div>
<?php } ?>
