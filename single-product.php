<?php
/**
 * The template for displaying all single product posts.
 *
 * @package understrap
 * @version 1.6.4
 */

get_header();
?>

<div class="wrapper" id="page-wrapper">

	<div class="container pagesection50" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<p class="center brandon large">This product page is coming soon</p>
					<a href="/dashboard" class="button-yellow center">RETURN TO DASHBOARD</a>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
