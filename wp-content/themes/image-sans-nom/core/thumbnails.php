<?php
/**
 * Register post functionalities
 */
add_theme_support('post-thumbnails');


add_action('after_setup_theme', 'isn_custom_add_image_sizes');
function isn_custom_add_image_sizes()
{
//    Sizes contact-about
    add_image_size('contact_a-propos', 623, 623, true);
//    Homepage sizes
    add_image_size('home', 783, 783, true);
    add_image_size('home-2x', 1566, 1566, true);
    add_image_size('home-post', 660, 500, true);
}