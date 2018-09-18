<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 * @version 3.4.0
 */

get_header();

?>


<div class="wrapper" id="full-width-page-wrapper" style="padding: 0px 0;">

	<div class="container-fluid product-archive" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">
					<?php $islive = '0'; ?>

					<?php if ( $islive == '0' ) { ?>
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
						<div class="container pagebot50">
							<a href="/nola2018" target="_blank" style="margin: 50px auto 0; display: table;"><img src="/wp-content/uploads/2018/06/Instagram_NOLA.jpg"></a><br>
							<a href="/book" target="_blank" style="margin: 0 auto 0; display: table;"><img src="/wp-content/uploads/2018/06/Instagram_Book.jpg"></a><p></p>
						</div>

					<?php } else { ?>

						<header class="entry-header">

								<figure class="bbpage-header" style="background-image: url('/wp-content/themes/beingboss2018/img/Back_Laptop_5.jpg');">
									<div class="container">
										<div class="headertext">
											<h1 class="center white huge">BEING BOSS SHOP</h1>
										</div>
									</div>
								</figure>

						</header><!-- .entry-header -->

						<?php get_template_part( '/template-parts/bp-user-menu' ); ?>
						<?php get_template_part( '/template-parts/shop-menu' ); ?>

						<div class="container">
							<div class="pagesection50">
								<div class="archivecontainer">

									<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
											<article class="archiveitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
												<div class="archiveitemimage">
													<?php if ( has_post_thumbnail() ) : ?>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a>
													<?php endif; ?>
												</div>
												<div class="archiveitemcontent">
													<img src="/wp-content/themes/beingboss2018/img/BB_Icon_Paper.png">
													<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="archiveitemtitle"> <?php the_title(); ?></span></a></h5>
													<a href="<?php the_permalink(); ?>" class="archiveitemreadmore">SEE MORE >></a>
												</div> 
											</article>

									<?php endwhile; endif; ?>

								</div>

								<?php 
								// clean up after the query and pagination
									wp_reset_postdata(); 
								?>

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
