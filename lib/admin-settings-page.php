<?php

use BlockPatternsUI\Template;

add_action( 'admin_menu', function() {
	add_submenu_page( 'edit.php?post_type=bpui_block_pattern', 'Block Pattern UI Settings', 'Settings', 'manage_options', 'block_patterns_ui', 'bpui_options_page' );
} );

add_action( 'admin_init', function() {
	register_setting( 'pluginPage', 'bpui_settings' );
} );

function bpui_options_page() {
	$template = new Template;
	echo $template->render( 'settings', [] );
}