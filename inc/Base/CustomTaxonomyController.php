<?php

/**
 * @package AmanPlugin
 */

namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

/**
 * 
 */
class CustomTaxonomyController extends BaseController
{
    public $callbacks;

    public $subpages = array();

    public function register()
    {
        $option = get_option('aman_plugin');
        $activated = isset($option['taxonomy_manager']) ? ($option['taxonomy_manager']) : false;

        if (!$activated) return;

        $this->settings = new SettingsApi();

        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();

        add_action('init', array($this, 'activate'));
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'aman_plugin',
                'page_title' =>  'Taxonomy',
                'menu_title' => 'Taxonomy Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'aman_cpt',
                'callback' => array($this->callbacks, 'adminCpt'),
            )
        );
    }
}
