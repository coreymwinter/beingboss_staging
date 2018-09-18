<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$lessonid = get_the_ID();
$courseid = get_post_meta( $lessonid, 'course_id', true ); 
?>

<div class="wrapper single-lesson" id="full-width-page-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<header class="entry-header">
							<?php $header_image = get_post_meta( $courseid, 'bbcoursedetails_header_background', true ); ?>
							<?php $header_logo = get_post_meta( $courseid, 'bbcoursedetails_header_logo', true ); ?>
							<?php $header_text = get_post_meta( $courseid, 'bbcoursedetails_header_text', true ); ?>	
							<?php $associated_forum_id = get_post_meta( $lessonid, 'bblessondetails_forum_select', true ); ?>
							<?php $associated_forum = get_post_permalink( $associated_forum_id ); ?>

							<figure class="bbpage-header" style="background-image: url('<?php echo $header_image; ?>');">
									<div class="container">

										<?php if (!empty($header_logo) && !empty($header_text)) { ?>
											<div class="headertext">
												<img src="<?php echo $header_logo; ?>">

												<div class="headerright">

													<p class="white brandon upper"><?php echo $header_text; ?></p>
													<hr>
													<?php 
														$user = wp_get_current_user();
														$course_status = learndash_course_status( $courseid, $user->ID );

														if ( is_user_logged_in() ) {
																echo "<span class='white'><span class='brandon'>COURSE STATUS:</span> <em>";
																echo $course_status;
																echo "</em></span>";
														} else {
														    echo "<span class='white'><span class='brandon'>COURSE STATUS:</span> <em>You're not enrolled</em></span>";
														}
													?>
												</div>
											</div>
										<?php } else { ?>
											<div class="headertext">
												<h1 class="center white huge"><?php the_title(); ?></h1>
												<?php 
														$user = wp_get_current_user();
														$course_status = learndash_course_status( $courseid, $user->ID );

														if ( is_user_logged_in() ) {
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
								<div class="row">
									<div class="col-md-8 lesson-content">
										<?php the_title( '<h1 class="padbot30 marginbottom0">', '</h1>' ); ?>
										<?php the_content(); ?>
										<?php if (!empty ($associated_forum_id)) { ?>
											<div style="display: block; clear: both;">
												<a class="button-yellow" href="<?php echo $associated_forum; ?>">JOIN THE DISCUSSION</a>
											</div>
										<?php } ?>
			
									</div>
									<div class="col-md-4">
										<div class="course-sidebar">
												<?php $lessonmaterials = get_post_meta( get_the_ID(), 'bblessons_files', true ); ?>
										
												<?php if ( !empty( $lessonmaterials ) ) { ?>
													<h2>LESSON MATERIALS</h2>
													<div class="course-materials">	
														<ul>
														<?php foreach ( (array) $lessonmaterials as $key => $entry ) {

																$filelabel = $filedownload = $filelink = '';

																if ( isset( $entry['bblessons_resource_label'] ) ) {
																	$filelabel = esc_html( $entry['bblessons_resource_label'] );
																}

																if ( isset( $entry['bblessons_resource_file'] ) ) {
																	$filedownload = esc_html( $entry['bblessons_resource_file'] );
																}

																if ( isset( $entry['bblessons_resource_link'] ) ) {
																	$filelink = esc_html( $entry['bblessons_resource_link'] );
																}

																if ( !empty( $filedownload ) ) {
																	echo "<li>>> <a href='";
																	echo $filedownload;
																	echo "' target='_blank'>";
																	echo $filelabel;
																	echo "</a></li>";
																}
																else {
																	echo "<li>>> <a href='";
																	echo $filelink;
																	echo "' target='_blank'>";
																	echo $filelabel;
																	echo "</a></li>";
																}
															} 
														?>
														</ul>
													</div>
												<?php } ?>
												<h2>COURSE PROGRESS</h2>
												<div class="lesson-course-progress">
													<?php echo do_shortcode('[learndash_course_progress]'); ?>
													<?php echo learndash_mark_complete( $post ); ?>
												</div>

												<h2>COURSE NAVIGATION</h2>
												<div class="course-lesson-navigation">	
													<?php if ( dynamic_sidebar('lesson_sidebar') ) : else : endif; ?>	
												</div>
										</div>
									</div>
								</div>
								
							</div><!-- .entry-content -->

						</div>
						

					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer( 'dashboard' ); ?>
