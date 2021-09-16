<?php

/**
 * @package AmanPlugin
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class SettingsLinks extends BaseController
{
    public function register()
    {
        // echo $this->plugin;
        add_filter("plugin_action_links_" . $this->plugin, array($this, 'settings_link'));
    }

    public static function settings_link($links)
    {
        // Add custom settings link
        $settings_link = '<a href="options-general.php?page=aman_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
