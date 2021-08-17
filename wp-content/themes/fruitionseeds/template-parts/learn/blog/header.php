<header class="blog_header">
  <?php if(get_field('blog_landing_page_title', 'options')){ ?>
    <h1 class="page-title blog-title">
      <a href="/blog">
        <?php the_field('blog_landing_page_title', 'options'); ?>

      </a>
    </h1>
    <?php if( is_archive() ){ ?>
      <h2 class="page-subtitle blog-subtitle"><?php echo single_cat_title( '', false ); ?></h2>
    <?php } ?>

  <?php } ?>
  <?php if(get_field('blog_landing_page_description', 'options')){ ?>
    <div class="page-description blog-description"><?php the_field('blog_landing_page_description', 'options'); ?></div>
  <?php } ?>
</header>
