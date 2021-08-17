<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<?php
$classes_string = 'fruition-seeds ';
if($post->ID){
	$taxonomies = get_the_terms( $post->ID, 'guide_type' );
	$tax_string = join(', ', wp_list_pluck($taxonomies, 'slug'));
	$classes_string .= $tax_string;
}
$page_slug = get_post_field( 'post_name' );
$classes_string .= $page_slug;
?>
<body <?php body_class($classes_string); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

		<div id="topbar">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-6 left">
						<?php echo wp_nav_menu( array( 'theme_location' => 'top-bar-left' ) ); ?>
					</div>
					<div class="col-12 col-sm-6 right">
						<ul id="menu-top-bar-right-menu" class="menu">
							<?php if (is_user_logged_in()) : ?>
								<li class="account"><a href="/my-account/">Account</a></li>
								<li class="logout"><a href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a></li>
							<?php else : ?>
						    <li class="login-register"><a href="/my-account/">Login or Create an Account</a></li>
							<?php endif;?>
							<li class="search">
								<a href="/search">
									<i class="fa fa-search"></i>
								</a>
							</li>
							<li>
								<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
									<?php echo WC()->cart->get_cart_total(); ?>
									<i class="fa fa-shopping-cart"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php if( get_field('show_notification', 'options') == 'yes' ){ ?>
			<?php $notice = get_field('notification', 'options'); ?>
			<div id="notice" class="<?php echo $notice['banner_action']; ?>"
						style="background-color:<?php echo $notice['bg_color']; ?>;color:<?php echo $notice['text_color']; ?>"
						data-link="<?php echo $notice['banner_link']; ?>">
				<div class="container">
					<span class="title"><?php echo $notice['notice_text_title']; ?></span>
					<span class="subtitle"><?php echo $notice['notice_text_subtitle']; ?></span>
					<?php if($notice['include_button'] == 'yes'){ ?>
						<button class="link" data-link="<?php echo $notice['button_link']; ?>">
							<?php echo $notice['button_text']; ?>
						</button>
						<style> #notice button { border-color:<?php echo $notice['text_color']; ?> !important; color:<?php echo $notice['text_color']; ?> !important; } </style>
					<?php } ?>
				</div>
				<?php if($notice['banner_action'] == 'closeable'){ ?>
					<span class="close">Close</span>
					<style> #notice .close::after, #notice .close::before { background-color:<?php echo $notice['text_color']; ?> !important; } </style>
				<?php } ?>
			</div>
		<?php } ?>
		<div id="main-menu">
			<div id="primary-menu">
				<div class="container">
					<div class="row">
						<div class="d-none d-sm-none d-md-block col-md-4 right">
							<?php echo wp_nav_menu( array( 'theme_location' => 'primary-menu-left' ) ); ?>
						</div>
						<div class="col-12 col-md-4 center logo-wrapper">
							<a href="/">
								<img src="<?php echo wp_get_attachment_image_src(get_field('logo', 'options'), 'medium')[0]?>" alt="" />
							</a>
						</div>
						<div class="d-none d-sm-none d-md-block col-md-4 left">
							<?php echo wp_nav_menu( array( 'theme_location' => 'primary-menu-right' ) ); ?>
						</div>
					</div>
				</div>
			</div>
			<div id="secondary-menu">
				<div class="container">
					<?php //if(!wp_is_mobile()){ ?>
						<?php if( isLearn() ){ ?>
							<?php echo wp_nav_menu( array( 'theme_location' => 'learn-menu' ) ); ?>
						<?php } else { ?>
							<?php echo wp_nav_menu( array( 'theme_location' => 'shop-menu' ) ); ?>
						<?php } ?>
					<?php //} else { ?>
						<?php //echo wp_nav_menu( array( 'theme_location' => 'mobile-main-menu' ) ); ?>
					<?php //} ?>
				</div>
			</div>
		</div>

	</header><!-- #masthead -->

	<?php do_action( 'storefront_before_content' ); ?>

	<?php do_action( 'storefront_content_top' ); ?>
