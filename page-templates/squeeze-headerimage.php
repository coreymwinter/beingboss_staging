<?php
/**
 * Template Name: Squeeze - Header Image
 *
 *
 * @package understrap
 */

get_header( 'squeeze' );
$container = get_theme_mod( 'understrap_container_type' );
$postid = get_the_ID();
$toppadding = get_post_meta( $postid, 'bbpage_top_padding', true );
$pagecss = get_post_meta( $postid, 'bbpage_page_css', true );
?>
<!-- custom css -->
<style><?php echo $pagecss; ?></style>
<!-- custom css -->

<div class="wrapper" id="squeeze-wrapper">

	<div class="container-fluid" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<?php $header_image = get_post_meta( $postid, 'bbpage_header_image', true ); ?>
							<?php $header_text = get_post_meta( $postid, 'bbpage_header_text', true ); ?>							


							<header class="entry-header">

								<figure class="bbpage-header" style="background-image: url('<?php echo $header_image; ?>');">
									<div class="container">
										<div class="headertext">
											<?php echo $header_text; ?>
										</div>
									</div>
								</figure>							</header><!-- .entry-header -->

							<div class="entry-content" style="padding-top:<?php echo $toppadding; ?>px">

								<?php the_content(); ?>

							</div><!-- .entry-content -->

							<footer class="entry-footer">


							</footer><!-- .entry-footer -->

						</article><!-- #post-## -->

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer( 'squeeze' ); ?>
