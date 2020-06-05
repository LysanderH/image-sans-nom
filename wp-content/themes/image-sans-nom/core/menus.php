<?php
/**
 * Menus
 */

/***
 * Register main menu
 */
register_nav_menu('main', 'Navigation principale du site');
/***
 * Register footer menu
 */
register_nav_menu('footer', 'Navigation de pied de page');

/***
 * Get menu items as array
 */
function isn_get_menu($location, $baseClass)
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