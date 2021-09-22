<?php

/**
 * @package AmanPlugin
 */

namespace Inc\Base;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\SettingsApi;

/**
 * 
 */
class AuthController
{
    public $callbacks;

    public $subpages = array();

    public function register()
    {
        if (!$this->activated('login_manager')) return;

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'aman_plugin',
                'page_title' => 'Login Manager',
                'menu_title' => 'Login Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'aman_auth',
                'callback' => array($this->callbacks, 'adminAuth'),
            )
        );
    }
}
