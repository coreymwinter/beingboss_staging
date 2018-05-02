<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

?>


<div class="relatedpostbox" id="post-<?php the_ID(); ?>">
	<?php $post_thumbnail = get_the_post_thumbnail( get_the_ID(), 'archive-thumb'); ?>
	<?php if ( $post_thumbnail ) { ?>
		<div class="relatedpostimage"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $post_thumbnail; ?></a></div>
	<?php } else { ?>
		<div class="relatedpostimage"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="https://beingboss.club/wp-content/uploads/2017/12/search-results-default.jpg"></a></div>
	<?php } ?>
	<div class="relatedpostbottom">
		<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="relatedposttitle"> <?php the_title(); ?></span></a></h5>
		<a href="<?php the_permalink(); ?>" class="relatedpostlistennow">READ MORE >></a>
	</div>
</div>
