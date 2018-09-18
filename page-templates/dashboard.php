
<?php
/**
 * Template Name: Dashboard
 *
 * 
 *
 * @package understrap
 */

get_header();
$postid = get_the_ID();
$toppadding = get_post_meta( $postid, 'bbpage_top_padding', true );
$pagecss = get_post_meta( $postid, 'bbpage_page_css', true );
?>
<!-- custom css -->
<style>
	<?php echo $pagecss; ?>
</style>
<!-- custom css -->

<div class="wrapper dashboard" id="full-width-page-wrapper">

	<div class="container-fluid" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<?php 
								$header_image = get_post_meta( $postid, 'bbpage_header_image', true );
								$header_text = get_post_meta( $postid, 'bbpage_header_text', true );
								$user = wp_get_current_user();
								$user_ID = $user->ID;		
							?>				

							<header class="entry-header">

								<figure class="bbpage-header" style="background-image: url('<?php echo $header_image; ?>');">
									<div class="container">
										<div class="headertext">
											<h1 class="center white huge"><?php the_title(); ?></h1>
										</div>
									</div>
								</figure>

							</header><!-- .entry-header -->

							<div class="entry-content" style="padding-top:<?php echo $toppadding; ?>px">

								<?php get_template_part( '/template-parts/bp-user-menu' ); ?>


								<?php 
								if ( !is_user_logged_in() ) { ?>
									<div class="container pagesection80">
										<p class="center brandon large">This page is only available to registered bosses.</p>
										<a href="/login" class="button-yellow center">LOG IN</a>
									</div>
								<?php }
								else { ?>

									<?php the_content(); ?>

									<div class="container dashboard-content">
										<div class="pagesection50">
											<div class="row">
												<div class="col-md-4">
													<?php 
														$notice_args = array(
																'post_type' => array( 'communitynotices' ),
																'posts_per_page' => 1,
														);
													
														$notice_query = new WP_Query( $notice_args );

														if ( $notice_query->have_posts() ) { ?>
																<div style="margin-bottom: 35px;">
																
																	<?php while ($notice_query->have_posts()) {
																		$notice_query->the_post();

																		$noticeid = get_the_ID();
																		$notice_bg_color = get_post_meta( $noticeid, 'bbcn_bg_color', true );
																		$notice_text_color = get_post_meta( $noticeid, 'bbcn_text_color', true );
																		$notice_header = get_post_meta( $noticeid, 'bbcn_header_text', true );
																		$notice_link = get_post_meta( $noticeid, 'bbcn_link', true );
																		$notice_label = get_post_meta( $noticeid, 'bbcn_link_label', true );
																		$notice_summary = get_post_meta( $noticeid, 'bbcn_short_summary', true );
																		$notice_button_color = get_post_meta( $noticeid, 'bbcn_button_color', true );
																		$notice_modified_date = get_the_modified_date( 'm/d/y @ h:ma ', $noticeid );

																	?>

																	<div style="width: 100%; height: auto; padding: 30px; display: table; background-color: <?php echo $notice_bg_color; ?>;">
																		<p style="color: <?php echo $notice_text_color; ?>;" class="giant lust"><?php echo $notice_header; ?></p>
																		<p class="medium" style="color: <?php echo $notice_text_color; ?>;"><?php echo $notice_summary; ?></p>
																		<p class="white italic small">Last updated <?php echo $notice_modified_date; ?></p>
																		<?php if (!empty($notice_link)) { ?>
																			<a class="center button-<?php echo $notice_button_color; ?>" href="<?php echo $notice_link; ?>"><?php echo $notice_label; ?></a>
																		<?php } ?>

																	</div>

																	<?php } ?>

																</div>
													
														<?php } ?>	

													<?php wp_reset_postdata(); ?>

													<div class="dashboard-widget recent-topics mobilehide">
																<?php if ( groups_is_user_member( $user_ID, '2' ) ) { ?>
																	<?php if ( dynamic_sidebar('dashboard_4') ) : else : endif; ?>	
																<?php } else { ?>
																	<h3>Recent Forum Topics</h3>
																	<?php 
																		$ceo_topic_args = array(
																				'post_type' => array( 'topic' ),
																				'posts_per_page' => 5,
																				'meta_key' => '_bbp_forum_id',
																				'meta_value' => array(12136, 12137, 12138, 12139, 12140, 12141, 12142, 12144),
																		);
																	
																		$ceo_topic_query = new WP_Query( $ceo_topic_args );

																		if ( $ceo_topic_query->have_posts() ) { ?>
																				<ul>
																				
																					<?php while ($ceo_topic_query->have_posts()) {
																						$ceo_topic_query->the_post();
																						$ceo_topic_id = get_the_ID();

																					?>

																					<li><a class="bbp-forum-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a></li>

																					<?php } ?>

																				</ul>
																		<?php } ?>	

																	<?php wp_reset_postdata(); ?>
																		
																<?php } ?>
													</div>

													<?php if ( is_active_sidebar('dashboard_1') ) : ?>
														<?php if ( groups_is_user_member( $user_ID, '2' ) ) { ?>
															<?php dynamic_sidebar( 'dashboard_1' ); ?>
														<?php } else { ?>
															<!-- <div class="dashboard-widget">
																<h3>CURRENTLY ONLINE</h3>
																<div class="widget-wrapper">
																	<?php get_template_part( '/template-parts/communitycomingsoon' ); ?>
																</div>
															</div> -->
															<!-- <div class="dashboard-widget">
																<h3>MY GROUPS</h3>
																<div class="widget-wrapper">
																	<?php get_template_part( '/template-parts/communitycomingsoon' ); ?>
																</div>
															</div> -->
														<?php } ?>
													<?php endif; ?>

													<div class="dashboard-widget">
														<?php if ( dynamic_sidebar('dashboard_2') ) : else : endif; ?>	
													</div>
												</div>

												<div class="col-md-8">

													<div class="dashboard-widget">
														<h3>MY COURSES</h3>
														<?php 
															$course_args = array(
																	'post_type' => array( 'sfwd-courses' ),
																);
														
															$course_query = new WP_Query( $course_args );

															if ( $course_query->have_posts() ) { ?>
																<div class="archivecontainer">
																
																	<?php while ($course_query->have_posts() && $coursecount < 2) {
																		$course_query->the_post(); 
																		$courseid = get_the_ID();
																		$user = wp_get_current_user();
																		$course_status = learndash_course_status( $courseid, $user->ID );
																		$course_byline = get_post_meta( $courseid, 'bbcoursedetails_author', true );
																		$user_courses_registered = ld_get_mycourses( $user->ID );
																	?>

																		<?php if (in_array($courseid, $user_courses_registered)) { ?>
																			<article class="archiveitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
																				<div class="archiveitemimage">
																					<?php if ( has_post_thumbnail() ) : ?>
																						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a>
																					<?php endif; ?>
																					<div class="course-status"><?php echo $course_status; ?></div>
																				</div>
																				<div class="archiveitemcontent">
																					<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="archiveitemtitle"> <?php the_title(); ?></span></a></h5>
																					<p class="archiveitemauthor"><?php echo $course_byline; ?></p>
																					<div class="italic center">Progress</div>
																					<?php echo do_shortcode('[learndash_course_progress course_id="'.$courseid.'"]'); ?>
																				</div> 
																			</article>

																			<?php $coursecount++; ?>
																		<?php } ?>																
																	<?php } ?>
																	
																</div>
													
															<?php } ?>	

														<?php wp_reset_postdata(); ?>
														<a href="/courses" class="carousel_link">VIEW ALL COURSES</a>
													</div>

													<div class="dashboard-widget recent-topics mobileshow">
																<?php if ( groups_is_user_member( $user_ID, '2' ) ) { ?>
																	<?php if ( dynamic_sidebar('dashboard_4') ) : else : endif; ?>	
																<?php } else { ?>
																	<h3>Recent Forum Topics</h3>
																	<?php 
																		$ceo_topic_args = array(
																				'post_type' => array( 'topic' ),
																				'posts_per_page' => 5,
																				'meta_key' => '_bbp_forum_id',
																				'meta_value' => array(12136, 12137, 12138, 12139, 12140, 12141, 12142, 12144),
																		);
																	
																		$ceo_topic_query = new WP_Query( $ceo_topic_args );

																		if ( $ceo_topic_query->have_posts() ) { ?>
																				<ul>
																				
																					<?php while ($ceo_topic_query->have_posts()) {
																						$ceo_topic_query->the_post();
																						$ceo_topic_id = get_the_ID();

																					?>

																					<li><a class="bbp-forum-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a></li>

																					<?php } ?>

																				</ul>
																		<?php } ?>	

																	<?php wp_reset_postdata(); ?>
																		
																<?php } ?>
													</div>

													<!-- <div class="row padtop30">
														<div class="col-md-6">
															<?php if ( groups_is_user_member( $user_ID, '2' ) ) { ?>
																<div class="dashboard-widget">
																	<?php if ( dynamic_sidebar('dashboard_3') ) : else : endif; ?>	
																</div>
															<?php } else {?>
																<div class="dashboard-widget">
																	<h3>MY BADGES</h3>
																	<div class="widget-wrapper">
																		<?php get_template_part( '/template-parts/communitycomingsoon' ); ?>
																	</div>
																</div>
															<?php } ?>
														</div>
														<div class="col-md-6">
															
														</div>
													</div> -->

													<div class="row padtop30">
														<div class="col-md-12">
																<div class="dashboard-widget">
																	<h3>CURRENTLY ONLINE</h3>
																	<div class="widget-wrapper">
																		<?php get_template_part( '/template-parts/communitycomingsoon' ); ?>
																	</div>
																</div>
																<?php 
																	$user = get_userdata( $user_ID );
  																	$user_street = $user->bbc_user_question_test;
  																	$user_questionnaire_points = $user->bbc_user_current_points;
  																	echo $user_street;
  																	echo $user_questionnaire_points;
																?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>

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

<?php get_footer( 'dashboard' ); ?>
