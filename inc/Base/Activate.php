<?php

/**
 * @package AmanPlugin
 */

namespace Inc\Base;

class Activate
{
    public static function activate()
    {
        // Flush rewrite rules
        flush_rewrite_rules();

        if (get_option('aman_plugin')) {
            return;
        }

        $default = array();

        update_option('aman_plugin', $default);
    }
}
