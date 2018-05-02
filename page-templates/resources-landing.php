<?php
/**
 * Template Name: Resources - Landing
 *
 * Template for displaying the resources landing page.
 *
 * @package understrap
 */
get_header();

$container = get_theme_mod( 'understrap_container_type' );
$postid = get_the_ID();
$toppadding = get_post_meta( $postid, 'bbpage_top_padding', true );
$pagecss = get_post_meta( $postid, 'bbpage_page_css', true );
?>
<!-- custom css -->
<style><?php echo $pagecss; ?></style>
<!-- custom css -->
<script type="text/javascript">
	jQuery(function(){
        jQuery('.showSingle').click(function(){
			if (jQuery.trim(jQuery(this).text()) === 'VIEW MORE') {
				jQuery('#cat'+jQuery(this).attr('target')).slideToggle( "slow" );
				jQuery(this).text('VIEW LESS');
			}
			else {
				jQuery('#cat'+jQuery(this).attr('target')).slideToggle( "slow" );
				jQuery(this).text('VIEW MORE');        
			}
				
			return false;
        });
	});
	
</script>

<div class="wrapper" id="resource-wrapper">

	<div class="container-fluid" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<div class="entry-content" style="padding-top:<?php echo $toppadding; ?>px">

								<?php the_content(); ?>
								
								<div class="container">
									<div class="resourceparent">
										<div class="resourceimage">
											<img src="/wp-content/themes/beingboss2018/img/Resources_Foundations.png">
											<div class="resourcetitle">Being Boss foundations</div>
										</div>
										<div class="resourceright">
											<div class="pagesection80 capsule">
												<p>Build a sustainable business and life you love using our solid framework for success.</p>
												<a class="showSingle" target="1">VIEW MORE</a>
											</div>
										</div>
									</div>
									
									<?php
										$related_args = array(
												'post_type' => 'resources',
												'posts_per_page' => 20,
												'orderby' => 'date',
												'order'   => 'ASC',
												'tax_query' => array(
														array(
															'taxonomy' => 'resourcecategory',
															'field'    => 'slug',
															'terms'    => 'being-boss-foundations',
														),
													),
										);
													
										$related_query = new WP_Query( $related_args );

										if ( $related_query->have_posts() ) {
											echo '<div id="cat1" class="targetCat" style="display: none; padding: 0px 8px;">';
											while ( $related_query->have_posts() ) {
												$related_query->the_post();
									?>
											<div class="resourcechild"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="/wp-content/themes/beingboss2018/img/Icon_Resource_Pink.png"><?php the_title(); ?> >></a></div>
									<?php
											}
											echo '</div>';
											/* Restore original Post Data */
											wp_reset_postdata();
										} else {
											// no posts found
										}
									?>

									<div class="resourceparent">
										<div class="resourceimage">
											<img src="/wp-content/themes/beingboss2018/img/Resources_Business101.png">
											<div class="resourcetitle">Business<br />101</div>
										</div>
										<div class="resourceright">
											<div class="pagesection80 capsule">
												<p>Get your wheels turning and keep moving forward by starting with the basics.</p>
												<a class="showSingle" target="2">VIEW MORE</a>
											</div>
										</div>
									</div>
									
									<?php
										$related_args = array(
												'post_type' => 'resources',
												'posts_per_page' => 20,
												'orderby' => 'date',
												'order'   => 'ASC',
												'tax_query' => array(
														array(
															'taxonomy' => 'resourcecategory',
															'field'    => 'slug',
															'terms'    => 'business-101',
														),
													),
										);
													
										$related_query = new WP_Query( $related_args );

										if ( $related_query->have_posts() ) {
											echo '<div id="cat2" class="targetCat" style="display: none; padding: 0px 8px;">';
											while ( $related_query->have_posts() ) {
												$related_query->the_post();
									?>
											<div class="resourcechild"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="/wp-content/themes/beingboss2018/img/Icon_Resource_Blue.png"><?php the_title(); ?> >></a></div>
									<?php
											}
											echo '</div>';
											/* Restore original Post Data */
											wp_reset_postdata();
										} else {
											// no posts found
										}
									?>

									<div class="resourceparent">
										<div class="resourceimage">
											<img src="/wp-content/themes/beingboss2018/img/Resources_NextLevel.png">
											<div class="resourcetitle">Taking it to the next level</div>
										</div>
										<div class="resourceright">
											<div class="pagesection80 capsule">
												<p>Kick shit up a notch (or ten) by mastering your craft and refining the process.</p>
												<a class="showSingle" target="3">VIEW MORE</a>
											</div>
										</div>
									</div>
									
									<?php
										$related_args = array(
												'post_type' => 'resources',
												'posts_per_page' => 20,
												'orderby' => 'date',
												'order'   => 'ASC',
												'tax_query' => array(
														array(
															'taxonomy' => 'resourcecategory',
															'field'    => 'slug',
															'terms'    => 'next-level'
														),
													),
										);
													
										$related_query = new WP_Query( $related_args );

										if ( $related_query->have_posts() ) {
											echo '<div id="cat3" class="targetCat" style="display: none; padding: 0px 8px;">';
											while ( $related_query->have_posts() ) {
												$related_query->the_post();
									?>
											<div class="resourcechild"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="/wp-content/themes/beingboss2018/img/Icon_Resource_Pink.png"><?php the_title(); ?> >></a></div>
									<?php
											}
											echo '</div>';
											/* Restore original Post Data */
											wp_reset_postdata();
										} else {
											// no posts found
										}
									?>
									
									<div class="resourceparent">
										<div class="resourceimage">
											<img src="/wp-content/themes/beingboss2018/img/Resources_BossLife.png">
											<div class="resourcetitle">Living a<br />boss life</div>
										</div>
										<div class="resourceright">
											<div class="pagesection80 capsule">
												<p class="padbot0">Find real, outside-of-the-office freedom by knowing your needs and staying true to you.</p>
												<a class="showSingle" target="4">VIEW MORE</a>
											</div>
										</div>
									</div>
									
									<?php
										$related_args = array(
												'post_type' => 'resources',
												'posts_per_page' => 20,
												'orderby' => 'date',
												'order'   => 'ASC',
												'tax_query' => array(
														array(
															'taxonomy' => 'resourcecategory',
															'field'    => 'slug',
															'terms'    => 'boss-life'
														),
													),
										);
													
										$related_query = new WP_Query( $related_args );

										if ( $related_query->have_posts() ) {
											echo '<div id="cat4" class="targetCat" style="display: none; padding: 0px 8px;">';
											while ( $related_query->have_posts() ) {
												$related_query->the_post();
									?>
											<div class="resourcechild"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="/wp-content/themes/beingboss2018/img/Icon_Resource_Blue.png"><?php the_title(); ?> >></a></div>
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
