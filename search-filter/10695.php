<?php
/**
 * Vacation Listing - Results
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
	<div class="vacationcontainer">
	
		<?php
		while ($query->have_posts())
		{
			$query->the_post();
				$thrive_shortcode_id = get_post_meta( get_the_ID(), 'bbevents_vacation_video', true );
				$vacation_page = get_post_meta (get_the_ID(), 'bbevents_event_link', true );
			?>
			<?php if ( !empty( $vacation_page ) ) { ?>
				<a href="<?php echo do_shortcode($vacation_page); ?>">
			<?php } ?>
			<?php if ( !empty( $thrive_shortcode_id ) ) { ?>
				<span class="tve-leads-two-step-trigger tl-2step-trigger-<?php echo do_shortcode($thrive_shortcode_id); ?>">			
			<?php } ?>
					<article class="vacationitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<?php if ( has_post_thumbnail() ) : ?>
							<span class="vacationitemimage">
								<?php the_post_thumbnail('archive-thumb'); ?>
							</span>
						<?php endif; ?>
							<span class="vacationitemcontent">
								<h5><span class="vacationitemtitle"> <?php the_title(); ?></span></h5>					
								<?php if ( !empty( $thrive_shortcode_id ) ) { ?>
									<p class="vacationitemvideo">VIEW MORE</p>				
								<?php } ?>
								<?php if ( !empty( $vacation_page ) ) { ?>
									<p class="vacationitemvideo">VIEW MORE</p>				
								<?php } ?>
							</span> 
					</article>
			<?php if ( !empty( $vacation_page ) ) { ?>
				</a>				
			<?php } ?>
			<?php if ( !empty( $thrive_shortcode_id ) ) { ?>
				</span>					
			<?php } ?>
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
	echo "No Results Found";
}
?>