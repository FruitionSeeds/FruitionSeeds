<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full width
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area container-fullwidth full-width-override">
		<main id="main" class="site-main" role="main">
			<?php if(get_field('show_hero') == 'yes' && get_field('hero_image')){ ?>
				<div id="hero_banner" style="<?php echo bgImgFromID(get_field('hero_image'), 'page-banner'); ?>"></div>
			<?php } ?>
			<!-- <div class="breadcrumb-wrapper">
				<div class="container">
					<div class="row">
						<div class="col">
							<?php //woocommerce_breadcrumb( array( 'delimiter'   => ' | ', 'home'        => null ) );?>
						</div>
					</div>
				</div>
			</div> -->
			<div class="container">
			<?php
			while ( have_posts() ) :
				the_post();

				do_action( 'storefront_page_before' );

				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to storefront_page_after action
				 *
				 * @hooked storefront_display_comments - 10
				 */
				do_action( 'storefront_page_after' );

			endwhile; // End of the loop.
			?>
			</div>
			<?php if(get_field('show_signature') == 'yes'){ ?>
				<div id="signature">
					<div class="container">
						<div class="row">
							<div class="col">
								<p class="closing"><?php the_field('closing_text'); ?>,</p>
								<?php if(get_field('which_signature') == 'both'){ ?>
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/petra-matthew-signature.png" alt="Hand drawn heart and signature that reads petra and matthew" height="70px" />
								<?php } else { ?>
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/petra-signature.png" alt="Hand drawn heart and signature that reads petra" height="70px" />
								<?php } ?>
								<p class="and_crew"><?php the_field('and_crew_text'); ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
