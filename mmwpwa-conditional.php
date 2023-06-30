<?php
defined('ABSPATH') || exit;

/**
 *=========================
 *NAME: Disable in specific category by ID
 *=========================
 */

function mmwpwa_disable_in_cat_id()
{
    $disInCat = carbon_get_theme_option('mmwpwadisableincategory');
    return $disInCat;
}
