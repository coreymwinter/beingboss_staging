<div class="mobilehide">
	<div class="course-menu-bar">
		<div class="container">
			<div class="course-menu-container">
				<div class="row">
					<div class="col-md-6 vertcenter">
						<span class="brandon mediumsmall" style="float: left; padding: 0 15px 0 5px; line-height: 2 !important;">SHOP MENU: </span>
						<?php wp_nav_menu(
							array(
								'menu'  => 'Shop Menu',
								'menu_class' => 'course-menu'
							)
						); ?>	

					</div>

					<div class="col-md-6 vertcenter breadcrumbs-menu" style="text-align: right;">
						<span class="breadcrumb-leads">

							<?php wp_nav_menu(
								array(
									'menu'  => 'Customer Menu',
									'menu_class' => 'user-menu'
								)
							); ?>

						</span>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


<div class="course-menu-bar mobileshow">
	<div class="container">
			<div class="row">
				<div class="col-md-6 mobileshopnav">
					<input type="checkbox" id="show-menu-shop" role="button">
					<label for="show-menu-shop" class="show-menu-shop"><i class="fa fa-bars" aria-hidden="true"></i> Shop Menu</label>
						<?php wp_nav_menu(
							array(
								'menu'  => 'Shop Menu',
								'menu_class' => 'shop-menu',
								'menu_id' => 'mobileshopmenu',
								'container'=> false
							)
						); ?>	
				</div>
			</div>
	</div>
</div>




