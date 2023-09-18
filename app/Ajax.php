<?php

namespace App;

/**
 * Retrieves image data for the given image IDs.
 *
 * @throws Exception if the AJAX request is not valid.
 * @return void
 */
function get_image_data() {
    if (defined('DOING_AJAX') && DOING_AJAX) {

        if ( ! wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ) {
            wp_die( 'Busted!');
        } else {
            
            $image_ids = $_POST['imageIds'];
            $image_ids = explode(',',$image_ids);

            $image_data = array();
        
            foreach ($image_ids as $image_id) {
                $image = wp_get_attachment_image_src($image_id, 'full');
                if ($image) {
                    $image_data[] = array(
                        'src' => $image[0],
                        'width' => $image[1],
                        'height' => $image[2],
                        'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true),
                    );
                }
            }
        
            // Send the image data as a JSON response
            wp_send_json($image_data);
            exit;
        }
    }
}
