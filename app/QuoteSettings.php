<?php

namespace App;

class QuoteSettings 
{

    /**
     * Constructor for the class.
     *
     * This function initializes the class and sets up the necessary hooks.
     * It adds an action to the 'admin_menu' hook to add the quote settings page,
     * an action to the 'admin_init' hook to initialize the quote settings,
     * and a shortcode to add a button with a link to a specific page in email content.
     *
     * @return void
     */
    public function __construct() 
    {
        add_action('init', [$this, 'quote_custom_post_type'], 0);
        add_action('admin_menu', [$this, 'ddp_add_quote_settings_page']);
        add_action('admin_init', [$this, 'ddp_quote_settings_init']);
        add_shortcode('ddp_quote_link', [$this, 'ddp_quote_link_shortcode']);
    }

    // Register Custom Post Type
    public function quote_custom_post_type() {

        $labels = array(
            'name'                  => _x( 'Quotes', 'Quotes Type Name', 'sage' ),
            'singular_name'         => _x( 'Quote', 'Quote Type Singular Name', 'sage' ),
            'menu_name'             => __( 'Clients Quotes', 'sage' ),
            'name_admin_bar'        => __( 'Quote Type', 'sage' ),
            'archives'              => __( 'Item Archives', 'sage' ),
            'attributes'            => __( 'Item Attributes', 'sage' ),
            'parent_item_colon'     => __( 'Parent Item:', 'sage' ),
            'all_items'             => __( 'All Items', 'sage' ),
            'add_new_item'          => __( 'Add New Item', 'sage' ),
            'add_new'               => __( 'Add New', 'sage' ),
            'new_item'              => __( 'New Item', 'sage' ),
            'edit_item'             => __( 'Edit Item', 'sage' ),
            'update_item'           => __( 'Update Item', 'sage' ),
            'view_item'             => __( 'View Item', 'sage' ),
            'view_items'            => __( 'View Items', 'sage' ),
            'search_items'          => __( 'Search Item', 'sage' ),
            'not_found'             => __( 'Not found', 'sage' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
            'featured_image'        => __( 'Featured Image', 'sage' ),
            'set_featured_image'    => __( 'Set featured image', 'sage' ),
            'remove_featured_image' => __( 'Remove featured image', 'sage' ),
            'use_featured_image'    => __( 'Use as featured image', 'sage' ),
            'insert_into_item'      => __( 'Insert into item', 'sage' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'sage' ),
            'items_list'            => __( 'Items list', 'sage' ),
            'items_list_navigation' => __( 'Items list navigation', 'sage' ),
            'filter_items_list'     => __( 'Filter items list', 'sage' ),
        );
        $args = array(
            'label'                 => __( 'Quote', 'sage' ),
            'description'           => __( 'Client Quotes', 'sage' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'custom-fields' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 25,
            'menu_icon'             => 'dashicons-email-alt',
            'show_in_admin_bar'     => false,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'capability_type'       => 'page',
        );
        register_post_type( 'clients_quotes', $args );
    }

    /**
     * Adds a settings page for the "Quote" custom post type.
     *
     */
    public function ddp_add_quote_settings_page() {
        add_submenu_page(
            'edit.php?post_type=clients_quotes', // Parent menu (Quotes custom post type)
            'Quote Settings',
            'Settings',
            'manage_options',
            'quote-settings',
            [$this, 'ddp_quote_options_page_callback']
        );
    }

    // Callback function to render the options page
    public function ddp_quote_options_page_callback() {
        echo '<div class="wrap">';
        echo '<form method="post" action="options.php">';
        settings_fields('client_quotes'); 
        do_settings_sections('client_quotes'); 
        submit_button();
        echo '</form>';
        echo '</div>';
    }

    public function ddp_quote_settings_init() {
        add_settings_section(
            'ddp_quote_options_section',
            'Quote Settings',
            [$this, 'ddp_quote_options_section_callback'],
            'client_quotes'
        );

        add_settings_field(
            'ddp_quote_email_option',
            'Email to send Quotes',
            [$this, 'ddp_quote_email_option_callback'],
            'client_quotes',
            'ddp_quote_options_section'
        );

        add_settings_field(
            'ddp_quote_email_content_option',
            'Email Content',
            [$this, 'ddp_quote_email_content_option_callback'],
            'client_quotes',
            'ddp_quote_options_section'
        );

        add_settings_field(
            'ddp_quote_select_type_option',
            'Quote Form Type of Photography',
            [$this, 'ddp_quote_select_type_option_callback'],
            'client_quotes',
            'ddp_quote_options_section'
        );

        register_setting('client_quotes', 'ddp_quote_email_option');
        register_setting('client_quotes', 'ddp_quote_email_content_option');
        register_setting('client_quotes', 'ddp_quote_select_type_option');
    }

    // Callback function to render the section
    public function ddp_quote_options_section_callback() {
        echo '<p>Customize Quote Form settings below:</p>';
    }

    // Callback function to render the email field
    public function ddp_quote_email_option_callback() {
        $value = get_option('ddp_quote_email_option', ''); // Retrieve the option value
        ?>
        <input type="email" name="ddp_quote_email_option" class="regular-text" value="<?php echo esc_attr($value); ?>" />
        <p class="description">Enter email address to send notification about New Quote to you. <br>Leave this field empty if you don't want to receive email notifications about New Qoute and olny store them in the database.</p>
        <?php
    }

    // Callback function to render the textarea
    public function ddp_quote_email_content_option_callback() {
        $value = get_option('ddp_quote_email_content_option', ''); // Retrieve the option value
        ?>
        <fieldset>
            <p>
                <label for="ddp_quote_email_content_option">
                    Below you can customize email content HTML which will be send to the client after submitting Quote Form.
                    <br>
                    Use special tag: <code>[ddp_quote_link text="Button Text"]</code> to add button with link to dedicated page with selected Photography Type by the client.
                    <br>Other available tags: <code>[client-name]</code>, <code>[project-name]</code>
                </label>
            </p>
            <p>
                <textarea name='ddp_quote_email_content_option' rows='10' cols='50' id='ddp_quote_email_content_option' class='large-text code'><?= esc_textarea($value) ?></textarea>
            </p>
        </fieldset>
        <?php
    }

    // Callback function to render the select dropdown
    public function ddp_quote_select_type_option_callback() {
        $values = get_option('ddp_quote_select_type_option', array()); // Retrieve the option value as an array
        $pages = get_pages(); // Retrieve a list of all pages
    
        $select = '<select name="ddp_quote_select_type_option[]" multiple="multiple">'; 
    
        foreach ($pages as $page) {
            // Check if $values is an array
            if (is_array($values)) {
                $selected = in_array($page->ID, $values) ? 'selected="selected"' : '';
            } else {
                // Handle the case where $values is not an array (possibly a single value)
                $selected = ($page->ID == $values) ? 'selected="selected"' : '';
            }
            $select .= "<option value='$page->ID' $selected>$page->post_title</option>";
        }
    
        $select .= '</select>';
        $description = '<p class="description">Select the pages you want to include in Quote form dropdown for Photography types.<br>Use [<kbd>Ctr</kbd> + <kbd>Click</kbd>] on PC or [<kbd>Cmd</kbd> + <kbd>Click</kbd>] on Mac, to select multiple pages</p>'; 
        echo $select;
        echo $description;
    }    

    public function ddp_quote_link_shortcode($atts, $content = null) {
        global $type_photography;
        return $type_photography;

        // Parse shortcode attributes
        $atts = shortcode_atts(array(
            'button_text' => '',  // Default button text
        ), $atts, 'ddp_quote_link');
    
        // Check if 'type_of_photography' is set
        if (!empty($type_photography)) {
            // Get the selected page ID based on the 'type_of_photography' value
            $selected_page_id = $type_photography;

            // Get the page URL based on the selected page ID
            $page_url = get_permalink($selected_page_id);

            // Generate the button HTML with the dynamic link
            $button_html = '<a href="' . esc_url($page_url) . '" class="button">' . esc_html($atts['button_text']) . '</a>';

            return $button_html;
        }
    
        return $atts['button_text']; // Return an empty string if 'type_of_photography' is not set or empty
    }

}

new QuoteSettings();