<?php

/**
 * Get theme assets
 */
function bp_get_theme_asset($asset)
{
    return get_stylesheet_directory_uri() . '/' . ltrim($asset, '/');
}


/**
 * Get page title and heading
 */
function bp_get_title($separator = '-', $displayTitleLeft = true)
{
    $title = trim(wp_title($separator, false, 'right'));

    if (!$title) {
        return get_bloginfo('name');
    }

    if ($displayTitleLeft) {
        return trim(wp_title($separator, false, 'right') . get_bloginfo('name'));
    } else {
        return get_bloginfo('name') . wp_title($separator, false, 'left');
    }
}

/**
 * Menus
 */

/***
 * Register main menu
 */
register_nav_menu('main', 'Navigation principale du site');

/***
 * Register socials menu
 */
register_nav_menu('socials', 'Navigation des liens pour les réseaux sociaux');

/***
 * Get menu items as array
 */
function bp_get_menu($location, $baseClass)
{
    global $object;
    $items = [];
    $locations = get_nav_menu_locations();
    $id = $locations[$location];
    $menu = wp_get_nav_menu_items($id);
    /** Push each item of a link to an array */
    foreach ($menu as $i => $object) {

        $isTargettingHome = rtrim($object->url, '/') == rtrim(home_url(), '/');

        $item = new stdClass();
        $item->url = $object->url;
        $item->label = $object->title;
        $item->current = (is_home() && $isTargettingHome) || ($object->object_id == $object->ID);
        $item->target = $object->target;
        $item->classes = array_map(function ($item) use ($baseClass) {
            return $baseClass . '--' . $item;
        }, array_filter(array_merge([$item->current ? 'current' : null], $object->classes)));

        array_unshift($item->classes, $baseClass);

        $items[] = $item;
    }
    return $items;
}