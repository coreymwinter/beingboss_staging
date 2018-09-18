<?php
/**
 * BuddyPress - Groups Cover Image Header.
 *
 * @since 3.0.0
 * @version 3.1.0
 */
?>

<div id="cover-image-container">
	<div id="header-cover-image"></div>

	<div id="item-header-cover-image">
		<div class="headertext">
			<h1 class="center white huge"><?php the_title(); ?></h1>
		</div>	

	</div><!-- #item-header-cover-image -->

</div><!-- #cover-image-container -->

<?php if ( ! bp_nouveau_groups_front_page_description() ) : ?>
	<?php if ( ! empty( bp_nouveau_group_meta()->description ) ) : ?>
		<div class="desc-wrap">
			<div class="group-description">
			<?php echo esc_html( bp_nouveau_group_meta()->description ); ?>
		</div><!-- //.group_description -->
	</div>
	<?php endif; ?>
<?php endif; ?>
