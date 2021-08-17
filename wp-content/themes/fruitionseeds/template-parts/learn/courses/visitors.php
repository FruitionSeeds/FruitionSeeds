
<?php
if( get_field('visitor_options') == 'page' ){
  header('Location: ' . get_permalink(get_field('custom_visitor_page')));
  die();
}
if( isset($args['data']['course_id']) ){
  $id = $args['data']['course_id'];
  $title = get_the_title($args['data']['course_id']);
} else {
  $id = get_the_ID();
  $title = get_the_title();
}

$settings = learndash_get_course_meta_setting($post->ID);
$course_price_type = $settings['sfwd-courses_course_price_type'];
?>
<div class="course landing">
  <?php if( get_field('intro_shortcode') ){ ?>
    <div class="intro">
      <?php echo do_shortcode( get_field('intro_shortcode') ); ?>
    </div>
  <?php } ?>
  <div class="sign-up" style="<?php echo bgImgFromID(get_field('sign_up_form_background_1', 'full')); ?>">
    <div class="row">
      <div class="col-12 col-sm-9 offset-sm-3 col-md-6 offset-md-6">
        <div class="wrapper">
          <div class="title">
            <?php the_field('sign_up_form_title'); ?>
          </div>
          <div class="description">
            <?php the_field('sign_up_form_description'); ?>
          </div>
          <div class="form-wrapper button-wrapper">
            <?php if( !is_user_logged_in() ){ ?>
              <button class="btn-join">
                <?php echo generateCourseButtonText($id, $title, $course_price_type); ?>
              </button>
              <form id="register" method="post" class="woocommerce-form woocommerce-form-register register">
                <span class="close-link">X</span>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_email">Email address <span class="required">*</span></label>
                  <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="" />
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_password">Password <span class="required">*</span></label>
                  <span class="password-input">
                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                    <span class="show-password-input"></span>
                  </span>
                </p>
                <p class="disclaimer-row form-row">
                  <?php the_field('register_log_opt_in', 'option'); ?>
                </p>
                <p class="woocommerce-form-row form-row">
                  <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                  <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">Register</button>
                </p>
                <input type="hidden" name="redirect" value="<?php echo get_the_permalink(); ?>#do_enroll">
              </form>
              <form id="login" class="woocommerce-form woocommerce-form-login login" method="post">
                <span class="close-link">X</span>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="username">Username or email address <span class="required">*</span></label>
                  <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="" />
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="password">Password <span class="required">*</span></label>
                  <span class="password-input">
                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
                    <span class="show-password-input"></span>
                  </span>
                </p>
                <p class="form-row">
                  <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                  </label>
                  <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                  <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                </p>
                <p class="woocommerce-LostPassword lost_password">
                  <a href="/my-account/lost-password/">Lost your password?</a>
                </p>
              </form>
            <?php } else { ?>
              <?php echo do_shortcode('[learndash_payment_buttons]'); ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="info">
    <div class="row">
      <div class="col col-12 col-md-6">
        <?php the_field('info_content'); ?>
      </div>
      <div class="col col-12 col-md-6">
        <img src="<?php the_field('info_image'); ?>" />
      </div>
    </div>
    <div class="row">
      <div class="col-12 video-wrapper">
        <div class="title">
          <?php the_field('video_title'); ?>
        </div>
        <div class="video-embed-wrapper">
          <?php the_field('video_url'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="faq">
    <div class="row">
      <div class="col col-12 col-md-6">
        <div class="course-title">
          <?php the_title(); ?>
        </div>
        <div class="title">
          <?php the_field('faq_title'); ?>
        </div>
        <?php the_field('faq_content'); ?>
        <?php get_template_part('template-parts/signature'); ?>
      </div>
      <div class="col col-12 col-md-6">
        <img src="<?php the_field('faq_image_1'); ?>" />
        <br /><br />
        <img src="<?php the_field('faq_image_2'); ?>" />
      </div>
    </div>
  </div>
</div>
