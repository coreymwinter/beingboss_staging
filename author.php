<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>


<div class="wrapper pagesection50" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<header class="page-header author-header">

					<?php
					$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
						$author_name ) : get_userdata( intval( $author ) );
					$curauth_id = $curauth->id; 
					?>

					<h1 class="center xlarge"><?php echo esc_html( $curauth->display_name ); ?></h1>
					<hr class="short">

					<dl>
						<?php if ( ! empty( $curauth->user_description ) ) : ?>
							<dd><?php echo $curauth->user_description; ?></dd>
						<?php endif; ?>
					</dl>

					<h2 class="margintop30"><?php esc_html_e( 'Articles by', 'understrap' ); ?> <?php echo esc_html( $curauth->first_name ); ?>
						:</h2>

				</header><!-- .page-header -->
				
				
				<!-- The Loop -->
				<div class="relatedpostsection">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="relatedpostbox">
							<div class="relatedpostimage"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a></div>
							<div class="relatedpostbottom">
								<img src="/wp-content/themes/beingboss2018/img/BB_Icon_Paper.png">
								<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="relatedposttitle"> <?php the_title(); ?></span></a></h5>
								<a href="<?php the_permalink(); ?>" class="relatedpostlistennow">READ MORE >></a>
							</div>
						</div>
					<?php endwhile; else: ?>
						<p><?php _e('No posts by this author.'); ?></p>

					<?php endif; ?>
				</div>

			<!-- End Loop -->

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
