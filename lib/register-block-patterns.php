<?php

add_action( 'init', function() {

    // Get Block Patterns
    $patterns = get_posts([
        'post_type' => 'bpui_block_pattern',
        'posts_per_page' => -1
    ]);

    if ( $patterns ) {

        // Register patterns
        foreach ( $patterns as $pattern ) {

            // Get Pattern Meta Data
            $categories = get_post_meta( $pattern->ID, 'bpui_categories', true );
            $keywords = get_post_meta( $pattern->ID, 'bpui_keywords', true );
            $viewport_width = get_post_meta( $pattern->ID, 'bpui_viewport_width', true );

            register_block_pattern( 'bpui/' . $pattern->post_name, [
                'title' => $pattern->post_title,
                'content' => $pattern->post_content,
                'categories' => $categories ? force_array($categories) : null,
                'keywords' => $keywords ?? null,
                'viewportWidth' => $viewport_width ?? null
            ] );
        }
    }

} );