<?php

namespace BlockPatternsUI;

use BlockPatternsUI;

class Template {

    private $dir;
    private $ext;

    public function __construct() {
        $this->dir = BlockPatternsUI::dir() . 'templates';
        $this->ext = '.php';
    }

    public function render( $template, $context = [] ) {
        extract($context);
        ob_start();
        include $this->dir . '/' . $template . $this->ext;
        return ob_get_clean();
    }

    public function partial( $template, $context = [] ) {
        if ( is_readable( $this->dir . '/partials/' . $template . $this->ext ) ) {
            echo $this->render( '/partials/' . $template, $context );
        }
    }

}