<?php

if ( ! function_exists( 'pre_gem_setup' ) ) :
function pre_gem_setup() {

	register_taxonomy_for_object_type( 'category', 'attachment' );
	register_taxonomy_for_object_type( 'post_tag', 'attachment' );
	// register_taxonomy{ 'category', 'job-posting' };

}
endif; // end pre_gem_setup
add_action( 'init', 'pre_gem_setup' );



if ( ! function_exists( 'gem_setup' ) ) :
function gem_setup() {

	// This theme uses custom post types: 
	// Milestone (ACF required)
	require get_template_directory() . '/inc/custom-post-type-milestone.php';

	require get_template_directory() . '/inc/custom-post-type-job-posting.php';

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	$header_args = array(
		'flex-width'    => true,
		'width'         => 612,
		'flex-height'   => true,
		'height'        => 612,
		'default-image' => get_template_directory_uri() . '/img/gem-logo-graphic-only.png'
	);
	add_theme_support( 'custom-header', $header_args );

	// This theme uses wp_nav_menu()
	register_nav_menus( array(
			'e-auto-nav' => __( 'E-Automate Links Menu', 'gem-office-tech' ),
			'main-nav'   => __( 'Main Navigation Menu', 'gem-office-tech' ),
			'social-nav' => __( 'Social Links Menu', 'gem-office-tech' )
		)
	);

	// This theme uses a custom wp_nav_menu walker
	require get_template_directory() . '/inc/custom-main-nav-walker.php';

	// register_taxonomy_for_object_type( 'category', 'attachment' );
	// register_taxonomy_for_object_type( 'post_tag', 'attachment' );

}
endif; // end gem_setup
add_action( 'after_setup_theme', 'gem_setup' );

if ( ! function_exists( 'gem_script_setup') ) :
function gem_script_setup() {
	// use Google's jquery
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 
				'//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
	
	wp_register_script( 'custom-script',
				get_template_directory_uri().'/js/script.js',
				array('jquery'),
				1.0,
				true );
	wp_enqueue_script( 'custom-script' );

}
endif;
add_action( 'wp_footer', 'gem_script_setup' );

