<?php

add_action( 'admin_enqueue_scripts', function() {
    $screen = get_current_screen();

    // Screens we want to enqueue our assets to
    $screens = [
        'bpui_block_pattern_page_block_patterns_ui',
        'bpui_block_pattern'
    ];

    if ( in_array( $screen->id, $screens ) ) {
        wp_enqueue_style( 'bpui-admin', BlockPatternsUI::uri() . 'frontend/dist/admin.min.css' );

        wp_enqueue_script( 'select2', BlockPatternsUI::uri() . 'frontend/dist/vendor.select2.min.js', ['jquery'] );
        wp_enqueue_script( 'bpui-edit-screen', BlockPatternsUI::uri() . 'frontend/dist/edit-screen.min.js', ['jquery', 'select2'] );

        wp_enqueue_style( 'bpui-admin', BlockPatternsUI::uri() . 'frontend/dist/edit-screen.min.css' );
    }
} );