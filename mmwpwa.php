<?php
defined('ABSPATH') || exit;

/**
 *=========================
 *Plugin Name: Masmon Advanced WP WA
 *Plugin URI: https://budiharyono.com/jasa-pembuatan-web/
 *Description: Masmon WP WA is a plugin to display a WhatsApp button on the website.
 *Version: v1.0.0 beta
 *Author: Budi Haryono
 *Author URI: https://budiharyono.com/
    
 *=========================
 */
add_action('plugins_loaded', 'mmwpwa_plugin_loaded');
function mmwpwa_plugin_loaded()
{
    if (!function_exists('carbon_fields_boot_plugin')) {
        // If Carbon Fields is not active, deactivate your plugin and display an error message
        add_action('admin_notices', 'mmwpwa_plugin_activation_error');
        add_action('admin_init', 'mmwpwa_deactivate_plugin');
    }
}
function mmwpwa_plugin_activation_error()
{
    echo '<div class="error"><p>You need to install and activate the Carbon Fields plugin first.</p></div>';
}
function mmwpwa_deactivate_plugin()
{
    deactivate_plugins(plugin_basename(__FILE__));
}
add_action('admin_init', 'mmwpwa_check_carbon_fields_deactivation');
function mmwpwa_check_carbon_fields_deactivation()
{
    if (!function_exists('carbon_fields_boot_plugin')) {
        deactivate_plugins(plugin_basename(__FILE__));
    }
}


include 'mmwpwa-options.php';



/**
 *=========================
 *Include Admin CSS
 *=========================
 */
add_action('admin_enqueue_scripts', 'mmwpwa_admin_enqueue_scripts');
function mmwpwa_admin_enqueue_scripts()
{
    wp_enqueue_style('mmwpwa-admin-css', plugins_url('mmwpwa-admin.css', __FILE__));
}
