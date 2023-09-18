<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * Make Custom Fields read only for Quote Custom Post Type 
 * 
 * @return $field
 */
if (class_exists('ACF')) {
    $fileds_names = array('quote_content', 'quote_email', 'quote_first_name', 'quote_last_name', 'quote_company', 'quote_project_name', 'quote_type_of_photography', 'quote_project_timeline', 'quote_telephone');
    foreach($fileds_names as $field_name) {
        add_filter('acf/prepare_field/name='. $field_name, function ($field) {
            $field['readonly'] = true;
            return $field;
        });
    }
}


add_action('wp_ajax_get_image_data', __NAMESPACE__ . '\\get_image_data');
add_action('wp_ajax_nopriv_get_image_data', __NAMESPACE__ . '\\get_image_data');


add_action('admin_post_nopriv_quote_form', __NAMESPACE__ . '\\process_quote_form');
add_action('admin_post_quote_form',  __NAMESPACE__ . '\\process_quote_form');
