<?php

// Register Custom Post Type: Repository
function repository_post_type() {

	$labels = array(
		'name'                => _x( 'sync:XD Demos', 'Post Type General Name', 'syncxd' ),
		'singular_name'       => _x( 'sync:XD Demos', 'Post Type Singular Name', 'syncxd' ),
		'menu_name'           => __( 'sync:XD Demos', 'syncxd' ),
		'parent_item_colon'   => __( 'Parent Item:', 'syncxd' ),
		'all_items'           => __( 'All Deposits', 'syncxd' ),
		'view_item'           => __( 'View Item', 'syncxd' ),
		'add_new_item'        => __( 'Add New Item', 'syncxd' ),
		'add_new'             => __( 'Add New', 'syncxd' ),
		'edit_item'           => __( 'Edit Item', 'syncxd' ),
		'update_item'         => __( 'Update Item', 'syncxd' ),
		'search_items'        => __( 'Search Item', 'syncxd' ),
		'not_found'           => __( 'Not found', 'syncxd' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'syncxd' ),
	);
	$args = array(
		'label'               => __( 'repository', 'syncxd' ),
		'description'         => __( 'sync:XD Demoss', 'syncxd' ),
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
	register_post_type( 'repository', $args );

	// create feature taxonomy-------------------------------------------------
	$labels = array(
		'name'              => _x( 'Features', 'taxonomy general name' ),
		'singular_name'     => _x( 'Feature', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Features' ),
		'all_items'         => __( 'All Features' ),
		'parent_item'       => __( 'Parent Feature' ),
		'parent_item_colon' => __( 'Parent Feature:' ),
		'edit_item'         => __( 'Edit Feature' ),
		'update_item'       => __( 'Update Feature' ),
		'add_new_item'      => __( 'Add New Feature' ),
		'new_item_name'     => __( 'New Feature Name' ),
		'menu_name'         => __( 'Features' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true, 
		'rewrite'           => array( 'slug' => 'feature' ),
	);

	register_taxonomy( 'feature', array( 'repository' ), $args );
	
	
	
	
}

// Hook into the 'init' action
add_action( 'init', 'repository_post_type', 0 );

?>