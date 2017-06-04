<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700" rel="stylesheet">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>


	</head>
	<body <?php body_class(); ?>>


		<header class="header" id="header">
			<a href="<?php echo home_url(); ?>"  id="branding"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Jazz Contraband"> <span>Jazz Contraband</span></a>
			<nav id="navigation_menu" role="navigation">
				<ul>
					<?php chilly_nav('header-menu'); ?>
					<?php if(is_user_logged_in()) : ?>
						<?php chilly_nav('loggedin-menu'); ?>
						<li><a href="<?php echo wp_logout_url( site_url('/')  ); ?>">Logout</a></li>
					<?php else: ?>
						<li><a href="<?php echo  site_url('/login'); ?>">Login</a></li>
					<?php endif; ?>
				</ul>

			</nav>
			<p id="jazz_name"></p>
			<div class="yellow_stripes border_image border_top"></div>

			<!-- <div class="container">
				<div class="row">
					<div class="col-sm-3 col-sm-push-0 col-xs-10 col-xs-push-1">
						<a href="<?php echo home_url(); ?>" class="branding"><?php bloginfo('name'); ?></a>
					</div>
					<div class="col-sm-9">
						<nav id="navigation_menu" role="navigation">
							<ul>
								<?php chilly_nav('header-menu'); ?>
								<?php if(is_user_logged_in()) : ?>
									<?php chilly_nav('loggedin-menu'); ?>
									<li><a href="<?php echo wp_logout_url( site_url('/')  ); ?>">Logout</a></li>
								<?php else: ?>
									<li><a href="<?php echo  site_url('/login'); ?>">Login</a></li>
								<?php endif; ?>
							</ul>

						</nav>
					</div>

				</div>
				<a href="#" id="menu_button" >Menu</a>
			</div> -->

		</header>
