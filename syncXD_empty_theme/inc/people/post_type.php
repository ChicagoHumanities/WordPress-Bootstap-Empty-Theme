<?php

// Register Custom Post Type: People
function people_post_type() {

	$labels = array(
		'name'                => _x( 'People Profiles', 'Post Type General Name', 'chf' ),
		'singular_name'       => _x( 'Profile', 'Post Type Singular Name', 'chf' ),
		'menu_name'           => __( 'People Profiles', 'chf' ),
		'parent_item_colon'   => __( 'Profiles:', 'chf' ),
		'all_items'           => __( 'All Profiles', 'chf' ),
		'view_item'           => __( 'View Profile', 'chf' ),
		'add_new_item'        => __( 'Add New Profile', 'chf' ),
		'add_new'             => __( 'Add New', 'chf' ),
		'edit_item'           => __( 'Edit Profile', 'chf' ),
		'update_item'         => __( 'Update Profile', 'chf' ),
		'search_items'        => __( 'Search Profiles', 'chf' ),
		'not_found'           => __( 'Not found', 'chf' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'chf' ),
	);
	$args = array(
		'label'               => __( 'people', 'chf' ),
		'description'         => __( 'People profiles', 'chf' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'post-formats', ),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'people', $args );

	// create groups taxonomy-------------------------------------------------
	$labels = array(
		'name'              => _x( 'Groups', 'taxonomy general name' ),
		'singular_name'     => _x( 'Group', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Groups' ),
		'all_items'         => __( 'All Groups' ),
		'parent_item'       => __( 'Parent Group' ),
		'parent_item_colon' => __( 'Parent Group:' ),
		'edit_item'         => __( 'Edit Group' ),
		'update_item'       => __( 'Update Group' ),
		'add_new_item'      => __( 'Add New Group' ),
		'new_item_name'     => __( 'New Group Name' ),
		'menu_name'         => __( 'Groups' ),
	);

	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true, 
		'rewrite'           => array( 'slug' => 'group' ),
	);

	register_taxonomy( 'group', array( 'people' ), $args );
	
	// create specialization taxonomy-------------------------------------------------
	$labels = array(
		'name'              => _x( 'Specializations', 'taxonomy general name' ),
		'singular_name'     => _x( 'Specialization', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Specializations' ),
		'all_items'         => __( 'All Specializations' ),
		'parent_item'       => __( 'Parent Specialization' ),
		'parent_item_colon' => __( 'Parent Specialization:' ),
		'edit_item'         => __( 'Edit Specialization' ),
		'update_item'       => __( 'Update Specialization' ),
		'add_new_item'      => __( 'Add New Specialization' ),
		'new_item_name'     => __( 'New Specialization Name' ),
		'menu_name'         => __( 'Specializations' ),
	);
	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true, 
		'rewrite'           => array( 'slug' => 'specialization' ),
	);

	register_taxonomy( 'specialization', array( 'people' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'people_post_type', 0 );
?>