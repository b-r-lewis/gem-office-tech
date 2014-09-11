<?php

if ( ! exists() ) :
function gem_setup() {

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu()
	register_nav_menus( array(
			'e-auto-nav' => __( 'E-Automate Links Menu', 'gem-office-tech' ),
			'main-nav'   => __( 'Main Navigation Menu', 'gem-office-tech' ),
			'social-nav' => __( 'Social Links Menu', 'gem-office-tech' )
		)
	);

}
endif; // gem_setup
add_action( 'after_setup_theme', 'gem_setup' );