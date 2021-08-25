<?php

add_action( 'init', function() {

	$labels = array(
		'name'                  => _x( 'Block Patterns', 'Post Type General Name', 'bpui' ),
		'singular_name'         => _x( 'Block Pattern', 'Post Type Singular Name', 'bpui' ),
		'menu_name'             => __( 'Block Patterns', 'bpui' ),
		'name_admin_bar'        => __( 'Block Pattern', 'bpui' ),
		'archives'              => __( 'Item Archives', 'bpui' ),
		'attributes'            => __( 'Item Attributes', 'bpui' ),
		'parent_item_colon'     => __( 'Parent Item:', 'bpui' ),
		'all_items'             => __( 'All Items', 'bpui' ),
		'add_new_item'          => __( 'Add New Item', 'bpui' ),
		'add_new'               => __( 'Add New', 'bpui' ),
		'new_item'              => __( 'New Item', 'bpui' ),
		'edit_item'             => __( 'Edit Item', 'bpui' ),
		'update_item'           => __( 'Update Item', 'bpui' ),
		'view_item'             => __( 'View Item', 'bpui' ),
		'view_items'            => __( 'View Items', 'bpui' ),
		'search_items'          => __( 'Search Item', 'bpui' ),
		'not_found'             => __( 'Not found', 'bpui' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'bpui' ),
		'featured_image'        => __( 'Featured Image', 'bpui' ),
		'set_featured_image'    => __( 'Set featured image', 'bpui' ),
		'remove_featured_image' => __( 'Remove featured image', 'bpui' ),
		'use_featured_image'    => __( 'Use as featured image', 'bpui' ),
		'insert_into_item'      => __( 'Insert into item', 'bpui' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'bpui' ),
		'items_list'            => __( 'Items list', 'bpui' ),
		'items_list_navigation' => __( 'Items list navigation', 'bpui' ),
		'filter_items_list'     => __( 'Filter items list', 'bpui' ),
	);

	$args = array(
		'label'                 => __( 'Block Pattern', 'bpui' ),
		'description'           => __( 'Block Patterns and Templates', 'bpui' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 100,
		'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/></svg>'),
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'rewrite'               => false,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'bpui_block_pattern', $args );
}, 0 );