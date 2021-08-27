<?php
add_action( 'admin_menu', 'bpui_add_admin_menu' );
add_action( 'admin_init', 'bpui_settings_init' );


function bpui_add_admin_menu(  ) {
	add_submenu_page( 'edit.php?post_type=bpui_block_pattern', 'Block Pattern UI Settings', 'Settings', 'manage_options', 'block_patterns_ui', 'bpui_options_page' );
}


function bpui_settings_init(  ) {

	register_setting( 'pluginPage', 'bpui_settings' );

	add_settings_section(
		'bpui_pluginPage_section',
		__( 'Settings', 'bpui' ),
		'bpui_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'bpui_unregister_core_patterns',
		__( 'Unregister Core Patterns', 'bpui' ),
		'bpui_unregister_core_patterns_render',
		'pluginPage',
		'bpui_pluginPage_section'
	);

	add_settings_field(
		'bpui_default_category',
		__( 'Default Category', 'bpui' ),
		'bpui_default_category_render',
		'pluginPage',
		'bpui_pluginPage_section'
	);


}


function bpui_unregister_core_patterns_render(  ) {

	$options = get_option( 'bpui_settings' );
	?>
	<input type='checkbox' name='bpui_settings[bpui_unregister_core_patterns]' <?php checked( $options['bpui_unregister_core_patterns'], 1 ); ?> value='1'>
	<p>Checking this setting will remove all core block patterns.<br><em>This setting will not remove patterns registered by themes or other plugins.</em></p>
	<?php

}


function bpui_default_category_render(  ) {

    $categories = bpui_get_pattern_categories();

	$options = get_option( 'bpui_settings' );
	?>
	<select name='bpui_settings[bpui_default_category]'>
        <?php foreach ( $categories as $category ): ?>
		<option value='<?php echo esc_attr( $category['name'] ) ?>' <?php selected( $options['bpui_default_category'], $category['name'] ); ?>><?php echo esc_html( $category['label'] ) ?></option>
        <?php endforeach; ?>
    </select>
	<p>Default category for new Block Patterns.</p>

<?php

}


function bpui_settings_section_callback(  ) {
	$logo = BlockPatternsUI::uri() . 'frontend/logo-h.png';
	printf( '<img src="%s" alt="Block Patterns UI logo" width="256" height="41" />', esc_url( $logo ) );
}


function bpui_options_page(  ) {

		?>
		<form action='options.php' method='post'>

			<h2><?php echo __( 'Block Patterns UI', 'bpui' ) ?></h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}
