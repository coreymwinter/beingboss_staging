<?php
/**
 * BuddyPress - Groups Home
 *
 * @since 3.0.0
 * @version 3.0.0
 */

if ( bp_has_groups() ) :
	while ( bp_groups() ) :
		bp_the_group();
	?>

	<style>
		#bbpress-forums .bbp-topic-form {display: none;}
		#bbpress-forums .bbp-template-notice {display: none;}
		#bbpress-forums .bbp-template-notice.info {display: block;}
	</style>

		<?php bp_nouveau_group_hook( 'before', 'home_content' ); ?>

		<div id="item-header" role="complementary" data-bp-item-id="<?php bp_group_id(); ?>" data-bp-item-component="groups" class="groups-header single-headers">

			<?php bp_nouveau_group_header_template_part(); ?>

		</div><!-- #item-header -->

		<div class="bp-wrap">

			<?php get_template_part( '/template-parts/bp-user-menu' ); ?>
			<?php get_template_part( '/template-parts/group-menu' ); ?>
			<?php 
				$user = wp_get_current_user();
				$user_ID = $user->ID;
				$group_ID = bp_get_group_id(); 
			?>

			<div class="container">
				<div id="item-body" class="item-body">
					<?php if ( groups_is_user_member( $user_ID, $group_ID ) ) { ?>
						<?php bp_nouveau_group_template_part(); ?>
					<?php } else { ?>
						<div class="pagesection80">
							<p class="center brandon large">You are not registered for this course.</p>
							<a href="/courses" class="button-yellow center">RETURN TO COURSES</a>
						</div>
					<?php } ?>

				</div><!-- #item-body -->
			</div>
		</div><!-- // .bp-wrap -->

		<?php bp_nouveau_group_hook( 'after', 'home_content' ); ?>

	<?php endwhile; ?>

<?php
endif;
