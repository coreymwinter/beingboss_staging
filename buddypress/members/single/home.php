<?php
/**
 * BuddyPress - Members Home
 *
 * @since   1.0.0
 * @version 3.0.0
 */
?>

	<?php bp_nouveau_member_hook( 'before', 'home_content' ); ?>

	<figure class="bbpage-header" style="background-image: url('/wp-content/themes/beingboss2018/img/Back_Laptop_5.jpg');">
		<div class="container">
										
		</div>
	</figure>
	<div class="bp-wrap">
		<?php get_template_part( '/template-parts/bp-user-menu' ); ?>
		<div class="course-menu-bar" style="padding: 10px 0;">
			<div class="container">
				<?php bp_get_template_part( 'members/single/parts/item-nav' ); ?>
			</div>
		</div>
		<div class="container">
			<div id="item-body" class="item-body">

				<?php bp_nouveau_member_template_part(); ?>

			</div><!-- #item-body -->
		</div><!-- // .bp-wrap -->
	</div>

	<?php bp_nouveau_member_hook( 'after', 'home_content' ); ?>