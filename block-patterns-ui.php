<?php

/**
 * Plugin Name: Block Patterns UI
 * Plugin URI: https://github.com/chrismademe/block-patterns-ui
 * Description: A simple UI for creating and managing Block Patterns
 * Author: Chris Galbraith
 * Author URI: https://chrisgalbraith.com
 * Version: 0.4.1
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bpui
 */

defined('ABSPATH') || exit;

if ( !class_exists('BlockPatternsUI') ) {

    class BlockPatternsUI {

        public function __construct() {
            $this->setup();
        }

        private function setup() {
            require_once plugin_dir_path( __FILE__ ) . 'lib/classes/Template.php';

            $includes = glob(__DIR__ . '/lib/*.php');
            if ( !empty($includes) ) {
                foreach ($includes as $file) {
                    require_once $file;
                }
            }
        }

        public static function dir() {
            return plugin_dir_path( __FILE__ );
        }

        public static function uri() {
            return plugin_dir_url( __FILE__ );
        }

    }

    new BlockPatternsUI;

}