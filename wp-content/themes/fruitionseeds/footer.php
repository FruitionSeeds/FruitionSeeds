<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

	<?php do_action( 'storefront_before_footer' ); ?>
	<?php get_template_part('template-parts/search/overlay'); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row footer-content">
				<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-2 offset-md-0 sub-logo footer-column-1">
					<?php dynamic_sidebar( 'footer-column-1' ); ?>
				</div>
				<div class="col-10 offset-1 col-sm-4 offset-sm-0 col-md-2">
					<?php dynamic_sidebar( 'footer-column-2' ); ?>
				</div>
				<div class="col-10 offset-1 col-sm-4 offset-sm-0 col-md-2">
					<?php dynamic_sidebar( 'footer-column-3' ); ?>
				</div>
				<div class="col-10 offset-1 col-sm-4 offset-sm-0 col-md-2">
					<?php dynamic_sidebar( 'footer-column-4' ); ?>
				</div>
				<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-4 offset-md-0 footer-column-5">
					<?php dynamic_sidebar( 'footer-column-5' ); ?>
				</div>
				<div class="col-12 copyright">
					<?php dynamic_sidebar( 'footer-bottom-row' ); ?> <?php echo date('Y'); ?>
				</div>
			</div>
		</div><!-- .col-full -->
		<div class="row footer-bg">
			<div class="col-6 left-side">

			</div>
			<div class="col-6 right-side">

			</div>
		</div>
	</footer><!-- #colophon -->
	<div class="overlay"></div>
	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php if( !is_page('my-account') ){ ?>
	<div id="course_signup" style="display:none !important;">
		<?php get_template_part('template-parts/course_signup'); ?>
	</div>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>
