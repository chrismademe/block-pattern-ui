<?php

add_filter( 'plugin_action_links_block-patterns-ui/block-patterns-ui.php', function( $links ) {

    // Validate $links type
    if ( !is_array($links) ) {
        $links = [];
    }

	// Create the links
	$settings_links[] = sprintf( '<a href="%s">%s</a>', esc_url( get_admin_url() . 'edit.php?post_type=bpui_block_pattern&page=block_patterns_ui' ), __( 'Settings', 'bpui' ) );

	return array_merge( $settings_links, $links );

} );