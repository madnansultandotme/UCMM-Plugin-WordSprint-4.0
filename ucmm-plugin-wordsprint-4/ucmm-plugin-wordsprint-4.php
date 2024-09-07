<?php
/*
Plugin Name: UCMM Wordsprint Plugin
Description: Adds Maintenance Mode, Coming Soon, and Under Construction functionality.
Version: 1.1
Author: Team Zeppelin
*/

if (!defined('ABSPATH')) {
    exit;
}
// Include the customizer functionality
require_once plugin_dir_path(__FILE__) . 'ucmm-customizer.php';
// Include settings and functionality files
require_once plugin_dir_path(__FILE__) . 'includes/ucmm-settings.php';
require_once plugin_dir_path(__FILE__) . 'includes/ucmm-maintenance.php';

add_action('admin_enqueue_scripts', 'ucmm_enqueue_admin_scripts');
function ucmm_enqueue_admin_scripts() {
    // Enqueue admin styles
    wp_enqueue_style('ucmm-admin-style', plugin_dir_url(__FILE__) . 'css/admin-style.css');
    
    // Enqueue admin script with jQuery as a dependency
    wp_enqueue_script('ucmm-admin-script', plugin_dir_url(__FILE__) . 'js/admin-script.js', ['jquery'], null, true);
    
    // Add localized data for the script
    wp_localize_script('ucmm-admin-script', 'ucmm_admin', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ucmm_nonce'),
    ]);
}


