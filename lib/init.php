<?php

add_action( 'init', function() {
    $options = get_option( 'bpui_settings' );

    if ( array_key_exists( 'bpui_unregister_core_patterns', $options ) ) {
        remove_theme_support('core-block-patterns');
    }
} );