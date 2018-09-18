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

<?php
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<div class="wrapper" id="archive-wrapper" style="padding: 50px 0 75px;">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title center">', '</h1>' );
						echo '<hr class="even">';
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					<div class="archivecontainer">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<article class="archiveitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="archiveitemimage">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a>
									</div>
								<?php endif; ?>
									<div class="archiveitemcontent">
										<?php if ( 'post' == get_post_type() ) : ?>
											<img src="/wp-content/themes/beingboss2018/img/BBClubhouse_SecretEpisodes.png">
										<?php else : ?>
											<img src="/wp-content/themes/beingboss2018/img/BB_Icon_Paper.png">
										<?php endif; ?>
										<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="archiveitemtitle"> <?php the_title(); ?></span></a></h5>
										<p class="archiveitemauthor">BY <?php the_author(); ?></p>
										<?php if ( 'post' == get_post_type() ) : ?>
											<a href="<?php the_permalink(); ?>" class="archiveitemreadmore">LISTEN NOW >></a>
										<?php else : ?>
											<a href="<?php the_permalink(); ?>" class="archiveitemreadmore">READ NOW >></a>
										<?php endif; ?>
									</div> 
							</article>

						<?php endwhile; ?>
					</div>
				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->


	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
