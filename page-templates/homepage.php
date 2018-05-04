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

								<figure class="headersection">
										<a class="home-header-link" href="/quiz"></a>
										<div class="container">
											<div class="headertext">
												<a href="/quiz">
													<h1 class="white giant brandon">WHAT KIND OF BOSS ARE YOU?</h1>

													<p class="white large italic serif">Understand your strengths + challenges<br />as a side-hustler, freelancer, or business owner.</p>
												</a>
												<a class="button-yellow" href="/quiz">TAKE THE QUIZ</a>
											</div>
										</div>
								</figure>

							</header><!-- .entry-header -->

							<div class="entry-content">

								<?php the_content(); ?>
								<div class="container">
									<div class="relatedpostsection">
										<?php
												$query_args = array(
														'post_type' => array( 'homeposts' ),
														'posts_per_page' => 3,
														'meta_key'   => 'bbhome_order',
														'orderby'    => 'meta_value_num',
														'order'      => 'ASC'
												);
											
												$home_query = new WP_Query( $query_args );

											if ( $home_query->have_posts() ) {
												while ( $home_query->have_posts() ) {
													$home_query->the_post();
													$post_link = get_post_meta( get_the_ID(), 'bbhome_link', true );
													$post_top_label = get_post_meta( get_the_ID(), 'bbhome_top_label', true );
													$post_link_label = get_post_meta( get_the_ID(), 'bbhome_link_label', true );
										?>
													<div class="relatedpostbox">
														<div class="relatedpostimage">
															<a href="<?php echo $post_link; ?>" target="_blank" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a>
															<div class="relatedpostarrow"><span class="relatedpostlabel"><?php echo $post_top_label; ?></span></div>
														</div>
														<div class="relatedpostbottom">
															<img src="/wp-content/themes/beingboss2018/img/Icon_Sparkle.png">
															<h5><a href="<?php echo $post_link; ?>" target="_blank" title="<?php the_title(); ?>"><span class="relatedposttitle"> <?php the_title(); ?></span></a></h5>
															<a href="<?php echo $post_link; ?>" target="_blank" class="relatedpostlistennow"><?php echo $post_link_label; ?></a>
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
									<h2 class="center xlarge" style="padding-top: 80px;">LISTEN TO OUR PODCASTS</h2>
									<hr class="even">
									<div class="container" id="homepodcasts">
										<div class="padtop15 padbot30">
											<div class="row">
												<div class="col-md-4"><a href="/podcast"><img src="/wp-content/themes/beingboss2018/img/BB_Logo_Podcast.jpg"></a></div>
												<div class="col-md-4"><a href="/10minutes"><img src="/wp-content/themes/beingboss2018/img/BB_Logo_10Minutes.jpg"></a></div>
												<div class="col-md-4"><a href="/making-a-business"><img src="/wp-content/themes/beingboss2018/img/BB_Logo_MakingABusiness.jpg"></a></div>
											</div>
										</div>
									</div>
									<p class="featuredon" style="padding-top: 50px;">AS FEATURED ON: <img class="aligncenter wp-image-3927 size-full" src="/wp-content/uploads/2017/11/Press_FeaturedLogos.png" alt="" width="974" height="124"></p>
								</div>
								<div class="container pagesection80">
									<div class="discoversection">
										<div class="capsule pagesection50">
											<div class="row">
												<div class="col-lg-5">
													<div style="display: table; margin: -100px auto 50px;"><img src="/wp-content/themes/beingboss2018/img/StartHere_Chalkboard.jpg"></div>
													<p class="brandon large italic">“THE CHALKBOARD IS A BIG, VISUAL REMINDER THAT YOU NEED TO PUT IN THE WORK TO MAKE THIS HAPPEN.”</p><p class="right brandon smallmedium">- KATHLEEN IN EP #79</p></div>
												<div class="col-lg-7">
													<h3 class="xxmedium">PODCAST EPISODES</h3>
													<div class="episodelist padbot30">
														<div class="episodeitem"><div class="itemleft"><img src="/wp-content/themes/beingboss2018/img/BB_Icon_Mic.png"></div><div class="itemright"><a href="/podcast/episode-79-chalkboard-method" target="_blank">EPISODE #79 // Goal Setting: The Chalkboard Method</a></div></div>
														<div class="episodeitem"><div class="itemleft"><img src="/wp-content/themes/beingboss2018/img/BB_Icon_Mic.png"></div><div class="itemright"><a href="/podcast/podcast-episode-2-freaking-out-about-money" target="_blank">EPISODE #2 // What to Do When You're Freaking Out About Money</a></div></div>
														<div class="episodeitem"><div class="itemleft"><img src="/wp-content/themes/beingboss2018/img/BB_Icon_Mic.png"></div><div class="itemright"><a href="/podcast/episode-94-money-mindset" target="_blank">EPISODE #94 // Money Mindset</a></div></div>
														<div class="episodeitem"><div class="itemleft"><img src="/wp-content/themes/beingboss2018/img/BB_Icon_Mic.png"></div><div class="itemright"><a href="/podcast/podcast-episode-48-boss-integrity-jay-pryor" target="_blank">EPISODE #48 // Boss Integrity with Jay Pryor</a></div></div>
														<div class="episodeitem"><div class="itemleft"><img src="/wp-content/themes/beingboss2018/img/BB_Icon_Mic.png"></div><div class="itemright"><a href="/podcast/minisode-productive-workspace" target="_blank">MINISODE // How to Set Up a Productive Workspace</a></div></div>
													</div>
													<h3 class="xxmedium">ARTICLES</h3>
													<div class="episodelist">
														<div class="episodeitem"><div class="itemleft"><img src="/wp-content/themes/beingboss2018/img/BB_Icon_Paper.png"></div><div class="itemright"><a href="/articles/chalkboard-method-goal-setting" target="_blank">The Chalkboard Method for Goal Setting</a></div></div>
														<div class="episodeitem"><div class="itemleft"><img src="/wp-content/themes/beingboss2018/img/BB_Icon_Paper.png"></div><div class="itemright"><a href="/articles/manifesting-business-word" target="_blank">Manifesting Can Be a Business Word</a></div></div>
													</div>
												</div>
											</div>
										</div>
										<div class="discoversubscribe">
											<div class="capsule">
												<div class="row">
													<div class="col-lg-6"><h3 class="xxmedium">DOWNLOAD YOUR OWN<br />CHALKBOARD METHOD WORKSHEET</h3></div>
													<div class="col-lg-6"><div style="margin: 20px auto;">[content_block id=11679]</div></div>
												</div>
											</div>
										</div>
									</div>
									<div style="display: table; text-align: right; width: 100%;"><a class="carousel_link right" href="/resources">VIEW ALL RESOURCES >></a></div>
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
