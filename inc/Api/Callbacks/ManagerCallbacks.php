<?php

/**
 * @package AmanPlugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)
    {
        // return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        return (isset($input) ? true : false);
    }

    public function adminSectionManager()
    {
        echo 'Manage the Sections and Features of this Plugin by activating the checkbox from the following list.';
    }

    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        
        $checkbox = get_option($name);
        echo '<div class="' . $classes . '">
                <input type="checkbox" name="' . $name . '" value="1" class="' . $classes . '" ' . ($checkbox ? 'checked' : '') . '>
                <label for="' . $name . '"><div></div></label>
            </div>';

        // $option_name = $args['option_name'];
        // $checkbox = get_option($option_name);
        // $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;
        // echo '<div class="' . $classes . '">
        //         <input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" 
        //             value="1" class="" ' . ($checkbox ? 'checked' : '') . '>
        //         <label for="' . $name . '"><div></div></label>
        //     </div>';
    }
}
