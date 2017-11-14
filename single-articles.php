<?php
/**
 * The template for displaying all single article posts.
 *
 * @package understrap
 */

get_header();
?>

<div class="wrapper" id="article-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<header class="entry-header">
						
							<div class="container">

								<?php the_title( '<h1 class="article-title">', '</h1>' ); ?>

								<div class="article entry-meta">

									<span class="date"><?php echo get_the_date('j F'); ?></span> // by <span class="author"><?php the_author_posts_link(); ?></span>

								</div><!-- .entry-meta -->
							
							</div>

						</header><!-- .entry-header -->

						<div class="entry-content">
						
							<div class="container">
							
								<div class="row">
								
									<div class="col-md-4 mobilehide">
									
										<h5 class="lightgray">PIN IT</h5>
									
										<div class="article-image">
											<?php echo the_post_thumbnail( 'large', array('class' => 'pinterestimage')); ?>
										</div>
										
										<div class="shownote_subscribe">
											<?php echo do_shortcode('[content_block id=9667 slug=shownote-sidebar-subscribe]'); ?>
										</div>

									</div>
									
									<div class="col-md-8">
										
										<?php the_content(); ?>
										
										<div class="author-box">
											<div class="leftside" style="background-image: url('<?php echo get_the_author_meta('bb_customavatar'); ?>');"></div>
											<div class="rightside">
												<div class="capsule pagesection30">
													<h4><?php the_author_posts_link(); ?></h4>
													<?php echo nl2br(get_the_author_meta('description')); ?>
												</div>
											</div>
										</div>
									
									</div>
									
									<div class="col-md-4 mobileshow">
									
										<h5 class="lightgray">PIN IT</h5>
									
										<div class="article-image">
											<?php echo the_post_thumbnail( 'large', array('class' => 'pinterestimage')); ?>
										</div>
										
										<div class="shownote_subscribe">
											<?php echo do_shortcode('[content_block id=9667 slug=shownote-sidebar-subscribe]'); ?>
										</div>

									</div>
									
								</div>
								
							</div>

						</div><!-- .entry-content -->

						<footer class="entry-footer" style="background: #eaeaea;">
							<div class="container pagesection80">
								<h2 class="center">RELATED CONTENT</h2>
								<hr class="short">
							<?php $postcat = get_the_category( $post->ID ); ?>
							
							<?php
								// The Query
								
								$related_args = array(
										'post_type' => array( 'post', 'articles' ),
										'posts_per_page' => 3,
										'post__not_in' => array($post->ID),
										'orderby' => 'rand',
								);
								
								$related_query = new WP_Query( $related_args );

								// The Loop
								if ( $related_query->have_posts() ) {
									echo '<div class="relatedpostsection">';
									while ( $related_query->have_posts() ) {
										$related_query->the_post();
							?>
										<div class="relatedpostbox">
											<div class="relatedpostimage"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a></div>
											<div class="relatedpostbottom">
												<img src="http://beingboss.staging.wpengine.com/wp-content/uploads/2017/06/BBClubhouse_SecretEpisodes.png">
												<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="relatedposttitle"> <?php the_title(); ?></span></a></h5>
												<a href="<?php the_permalink(); ?>" class="relatedpostlistennow">READ NOW >></a>
											</div>
										</div>
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

						</footer><!-- .entry-footer -->

					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
