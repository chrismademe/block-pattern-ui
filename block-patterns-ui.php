<?php

/**
 * Plugin Name: Block Patterns UI
 * Plugin URI: https://github.com/chrismademe/block-patterns-ui
 * Description: A simple UI for creating and managing Block Patterns
 * Author: Chris Galbraith
 * Author URI: https://chrisgalbraith.com
 * Version: 0.1.0
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bpui
 */

$_bpui_includes = glob(__DIR__ . '/lib/*.php');
if ( !empty($_bpui_includes) ) {
    foreach ($_bpui_includes as $file) {
        require_once $file;
    }
}