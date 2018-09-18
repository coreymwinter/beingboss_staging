<?php
/**
 * The template for displaying all single webinar posts.
 *
 * @package understrap
 */

get_header( 'squeeze' );
?>

<div class="wrapper" id="webinar-wrapper">
	<div class="container-fluid" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<?php $postid = get_the_ID(); ?>
						<?php $webinar_header_image = get_post_meta ( $postid, 'bbwebinar_header_image', true ); ?>
						<?php $webinar_main_title = get_post_meta( $postid, 'bbwebinar_main_title', true ); ?>
						<?php $webinar_header_text = get_post_meta( $postid, 'bbwebinar_header_text', true ); ?>
						<?php $webinar_month = get_post_meta( $postid, 'bbwebinar_month', true ); ?>
						<?php $webinar_day = get_post_meta( $postid, 'bbwebinar_day', true ); ?>
						<?php $webinar_guest_one_name = get_post_meta( $postid, 'bbwebinar_guest_one_name', true ); ?>
						<?php $webinar_guest_one_image = get_post_meta( $postid, 'bbwebinar_guest_one_image', true ); ?>
						<?php $webinar_guest_two_name = get_post_meta( $postid, 'bbwebinar_guest_two_name', true ); ?>
						<?php $webinar_guest_two_image = get_post_meta( $postid, 'bbwebinar_guest_two_image', true ); ?>
						<?php $webinar_replay_video = get_post_meta( $postid, 'bbwebinar_replay_video', true ); ?>
						<?php $webinar_button = get_post_meta( $postid, 'bbwebinar_embed_button', true ); ?>
						<?php $webinar_box_title = get_post_meta( $postid, 'bbwebinar_subscribe_box_title', true ); ?>
						<?php $webinar_button_label = get_post_meta( $postid, 'bbwebinar_embed_button_label', true ); ?>
						<?php $webinar_button_tracker = get_post_meta( $postid, 'bbwebinar_embed_button_tracker', true ); ?>
						<?php $webinar_custom_tracker = get_post_meta( $postid, 'bbwebinar_custom_tracker', true ); ?>
						<?php $webinar_thrive = get_post_meta( $postid, 'bbwebinar_thrive_form', true ); ?>

						<header class="entry-header">

								<figure class="bbpage-header" style="background-image: url('<?php echo $webinar_header_image; ?>');">
									<div class="container">
										<div class="headertext">
											<?php echo $webinar_header_text; ?>
											<h1 class="webinar-title"><?php echo $webinar_main_title; ?></h1>
										</div>
										<div class="headerguests">
											<div class="guest">
												<img class="guest-image" src="<?php echo $webinar_guest_one_image; ?>">
												<p><?php echo $webinar_guest_one_name; ?></p>
											</div>
											<div class="guest">
												<img class="guest-image" src="<?php echo $webinar_guest_two_image; ?>">
												<p><?php echo $webinar_guest_two_name; ?></p>
											</div>
										</div>
									</div>
								</figure>

							</header><!-- .entry-header -->
	
						<div class="container">
							<div class="row">
								<div class="col-md-8" style="margin: 0 auto;">
									<div class="top-subscribe">
										<div class="inner">
											<h2 class="h1 center"><?php echo $webinar_box_title; ?></h2>
											<?php if ( !empty( $webinar_button ) ) { ?>
												<button type="button" class="button webinar-button" title="<?php echo $webinar_button; ?>"><?php echo $webinar_button_label; ?></button>
											<?php }  else { ?>
												<?php echo $webinar_thrive ?>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="entry-content">
						
							<div class="container pagesection80">
							
								<div class="row">
								
									<div class="col-md-2"></div>
									
									<div class="col-md-8">
										<h2 class="center upper h1 padbot30"><?php echo $webinar_main_title; ?></h2>
									
										<?php if ( !empty( $webinar_month ) && !empty( $webinar_day ) ) { ?>
											<div class="webinar-left">
												<p class="month"><?php echo $webinar_month; ?></p>
												<p class="day"><?php echo $webinar_day; ?></p>
											</div>
											<div class="webinar-right">
												<?php the_content(); ?>
											</div>
										<?php }  else { ?>
											<?php the_content(); ?>
										<?php } ?>

										<?php echo $webinar_replay_video; ?>

									
									</div>
									
									<div class="col-md-2"></div>
									
								</div>
								
							</div>

						</div><!-- .entry-content -->

						<footer class="entry-footer" style="background: #FFF200;">
							<div class="container pagesection50">
								<div class="row">
								
									<div class="col-md-2"></div>
									
									<div class="col-md-8" style="padding: 0 40px;">
										<h2 class="h1 center"><?php echo $webinar_box_title; ?></h2>
										<?php if ( !empty( $webinar_button ) ) { ?>
											<button type="button" class="button webinar-button" title="<?php echo $webinar_button; ?>"><?php echo $webinar_button_label; ?></button>
										<?php }  else { ?>
											<?php echo $webinar_thrive ?>
										<?php } ?>
									</div>

									<div class="col-md-2"></div>

								</div>
							</div>

						</footer><!-- .entry-footer -->
					<?php echo $webinar_button_tracker; ?>
					<?php echo $webinar_custom_tracker; ?>
					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

</div><!-- Container end -->

</div><!-- Wrapper end -->
<script src="//events.genndi.com/register.evergreen.extra.js" language="javascript" type="text/javascript" async></script>
<script src="//events.genndi.com/register.box.js" language="javascript" type="text/javascript"></script>
<?php get_footer( 'squeeze' ); ?>
