<div class="mobilehide">
	<div class="course-menu-bar">
		<div class="container">
			<div class="course-menu-container">
				<div class="row">
					<div class="col-md-6 vertcenter">

						<?php 

							$current_user = wp_get_current_user();
							$post_id = get_the_ID();
							$post_slug = bp_get_current_group_slug();

							$subforum_check = get_post_meta( $post_id, '_bbp_forum_subforum_count', true );

						?>

						<?php if ( $subforum_check == '0' && is_singular('forum') ) { 
							$forum_parent = wp_get_post_parent_id( $post_id );
							$parent_group = get_post_meta( $forum_parent, '_bbp_group_ids', true );
							$forum_group = groups_get_group( array( 'group_id' => $parent_group ) );
							$group_slug = $forum_group->slug;
						?>
							<?php if ( !empty ($group_slug) ) { ?>
								<ul class="course-menu">
									<li><span class="brandon mediumsmall">FOR THIS COURSE: </span></li>
									<li><a href="/courses/<?php echo $group_slug; ?>">HOME</a></li>
									<li><a href="/groups/<?php echo $group_slug; ?>/forum/">FORUM</a></li>
									<li><a href="/groups/<?php echo $group_slug; ?>/members/">MEMBERS</a></li>
								</ul>
							<?php } ?>
						<?php } else if ( is_singular('topic') ) { 
							$topic_parent_id = get_post_meta( $post_id, '_bbp_forum_id', true );
							$forum_parent = wp_get_post_parent_id( $topic_parent_id );
							$parent_group = get_post_meta( $forum_parent, '_bbp_group_ids', true );
							$forum_group = groups_get_group( array( 'group_id' => $parent_group ) );
							$group_slug = $forum_group->slug;
						?>
							<?php if ( !empty ($group_slug) ) { ?>
								<ul class="course-menu">
									<li><span class="brandon mediumsmall">FOR THIS COURSE: </span></li>
									<li><a href="/courses/<?php echo $group_slug; ?>">HOME</a></li>
									<li><a href="/groups/<?php echo $group_slug; ?>/forum/">FORUM</a></li>
									<li><a href="/groups/<?php echo $group_slug; ?>/members/">MEMBERS</a></li>
								</ul>
							<?php } ?>
						<?php } else if ( !empty ($post_slug) ) { ?>
							<ul class="course-menu">
								<li><span class="brandon mediumsmall">FOR THIS COURSE: </span></li>
								<li><a href="/courses/<?php echo $post_slug; ?>">HOME</a></li>
								<li><a href="/groups/<?php echo $post_slug; ?>/forum/">FORUM</a></li>
								<li><a href="/groups/<?php echo $post_slug; ?>/members/">MEMBERS</a></li>
							</ul>
						<?php } else { } ?>

					</div>

					<div class="col-md-6 vertcenter breadcrumbs-menu">
						<?php bbp_breadcrumb(); ?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="course-menu-bar mobileshow">
	<div class="container">
			<div class="row">
				<div class="col-md-6 mobilegroupnav">
					<input type="checkbox" id="show-menu-group" role="button">
					<label for="show-menu-group" class="show-menu-group"><i class="fa fa-bars" aria-hidden="true"></i> Course Menu</label>
    		
					<ul id="mobilegroupmenu">
						<?php 
							$current_user = wp_get_current_user();
							$post_id = get_the_ID();
							$post_slug = bp_get_current_group_slug();
							$subforum_check = get_post_meta( $post_id, '_bbp_forum_subforum_count', true );
						?>

						<?php if ( $subforum_check == '0' && is_singular('forum') ) { 
							$forum_parent = wp_get_post_parent_id( $post_id );
							$parent_group = get_post_meta( $forum_parent, '_bbp_group_ids', true );
							$forum_group = groups_get_group( array( 'group_id' => $parent_group ) );
							$group_slug = $forum_group->slug;
						?>
							<?php if ( !empty ($group_slug) ) { ?>
									<li><a href="/courses/<?php echo $group_slug; ?>">HOME</a></li>
									<li><a href="/groups/<?php echo $group_slug; ?>/forum/">FORUM</a></li>
									<li><a href="/groups/<?php echo $group_slug; ?>/members/">MEMBERS</a></li>
							<?php } ?>
						<?php } else if ( is_singular('topic') ) { 
							$topic_parent_id = get_post_meta( $post_id, '_bbp_forum_id', true );
							$forum_parent = wp_get_post_parent_id( $topic_parent_id );
							$parent_group = get_post_meta( $forum_parent, '_bbp_group_ids', true );
							$forum_group = groups_get_group( array( 'group_id' => $parent_group ) );
							$group_slug = $forum_group->slug;
						?>
							<?php if ( !empty ($group_slug) ) { ?>
									<li><a href="/courses/<?php echo $group_slug; ?>">HOME</a></li>
									<li><a href="/groups/<?php echo $group_slug; ?>/forum/">FORUM</a></li>
									<li><a href="/groups/<?php echo $group_slug; ?>/members/">MEMBERS</a></li>
							<?php } ?>
						<?php } else if ( !empty ($post_slug) ) { ?>
								<li><a href="/courses/<?php echo $post_slug; ?>">HOME</a></li>
								<li><a href="/groups/<?php echo $post_slug; ?>/forum/">FORUM</a></li>
								<li><a href="/groups/<?php echo $post_slug; ?>/members/">MEMBERS</a></li>
						<?php } else { } ?>
					</ul>

				</div>
			</div>
	</div>
</div>