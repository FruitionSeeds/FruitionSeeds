<?php
if( isset($args['data']['course_id']) ){
  $id = $args['data']['course_id'];
  $title = get_the_title($args['data']['course_id']);
} else {
  $id = get_the_ID();
  $title = get_the_title();
}
?>
<?php if( !is_user_logged_in() ){ ?>
  <div class="form-wrapper">
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
      <input id="register-redirect" type="hidden" name="redirect" value="" />
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
      <input id="login-redirect" type="hidden" name="redirect" value="" />
    </form>
  </div>
<?php } else { ?>
  <button class="take-course">
    <a href="<?php echo ($args['data']['course_id']) ? get_the_permalink($args['data']['course_id']) : ''; ?>">
      <?php the_field('course_enroll_button_text', 'option'); ?>
    </a>
  </button>
<?php } ?>
