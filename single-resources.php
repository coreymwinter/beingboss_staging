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
							<?php $resource_quote = get_post_meta( get_the_ID(), 'bbresources_quote', true ); ?>
							<?php $resource_quote_author = get_post_meta( get_the_ID(), 'bbresources_quote_author', true ); ?>
							<?php $resource_optin = get_post_meta( get_the_ID(), 'bbresources_optin_select', true ); ?>

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

						<div class="container">

							<div class="entry-content">
								
								<?php
										$related_args = array(
											'post_type' => 'post',
											'posts_per_page' => 50,
											'tax_query' => array(
													array(
														'taxonomy' => 'related-resources',
														'field'    => 'slug',
														'terms'    => $post_slug,
													),
												),
											'order' => 'ASC',
											'orderby' => 'title'
									);
													
									$related_query = new WP_Query( $related_args );

									if ( $related_query->have_posts() ) { ?>
								<a class="carousel_link first_back_link" href="/resources" style="float: none;  margin-bottom: 30px;"><< BACK TO RESOURCES</a>
								<div class="row">
									<div class="col-md-8">
										<h2 class="xxmedium">PODCAST EPISODES + MINISODES:</h2>
										<div class="resourcesection">
											<?php while ( $related_query->have_posts() ) {
												$related_query->the_post(); ?>

											<div class="resourcelink"><div class="itemleft"><img src="/wp-content/themes/beingboss2018/img/BB_Icon_Mic.png"></div><div class="itemright"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div></div>
											<?php } ?>
										</div>
										<?php /* Restore original Post Data */ wp_reset_postdata(); ?> 
												
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-3 resource-quote">
										<?php if ( !empty( $resource_quote ) ) { ?>
											<p class="brandon large italic">"<?php echo $resource_quote; ?>"</p>
											<p class="brandon mediumsmall right">-<?php echo $resource_quote_author; ?></p>
										<? } ?>
									</div>
										
								</div>	
								
								<?php } else {
										// no posts found
													}
								?>
								
								<div class="row pagesection80">
									<div class="col-md-7">
												<?php
													$related_args_2 = array(
															'post_type' => 'articles',
															'posts_per_page' => 50,
															'tax_query' => array(
																	array(
																		'taxonomy' => 'related-resources-articles',
																		'field'    => 'slug',
																		'terms'    => $post_slug,
																	),
																),
															'order' => 'ASC',
															'orderby' => 'title'
													);
													
													$related_query_2 = new WP_Query( $related_args_2 );

													if ( $related_query_2->have_posts() ) {
														echo '<h2 class="xxmedium">ARTICLES</h2><div class="resourcesection">';
														while ( $related_query_2->have_posts() ) {
															$related_query_2->the_post();
												?>
														<div class="resourcelink"><div class="itemleft"><img src="/wp-content/themes/beingboss2018/img/BB_Icon_Paper.png"></div><div class="itemright"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div></div>
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
															'posts_per_page' => 50,
															'tax_query' => array(
																	array(
																		'taxonomy' => 'related-resources-webinar',
																		'field'    => 'slug',
																		'terms'    => $post_slug,
																	),
																),
															'order' => 'ASC',
															'orderby' => 'title'
													);
													
													$related_query_3 = new WP_Query( $related_args_3 );

													if ( $related_query_3->have_posts() ) {
														echo '<h2  class="xxmedium" style="padding-top: 50px;">WEBINAR REPLAYS</h2><div class="resourcesection">';
														while ( $related_query_3->have_posts() ) {
															$related_query_3->the_post();
												?>
														<div class="resourcelink"><div class="itemleft"><img src="/wp-content/themes/beingboss2018/img/Icon_Video.png"></div><div class="itemright"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div></div>
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
										<?php if ( !empty( $resource_optin ) ) { ?>
											<?php if ( has_term('sidebar-custom', 'displaystyle', $resource_optin )) { ?>
												<?php $custom_bg_image = get_the_post_thumbnail_url($resource_optin,'full'); ?>
												<div class="optinwrapper" style="background-image: url('<?php echo $custom_bg_image; ?>'); background-size: cover;">
													<div class="container">
														<?php echo apply_filters('the_content', get_post_field('post_content', $resource_optin)); ?>
													</div>
												</div>
											<?php } else { ?>
												<div class="optinwrapper">
													<div class="container">
														<img class="center" src="/wp-content/themes/beingboss2018/img/Optin_Icon_White.png">
														<h2 class="center white">DOWNLOAD THIS FREE RESOURCE:<h2>
														<h2 class="center white"><?php echo get_the_title($resource_optin); ?></h2>
														<?php echo apply_filters('the_content', get_post_field('post_content', $resource_optin)); ?>
													</div>
												</div>
											<?php } ?>
										<?php } ?>
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
