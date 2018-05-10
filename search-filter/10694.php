<?php
/**
 * Archive Listing - Results
 *
 * 
 * @package   Search_Filter
 * @author    Corey Winter
 * 
 *
 */


if ( $query->have_posts() )
{
	?>
	<div class="eventcontainer">
	
		<?php
		while ($query->have_posts())
		{
			$query->the_post();
			
			?>
			<?php $event_time = get_post_meta( get_the_ID(), 'bbevents_event_time', true ); ?>
			<?php $event_where = get_post_meta( get_the_ID(), 'bbevents_event_where', true ); ?>
			<?php $event_link = get_post_meta( get_the_ID(), 'bbevents_event_link', true ); ?>
			<?php $event_label = get_post_meta( get_the_ID(), 'bbevents_event_label', true ); ?>
			
			<article class="eventitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				<div class="eventitemleft">
					<div class="month brandon">
						<?php echo get_the_date('F'); ?>
					</div>
					<div class="day"><p class="lustscript center"><?php echo get_the_date('j'); ?></p></div>
				</div>
				<div class="eventitemcontent">
					<h2 class="eventitemtitle"><a href="<?php echo $event_link; ?>" target="_blank" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p><?php echo $event_time; ?><br />
					@ <?php echo $event_where; ?></p>
				</div> 
				<div class="eventitemright">
					<a class="button-yellow" target="_blank" style="max-width: 95%;" href="<?php echo $event_link; ?>"><?php echo $event_label; ?></a>
				</div>
			</article>
			
			<?php
		}
		?>

	</div>
	
	<div class="pagination">
		
		<div class="nav-next"><?php previous_posts_link( '<< Previous page' ); ?></div>
		<div class="nav-previous"><?php next_posts_link( 'Next page >>', $query->max_num_pages ); ?></div>

		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	<?php
}
else
{
	echo "<p class='center'>No events are currently scheduled, but check back soon! We're already planning the next thing.</p>";
}
?>