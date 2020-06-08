<?php
/**
 * Register post functionalities
 */
add_theme_support('post-thumbnails');


add_action('after_setup_theme', 'isn_custom_add_image_sizes');
function isn_custom_add_image_sizes()
{
    //    Homepage sizes
    add_image_size('home', 783, 783, true);
    add_image_size('home-mobile', 375, 375, true);
    add_image_size('home-big-screens', 1566, 1566, true);

    //    Header sizes
    add_image_size('header', 790, 624, true);
    add_image_size('header-big-screens', 1580, 1248, true);
    add_image_size('header-tablet', 631.117, 498.5, true);
    add_image_size('header-mobile', 300.267, 237.167, true);


    //    Last post sizes
    add_image_size('home-post', 660, 500, true);
    add_image_size('books', 986, 821, true);


    add_image_size('single-mobile', 306.333, 204.317, true);
    add_image_size('single-tablet', 699, 466.233, true);
    add_image_size('single-desktop', 498.833, 395.067, true);
    add_image_size('single-big-screens', 997.666, 790.134, true);


}