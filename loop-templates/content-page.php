<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */
$postid = get_the_ID();
$toppadding = get_post_meta( $postid, 'bbpage_top_padding', true );
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content" style="padding-top:<?php echo $toppadding; ?>px">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
