<?php

add_action( 'init', function() {

	/**
	 * Register Block Patterns Post Type
	 *
	 * @note Most of these settings can be filtered using the bpui/block_patterns/{setting}
	 * filters, see below for which ones can be filtered.
	 */
	register_post_type( 'bpui_block_pattern', [
		'label'                 => __( 'Block Pattern', 'bpui' ),
		'description'           => __( 'Block Patterns and Templates', 'bpui' ),
		'labels'                => [
			'name'                  => _x( 'Block Patterns', 'Post Type General Name', 'bpui' ),
			'singular_name'         => _x( 'Block Pattern', 'Post Type Singular Name', 'bpui' ),
			'menu_name'             => __( 'Block Patterns', 'bpui' ),
			'name_admin_bar'        => __( 'Block Pattern', 'bpui' ),
			'archives'              => __( 'Pattern Archives', 'bpui' ),
			'attributes'            => __( 'Pattern Attributes', 'bpui' ),
			'parent_item_colon'     => __( 'Parent Pattern:', 'bpui' ),
			'all_items'             => __( 'All Patterns', 'bpui' ),
			'add_new_item'          => __( 'Add New Pattern', 'bpui' ),
			'add_new'               => __( 'Add New', 'bpui' ),
			'new_item'              => __( 'New Pattern', 'bpui' ),
			'edit_item'             => __( 'Edit Pattern', 'bpui' ),
			'update_item'           => __( 'Update Pattern', 'bpui' ),
			'view_item'             => __( 'View Pattern', 'bpui' ),
			'view_items'            => __( 'View Patterns', 'bpui' ),
			'search_items'          => __( 'Search Pattern', 'bpui' ),
			'not_found'             => __( 'Not found', 'bpui' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bpui' ),
			'featured_image'        => __( 'Featured Image', 'bpui' ),
			'set_featured_image'    => __( 'Set featured image', 'bpui' ),
			'remove_featured_image' => __( 'Remove featured image', 'bpui' ),
			'use_featured_image'    => __( 'Use as featured image', 'bpui' ),
			'insert_into_item'      => __( 'Insert into item', 'bpui' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bpui' ),
			'items_list'            => __( 'Patterns list', 'bpui' ),
			'items_list_navigation' => __( 'Patterns list navigation', 'bpui' ),
			'filter_items_list'     => __( 'Filter items list', 'bpui' ),
		],
		'supports'              => [ 'title', 'editor', 'revisions' ],
		'hierarchical'          => apply_filters( 'bpui/block_patterns/hierarchical', false ),
		'public'                => apply_filters( 'bpui/block_patterns/public', true ),
		'show_ui'               => apply_filters( 'bpui/block_patterns/show_ui', true ),
		'show_in_menu'          => apply_filters( 'bpui/block_patterns/show_in_menu', true ),
		'menu_position'         => apply_filters( 'bpui/block_patterns/menu_position', 100 ),
		'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/></svg>'),
		'show_in_admin_bar'     => apply_filters( 'bpui/block_patterns/show_in_admin_bar', true ),
		'show_in_nav_menus'     => apply_filters( 'bpui/block_patterns/show_in_nav_menus', false ),
		'can_export'            => apply_filters( 'bpui/block_patterns/can_export', true ),
		'has_archive'           => apply_filters( 'bpui/block_patterns/has_archive', false ),
		'exclude_from_search'   => apply_filters( 'bpui/block_patterns/exclude_from_search', true ),
		'publicly_queryable'    => apply_filters( 'bpui/block_patterns/publicly_queryable', false ),
		'rewrite'               => apply_filters( 'bpui/block_patterns/rewrite', false ),
		'capability_type'       => apply_filters( 'bpui/block_patterns/capability_type', 'page' ),
		'show_in_rest'          => apply_filters( 'bpui/block_patterns/show_in_rest', true ),
	] );

}, 0 );