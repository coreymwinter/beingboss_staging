<?php 
get_header(); ?>

<div class="wrapper dashboard" id="full-width-page-wrapper">

	<?php 
	if ( !is_user_logged_in() ) { ?>
		<?php get_template_part( '/template-parts/bp-user-menu' ); ?>
		<div class="container pagesection80">
			<p class="center brandon large">This page is only available to registered bosses.</p>
			<a href="/login" class="button-yellow center">LOG IN</a>
		</div>
	<?php }
	else { ?>
		<div class="container-fluid">
			<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
							
				<?php the_content(); ?>
			
			<?php endwhile; endif; ?>
		</div><!--/container-wrap-->
	<?php } ?>
</div>

<?php get_footer( 'dashboard' ); ?>