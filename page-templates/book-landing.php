<?php
/**
 * Template Name: Book Sales Landing Page
 *
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$postid = get_the_ID();
$toppadding = get_post_meta( $postid, 'bbpage_top_padding', true );
$pagecss = get_post_meta( $postid, 'bbpage_page_css', true );
?>
<!-- custom css -->
<style><?php echo $pagecss; ?></style>
<!-- custom css -->

<div class="wrapper" id="full-width-page-wrapper">

	<div class="container-fluid" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<?php $header_image = get_post_meta( $postid, 'bbpage_header_image', true ); ?>
							<?php $header_text = get_post_meta( $postid, 'bbpage_header_text', true ); ?>							


							<header class="entry-header">

								<figure class="bbpage-header book-landing" style="background-image: url('<?php echo $header_image; ?>');">
									<div class="container">
										<div class="headertext">
											<div class="flag">
												<span class="italic">the Being Boss book</span><br /><span class="brandon">ORDER YOURS TODAY!</span>
											</div>
											<img class="bookimage" src="https://beingboss.club/wp-content/themes/beingboss2018/img/BeingBossBookMockup_Paperback_Home.png" alt="" />
										</div>
									</div>
								</figure>

							</header><!-- .entry-header -->

							<div class="entry-content" style="padding-top:<?php echo $toppadding; ?>px">

								<?php the_content(); ?>

								<div class="container">
									<div class="pagesection80 padbot0">
										<div class="row">
											<div class="col-lg-12">
												<h2 class="center h1 xlarge">BOOK TOUR</h2>
												<hr class="even" />
												<?php echo do_shortcode('[searchandfilter id="11228"]'); ?>
												<?php echo do_shortcode('[searchandfilter id="11228" show="results"]'); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="container">
									<div class="capsule pagesection80">
										<h2 class="center h1 xlarge">MEET EMILY + KATHLEEN</h2>
												<hr class="even" />
										<?php echo do_shortcode('[content_block slug=content-e-k-bio]'); ?>
									</div>
								</div>
								<div class="container" style="margin-bottom: 80px;">
									<div class="row">
										<div class="col-md-12 center">
											<h2>MEDIA CONTACT</h2>
											<p>hello@beingboss.club</p>
										</div>
									</div>
								</div>
								<div class="container-fluid graysection" style="padding: 80px 0;">
									<div class="container">
									<h2 class="center xlarge">GALLERY</h2>
									<hr class="even" />
									<p class="center">Looking for images or copy that you can plug and play into your story? Grab them below!</p>

									<?php echo do_shortcode('[the_grid name="Book File Swipe"]'); ?></div>
								</div>
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
<?php get_footer(); ?>
