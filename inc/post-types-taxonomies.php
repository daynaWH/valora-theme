<?php
function valora_register_custom_post_types() {
    // Testimonial CPT
    $labels = array(
        'name'                  => _x( 'Testimonials', 'post type general name', 'valora-theme' ),
        'singular_name'         => _x( 'Testimonial', 'post type singular name', 'valora-theme' ),
        'menu_name'             => _x( 'Testimonials', 'admin menu', 'valora-theme' ),
        'add_new'               => _x( 'Add New', 'testimonial', 'valora-theme' ),
        'add_new_item'          => __( 'Add New Testimonial', 'valora-theme' ),
        'new_item'              => __( 'New Testimonial', 'valora-theme' ),
        'edit_item'             => __( 'Edit Testimonial', 'valora-theme' ),
        'view_item'             => __( 'View Testimonial', 'valora-theme'  ),
        'all_items'             => __( 'All Testimonials', 'valora-theme' ),
        'search_items'          => __( 'Search Testimonials', 'valora-theme' ),
        'not_found'             => __( 'No testimonials found.', 'valora-theme' ),
        'not_found_in_trash'    => __( 'No testimonials found in Trash.', 'valora-theme' ),
        'item_link'             => __( 'Testimonial link.', 'valora-theme' ),
        'item_link_description' => __( 'A link to a testimonial.', 'valora-theme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonials' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        // 'menu_position'      => 7,
        'menu_icon'          => 'dashicons-testimonial',
        'supports'           => array( 'title', 'editor' ),
        'template'           => array( array( 'core/pullquote' ) ),
        'template_lock'      => 'all'
    );

    register_post_type( 'val-testimonial', $args );

    // Amenity CPT
    $labels = array(
        'name'                     => _x( 'Amenities', 'post type general name', 'valora-theme' ),
        'singular_name'            => _x( 'Amenity', 'post type singular name', 'valora-theme' ),
        'menu_name'                => _x( 'Amenities', 'admin menu', 'valora-theme' ),
        'add_new'                  => _x( 'Add New', 'amenity', 'valora-theme' ),
        'add_new_item'             => __( 'Add New Amenity', 'valora-theme' ),
        'new_item'                 => __( 'New Amenity', 'valora-theme' ),
        'edit_item'                => __( 'Edit Amenity', 'valora-theme' ),
        'view_item'                => __( 'View Amenity', 'valora-theme' ),
        'view_items'               => __( 'View Amenities', 'valora-theme' ),
        'all_items'                => __( 'All Amenities', 'valora-theme' ),
        'search_items'             => __( 'Search Amenities', 'valora-theme' ),
        'not_found'                => __( 'No amenities found.', 'valora-theme' ),
        'not_found_in_trash'       => __( 'No amenities found in Trash.', 'valora-theme' ),
        'insert_into_item'         => __( 'Insert into amenity', 'valora-theme' ),
        'featured_image'           => __( 'Amenity featured image', 'valora-theme' ),
        'set_featured_image'       => __( 'Set amenity featured image', 'valora-theme' ),
        'remove_featured_image'    => __( 'Remove amenity featured image', 'valora-theme' ),
        'use_featured_image'       => __( 'Use as featured image', 'valora-theme' ),
        'filter_items_list'        => __( 'Filter amenities list', 'valora-theme' ),
        'items_list_navigation'    => __( 'Amenities list navigation', 'valora-theme' ),
        'items_list'               => __( 'Amenities list', 'valora-theme' ),
        'item_link'                => __( 'Amenity link.', 'valora-theme' ),
        'item_link_description'    => __( 'A link to an amenity.', 'valora-theme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'amenities' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        // 'menu_position'      => 5,
        'menu_icon'          => 'dashicons-store',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        // 'template'           => array( array( 'core/paragraph' ), array( 'core/gallery')),
        'template_lock'      => 'all'
    );
    register_post_type( 'val-amenity', $args );

    // FAQ CPT
    $labels = array(
        'name'                     => _x( 'FAQs', 'post type general name', 'valora-theme' ),
        'singular_name'            => _x( 'FAQ', 'post type singular name', 'valora-theme' ),
        'add_new'                  => _x( 'Add New', 'FAQ', 'valora-theme' ),
        'add_new_item'             => __( 'Add New FAQ', 'valora-theme' ),
        'edit_item'                => __( 'Edit FAQ', 'valora-theme' ),
        'new_item'                 => __( 'New FAQ', 'valora-theme' ),
        'view_item'                => __( 'View FAQ', 'valora-theme' ),
        'view_items'               => __( 'View FAQs', 'valora-theme' ),
        'search_items'             => __( 'Search FAQs', 'valora-theme' ),
        'not_found'                => __( 'No FAQs found.', 'valora-theme' ),
        'not_found_in_trash'       => __( 'No FAQs found in Trash.', 'valora-theme' ),
        'parent_item_colon'        => __( 'Parent FAQs:', 'valora-theme' ),
        'all_items'                => __( 'All FAQs', 'valora-theme' ),
        'archives'                 => __( 'FAQ Archives', 'valora-theme' ),
        'attributes'               => __( 'FAQ Attributes', 'valora-theme' ),
        'insert_into_item'         => __( 'Insert into FAQ', 'valora-theme' ),
        'menu_name'                => _x( 'FAQs', 'admin menu', 'valora-theme' ),
        'filter_items_list'        => __( 'Filter FAQs list', 'valora-theme' ),
        'items_list_navigation'    => __( 'FAQs list navigation', 'valora-theme' ),
        'items_list'               => __( 'FAQs list', 'valora-theme' ),
        'item_published'           => __( 'FAQ published.', 'valora-theme' ),
        'item_published_privately' => __( 'FAQ published privately.', 'valora-theme' ),
        'item_revereted_to_draft'  => __( 'FAQ reverted to draft.', 'valora-theme' ),
        'item_trashed'             => __( 'FAQ trashed.', 'valora-theme' ),
        'item_scheduled'           => __( 'FAQ scheduled.', 'valora-theme' ),
        'item_updated'             => __( 'FAQ updated.', 'valora-theme' ),
        'item_link'                => __( 'FAQ link.', 'valora-theme' ),
        'item_link_description'    => __( 'A link to an FAQ.', 'valora-theme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'faqs' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        // 'menu_position'      => 5,
        'menu_icon'          => 'dashicons-editor-help',
        'supports'           => array( 'title', 'editor' ),
        'template'           => array( array( 'core/paragraph' ) ),
        'template_lock'      => 'all'
    );
    register_post_type( 'val-faq', $args );
}
add_action( 'init', 'valora_register_custom_post_types' );

function valora_register_taxonomies() {
    // FAQ Taxonomy
    $labels = array(
        'name'                  => _x( 'FAQ Categories', 'taxonomy general name', 'valora-theme' ),
        'singular_name'         => _x( 'FAQ Category', 'taxonomy singular name', 'valora-theme' ),
        'search_items'          => __( 'Search FAQ Categories', 'valora-theme' ),
        'all_items'             => __( 'All FAQ Category', 'valora-theme' ),
        'parent_item'           => __( 'Parent FAQ Category', 'valora-theme' ),
        'parent_item_colon'     => __( 'Parent FAQ Category:', 'valora-theme' ),
        'edit_item'             => __( 'Edit FAQ Category', 'valora-theme' ),
        'view_item'             => __( 'View FAQ Category', 'valora-theme' ),
        'update_item'           => __( 'Update FAQ Category', 'valora-theme' ),
        'add_new_item'          => __( 'Add New FAQ Category', 'valora-theme' ),
        'new_item_name'         => __( 'New FAQ Category Name', 'valora-theme' ),
        'template_name'         => __( 'FAQ Category Archives', 'valora-theme' ),
        'menu_name'             => __( 'FAQ Category', 'valora-theme' ),
        'not_found'             => __( 'No FAQ Categories found.', 'valora-theme' ),
        'no_terms'              => __( 'No FAQ Categories', 'valora-theme' ),
        'items_list_navigation' => __( 'FAQ Categories list navigation', 'valora-theme' ),
        'items_list'            => __( 'FAQ Categories list', 'valora-theme' ),
        'item_link'             => __( 'FAQ Category Link', 'valora-theme' ),
        'item_link_description' => __( 'A link to a FAQ category.', 'valora-theme' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'faq-category' ),
    );
    register_taxonomy( 'val-faq-category', array( 'val-faq' ), $args );
}
add_action( 'init', 'valora_register_taxonomies' );

// Flush Rewrite Rules
function valora_rewrite_flush() {
    valora_register_custom_post_types();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'valora_rewrite_flush' );