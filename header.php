<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="theme-color" content="#FFFFFF">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<?php 
		// Wordpress wp_body_open action for script snippets etc.
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		} else {
			do_action( 'wp_body_open' );
		} 
		?>

		<!--[if lte IE 9]>
            <div class="browserupgrade alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/?locale=en">upgrade your browser</a> to improve your experience.</div>
        <![endif]-->

		<div class="wrapper">
			<header class="site-header" role="banner">
				<div class="container">
					<nav class="navbar" role="navigation" aria-label="Primary navigation">
						<?php //theme_logo(); ?>
						<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							Jaakko Heikkilä
						</a>
					
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-wrapper" aria-expanded="false" aria-label="Toggle navigation" aria-controls="nav-wrapper">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>

						<div class="collapse" id="nav-wrapper">
							<?php 
							if (has_nav_menu('header-menu')) :
								wp_nav_menu([
									'theme_location' => 'header-menu', 
									'container' => false, 
									'menu_class' => 'navbar-nav'
								]);
							endif; 
							?>
						</div>
					</nav>
				</div>
			</header>
