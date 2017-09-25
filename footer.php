<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<?php if (! get_post_meta( get_the_ID(), 'bbpage_hide_subscribe', 1 ) ) : ?>
	<div class="wrapper" id="footer-subscribe">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="row">

				<div class="col-md-5">

					<img src="/wp-content/themes/beingboss2018/img/Footer_HeadphonesBoss.png" style="margin-top: -100px; max-width: 250px;">

				</div><!--col end -->
				<div class="col-md-7">
					<div class="pagesection">
						<p class="brandon xxmedium">CREATIVE + ENTREPRENEUR</p>
						<p class="medium italic">Podcast notifications + episode extras to help you do the work.</p>
						<?php if (function_exists('tve_leads_form_display')) { tve_leads_form_display(0, 9514); } ?>
					</div>
				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- pagesection end -->
	
	<footer class="wrapper" id="wrapper-footer">
	
	<?php else: ?>
		<footer class="wrapper" id="wrapper-footer" style="margin-top: 80px;">
		
<?php endif; ?>


	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-4">
				<div class="row">
					<div class="col-sm-4">
						<?php if ( dynamic_sidebar('footer_menu_1') ) : else : endif; ?>
					</div>
					<div class="col-sm-4">
						<?php if ( dynamic_sidebar('footer_menu_2') ) : else : endif; ?>
					</div>
					<div class="col-sm-4">
						<?php if ( dynamic_sidebar('footer_menu_3') ) : else : endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-3">
			</div>
			<div class="col-md-5">
				<div class="site-info">
					<?php if ( dynamic_sidebar('footer_copyright') ) : else : endif; ?>
				</div><!-- .site-info -->
			</div>

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

