<?php

/**
 * Get Registered Block Pattern Categories
 *
 * @return array
 */
function bpui_get_pattern_categories() {
    return WP_Block_Pattern_Categories_Registry::get_instance()->get_all_registered();
}

/**
 * Get Default Category
 *
 * @return string
 */
function bpui_get_default_category() {
    $options = get_option( 'bpui_settings' );

    if ( ! is_array($options) ) return [];

    if ( array_key_exists('bpui_default_category', $options) ) {
        return $options['bpui_default_category'];
    }

    return [];
}

/**
 * Force Array
 *
 * Will place a string inside an array
 *
 * @param string|array $input
 * @return array
 */
function force_array( $input ) {
    return is_array( $input ) ? $input : [$input];
}