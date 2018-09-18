<div class="mobilehide">
	<div class="course-menu-bar">
		<div class="container">
			<div class="course-menu-container">
				<div class="row">
					<div class="col-md-6 vertcenter">

						<?php 

							$lessonid = get_the_ID();
							$courseid = get_post_meta( $lessonid, 'course_id', true ); 

							$course_slug = get_post_field( 'post_name', get_post($courseid) );

							$course_group = get_post_meta( $courseid, 'bp_course_group', true );


							if( get_post_type() == 'sfwd-courses' ) { 

								$courseid = get_the_ID();
								$course_slug = get_post_field( 'post_name', get_post($courseid) );
								$course_group = get_post_meta( $courseid, 'bp_course_group', true );

							?>
								<ul class="course-menu">
										<li><span class="brandon mediumsmall">FOR THIS COURSE: </span></li>
										<li><a href="/courses/<?php echo $course_slug; ?>">HOME</a></li>
									<?php if ( !empty( $course_group ) ) { ?>
										<li><a href="/groups/<?php echo $course_slug; ?>/forum/">FORUM</a></li>
										<li><a href="/groups/<?php echo $course_slug; ?>/members/">MEMBERS</a></li>
									<?php } ?>
								</ul>
							<?php }
							else { 

								$lessonid = get_the_ID();
								$parentid = get_post_meta( $lessonid, 'course_id', true ); 
								$parent_slug = get_post_field( 'post_name', get_post($parentid) );
								$parent_group = get_post_meta( $parentid, 'bp_course_group', true );

							?>

								<ul class="course-menu">
										<li><span class="brandon mediumsmall">FOR THIS COURSE: </span></li>
										<li><a href="/courses/<?php echo $parent_slug; ?>">HOME</a></li>
									<?php if ( !empty( $course_group ) ) { ?>
										<li><a href="/groups/<?php echo $parent_slug; ?>/forum/">FORUM</a></li>
										<li><a href="/groups/<?php echo $parent_slug; ?>/members/">MEMBERS</a></li>
									<?php } ?>
								</ul>
							<?php }

						?>

					</div>

					<div class="col-md-6 vertcenter breadcrumbs-menu" style="text-align: right;">
						<span class="breadcrumb-leads">
							<a href="/dashboard">Home</a> / <a href="/courses">Courses</a>
						</span>
						<?php echo do_shortcode('[uo_breadcrumbs]'); ?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>



<div class="course-menu-bar mobileshow">
	<div class="container">
			<div class="row">
				<div class="col-md-6 mobilecoursenav">
					<input type="checkbox" id="show-menu-course" role="button">
					<label for="show-menu-course" class="show-menu-course"><i class="fa fa-bars" aria-hidden="true"></i> Course Menu</label>

					<ul id="mobilecoursemenu">
						<?php 	
    						$lessonid = get_the_ID();
							$courseid = get_post_meta( $lessonid, 'course_id', true ); 

							$course_slug = get_post_field( 'post_name', get_post($courseid) );

							$course_group = get_post_meta( $courseid, 'bp_course_group', true );


							if( get_post_type() == 'sfwd-courses' ) { 

								$courseid = get_the_ID();
								$course_slug = get_post_field( 'post_name', get_post($courseid) );
								$course_group = get_post_meta( $courseid, 'bp_course_group', true );
						?>
										<li><a href="/courses/<?php echo $course_slug; ?>">HOME</a></li>
									<?php if ( !empty( $course_group ) ) { ?>
										<li><a href="/groups/<?php echo $course_slug; ?>/forum/">FORUM</a></li>
										<li><a href="/groups/<?php echo $course_slug; ?>/members/">MEMBERS</a></li>
									<?php } ?>
							<?php }
							else { 

								$lessonid = get_the_ID();
								$parentid = get_post_meta( $lessonid, 'course_id', true ); 
								$parent_slug = get_post_field( 'post_name', get_post($parentid) );
								$parent_group = get_post_meta( $parentid, 'bp_course_group', true );

							?>
										<li><a href="/courses/<?php echo $parent_slug; ?>">HOME</a></li>
									<?php if ( !empty( $course_group ) ) { ?>
										<li><a href="/groups/<?php echo $parent_slug; ?>/forum/">FORUM</a></li>
										<li><a href="/groups/<?php echo $parent_slug; ?>/members/">MEMBERS</a></li>
									<?php } 
								} ?>
					</ul>
				</div>
			</div>
	</div>
</div>