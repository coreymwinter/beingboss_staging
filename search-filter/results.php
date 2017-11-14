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
	<div class="archivecontainer">
	
		<?php
		while ($query->have_posts())
		{
			$query->the_post();
			
			?>
			<article class="archiveitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="archiveitemimage">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a>
					</div>
				<?php endif; ?>
					<div class="archiveitemcontent">
						<img src="https://beingboss.staging.wpengine.com/wp-content/uploads/2016/02/BB_Icon_Paper.png">
						<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="archiveitemtitle"> <?php the_title(); ?></span></a></h5>
						<p class="archiveitemauthor">BY <?php the_author(); ?></p>
						<a href="<?php the_permalink(); ?>" class="archiveitemreadmore">READ NOW >></a>
					</div> 
			</article>
			
			<?php
		}
		?>

	</div>
	
	<div class="pagination">
		
		<div class="nav-previous"><?php next_posts_link( 'Next page >>', $query->max_num_pages ); ?></div>
		<div class="nav-next"><?php previous_posts_link( '<< Previous page' ); ?></div>
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