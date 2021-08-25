<?php

/**
 * Get Registered Block Pattern Categories
 *
 * @return array
 */
function bpui_get_pattern_categories() {
    return WP_Block_Pattern_Categories_Registry::get_instance()->get_all_registered();
}