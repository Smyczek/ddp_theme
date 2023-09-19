<?php

/**
 * Theme Quote Form processing.
 */

namespace App;

function process_quote_form(){
    if ( ! isset( $_POST['quote_form_nonce'] ) 
        || ! wp_verify_nonce( $_POST['quote_form_nonce'], 'process_quote_form' ) 
    ) {
        echo esc_html__('Sorry, your nonce did not verify.', 'sage');
        exit;
    } else {

        // Initialize an error array
        $errors = array();

        // Validate Email
        if (empty($_POST['email'])) {
            $errors['email'] = esc_html__('Email required', 'sage');
        }
        
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email address';
        } else {
            $email = sanitize_email(trim($_POST['email']));
        }

        // Validate Text Fields (e.g., first name, last name, company, project name, content)
        if (empty($_POST['first_name'])) {
            $errors['first_name'] = esc_html__('First name is required', 'sage');
        } else {
            $first_name = sanitize_text_field(trim($_POST['first_name']));
        }

        if (empty($_POST['last_name'])) {
            $errors['last_name'] = esc_html__('Last name is required', 'sage');
        } else {
            $last_name = sanitize_text_field(trim($_POST['last_name']));
        }

        if (empty($_POST['company'])) {
            $errors['company'] = esc_html__('Company name is required', 'sage');
        } else {
            $company = sanitize_text_field(trim($_POST['company']));
        }

        if (!empty($_POST['telephone'])) {
            $telephone = sanitize_text_field(trim($_POST['telephone']));
        } else {
            $telephone = '';
        }

        if (empty($_POST['project_name'])) {
            $errors['project_name'] = esc_html__('Project name is required', 'sage');
        } else {
            $project_name = sanitize_text_field(trim($_POST['project_name']));
        }

        if (empty($_POST['quote_content'])) {
            $errors['content'] = esc_html__('Content is required', 'sage');
        } else {
            if(function_exists('stripslashes')) {
                $content = sanitize_textarea_field(stripslashes(trim($_POST['quote_content'])));
            } else {
                $content = sanitize_textarea_field(trim($_POST['content']));
            }
        }

        // Validate Select Field (type_of_photography)
        if (empty($_POST['type_of_photography'])) {
            $errors['type_of_photography'] = esc_html__('Type of photography is required', 'sage');
        } else {
            $type_of_photography = sanitize_text_field($_POST['type_of_photography']);
        }

        $project_timeline = sanitize_text_field(trim($_POST['project_timeline']));

        $current_url = $_SERVER['HTTP_REFERER'];

        if (empty($errors)) {
            // All fields are valid, proceed with processing the form data
            $new_quote = array(
                'post_title'   => 'Quote: ' . esc_html(current_datetime()->format('Y-m-d H:i:s')),
                'post_content' => $content,
                'post_type'    => 'clients_quotes', // Replace 'quote' with your custom post type name
                'post_status'  => 'publish', // You can set it to 'draft' if you want to save as a draft initially
            );

            // Insert the post and get the post ID
            $new_quote_id = wp_insert_post($new_quote);

            // Check if the post was inserted successfully
            if (!is_wp_error($new_quote_id)) {

                // Set custom fields
                update_post_meta($new_quote_id, 'quote_email', esc_html($email));
                update_post_meta($new_quote_id, 'quote_first_name', esc_html($first_name));
                update_post_meta($new_quote_id, 'quote_last_name', esc_html($last_name));
                update_post_meta($new_quote_id, 'quote_company', esc_html($company));
                update_post_meta($new_quote_id, 'quote_telephone', esc_html($telephone));
                update_post_meta($new_quote_id, 'quote_project_name', esc_html($project_name));
                update_post_meta($new_quote_id, 'quote_type_of_photography', esc_html($type_of_photography));
                update_post_meta($new_quote_id, 'quote_project_timeline', esc_html($project_timeline));
                update_post_meta($new_quote_id, 'quote_content', esc_html($content));

                // Send confirmation email to admin
                admin_qoute_email(
                    $email,
                    $first_name,
                    $last_name,
                    $company,
                    $telephone,
                    $project_name,
                    $type_of_photography,
                    $project_timeline,
                    $content
                );

                // Send email to user
                user_quote_email(
                    $email,
                    $first_name,
                    $project_name,
                    $type_of_photography
                );

                clear_previous_queryargs($current_url);
                $redirect_url = add_query_arg('quote_form_success', esc_html__('Thank you for your quote!'), $current_url);
                $redirect_url .= '#quote-form-section';
                wp_redirect($redirect_url);
                exit();
            } else {
                clear_previous_queryargs($current_url);
                $error_string = $new_quote_id->get_error_message();
                $redirect_url = add_query_arg('quote_form_errors', array('wp_error' => $error_string), $current_url);
                $redirect_url .= '#quote-form-section';
                wp_redirect($redirect_url);
                exit();
            }
        } else {
            clear_previous_queryargs($current_url);
            $redirect_url = add_query_arg('quote_form_errors', urlencode(json_encode($errors)), $current_url);
            $redirect_url .= '#quote-form-section';
            wp_redirect($redirect_url);
            exit();
        }
    }
}

