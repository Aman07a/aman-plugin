<?php

/**
 * @package AmanPlugin
 */

namespace Inc\Base;

use Inc\Base\BaseController;

/**
 * 
 */
class Enqueue extends BaseController
{
    public function register()
    {
        $this->plugin;
        
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        // Enqueue all our scripts
        wp_enqueue_style('mypluginstyle', $this->plugin_url . '/assets/mystyle.css');
        wp_enqueue_script('mypluginscript', $this->plugin_url . '/assets/myscript.js');
    }
}
