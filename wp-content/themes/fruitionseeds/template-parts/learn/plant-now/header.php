<header class="plant-now_header">
  <?php if(get_field('plant_now_landing_page_title', 'options')){ ?>
    <h1 class="page-title ebook-title">
      <a href="/guide_type/plant-now/">
        <?php echo trim(get_field('plant_now_landing_page_title', 'options')); ?>
      </a>
    </h1>

    <?php if($_GET['month']){ ?>
      <h2 class="month-title"><?php echo $_GET['month']; ?></h2>
    <?php } ?>

  <?php } ?>
  <?php if(!$_GET['month'] && get_field('plant_now_landing_page_description', 'options')){ ?>
    <div class="page-description ebook-description"><?php the_field('plant_now_landing_page_description', 'options'); ?></div>
  <?php } ?>
</header>