function clear_previous_queryargs($current_url){
    $query_params_to_remove = array(
        'quote_form_errors',
        'quote_form_success',
    );
    // Remove the specified query parameters
    foreach ($query_params_to_remove as $param) {
        $current_url = remove_query_arg($param, $current_url);
    }
}

function admin_qoute_email(
    $email,
    $first_name,
    $last_name,
    $company,
    $telephone,
    $project_name,
    $type_of_photography,
    $project_timeline,
    $content
){
    $emailTo = get_option('ddp_quote_email_option');
    if (!isset($emailTo) || ($emailTo == '') ){
        return;
    }

    $type = get_the_title($type_of_photography);
    $subject = 'New Quote From: '. esc_html($first_name);
    $body = "New Quote Received \n\nFirst Name: " . esc_html($first_name) . " \n\nLast Name: " . esc_html($last_name) . " \n\nEmail: " . esc_html($email) . " \n\nCompany: " . esc_html($company) . " \n\nTelephone: " . esc_html($telephone) . " \n\nProject Name: " . esc_html($project_name) . " \n\nTyphe of photography: " . esc_html($type) . " \n\nTimeline: " . esc_html($project_timeline) . " \n\nProject description: " . esc_html($content);
    $headers = 'From: ' . esc_html($first_name) .' <' . esc_html($email) . '>' . "\r\n" . 'Reply-To: ' . esc_html($email);

    wp_mail($emailTo, $subject, $body, $headers);
    $emailSent = true;
}
    
function user_quote_email(
    $email,
    $first_name,
    $project_name,
    $type_of_photography,
){
    $emailTo = get_option('ddp_quote_email_option');
    if (!isset($emailTo) || ($emailTo == '') ){
        $emailTo = get_option('admin_email');
    }
    $emailContent =  get_option('ddp_quote_email_content_option', '');

    $pattern = '/\[ddp_quote_link text="([^"]+)"\]/';
    $pageUrl = get_permalink($type_of_photography);

    // Replace the matched shortcode with the anchor link
    $emailContent = preg_replace_callback($pattern, function ($matches) use ($pageUrl) {
        $text = $matches[1]; // Get the text attribute value
        return '<a class="button" href="' . esc_url($pageUrl) . '">' . esc_html($text) . '</a>';
    }, $emailContent);

    $emailContent = str_replace('[client-name]', $first_name, $emailContent);
    $emailContent = str_replace('[project-name]', $project_name, $emailContent);

    $subject = 'Quote From Confirmation';    
    $headers = 'From: '. esc_html($first_name) .' <'. esc_html($email).'>' . "\r\n" . 'Reply-To: ' . esc_html($emailTo);

    $content_type = function() { return 'text/html'; };
    add_filter( 'wp_mail_content_type', $content_type );
    wp_mail($emailTo, $subject, $emailContent, $headers);
    remove_filter( 'wp_mail_content_type', $content_type );
    $emailSent = true;
}
