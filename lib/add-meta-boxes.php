<?php

add_action( 'add_meta_boxes', function() {

    add_meta_box(
        'bpui_pattern_settings',
        'Pattern Settings',
        'bpui_pattern_settings_render',
        'bpui_block_pattern',
        'side',
        'high'
    );

} );

function bpui_pattern_settings_render() {
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'bpui_pattern_settings_fields' );

    $fields = [
        'categories' => [
            'label' => __( 'Categories', 'bpui' ),
            'type' => 'select',
            'required' => true,
            'value' => get_post_meta( $post->ID, 'bpui_categories', true )
                ? get_post_meta( $post->ID, 'bpui_categories', true )
                : bpui_get_default_category(),
            'options' => bpui_get_pattern_categories()
        ],
        'keywords' => [
            'label' => __( 'Keywords', 'bpui' ),
            'type' => 'text',
            'required' => false,
            'value' => get_post_meta( $post->ID, 'bpui_keywords', true )
        ],
        'viewport_width' => [
            'label' => __( 'Viewport Width', 'bpui' ),
            'type' => 'number',
            'required' => false,
            'value' => get_post_meta( $post->ID, 'bpui_viewport_width', true )
        ]
    ];

    // Output Inputs
    foreach ( $fields as $key => $field ) {

        if ( $field['type'] === 'select' ) {

            $render_options = array_map( function( $option ) use ($field) {
                return sprintf(
                    '<option %s value="%s">%s</option>',
                    $field['value'] === $option['name'] ? 'selected' : '',
                    esc_attr( $option['name'] ),
                    esc_html ($option['label'] )
                );
            }, $field['options'] );

            printf(
                '<div class="components-base-control__field">
                    <label class="components-base-control__label" for="bpui_%1$s">%2$s</label>
                    <select class="components-text-control__input" type="%3$s" id="bpui_%1$s" name="bpui_%1$s" value="%4$s">
                        %5$s
                    </select>
                </div>',
                esc_attr( $key ),
                esc_html( $field['label'] ),
                esc_attr( $field['type'] ),
                esc_html( $field['value'] ),
                join(PHP_EOL, $render_options)
            );

        } else {

            printf(
                '<div class="components-base-control__field">
                    <label class="components-base-control__label" for="bpui_%1$s">%2$s</label>
                    <input class="components-text-control__input" type="%3$s" id="bpui_%1$s" name="bpui_%1$s" value="%4$s">
                </div>',
                esc_attr( $key ),
                esc_html( $field['label'] ),
                esc_attr( $field['type'] ),
                esc_html( $field['value'] )
            );

        }
    }
}

add_action( 'save_post', function( $post_id, $post ) {

    if ( $post->post_type !== 'bpui_block_pattern' ) {
        return $post_id;
    }

    // Return if the user doesn't have edit permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.
    if ( ! wp_verify_nonce( $_POST['bpui_pattern_settings_fields'], basename(__FILE__) ) ) {
        return $post_id;
    }

    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $meta.
    $meta['bpui_categories'] = sanitize_text_field( $_POST['bpui_categories'] );
    $meta['bpui_keywords'] = sanitize_text_field( $_POST['bpui_keywords'] );
    $meta['bpui_viewport_width'] = sanitize_text_field( $_POST['bpui_viewport_width'] );

    // Cycle through the $meta array.
    foreach ( $meta as $key => $value ) {

        // Don't store custom data twice
        if ( 'revision' === $post->post_type ) {
            return;
        }

        if ( get_post_meta( $post_id, $key, false ) ) {
            // If the custom field already has a value, update it.
            update_post_meta( $post_id, $key, $value );
        } else {
            // If the custom field doesn't have a value, add it.
            add_post_meta( $post_id, $key, $value );
        }

        if ( ! $value ) {
            // Delete the meta key if there's no value
            delete_post_meta( $post_id, $key );
        }

    }

}, 1, 2 );