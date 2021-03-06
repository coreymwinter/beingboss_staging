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

				<div class="col-md-5 footer-subscribe-left">

					<img src="/wp-content/themes/beingboss2018/img/Footer_HeadphonesBoss2.png">

				</div><!--col end -->
				<div class="col-md-7 footer-subscribe-right">
					<div class="pagesection">
						<p class="brandon large">CREATIVE + ENTREPRENEUR</p>
						<p class="xmedium italic">Get the scoop on how to be more boss.</p>
						<?php echo do_shortcode('[content_block id=11678]'); ?>
						<p class="center small padtop15">Subscribing indicates your consent to our <a href="/terms" target="_blank" class="blacklink underline">Terms of Use</a> &amp; <a href="/privacy" target="_blank" class="blacklink underline">Privacy Policy.</a></p>
					</div>
				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- pagesection end -->
	
	<footer class="wrapper" id="wrapper-footer">
	
	<?php else: ?>
		<footer class="wrapper" id="wrapper-footer">
		
<?php endif; ?>


	<div class="<?php echo esc_attr( $container ); ?>">

				<div class="site-info">
					<?php if ( dynamic_sidebar('footer_copyright') ) : else : endif; ?>
				</div><!-- .site-info -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->




<?php wp_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script src="/wp-content/themes/beingboss2018/drawer/drawer.min.js" charset="utf-8"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('.drawer').drawer();
    });
</script>
<!-- Drip -->
<script type="text/javascript">
  var _dcq = _dcq || [];
  var _dcs = _dcs || {};
  _dcs.account = '5427386';

  (function() {
    var dc = document.createElement('script');
    dc.type = 'text/javascript'; dc.async = true;
    dc.src = '//tag.getdrip.com/5427386.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(dc, s);
  })();
</script>
<!-- end Drip -->
</body>

</html>

