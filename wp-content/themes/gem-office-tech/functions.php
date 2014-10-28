<?php

if ( ! function_exists( 'pre_gem_setup' ) ) :
function pre_gem_setup() {

	register_taxonomy_for_object_type( 'category', 'attachment' );
	register_taxonomy_for_object_type( 'post_tag', 'attachment' );

}
endif; // end pre_gem_setup
add_action( 'init', 'pre_gem_setup' );



if ( ! function_exists( 'gem_setup' ) ) :
function gem_setup() {

	// This theme uses custom post types: 
	// Milestone (ACF required)
	require get_template_directory() . '/inc/custom-post-type-milestone.php';

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// This theme uses a custom header image
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

	// Disable Contact Form 7 JS/CSS for most pages
	add_filter( 'wpcf7_load_js', '__return_false' );
	add_filter( 'wpcf7_load_css', '__return_false' );

	// Disable Comments in admin menu
	function remove_menus() {
		remove_menu_page( 'edit-comments.php' );
	}
	add_action( 'admin_menu', 'remove_menus' );
}
endif; // end gem_setup
add_action( 'after_setup_theme', 'gem_setup' );


if ( ! function_exists( 'gem_script_setup') ) :
function gem_script_setup() {
	// Ditch Wordpress's default jquery, use Google's
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 
				'//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', true);
	wp_enqueue_script( 'jquery' );

	// Use modernizr
	wp_register_script( 'modernizr',
				get_template_directory_uri().'/js/modernizr.custom.js',
				false);
	wp_enqueue_script( 'modernizr' );

	// Use custom scripts
	wp_register_script( 'custom-script',
				get_template_directory_uri().'/js/script.js',
				array('jquery'),
				1.0,
				true );
	wp_enqueue_script( 'custom-script' );

	// On the Home page:
	// Use Slick carousel
	if ( is_home() ) :
		wp_register_script( 'slick-script',
				'//cdn.jsdelivr.net/jquery.slick/1.3.7/slick.min.js',
				array('jquery'),
				true );
		wp_register_script( 'custom-slick',
				get_template_directory_uri().'/js/custom-slick.js',
				array('jquery'),
				1.0,
				true );
		wp_enqueue_script( 'slick-script' );
		wp_enqueue_script( 'custom-slick' );
	endif;

	// On a Link List page:
	// Use Youtube converter
	if ( is_page_template( 'page-link-list.php' ) ) :
		wp_register_script( 'youtube-embed',
				'//labnol.googlecode.com/files/youtube.js',
				array('jquery'),
				1.0,
				true );
		wp_enqueue_script( 'youtube-embed' );
	endif;

	// On the Contact page:
	// Use Contact Form 7
	if ( is_page_template( 'page-contact.php' ) ) :
		wpcf7_enqueue_scripts();
	endif;

}
endif;
add_action( 'wp_footer', 'gem_script_setup' );