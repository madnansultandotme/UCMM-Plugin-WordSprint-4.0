<?php

// Register the menu in the WordPress admin
add_action('admin_menu', 'ucmm_plugin_menu');
function ucmm_plugin_menu() {
    add_menu_page(
        'UCMM Settings',     // Page title
        'UCMM',              // Menu title
        'manage_options',     // Capability
        'ucmm-settings',      // Menu slug
        'ucmm_settings_page', // Function to display settings
        'dashicons-hammer',   // Icon
        90                    // Position
    );
}

// Display the settings page for UCMM
function ucmm_settings_page() {
    ?>
    <div class="wrap">
        <h1>UCMM Settings</h1>
        <form method="post" action="options.php">
            <?php
            // WordPress security and settings management
            settings_fields('ucmm-settings-group');  // Hidden fields for nonce, etc.
            do_settings_sections('ucmm-settings');   // Display settings sections
            submit_button();                         // Display the "Save Changes" button
            ?>
        </form>
    </div>
    <?php
}

// Register the settings, sections, and fields
add_action('admin_init', 'ucmm_register_settings');
function ucmm_register_settings() {
    // Register settings to store the selected pages, posts, and whitelist users
    register_setting('ucmm-settings-group', 'ucmm_maintenance_pages');
    register_setting('ucmm-settings-group', 'ucmm_maintenance_posts');
    register_setting('ucmm-settings-group', 'ucmm_enable_whitelist'); // To enable whitelisting
    register_setting('ucmm-settings-group', 'ucmm_whitelist_users');  // Store selected whitelist users

    // Add the settings section
    add_settings_section('ucmm_main_section', 'UCMM Maintenance Mode', null, 'ucmm-settings');
    
    // Add fields to select pages and posts for maintenance mode
    add_settings_field('ucmm_maintenance_pages', 'Select Pages for Maintenance Mode', 'ucmm_maintenance_pages_callback', 'ucmm-settings', 'ucmm_main_section');
    add_settings_field('ucmm_maintenance_posts', 'Select Posts for Maintenance Mode', 'ucmm_maintenance_posts_callback', 'ucmm-settings', 'ucmm_main_section');

    // Add checkbox to enable whitelisting
    add_settings_field('ucmm_enable_whitelist', 'Enable User Whitelisting', 'ucmm_enable_whitelist_callback', 'ucmm-settings', 'ucmm_main_section');

    // Add multi-select dropdown to select whitelist users (initially hidden)
    add_settings_field('ucmm_whitelist_users', 'Select Whitelist Users', 'ucmm_whitelist_users_callback', 'ucmm-settings', 'ucmm_main_section');
}


// Render the checkboxes for pages
function ucmm_maintenance_pages_callback() {
    $selected_pages = get_option('ucmm_maintenance_pages', []); // Ensure this is always an array
    if (!is_array($selected_pages)) {
        $selected_pages = []; // If not an array, initialize it as an empty array
    }
    $pages = get_pages(); // Fetch all pages

    echo '<div style="height: 150px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px;">';
    foreach ($pages as $page) {
        $checked = in_array($page->ID, $selected_pages) ? 'checked' : '';
        echo '<label><input type="checkbox" name="ucmm_maintenance_pages[]" value="' . $page->ID . '" ' . $checked . '> ' . esc_html($page->post_title) . '</label><br>';
    }
    echo '</div>';
}


// Render the checkboxes for posts
function ucmm_maintenance_posts_callback() {
    $selected_posts = get_option('ucmm_maintenance_posts', []); // Ensure this is always an array
    if (!is_array($selected_posts)) {
        $selected_posts = []; // If not an array, initialize it as an empty array
    }
    $posts = get_posts([
        'post_type'   => 'post',    // Ensure we're fetching posts
        'numberposts' => -1,        // Get all posts
        'post_status' => 'publish', // Only get published posts
    ]);

    if (empty($posts)) {
        echo 'No posts available.';
    } else {
        echo '<div style="height: 150px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px;">';
        foreach ($posts as $post) {
            $checked = in_array($post->ID, $selected_posts) ? 'checked' : '';
            echo '<label><input type="checkbox" name="ucmm_maintenance_posts[]" value="' . $post->ID . '" ' . $checked . '> ' . esc_html($post->post_title) . '</label><br>';
        }
        echo '</div>';
    }
}


// Render the checkbox for enabling whitelisting
function ucmm_enable_whitelist_callback() {
    $whitelist_enabled = get_option('ucmm_enable_whitelist', false); // Check if whitelist is enabled
    $checked = $whitelist_enabled ? 'checked' : ''; // Set checkbox state
    echo '<input type="checkbox" name="ucmm_enable_whitelist" value="1" ' . $checked . ' id="whitelist-users-checkbox"> Enable Whitelisting';
}



// Render the multi-select dropdown and checkboxes for whitelist users
function ucmm_whitelist_users_callback() {
    $whitelist_enabled = get_option('ucmm_enable_whitelist', false); // Check if whitelist is enabled
    $whitelist_users = get_option('ucmm_whitelist_users', []); // Get selected whitelist users
    if (!is_array($whitelist_users)) {
        $whitelist_users = []; // If not an array, initialize it as an empty array
    }

    // Fetch all registered users excluding administrators
    $users = get_users([
        'exclude' => [], // Exclude no users by default
    ]);
    foreach ($users as $key => $user) {
        if (in_array('administrator', $user->roles)) {
            unset($users[$key]); // Remove administrators from the list
        }
    }

    // Display the user selection section
    echo '<div id="whitelist-users-section" style="' . ($whitelist_enabled ? '' : 'display: none;') . '">';
    echo '<div><strong>Select Users to Whitelist:</strong></div>';
    
    // Render checkboxes for users
    if (!empty($users)) {
        echo '<div style="height: 150px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px;">';
        foreach ($users as $user) {
            $checked = in_array($user->ID, $whitelist_users) ? 'checked' : '';
            echo '<label><input type="checkbox" name="ucmm_whitelist_users[]" value="' . $user->ID . '" ' . $checked . '> ' . esc_html($user->user_login) . '</label><br>';
        }
        echo '</div>';
    } else {
        echo '<p>No users available for whitelisting.</p>';
    }
    echo '</div>';

    // Add a message if whitelisting is not enabled
    if (!$whitelist_enabled) {
        echo '<p>No users can be selected unless whitelisting is enabled.</p>';
    }
}




// Add some jQuery to show/hide the user list when the whitelist checkbox is toggled
add_action('admin_footer', 'ucmm_admin_script');
function ucmm_admin_script() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Show or hide the user list section based on the checkbox state
            $('#whitelist-users-checkbox').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#whitelist-users-section').show(); // Show the user list section
                } else {
                    $('#whitelist-users-section').hide(); // Hide the user list section
                }
            }).trigger('change'); // Trigger the change event on page load to set initial state
        });
    </script>
    <?php
}



