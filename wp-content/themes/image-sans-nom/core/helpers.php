<?php
/**
 * Get theme assets
 */
function isn_get_theme_asset($asset)
{
    return get_stylesheet_directory_uri() . '/' . ltrim($asset, '/');
}

/**
 * Get page title and heading
 */
function isn_get_title($separator = '-', $displayTitleLeft = true)
{
    $title = trim(wp_title($separator, false, 'right'));

    if (!$title) {
        return get_bloginfo('name');
    }

    if ($displayTitleLeft) {
        return trim(wp_title($separator, false, 'right') . ' ' . $separator . ' ' . get_bloginfo('name'));
    } else {
        return get_bloginfo('name') . ' ' . $separator . ' ' . wp_title($separator, false, 'left');
    }
}