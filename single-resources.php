<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
?>

<div class="wrapper" id="resource-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<?php $postid = get_the_ID(); ?>
							<?php $post_slug = get_post_field( 'post_name', $postid ); ?>
							<?php $fullwidth_optin = get_post_meta( get_the_ID(), 'bbshownotes_optin_select', true ); ?>
							<?php $resource_quote = get_post_meta( get_the_ID(), 'bbresources_quote', true ); ?>
							<?php $resource_quote_author = get_post_meta( get_the_ID(), 'bbresources_quote_author', true ); ?>

						<header class="entry-header">

							<div class="container">

								<?php the_title( '<h1 class="resource-title">', '</h1>' ); ?>
								<hr class="even">

							</div>

						</header><!-- .entry-header -->
						
						<div class="container">

							<div class="entry-intro">
										<div class="resource_description"><?php the_content(); ?></div>
							</div>

						</div>

						<?php if ( !empty( $fullwidth_optin ) ) { ?>
							<div class="optinwrapper" style="background: #eaeaea;"><?php echo apply_filters('the_content', get_post_field('post_content', $fullwidth_optin)); ?></div>
						<?php } ?>

						<div class="container">

							<div class="entry-content">
								<div class="row">
									<div class="col-md-8">
											<a class="carousel_link" href="/resources" style="float: none;  margin-bottom: 30px;"><< BACK TO RESOURCES</a>
												<?php
													$related_args = array(
															'post_type' => 'post',
															'posts_per_page' => 20,
															'tax_query' => array(
																	array(
																		'taxonomy' => 'related-resources',
																		'field'    => 'slug',
																		'terms'    => $post_slug,
																	),
																),
													);
													
													$related_query = new WP_Query( $related_args );

													if ( $related_query->have_posts() ) {
														echo '<h2>PODCAST EPISODES + MINISODES:</h2><div>';
														while ( $related_query->have_posts() ) {
															$related_query->the_post();
												?>
														<p class="resourcelink"><img src="http://beingboss.staging.wpengine.com/wp-content/uploads/2016/02/BB_Icon_Mic.png" style="padding-right: 15px;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
												<?php
														}
														echo '</div>';
														/* Restore original Post Data */
														wp_reset_postdata();
													} else {
														// no posts found
													}
												?>
												
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-3">
										<?php if ( !empty( $resource_quote ) ) { ?>
											<p class="brandon large italic" style="padding-top: 125px;">"<?php echo $resource_quote; ?>"</p>
											<p class="brandon mediumsmall right">-<?php echo $resource_quote_author; ?></p>
										<? } ?>
									</div>
										
								</div>	
								
								<div class="row pagesection80">
									<div class="col-md-7">
												<?php
													$related_args_2 = array(
															'post_type' => 'articles',
															'posts_per_page' => 20,
															'tax_query' => array(
																	array(
																		'taxonomy' => 'related-resources-articles',
																		'field'    => 'slug',
																		'terms'    => $post_slug,
																	),
																),
													);
													
													$related_query_2 = new WP_Query( $related_args_2 );

													if ( $related_query_2->have_posts() ) {
														echo '<h2>ARTICLES</h2><div>';
														while ( $related_query_2->have_posts() ) {
															$related_query_2->the_post();
												?>
														<p class="resourcelink"><img src="http://beingboss.staging.wpengine.com/wp-content/uploads/2016/02/BB_Icon_Paper.png" style="padding-right: 15px;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
												<?php
														}
														echo '</div>';
														/* Restore original Post Data */
														wp_reset_postdata();
													} else {
														// no posts found
													}
												?>
										
												<?php
													$related_args_3 = array(
															'post_type' => 'webinar',
															'posts_per_page' => 20,
															'tax_query' => array(
																	array(
																		'taxonomy' => 'related-resources-webinar',
																		'field'    => 'slug',
																		'terms'    => $post_slug,
																	),
																),
													);
													
													$related_query_3 = new WP_Query( $related_args_3 );

													if ( $related_query_3->have_posts() ) {
														echo '<h2 style="padding-top: 50px;">WEBINAR REPLAYS</h2><div>';
														while ( $related_query_3->have_posts() ) {
															$related_query_3->the_post();
												?>
														<p class="resourcelink"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
												<?php
														}
														echo '</div>';
														/* Restore original Post Data */
														wp_reset_postdata();
													} else {
														// no posts found
													}
												?>

										<a class="carousel_link" href="/resources" style="float: none; margin-top: 80px;"><< BACK TO RESOURCES</a>
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-4">
										<div style="width: 100%; height: 400px; display: table; background-image: url('http://beingboss.staging.wpengine.com/wp-content/uploads/2017/11/Vacation_SubscribeBack.jpg');"></div>
									</div>
								</div>
								
							</div><!-- .entry-content -->

						</div>
						
						<footer class="entry-footer">
							
						</footer><!-- .entry-footer -->

					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
