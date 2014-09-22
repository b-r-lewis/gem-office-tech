<?php

/**
 * Register Job Postings post type
 *
 */
add_action( 'init', 'add_job_post_type' );
function add_job_post_type() {
	$labels = array(
		'name'                => __( 'Job' ),
		'singular_name'       => __( 'Job' ),
		'menu_name'           => __( 'Careers' ),
		'name_admin_bar'      => __( 'Careers' ),
		'all_items'           => __( 'All Job Postings' ),
		'add_new'             => __( 'Add New' ),
		'add_new_item'        => __( 'Add New Job Posting' ),
		'edit_item'           => __( 'Edit Job Posting' ),
		'new_item'            => __( 'New Job Posting' ),		
		'view_item'           => __( 'View Job Posting' ),
		'search_items'        => __( 'Search Job Postings' ),
		'not_found'           => __( 'No Job Postings found' ),
		'not_found_in_trash'  => __( 'No Job Postings found in Trash' ),
		'parent_item_colon'   => ''
	);

	$args = array(
		'label'         => __( 'job' ),
		'labels'        => $labels,
		'description'   => __( 'Jobs available at the company' ),
		'public'        => true,
		'menu_position' => 20,
		'menu_icon'     => 'dashicons-businessman',
		'supports'      => array( 'title', 'custom-fields' )
	);

	register_post_type( 'job', $args );
}

/**
 * Create custom columns for the admin page
 *
 */
add_filter( 'manage_job_posts_columns', 'set_job_columns' );
add_action( 'manage_job__posts_custom_column', 'custom_job_column' );
function set_job_columns( $columns ) {
	return array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Job Title' ),
		'category' => __( 'Category' ),
		'location' => __( 'Location' ),
		'date' => __( 'Date Created' )
	);
}

function custom_job_column( $column ) {
	global $post;
	switch ( $column ) {
		case 'category' :
			echo get_the_field( 'category' );
			break;

	}
}