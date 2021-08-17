<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--seedkeeping_guide panel entry-content wc-tab" id="tab-video_guide" role="tabpanel" aria-labelledby="tab-title-video_guide">
  <div id="video_guides">
    <h2 class="woocommerce-video_guide-title">
      <?php the_field('video_panel_title', 'options'); ?>
    </h2>
    <div class="woocommerce-panel-content">
      <?php the_field('video_panel_description', 'options'); ?>
    </div>
    <div class="video-wrapper">
      <?php
      if( have_rows('videos_urls') ){
        while( have_rows('videos_urls') ): the_row(); ?>
          <div class="video item">
            <div style="padding:56.25% 0 0 0;position:relative;">
              <iframe src="https://player.vimeo.com/video/<?php echo getVimeoIdFromUrl( get_sub_field('vimeo_url') ); ?>?color=F8F7D1&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            </div>
            <script src="https://player.vimeo.com/api/player.js"></script>
          </div>
          <?php $i++;
        endwhile;
      } else {
        echo '<center><em>No videos yet, check back again soon!</em></center>';
      }
      ?>
    </div>

  </div>
</div>
