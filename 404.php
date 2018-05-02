<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">

						<div class="page-content">

							<div class="ontainer pagesection80">
								<div class="center">
									<div class="error-number"><img src="http://beingboss.club/wp-content/uploads/2016/03/404oops.png"></div>
									<p class="xxmedium">Well that's sure awkward. Please excuse us.</p>
									<p class="xxmedium"><a href="http://www.beingboss.club">Go to home >></a></p>
								</div>
							</div>


						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
