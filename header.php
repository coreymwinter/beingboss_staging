<?php
/**
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package beingboss2018
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>


	<!-- - - - - - - - - - BEING BOSS Code - - - - - - - - - - - - -->
	<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
	<script src="https://use.typekit.net/owk8dwn.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link href="/wp-content/themes/beingboss2018/drawer/sandbox.css" rel="stylesheet">
	<link href="/wp-content/themes/beingboss2018/drawer/drawer.min.css" rel="stylesheet">
	
	<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		 fbq('init', '1744799069130179'); 
		fbq('track', 'PageView');
		</script>
		<noscript>
		 <img height="1" width="1" 
		src="https://www.facebook.com/tr?id=1744799069130179&ev=PageView
		&noscript=1"/>
		</noscript>
	<!-- End Facebook Pixel Code -->
	<!-- Hotjar Tracking Code for www.beingboss.club -->
	<script>
    		(function(h,o,t,j,a,r){
        	h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        	h._hjSettings={hjid:563397,hjsv:6};
        	a=o.getElementsByTagName('head')[0];
        	r=o.createElement('script');r.async=1;
        	r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        	a.appendChild(r);
    		})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>

	<!-- - - - - - - - - - End BEING BOSS Code  - - - - - - - - -  -->
	
	
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->

	<?php if ( is_admin_bar_showing() ) : ?>
		<?php if ( is_page('Quiz') ) : ?>
			<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" style="top: 32px;">
		<?php else : ?>
			<div class="wrapper-fluid wrapper-navbar fixed-top" id="wrapper-navbar" style="top: 32px;">
		<?php endif; ?>
	<?php else : ?>
		<?php if ( is_page('Quiz') ) : ?>
			<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" style="top: 0;">
		<?php else : ?>
			<div class="wrapper-fluid wrapper-navbar fixed-top" id="wrapper-navbar" style="top: 0;">
		<?php endif; ?>
	<?php endif; ?>

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-light bg-light">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
							
						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						
						<?php endif; ?>
						
					
					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button type="button" class="drawer-toggle drawer-hamburger">
                			<span class="sr-only">toggle navigation</span>
                			<span class="drawer-hamburger-icon"></span>
				</button>
				<nav class="drawer-nav" role="navigation">
					<?php wp_nav_menu(
						array(
							'menu'  => '2018 Mobile Menu',
							'menu_class'      => 'navbar-nav-mobile',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu-mobile',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</nav>
				<!-- The WordPress Menu goes here -->
				<div class="menuright">
					<div class="topmenu">
						<a href="/about">ABOUT</a>
						<a href="/press">PRESS</a>
						<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>" id="top-search">
							<input name="s" type="search" placeholder="Search">
						</form>
					</div>
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</div>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->