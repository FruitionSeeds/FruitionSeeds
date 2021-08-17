<header class="courses_header">
  <?php if(get_field('courses_landing_page_title', 'options')){ ?>
    <h1 class="page-title courses-title">
      <?php the_field('courses_landing_page_title', 'options'); ?><?php if($_GET['category']){ echo ': ' . $_GET['category']; } ?>
    </h1>
  <?php } ?>
  <?php if(get_field('courses_landing_page_description', 'options')){ ?>
    <div class="page-description courses-description"><?php the_field('courses_landing_page_description', 'options'); ?></div>
  <?php } ?>
</header>
