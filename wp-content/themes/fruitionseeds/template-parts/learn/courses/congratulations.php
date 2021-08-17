<div id="congratulations">
  <span class="close">Close</span>
  <h2>
    <?php echo str_replace('{{course}}', get_the_title(), get_field('new_course_enrollment_message_title', 'options')); ?>
  </h2>
  <div class="subtitle">
    <?php echo str_replace('{{course}}', get_the_title(), get_field('new_course_enrollment_message_subtitle', 'options')); ?>
  </div>
  <div class="content">
    <?php echo str_replace('{{course}}', get_the_title(), get_field('new_course_enrollment_message_description', 'options')); ?>
  </div>
  <button class="home"><a href="/">Back to Home</a></button>
  <button class="close">Close &amp; View Course</button>
</div>
<div id="congrats-overlay"></div>
