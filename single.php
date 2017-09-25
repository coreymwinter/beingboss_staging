<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
?>

<div class="wrapper" id="shownote-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<?php $postid = get_the_ID(); ?>
							<?php $shownote_soundcloud = get_post_meta ( $postid, 'bbshownotes_soundcloud', true ); ?>
							<?php $shownote_quote = get_post_meta( $postid, 'bbshownotes_top_quote', true ); ?>
							<?php $shownote_quoteauthor = get_post_meta( $postid, 'bbshownotes_quote_author', true ); ?>
							<?php $shownote_topics = get_post_meta( $postid, 'bbshownotes_topics', true ); ?>
							<?php $shownote_resources = get_post_meta( $postid, 'bbshownotes_resources', true ); ?>

						<header class="entry-header">

							<div class="container">

								<?php the_title( '<h1 class="shownote-title">', '</h1>' ); ?>

								<div class="shownote entry-meta">

									<?php echo get_the_date(); ?>

								</div><!-- .entry-meta -->

							</div>

						</header><!-- .entry-header -->
						
						<div class="container">

							<div class="entry-intro">
								<div class="row">
									<div class="col-md-4">
										<?php echo $shownote_soundcloud; ?>
									</div>
									<div class="col-md-8 shownote_intro">
										<div class="shownote_quote">"<?php echo $shownote_quote; ?>"</div>
										<div class="shownote_quoteauthor">- <?php echo $shownote_quoteauthor; ?></div>
										<div class="shownote_description"><?php the_content(); ?></div>
									</div>
								</div>
							</div>

						</div>

						<div class="optinwrapper" style="background: #eaeaea;">optin</div>

						<div class="container">

							<div class="entry-content">
								<div class="row">
									<div class="col-md-8">

										<h2>TOPICS DISCUSSED IN THIS EPISODE:</h2>
										<div class="shownote_topics"><?php echo $shownote_topics; ?></div>
			
										<h3 class="gray">RESOURCES DISCUSSED IN THIS EPISODE</h3>
										<div class="shownote_resources"><?php echo $shownote_resources; ?></div>
									
										<?php $guestdetails = get_post_meta( get_the_ID(), 'bbshownotes_morefrom', true );

											foreach ( (array) $guestdetails as $key => $entry ) {

												$guestname = $guestinfo = '';

												if ( isset( $entry['bbshownotes_guestname'] ) ) {
													$guestname = esc_html( $entry['bbshownotes_guestname'] );
												}

												if ( isset( $entry['bbshownotes_guestinfo'] ) ) {
													$guestinfo = wpautop( $entry['bbshownotes_guestinfo'] );
												}
											
												echo "<h3 class='gray'>MORE FROM ";
												echo $guestname;
												echo "</h3>";
												echo "<div class='shownote_guestinfo'>";
												echo $guestinfo;
												echo "</div>";
											} 
										?>

										<h3 class="gray">PIN IT:</h3>
										<div class="shownote_pinit"><a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&description=<?php the_title(); ?>"><?php cmb2_bbshownotes_pinterest_images( 'bbshownotes_pinitimages', 'medium' ); ?></a></div>

									</div>
									<div class="col-md-4">
										<div class="shownote_sponsors">
										<?php
											$sponsor_list = get_post_meta( get_the_ID(), 'bbshownotes_sponsor_select', true );
											
											if ($sponsor_list) {
												echo "<h5 class='lightgray'>BROUGHT TO YOU BY:</h5>";
												foreach ( $sponsor_list as $sponsor ) { 
															echo get_the_post_thumbnail( $sponsor );
												}
											}
										?>
										</div>
									</div>
								</div>
								
								<div class="shownote_nav">
									<div class="previouslink"><?php previous_post_link('%link', '<< PREVIOUS EPISODE'); ?></div>
									<div class="nextlink"><?php next_post_link('%link', 'NEXT EPISODE >>'); ?></div>
								</div>
								
							</div><!-- .entry-content -->

						</div>
						
						<footer class="entry-footer" style="background: #eaeaea;">
							<?php $postcat = get_the_category( $post->ID ); ?>
							
							<?php
								// The Query
								
								$related_args = array(
										'post_type' => 'post',
										'posts_per_page' => 3,
										'orderby' => 'rand',
								);
								
								$related_query = new WP_Query( $related_args );

								// The Loop
								if ( $related_query->have_posts() ) {
									echo '<ul>';
									while ( $related_query->have_posts() ) {
										$related_query->the_post();
										echo '<li>' . get_the_title() . '</li>';
									}
									echo '</ul>';
									/* Restore original Post Data */
									wp_reset_postdata();
								} else {
									// no posts found
								}
							?>
							

						</footer><!-- .entry-footer -->

					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
