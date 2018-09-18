<?php
/**
 * BuddyPress Members Directory
 *
 * @version 3.0.0
 */

$user = wp_get_current_user();
$user_ID = $user->ID;	

?>

<?php get_template_part( '/template-parts/bp-user-menu' ); ?>

<div class="container pagesection50">

	<?php if ( groups_is_user_member( $user_ID, '2' ) ) { ?>

		<?php bp_nouveau_before_members_directory_content(); ?>

		<?php if ( ! bp_nouveau_is_object_nav_in_sidebar() ) : ?>

			<?php bp_get_template_part( 'common/nav/directory-nav' ); ?>

		<?php endif; ?>

		<div class="screen-content">

		<?php bp_get_template_part( 'common/search-and-filters-bar' ); ?>

			<div id="members-dir-list" class="members dir-list" data-bp-list="members">
				<div id="bp-ajax-loader"><?php bp_nouveau_user_feedback( 'directory-members-loading' ); ?></div>
			</div><!-- #members-dir-list -->

			<?php bp_nouveau_after_members_directory_content(); ?>
		</div><!-- // .screen-content -->
	
	<?php } else {?>
		<?php get_template_part( '/template-parts/communitycomingsoon-large' ); ?>
	<?php } ?>

</div>