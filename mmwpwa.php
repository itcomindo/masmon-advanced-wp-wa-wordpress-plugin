<?php
defined('ABSPATH') || exit;

/**
 *=========================
 *Plugin Name: Masmon Advanced WP WA
 *Plugin URI: https://budiharyono.com/jasa-pembuatan-web/
 *Description: Masmon WP WA is a plugin to display a WhatsApp button on the website.
 *Version: v2.0.0 beta
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
//=========================Disabled in Category ID=========================
function disInCat()
{
    $disInCat = carbon_get_theme_option('mmwpwadisableincategory');
    if (empty($disInCat)) {
        // do nothing
    } else {
        $disInCat = $disInCat;
        return $disInCat;
    }
}

//=========================Disabled in Post Id=========================
function disInPost()
{
    $disInPost = carbon_get_theme_option('mmwpwadisableinpost');
    if (empty($disInPost)) {
        // do nothing
    } else {
        $disInPost = $disInPost;
        return $disInPost;
    }
}


//=========================Disabled in Page Id=========================
function disInPage()
{
    $disInPage = carbon_get_theme_option('mmwpwadisableinpage');
    if (empty($disInPage)) {
        // do nothing
    } else {
        $disInPage = $disInPage;
        return $disInPage;
    }
}

//=========================Disabled in Tag ID=========================
function disInTag()
{
    $disInTag = carbon_get_theme_option('mmwpwadisableintag');
    if (empty($disInTag)) {
        // do nothing
    } else {
        $disInTag = $disInTag;
        return $disInTag;
    }
}

//=========================Disabled in Custom Post Type By Name=========================
function disInCpt()
{
    $disInCpt = carbon_get_theme_option('mmwpwadisableincustomposttype');
    if (empty($disInCpt)) {
        // do nothing
    } else {
        $disInCpt = $disInCpt;
        return $disInCpt;
    }
}




/**
 *=========================
 *Include Admin CSS
 *=========================
 */
add_action('admin_enqueue_scripts', 'mmwpwa_admin_enqueue_scripts');
function mmwpwa_admin_enqueue_scripts()
{
    wp_enqueue_style('mmwpwa-admin-css', plugins_url('mmwpwa-admin.css', __FILE__));
    wp_enqueue_script('mmwpwa-admin-js', plugins_url('mmwpwa-admin.js', __FILE__), array(), '1.0.0', true);
}

include 'mmwpwa-core.php';
include 'mmwpwa-ui.php';
