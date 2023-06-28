<?php
defined('ABSPATH') || exit;


function mmwpwa_load_scripts()
{
    $mmwpwastyle = carbon_get_theme_option('mmwpwastyle');
    wp_enqueue_style('global-css', plugins_url('scripts/mmwpwa.css', __FILE__), array(), '1.0.0', 'all');
    if ($mmwpwastyle == 'style1') {
        wp_enqueue_style('style1-css', plugins_url('scripts/style1.css', __FILE__), array(), '1.0.0', 'all');
        wp_enqueue_script('style1-js', plugins_url('scripts/style1.js', __FILE__), array('jquery'), '1.0.0', true);
    } elseif ($mmwpwastyle == 'style2') {
        wp_enqueue_style('style2-css', plugins_url('scripts/style2.css', __FILE__), array(), '1.0.0', 'all');
        wp_enqueue_script('style2-js', plugins_url('scripts/style2.js', __FILE__), array('jquery'), '1.0.0', true);
    } else {
        // wait
    }
}
add_action('wp_enqueue_scripts', 'mmwpwa_load_scripts');
