<header class="ebook_header">
  <?php if(get_field('growing_guides_landing_page_title', 'options')){ ?>
    <h1 class="page-title ebook-title">
      <a href="/blog">
        <?php the_field('growing_guides_landing_page_title', 'options'); ?>
      </a>
    </h1>
  <?php } ?>
  <?php if(get_field('growing_guides_landing_page_description', 'options')){ ?>
    <div class="page-description ebook-description"><?php the_field('growing_guides_landing_page_description', 'options'); ?></div>
  <?php } ?>
</header>
