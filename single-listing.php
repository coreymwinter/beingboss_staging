<?php
/**
 * The template for displaying all single listings.
 *
 * @package understrap
 */

get_header();
?>

<div class="wrapper" id="listing-single">

	<div class="container-fluid" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<?php $postid = get_the_ID(); ?>
							<?php $shownote_soundcloud = get_post_meta ( $postid, 'bbshownotes_soundcloud', true ); ?>
							<?php $shownote_quote = get_post_meta( $postid, 'bbshownotes_top_quote', true ); ?>
							<?php $shownote_quoteauthor = get_post_meta( $postid, 'bbshownotes_quote_author', true ); ?>
							<?php $shownote_quoteauthortwitter = get_post_meta( $postid, 'bbshownotes_quote_author_twitter', true ); ?>
							<?php $shownote_topics = get_post_meta( $postid, 'bbshownotes_topics', true ); ?>
							<?php $shownote_resources = get_post_meta( $postid, 'bbshownotes_resources', true ); ?>
							<?php $fullwidth_optin = get_post_meta( get_the_ID(), 'bbshownotes_optin_select', true ); ?>

						<header class="entry-header">

							<div class="container">

								<?php the_title( '<h1 class="shownote-title">', '</h1>' ); ?>

								<?php 

									$author_id = get_the_author_meta('ID');

									$info = get_user_meta($author_id, 'bbuser_directory_level', true);

							        //get all items of that user
							        $args5 = array(
							                'author' => $author_id,
							                'post_type' => 'listing',
							        );

							        $items = get_posts($args5);

							        foreach ($items as $item) {
							        	if ($info == 'mid') {
							        		echo $info;
							        	}
							        }

								?>

								<div class="shownote entry-meta">

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
										<?php if ( !empty( $shownote_quote ) ) { ?>
											<div class="shownote_quote">"<?php echo $shownote_quote; ?>"</div>
											<div class="shownote_quoteauthor">- <?php echo $shownote_quoteauthor; ?></div>
											<div class="shownote_quote_tweet">
												<?php if ( !empty( $shownote_quoteauthortwitter ) ) { ?>
														<a href="http://twitter.com/home?status=&quot;<?php echo $shownote_quote; ?>&quot; - @<?php echo $shownote_quoteauthortwitter; ?> via <?php echo get_permalink(); ?>" target="_blank"><img src="/wp-content/themes/beingboss2018/img/Twitter-icon.png"></a>
												<?php	}
													else { ?>
														<a href="http://twitter.com/home?status=&quot;<?php echo $shownote_quote; ?>&quot; - <?php echo $shownote_quoteauthor; ?> via <?php echo get_permalink(); ?>" target="_blank"><img src="/wp-content/themes/beingboss2018/img/Twitter-icon.png"></a>
												<?php	}
												?>
											</div>
										<?php } ?>
										<div class="shownote_description"><?php the_content(); ?></div>
									</div>
								</div>
							</div>

						</div>

						<?php if ( !empty( $fullwidth_optin ) ) { ?>
							<div class="optinwrapper">
								<div class="container">
									<img class="center" src="/wp-content/themes/beingboss2018/img/Optin_Icon_White.png">
									<h2 class="center white">FREE RESOURCE: <?php echo get_the_title($fullwidth_optin); ?></h2>
									<?php echo apply_filters('the_content', get_post_field('post_content', $fullwidth_optin)); ?>
								</div>
							</div>
						<?php } ?>

						<div class="container">

							<div class="entry-content">
								<div class="row">
									<div class="col-md-8">

										<?php if ( !empty( $shownote_topics ) ) { ?>
											<h2>TOPICS DISCUSSED IN THIS EPISODE:</h2>
											<div class="shownote_topics"><?php echo $shownote_topics; ?></div>
										<?php } ?>		
										
										<?php if ( !empty( $shownote_resources ) ) { ?>
											<h3 class="gray">RESOURCES DISCUSSED IN THIS EPISODE</h3>
											<div class="shownote_resources"><?php echo $shownote_resources; ?></div>
										<?php } ?>	
										
										<?php $guestdetails = get_post_meta( get_the_ID(), 'bbshownotes_morefrom', true ); ?>
										
										<?php if ( !empty( $guestdetails ) ) { ?>
											<?php foreach ( (array) $guestdetails as $key => $entry ) {

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
										<?php } ?>

										
										<?php $shownote_pinterest = get_post_meta( $postid, 'bbshownotes_pinitimages', true ); ?>
										<?php if ( !empty( $shownote_pinterest ) ) { ?>
											<h3 class="gray">PIN IT:</h3>
											<div class="shownote_pinit"><?php cmb2_bbshownotes_pinterest_images( 'bbshownotes_pinitimages', 'large' ); ?></div>
										<?php } ?>
										
									</div>
									<div class="col-md-4">
										<div class="shownote_sponsors">
											<?php
												$sponsor_list = get_post_meta( get_the_ID(), 'bbshownotes_sponsor_select', true );
												
												if ($sponsor_list) {
													echo "<h5 class='lightgray'>BROUGHT TO YOU BY:</h5>";
													foreach ( $sponsor_list as $sponsor ) { 
											?>
																<a href="<?php echo get_post_meta( $sponsor, 'bbsponsors_link', true ); ?>" target="_blank" rel="nofollow noopener noreferrer"><?php echo get_the_post_thumbnail( $sponsor ); ?></a>
											<?php		}
												}
											?>
										</div>
										<div class="shownote_subscribe">
											<?php echo do_shortcode('[content_block id=9667 slug=shownote-sidebar-subscribe]'); ?>
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
							<div class="container pagesection80">
								<h2 class="large center">YOU MAY ALSO LIKE</h2>
								<hr class="short">
							
							<?php
								// The Query
								
								$related_terms = get_the_terms(get_the_ID(), 'related-resources');
								if ( $related_terms && !is_wp_error( $related_terms ) ) {
									$term_list = wp_list_pluck( $related_terms, 'slug' );
								
									$related_args = array(
											'post_type' => array( 'post', 'articles' ),
											'posts_per_page' => 3,
											'post__not_in' => array($post->ID),
											'orderby' => 'rand',
											'tax_query' => array(
												'relation' => 'OR',
												array(
													'taxonomy' => 'related-resources',
													'field'	   => 'slug',
													'terms'    => $term_list,
												),
												array(
													'taxonomy' => 'related-resources-articles',
													'field'	   => 'slug',
													'terms'    => $term_list,
												),
											),
									);
								
									$related_query = new WP_Query( $related_args );
								} else {
									$related_args = array(
											'post_type' => array( 'post' ),
											'posts_per_page' => 3,
											'post__not_in' => array($post->ID),
											'orderby' => 'rand',
									);
								
									$related_query = new WP_Query( $related_args );
								}

								// The Loop
								if ( $related_query->have_posts() ) {
									echo '<div class="relatedpostsection">';
									while ( $related_query->have_posts() ) {
										$related_query->the_post();
							?>
										<div class="relatedpostbox">
											<div class="relatedpostimage"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a></div>
											<div class="relatedpostbottom">
												<img src="/wp-content/themes/beingboss2018/img/BBClubhouse_SecretEpisodes.png">
												<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="relatedposttitle"> <?php the_title(); ?></span></a></h5>
												<a href="<?php the_permalink(); ?>" class="relatedpostlistennow">READ MORE >></a>
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

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
