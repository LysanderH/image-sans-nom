<?php

/**
 * Register custom post types
 */
function isn_register_post_types()
{
    /***
     * Register custom post type books/livres
     */
    register_post_type('book', [
        'labels' => [
            'name' => _x('Livres', 'Post type general name', 'isn'),
            'singular_name' => _x('Livre', 'Post type singular name', 'isn'),
            'menu_name' => _x('Livres', 'Admin Menu text', 'isn'),
            'name_admin_bar' => _x('Livre', 'Add New on Toolbar', 'isn'),
            'add_new' => __('Ajouter un nouveau', 'isn'),
            'add_new_item' => __('Ajouter un nouveau livre', 'isn'),
            'new_item' => __('Nouveau livre', 'isn'),
            'edit_item' => __('Éditer un livre', 'isn'),
            'view_item' => __('Voir le livre', 'isn'),
            'all_items' => __('Tous les livres', 'isn'),
            'search_items' => __('Rechercher un livre', 'isn'),
            'parent_item_colon' => __('Livres parent:', 'isn'),
            'not_found' => __('Pas de livres trouvé.', 'isn'),
            'not_found_in_trash' => __('Pas de livres trouvé dans la corbeille.', 'isn'),
            'featured_image' => _x('L’image de couverture du livre', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'isn'),
            'set_featured_image' => _x('Ajouter une image de couverture', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'isn'),
            'remove_featured_image' => _x('Supprimer l’image de couverture', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'isn'),
            'use_featured_image' => _x('Utiliser une image de couverture', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'isn'),
            'archives' => _x('Archive des livres', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'isn'),
            'insert_into_item' => _x('Ajouter dans livres', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'isn'),
            'uploaded_to_this_item' => _x('Téléverser vers la fiche de ce livre', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'isn'),
            'filter_items_list' => _x('Filtrer la liste des livres', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'isn'),
            'items_list_navigation' => _x('Navigation de la liste des livres', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'isn'),
            'items_list' => _x('Liste des livres', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'isn'),
        ],
        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-book',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
    ]);

    register_post_type('exhibition', [
        'label' => 'Expositions',
        'labels' => [
            'singular_name' => 'Exposition',
            'add_new_item' => 'Ajouter une expo'
        ],
        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'description' => 'Ici sont repris tous les tutoriel',
        'menu_icon' => 'dashicons-welcome-learn-more',
        'menu_position' => 5,
        'has_archive' => true,
        'supports' => [
            'title',
            'thumbnail',
            'excerpt',
            'editor'
        ]
    ]);
}
add_action('init', 'isn_register_post_types');

/**
 * Remove default post Type
 */
add_action('admin_menu', 'remove_default_post_type');

function remove_default_post_type()
{
    remove_menu_page('edit.php');
}

/**
 * Remove default post Type from menu bar
 */

add_action('admin_bar_menu', 'remove_default_post_type_menu_bar', 999);

function remove_default_post_type_menu_bar($wp_admin_bar)
{
    $wp_admin_bar->remove_node('new-post');
}

/**
 * Remove default post Type
 */
add_action('wp_dashboard_setup', 'remove_draft_widget', 999);

function remove_draft_widget()
{
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}