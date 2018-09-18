<?php 
get_header(); 

$postid = get_the_ID();

?>


<div class="wrapper forum-wrapper" id="full-width-page-wrapper">

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

				<?php if ( is_singular('forum') ) {
					$forum_parent = wp_get_post_parent_id( $postid );
					$parent_group = get_post_meta( $forum_parent, '_bbp_group_ids', true );
					$parent_image = get_post_meta( $forum_parent, 'bbgroupforum_header_background', true );
				?>
					<?php if( !empty( $parent_group )) { ?>
						<figure class="bbpage-header" style="background-image: url('<?php echo $parent_image; ?>');">
							<div class="container">
								<div class="headertext">
										<h1 class="center white huge">FORUM: <?php the_title(); ?></h1>				
								</div>
							</div>
						</figure>
					<?php } else { ?>
						<style>
							#bbpress-forums .bbp-topic-form {display: none;}
							#bbpress-forums .bbp-template-notice {display: none;}
							#bbpress-forums .bbp-template-notice.info {display: table;}
						</style>
						<figure class="bbpage-header" style="background-image: url('/wp-content/themes/beingboss2018/img/Back_Laptop_5.jpg');">
							<div class="container">
								<div class="headertext">
										<h1 class="center white huge">FORUM: <?php the_title(); ?></h1>					
								</div>
							</div>
						</figure>
				<?php } 
				} ?>


				<?php if ( is_singular('topic') ) {
					$topic_parent_id = get_post_meta( $postid, '_bbp_forum_id', true );
					$forum_parent = wp_get_post_parent_id( $topic_parent_id );
					$parent_group = get_post_meta( $forum_parent, '_bbp_group_ids', true );
					$parent_image = get_post_meta( $forum_parent, 'bbgroupforum_header_background', true );
				?>
					<?php if( !empty( $parent_group )) { ?>
						<figure class="bbpage-header" style="background-image: url('<?php echo $parent_image; ?>');">
							<div class="container">
								<div class="headertext">
										<h1 class="center white huge">TOPIC: <?php the_title(); ?></h1>				
								</div>
							</div>
						</figure>
					<?php } else { ?>
						<figure class="bbpage-header" style="background-image: url('/wp-content/themes/beingboss2018/img/Back_Laptop_5.jpg');">
							<div class="container">
								<div class="headertext">
										<h1 class="center white huge">TOPIC: <?php the_title(); ?></h1>			
								</div>
							</div>
						</figure>
				<?php } 
				} ?>

				<?php if ( !is_singular('forum') && !is_singular('topic') ) { ?>
					<figure class="bbpage-header" style="background-image: url('/wp-content/themes/beingboss2018/img/Back_Laptop_5.jpg');">
							<div class="container">
								<div class="headertext">
										<h1 class="center white huge">BOSS COMMUNITY</h1>			
								</div>
							</div>
					</figure>
				<?php } ?>

				<?php get_template_part( '/template-parts/bp-user-menu' ); ?>
				<?php get_template_part( '/template-parts/group-menu' ); ?>

			
							
				<div class="container">
					<?php the_content(); ?>
				</div>
			
			<?php endwhile; endif; ?>
		</div><!--/container-wrap-->
	<?php }
	?>

</div>

<?php get_footer( 'dashboard' ); ?>