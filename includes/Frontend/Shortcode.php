<?php

namespace Wedevs\Academy\Frontend;

/**
 * Shortcode handller class
 */

class Shortcode {


    /**
     * Initialize the class
     */

    function __construct()
    {
        add_shortcode('wedevs-academy', [$this, 'render_shortcode']);
    }

    /**
     * Shortcode handler 
     *
     * @param [type] $atts
     * @param string $contents
     * 
     * @return void
     */
    public function render_shortcode($atts, $contents = '') {
        return 'Hello From Shortcode Salafee';
    }
}