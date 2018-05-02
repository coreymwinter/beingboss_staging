<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="home-wrapper">

	<div class="container-fluid" id="content">

		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<header class="entry-header">

							<figure class="bbpage-header book-landing" style="background-image: url('/wp-content/themes/beingboss2018/img/HomeHeader.jpg');">
									<div class="container">
										
									</div>
								</figure>

							</header><!-- .entry-header -->

							<div class="entry-content">

								<?php the_content(); ?>
								<div class="container">
									<div class="relatedpostsection">
										<?php
												$query_two_args = array(
														'post_type' => array( 'webinar' ),
														'posts_per_page' => 1,
														'tax_query' => array(
															array(
																'taxonomy' => 'webinarcategories',
																'field'	   => 'slug',
																'terms'    => 'home',
															),
														),
												);
											
												$home_query_two = new WP_Query( $query_two_args );

											if ( $home_query_two->have_posts() ) {
												while ( $home_query_two->have_posts() ) {
													$home_query_two->the_post();
													$webinar_link = get_post_meta( get_the_ID(), 'bbwebinar_external_link', true );
										?>
													<div class="relatedpostbox">
														<div class="relatedpostimage">
															<a href="<?php echo $webinar_link; ?>" target="_blank" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a>
															<div class="relatedpostarrow"><span class="relatedpostlabel">FREE TRAINING</span></div>
														</div>
														<div class="relatedpostbottom">
															<img src="/wp-content/themes/beingboss2018/img/Home_Icon_Training.png">
															<h5><a href="<?php echo $webinar_link; ?>" target="_blank" title="<?php the_title(); ?>"><span class="relatedposttitle"> <?php the_title(); ?></span></a></h5>
															<a href="<?php echo $webinar_link; ?>" target="_blank" class="relatedpostlistennow">REGISTER NOW >></a>
														</div>
													</div>
										<?php
												}
												/* Restore original Post Data */
												wp_reset_postdata();
											} else {
												// no posts found
											}
										?>
										<?php
												$query_three_args = array(
														'post_type' => 'post',
														'posts_per_page' => 1,
												);
											
												$home_query_three = new WP_Query( $query_three_args );

											if ( $home_query_three->have_posts() ) {
												while ( $home_query_three->have_posts() ) {
													$home_query_three->the_post();
										?>
													<div class="relatedpostbox">
														<div class="relatedpostimage">
															<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a>
															<div class="relatedpostarrow"><span class="relatedpostlabel">LATEST EPISODE</span></div>
														</div>
														<div class="relatedpostbottom">
															<img src="/wp-content/themes/beingboss2018/img/BBClubhouse_SecretEpisodes.png">
															<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="relatedposttitle"> <?php the_title(); ?></span></a></h5>
															<a href="<?php the_permalink(); ?>" class="relatedpostlistennow">LISTEN NOW >></a>
														</div>
													</div>
										<?php
												}
												/* Restore original Post Data */
												wp_reset_postdata();
											} else {
												// no posts found
											}
										?>
										<?php
												$query_one_args = array(
														'post_type' => array( 'library' ),
														'posts_per_page' => 1,
														'tax_query' => array(
															array(
																'taxonomy' => 'librarytype',
																'field'	   => 'slug',
																'terms'    => 'home',
															),
														),
												);
											
												$home_query_one = new WP_Query( $query_one_args );

											if ( $home_query_one->have_posts() ) {
												while ( $home_query_one->have_posts() ) {
													$home_query_one->the_post();
													$thrive_shortcode_id = get_post_meta( get_the_ID(), 'bblibrary_thrive_id', true );
										?>
													<div class="relatedpostbox">
														<div class="relatedpostimage">
															<span class="tve-leads-two-step-trigger tl-2step-trigger-<?php echo do_shortcode($thrive_shortcode_id); ?>"><?php the_post_thumbnail('archive-thumb'); ?></span>
															<div class="relatedpostarrow"><span class="relatedpostlabel">INSTANT DOWNLOAD</span></div>
														</div>
														<div class="relatedpostbottom" style="background: #eaeaea;">
															<img src="/wp-content/themes/beingboss2018/img/Home_Icon_Resource.png">
															<h5><span class="tve-leads-two-step-trigger tl-2step-trigger-<?php echo do_shortcode($thrive_shortcode_id); ?>"><span class="relatedposttitle"> <?php the_title(); ?></span></span></h5>
															<span class="tve-leads-two-step-trigger tl-2step-trigger-<?php echo do_shortcode($thrive_shortcode_id); ?>"><span class="relatedpostlistennow">DOWNLOAD >></span></span>
														</div>
													</div>
										<?php
												}
												/* Restore original Post Data */
												wp_reset_postdata();
											} else {
												// no posts found
											}
										?>
										
									</div>
									<p class="featuredon" style="padding-top: 50px;">AS FEATURED ON: <img class="aligncenter wp-image-3927 size-full" src="/wp-content/uploads/2017/11/Press_FeaturedLogos.png" alt="" width="974" height="124"></p>
									<h2 class="center xlarge" style="padding-top: 80px;">ORDER THE BEING BOSS BOOK</h2>
									<hr class="even">
								</div>
								<div class="home-book-section">
									<div class="container">
										<div class="pagesection50">
											<div class="row">
												<div class="col-md-8"><p class="white brandon xxlarge italic">"FINALLY, A BOOK FOR ENTREPRENEURS THAT HONORS YOUR INTUITION WHILE CULTIVATING YOUR INNER BADASS."</p><p class="center white brandon mediumsmall">- MELISSA HARTWIG,<br />WHOLE30 CO-CREATOR AND #1 NEW YORK TIMES BEST-SELLING AUTHOR</p></div>
												<div class="col-md-4"><a href="https://beingboss.club/book"><img src="/wp-content/themes/beingboss2018/img/BeingBossBookMockup_Paperback_Home.png"></a></div>
											</div>
											<div class="row">
												<a class="button" href="/book">BUY NOW</a>
											</div>
										</div>
									</div>
								</div>
								<div class="container pagesection80">
									<h2 class="center large">RECENT PODCAST EPISODES</h2>
									<hr class="even">
									<div class="relatedpostsection">
										<?php
												$query_three_args = array(
														'post_type' => 'post',
														'posts_per_page' => 3,
														'offset' => 1
												);
											
												$home_query_three = new WP_Query( $query_three_args );

											if ( $home_query_three->have_posts() ) {
												while ( $home_query_three->have_posts() ) {
													$home_query_three->the_post();
										?>
													<div class="relatedpostbox">
														<div class="relatedpostimage"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a></div>
														<div class="relatedpostbottom">
															<img src="/wp-content/themes/beingboss2018/img/BBClubhouse_SecretEpisodes.png">
															<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="relatedposttitle"> <?php the_title(); ?></span></a></h5>
															<a href="<?php the_permalink(); ?>" class="relatedpostlistennow">LISTEN NOW >></a>
														</div>
													</div>
										<?php
												}
												/* Restore original Post Data */
												wp_reset_postdata();
											} else {
												// no posts found
											}
										?>
									</div>
								</div>

							</div><!-- .entry-content -->

						</article><!-- #post-## -->				

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
