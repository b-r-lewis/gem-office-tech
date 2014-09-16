<?php

/**
 * Register Milestone post type
 *
 */
add_action( 'init', 'add_milestone_post_type' );
function add_milestone_post_type() {
	$labels = array(
		'name'                => __( 'Milestones' ),
		'singular_name'       => __( 'Milestone' ),
		'menu_name'           => __( 'Timeline' ),
		'name_admin_bar'      => __( 'Timeline' ),
		'all_items'           => __( 'All Milestones' ),
		'add_new'             => __( 'Add New' ),
		'add_new_item'        => __( 'Add New Milestone' ),
		'edit_item'           => __( 'Edit Milestone' ),
		'new_item'            => __( 'New Milestone' ),		
		'view_item'           => __( 'View Milestone' ),
		'search_items'        => __( 'Search Milestones' ),
		'not_found'           => __( 'No Milestones found' ),
		'not_found_in_trash'  => __( 'No Milestones found in Trash' ),
		'parent_item_colon'   => ''
	);

	$args = array(
		'label'         => __( 'milestones' ),
		'labels'        => $labels,
		'description'   => __( 'Milestones in the company\'s history' ),
		'public'        => true,
		'menu_position' => 20,
		'menu_icon'     => 'dashicons-admin-site',
		'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' )
	);

	register_post_type( 'milestone', $args );
}

/**
 * Create custom columns for the admin page
 *
 */
add_filter( 'manage_milestone_posts_columns', 'set_milestone_columns' );
add_action( 'manage_milestone_posts_custom_column', 'custom_milestone_column' );
function set_milestone_columns( $columns ) {
	return array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Year' ),
		'milestone' => __( 'Milestone' ),
		'date' => __('Date Created')
	);
}

function custom_milestone_column( $column ) {
	global $post;
	switch ( $column ) {
		case 'milestone' :
			echo $post->post_content;
			break;

	}
}