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

            // Get Custom Field Data
            $pattern->meta = get_post_meta($pattern->ID);

            register_block_pattern( 'bpui/' . $pattern->post_name, [
                'title' => $pattern->post_title,
                'content' => $pattern->post_content,
                'categories' => $pattern->meta['bpui_categories'][0] ? explode(',', $pattern->meta['bpui_categories'][0]) : null,
                'keywords' => $pattern->meta['bpui_keywords'][0] ?? null,
                'viewportWidth' => $pattern->meta['bpui_viewport_width'][0] ?? null
            ] );
        }
    }

} );