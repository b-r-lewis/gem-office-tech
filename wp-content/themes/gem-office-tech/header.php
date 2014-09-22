<!-- <!doctype html> -->
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php bloginfo( 'name' ); ?></title>
	<meta name="title" content="<?php bloginfo( 'name' ); ?>">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
</head>

<body>

	<div class="page-wrap">
		<header class="header header-wrap">
			<a href="<?php echo home_url(); ?>">
				<div class="header__img">
					<img src="<?php header_image(); ?>" />
				</div>
				<div class="header__text">
					<h1 class="title"><?php bloginfo( 'name' ); ?></h1>
					<p class="tagline"><?php bloginfo( 'description' ); ?></p>
				</div>
			</a>
		</header>

		<div class="nav-wrap">
		<?php
			$nav_args = array(
				'menu'            => 'nav-menu',
				'container'       => 'nav',
				'container_class' => 'main-nav',
				'container_id'    => 'main-nav',
				'items_wrap'      => '%3$s',
				'walker'          => new custom_main_nav_walker()
			);
			wp_nav_menu( $nav_args );
		?>
		</div>

		<div class="e-auto-wrap">
			<?php
				// Create E-Automate menu
				$e_auto_args = array(
					'menu'            => 'e-auto-menu' ,
					'container'       => 'nav',
					'container_class' => 'e-auto-nav',
					'container_id'    => 'e-auto-nav',
					'echo'            => false,
					'items_wrap'      => '%3$s'
				);
				$e_auto_menu = wp_nav_menu( $e_auto_args );
				echo strip_tags( $e_auto_menu, '<nav><a>' );
			?>
		</div>

		<main role="main" class="content-wrap">