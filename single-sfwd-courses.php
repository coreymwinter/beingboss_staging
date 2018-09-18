<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$postid = get_the_ID();
?>

<div class="wrapper single-course" id="full-width-page-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<header class="entry-header">
							<?php 
								$header_image = get_post_meta( $postid, 'bbcoursedetails_header_background', true );
								$header_logo = get_post_meta( $postid, 'bbcoursedetails_header_logo', true );
								$header_text = get_post_meta( $postid, 'bbcoursedetails_header_text', true );	
								$user = wp_get_current_user();
								$user_courses_registered = ld_get_mycourses( $user->ID ); 
								$course_id = get_the_ID();
								$course_status = learndash_course_status( $course_id, $user->ID );
								$coursebonuses = get_post_meta( get_the_ID(), 'bbcoursedetails_bonus_check', true ); 
								$course_slug = get_post_field( 'post_name', get_post() );
								$associated_forum_id = get_post_meta( $postid, 'bbcoursedetails_forum_select', true );
								$associated_forum = get_post_permalink( $associated_forum_id );
								$course_access_list = get_post_meta ( $postid, 'sfwd-courses_course_access_list', true );
							?>
							<figure class="bbpage-header" style="background-image: url('<?php echo $header_image; ?>');">
									<div class="container">

										<?php if (!empty($header_logo) && !empty($header_text)) { ?>
											<div class="headertext">
												<img src="<?php echo $header_logo; ?>">

												<div class="headerright">

													<p class="white brandon upper"><?php echo $header_text; ?></p>
													<hr>
													<?php 

														if ( is_user_logged_in() && in_array($postid, $user_courses_registered) ) {
																echo "<span class='white'><span class='brandon'>COURSE STATUS:</span> <em>";
																echo $course_status;
																echo "</em></span>";
														} else {
														    echo "<span class='white'><span class='brandon'>COURSE STATUS:</span><em>You're not enrolled</em></span>";
														}
													?>
												</div>
											</div>
										<?php } else { ?>
											<div class="headertext">
												<h1 class="center white huge"><?php the_title(); ?></h1>
												<?php 

														if ( is_user_logged_in() && in_array($postid, $user_courses_registered) ) {
																echo "<p class='white center'><span class='brandon'>COURSE STATUS:</span> <em>";
																echo $course_status;
																echo "</em></p>";
														} else {
														    echo "<p class='white center'><span class='brandon'>COURSE STATUS:</span> <em>You're not enrolled</em></p>";
														}
												?>
											</div>
										<?php } ?>
									</div>
							</figure>

						</header><!-- .entry-header -->

						<?php get_template_part( '/template-parts/bp-user-menu' ); ?>
						<?php get_template_part( '/template-parts/course-menu' ); ?>

						<div class="container pagesection50">

							<div class="entry-content">

								<?php 
									$banner_ad = get_post_meta( get_the_ID(), 'bbcoursedetails_banner_ad', true );

									if ( !is_user_logged_in() || !in_array($postid, $user_courses_registered)) {
										if ( !empty ($banner_ad) ) { ?>
											<div class="padbot30">
												<a href="https://courses.beingboss.club/"><img src="<?php echo $banner_ad; ?>" class="padbot30"></a>
											</div>
									<?php } ?>
								<?php } ?>
								<div class="row">
									<div class="col-md-8">

										<?php the_content(); ?>

										<?php if (!empty ($associated_forum_id)) { ?>
											<div style="display: block; clear: both;">
												<a class="button-yellow" href="<?php echo $associated_forum; ?>">JOIN THE DISCUSSION</a>
											</div>
										<?php } ?>
			
									</div>
									<div class="col-md-4">
										<div class="course-sidebar">
											<h2>COURSE PROGRESS</h2>
												<div class="lesson-course-progress">
													<?php echo do_shortcode('[learndash_course_progress]'); ?>
												</div>

											<?php if ( is_user_logged_in() && !empty( $coursebonuses ) ) { ?>
												<?php 

												$bonus_args = array(
													'post_type' => array( 'sfwd-courses' ),
													'tax_query' => array(
														array(
															'taxonomy' => 'ld_course_tag',
															'field'    => 'slug',
															'terms'    => $course_slug,
														),
													),
													'post__in' => $user_courses_registered,
												);
													
												$bonus_query = new WP_Query( $bonus_args );

												if ( $bonus_query->have_posts() ) { ?>
														<h2>YOUR COURSE BONUSES</h2>
														<div class="coursebonuses">
															<div class="bonus-list">
																<div class="ld-course-list-items row">
																		<?php while ($bonus_query->have_posts()) {
																			$bonus_query->the_post();
																			$bonusid = get_the_ID();
																		?>
																			<h2 class="ld-entry-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
																		<?php } ?>
																</div>
															</div>
														</div>
												<?php } ?>	
											<?php wp_reset_postdata(); ?>
											<?php } ?>	

											<?php 
												$testimonial_quote = get_post_meta( get_the_ID(), 'bbcoursedetails_testimonial_quote', true );
												$testimonial_author = get_post_meta( get_the_ID(), 'bbcoursedetails_testimonial_author', true );
											?>
											<?php if ( !is_user_logged_in() || !in_array($postid, $user_courses_registered)) { ?>
												<?php if ( !empty ($testimonial_quote) ) { ?>
													<h2>TESTIMONIAL</h2>
													<div class="coursebonuses">
														<p class="italic xmedium">"<?php echo $testimonial_quote; ?></p>
														<p class="brandon smallmedium right"><?php echo $testimonial_author; ?></p>
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div> <!-- end sidebar -->
								</div>
								
							</div><!-- .entry-content -->

						</div>
						

					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer( 'dashboard' ); ?>
