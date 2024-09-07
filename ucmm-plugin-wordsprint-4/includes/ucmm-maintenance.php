<?php

// Apply maintenance mode to selected pages and posts, and allow whitelisted users
add_action('template_redirect', 'ucmm_apply_maintenance_mode');
function ucmm_apply_maintenance_mode() {
    global $post;

    // Get the selected pages and posts from the settings
    $pages_in_maintenance = get_option('ucmm_maintenance_pages', []); // Default to empty array if not set
    $posts_in_maintenance = get_option('ucmm_maintenance_posts', []); // Default to empty array if not set
    $whitelist_enabled = get_option('ucmm_enable_whitelist', false);
    $whitelisted_users = get_option('ucmm_whitelist_users', []);

    // Ensure pages and posts are arrays (to prevent errors when checking with in_array())
    if (!is_array($pages_in_maintenance)) {
        $pages_in_maintenance = []; // Default to an empty array if the value is not an array
    }

    if (!is_array($posts_in_maintenance)) {
        $posts_in_maintenance = []; // Default to an empty array if the value is not an array
    }

    // Ensure whitelisted users are an array
    if (!is_array($whitelisted_users)) {
        $whitelisted_users = []; // Default to an empty array if the value is not an array
    }

    // If the user is logged in and whitelisting is enabled, check if the user is whitelisted
    if (is_user_logged_in() && $whitelist_enabled) {
        $current_user = wp_get_current_user();
        if (in_array($current_user->ID, $whitelisted_users)) {
            return; // Allow whitelisted users to view the page/post
        }
    }

    // Check if the current page is in maintenance mode
    if (is_page() && in_array($post->ID, $pages_in_maintenance)) {
        ucmm_show_maintenance_page(); // Show the custom maintenance page
        exit;
    }

    // Check if the current post is in maintenance mode
    if (is_single() && in_array($post->ID, $posts_in_maintenance)) {
        ucmm_show_maintenance_page(); // Show the custom maintenance page
        exit;
    }
}

// Function to include and show the custom maintenance page
function ucmm_show_maintenance_page() {
    // Get the path to the maintenance page template
    $template_path = plugin_dir_path(__FILE__) . '../templates/maintenance-page.php';
    
    if (file_exists($template_path)) {
        include $template_path; // Display the maintenance page
    } else {
        // Fallback if template not found
        wp_die('This page is under maintenance. Please check back later.');
    }
}
