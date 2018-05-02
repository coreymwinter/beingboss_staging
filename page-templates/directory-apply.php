<?php
/**
 * Template Name: Directory - Apply
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
<style><?php echo $pagecss; ?></style>
<!-- custom css -->

<div class="wrapper" id="full-width-page-wrapper">

	<div class="container-fluid" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<div class="entry-content" style="padding-top:<?php echo $toppadding; ?>px">

								<?php if (is_user_logged_in()) { ?>
									Logged in
									<?php the_content();
								}

								else { ?>
									<div class="pagesection50 container">
										<h1 class="center">Directory Application</h1>
										<p class="center">It looks like you're not logged in. If you already have an account with us, please use the form on the left. If you haven't registered before, please use the form on the right.</p>
									</div>
									<div class="pagesection50 container">
										<div class="row">
											<div class="col-md-6">
												<p>Login</p>
												<?php $login_args = array(
												        'echo' => true,
												        'redirect' => 'http://beingboss.staging.wpengine.com/directory/application',
												        'form_id' => 'loginform2',
												        'label_username' => __( 'Email' ),
												        'label_password' => __( 'Password' ),
												        'label_remember' => __( 'Remember Me' ),
												        'label_log_in' => __( 'Log In' ),
												        'id_username' => 'user_login',
												        'id_password' => 'user_pass',
												        'id_remember' => 'rememberme',
												        'id_submit' => 'wp-submit',
												        'remember' => true,
												        'value_username' => NULL,
												        'value_remember' => false );
												wp_login_form($login_args);
												?>
											</div>
											<div class="col-md-6">
												<p>Register</p>
												<?php gravity_form( 3, false, false, false, '', false ); ?>
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

<?php get_footer(); ?>
