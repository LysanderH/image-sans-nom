<?php

/**
 * Register post functionalities
 */
add_theme_support('post-thumbnails');

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

/**
 * Register custom post types
 */
function isn_register_post_types()
{
    /***
     * Register custom post type books/livres
     * @todo translate to french & add labels to exhibitions
     */
    register_post_type('book', [
        'labels' => [
            'name' => _x('Books', 'Post type general name', 'isn'),
            'singular_name' => _x('Book', 'Post type singular name', 'isn'),
            'menu_name' => _x('Books', 'Admin Menu text', 'isn'),
            'name_admin_bar' => _x('Book', 'Add New on Toolbar', 'isn'),
            'add_new' => __('Add New', 'isn'),
            'add_new_item' => __('Add New Book', 'isn'),
            'new_item' => __('New Book', 'isn'),
            'edit_item' => __('Edit Book', 'isn'),
            'view_item' => __('View Book', 'isn'),
            'all_items' => __('All Books', 'isn'),
            'search_items' => __('Search Books', 'isn'),
            'parent_item_colon' => __('Parent Books:', 'isn'),
            'not_found' => __('No books found.', 'isn'),
            'not_found_in_trash' => __('No books found in Trash.', 'isn'),
            'featured_image' => _x('Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'isn'),
            'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'isn'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'isn'),
            'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'isn'),
            'archives' => _x('Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'isn'),
            'insert_into_item' => _x('Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'isn'),
            'uploaded_to_this_item' => _x('Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'isn'),
            'filter_items_list' => _x('Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'isn'),
            'items_list_navigation' => _x('Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'isn'),
            'items_list' => _x('Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'isn'),
        ],
        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'register_meta_box_cb' => 'isn_book_meta_box_cb',
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
        'register_meta_box_cb' => 'isn_exhibition_meta_box_cb',
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
 * Add meta box "gallery" to post-type
 */
function isn_exhibition_meta_box_cb () {
    add_meta_box( 'exhibition' . '_details' , 'Media Library', 'isn_meta_box_details', 'exhibition', 'normal', 'high' );
}
function isn_book_meta_box_cb () {
    add_meta_box( 'book' . '_details' , 'Media Library', 'isn_meta_box_details', 'book', 'normal', 'high' );
}

function isn_meta_box_details () {
    global $post;
    $post_ID = $post->ID; // global used by get_upload_iframe_src
    printf( "<iframe frameborder='0' src=' %s ' style='width: 100%%; height: 400px;'> </iframe>", get_upload_iframe_src('media') );
}

/**
 * Get pagination links
 */

function isn_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div>' . "\n";

}
