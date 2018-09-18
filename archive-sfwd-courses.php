<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

?>


<div class="wrapper" id="full-width-page-wrapper" style="padding: 0px 0;">

	<div class="container-fluid course-archive" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

					<?php if ( !is_user_logged_in() ) { ?>
						<div class="imagebackground" style="background-image: url('/wp-content/uploads/2018/02/Back_Smoke_1.jpg');">
							<div class="container">
								<div class="capsule pagesection50">
									<p class="brandon white lustbig center">CEO Day Kit</p>
									<p class="center white large italic">12 months of focused<br /> 
										planning for your business<br />
										in just one day.
									</p>
									<a class="button-yellow center margintop30" href="https://courses.beingboss.club" target="_blank">LEARN MORE</a>
								</div>
							</div>
						</div>

					<?php } else { ?>

						<header class="entry-header">

								<figure class="bbpage-header" style="background-image: url('/wp-content/themes/beingboss2018/img/Back_Laptop_5.jpg');">
									<div class="container">
										<div class="headertext">
											<h1 class="center white huge">COURSES</h1>
										</div>
									</div>
								</figure>

						</header><!-- .entry-header -->

						<?php get_template_part( '/template-parts/bp-user-menu' ); ?>

						<div class="container">
							<div class="pagesection50">
										<div class="archivecontainer">

											<?php if ( have_posts() ) : while( have_posts() ) : the_post(); 
												$postid = get_the_ID();
												$user = wp_get_current_user();
												$course_status = learndash_course_status( $postid, $user->ID );
												$course_byline = get_post_meta( $postid, 'bbcoursedetails_author', true );
												$user_courses_registered = ld_get_mycourses( $user->ID );
											?>
												<?php if ( in_array($postid, $user_courses_registered) ) { ?>
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
															<?php echo do_shortcode('[learndash_course_progress course_id="'.$postid.'"]'); ?>
														</div> 
													</article>
												<?php } ?>

											<?php endwhile; endif; ?>	

											<!-- <?php if ( have_posts() ) : while( have_posts() ) : the_post(); 
												$postid = get_the_ID();
												$user = wp_get_current_user();
												$course_status = learndash_course_status( $postid, $user->ID );
												$course_byline = get_post_meta( $postid, 'bbcoursedetails_author', true );
												$user_courses_registered = ld_get_mycourses( $user->ID );
											?>
												<?php if (! in_array($postid, $user_courses_registered) ) { ?>
													<article class="archiveitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
														<div class="archiveitemimage" style="opacity: 0.5;">
															<?php if ( has_post_thumbnail() ) : ?>
																<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a>
															<?php endif; ?>
															<div class="course-status">NOT ENROLLED</div>
														</div>
														<div class="archiveitemcontent">
															<h5 style="opacity: 0.5;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="archiveitemtitle"> <?php the_title(); ?></span></a></h5>
															<p class="archiveitemauthor" style="opacity: 0.5;"><?php echo $course_byline; ?></p>
															<br />
															<a href="<?php the_permalink(); ?>" class="button-yellow">LEARN MORE</a>
														</div> 
													</article>
												<?php } ?>
												
											<?php endwhile; endif; ?> -->

								<?php 
								// clean up after the query and pagination
								wp_reset_postdata(); 
								?>

								<div class="pagination">
		
									<div class="nav-next"><?php previous_posts_link( '<< Previous page' ); ?></div>
									<div class="nav-previous"><?php next_posts_link( 'Next page >>', $course_query->max_num_pages ); ?></div>

									<?php
									/* example code for using the wp_pagenavi plugin */
										if (function_exists('wp_pagenavi'))
										{
											echo "<br />";
											wp_pagenavi( array( 'query' => $course_query ) );
										}
									?>
								</div>

							</div>
						</div>

					<?php } ?>


			</main><!-- #main -->

		</div><!-- #primary -->


	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php 
	if ( !is_user_logged_in() ) { 
		get_footer(); 
	}
	else {
		get_footer( 'dashboard' );
	}
?>
