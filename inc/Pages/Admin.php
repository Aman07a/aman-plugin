<?php

/**
 * @package AmanPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

/**
 * Admin
 */

class Admin extends BaseController
{
    public $settings;

    public function __construct()
    {
        $this->settings = new SettingsApi();
    }
    public function register()
    {
        // add_action('admin_menu', array($this, 'add_admin_pages'));
        $pages = [
            [
                'page_title' => 'Aman Plugin',
                'menu_title' => 'Aman',
                'capability' => 'manage_options',
                'menu_slug' => 'aman_plugin',
                'callback' => function () {
                    echo '<h1>Aman Plugin</h1>';
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ]
        ];

        $this->settings->AddPages($pages)->register();
    }

    public function add_admin_pages()
    {
        add_menu_page('Aman Plugin', 'Aman', 'manage_options', 'aman_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
    }

    public function admin_index()
    {
        // Require Templates
        require_once $this->plugin_path . 'templates/admin.php';
    }
}
