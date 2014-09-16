<?php

if ( ! function_exists( 'gem_setup' ) ) :
function gem_setup() {

	// This theme uses custom post types: 
	// Milestone (ACF required)
	require get_template_directory() . '/inc/custom-post-type-milestone.php';

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
endif; // end gem_setup
add_action( 'after_setup_theme', 'gem_setup' );