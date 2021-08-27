<?php

add_action( 'admin_enqueue_scripts', function() {
    // Screens we want to enqueue our assets to
    $screens = [
        'bpui_block_pattern_page_block_patterns_ui'
    ];

    if ( in_array( get_current_screen()->id, $screens ) ) {
        wp_enqueue_style( 'bpui-admin', BlockPatternsUI::uri() . 'frontend/dist/admin.min.css' );
    }
} );