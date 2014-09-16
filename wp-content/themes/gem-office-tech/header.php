<!doctype html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php bloginfo( 'name' ); ?></title>
	<meta name="title" content="<?php bloginfo( 'name' ); ?>">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
</head>

<body>
	<div class="page-wrap">
		<header class="header-wrap">
			<h1><?php bloginfo( 'name' ); ?></h1>
			<p class="tagline"><?php bloginfo( 'description' ); ?></p>
		</header>

		<?php
			// Create Main Navigation menu
			$nav_args = array( 
				'menu'            => 'nav-menu' ,
				'container'       => 'nav',
				'container_class' => 'main-nav',
				'container_id'    => 'main-nav',
				'echo'            => false,
				'depth'           => 1,
				'items_wrap'      => '%3$s'
			);
			$nav_menu = wp_nav_menu( $nav_args );
			echo strip_tags( $nav_menu, '<nav><a>' );
		?>

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

		<main role="main" class="content-wrap">