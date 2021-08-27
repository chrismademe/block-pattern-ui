<?php

/**
 * Setup Column Names
 */
add_filter( 'manage_bpui_block_pattern_posts_columns', function( $columns ) {
    $columns['cats'] = __( 'Categories', 'bpui' );
    $columns['keywords'] = __( 'Keywords', 'bpui' );
    $columns['author'] = __( 'Created by', 'bpui' );

    unset($columns['date']);

    return $columns;
} );

/**
 * Setup Column Data
 */
add_filter( 'manage_bpui_block_pattern_posts_custom_column', function( $column, $post_id ) {

    if ( $column === 'cats' ) {
        $categories = get_post_meta( $post_id, 'bpui_categories', true );

        if ( is_array( $categories ) ) {
            echo esc_html( join(', ', $categories) );
        } else {
            echo esc_html( $categories );
        }
    }

    if ( $column === 'keywords' ) {
        echo esc_html( get_post_meta( $post_id, 'bpui_keywords', true ) );
    }

}, 10, 2 );