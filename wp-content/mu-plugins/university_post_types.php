<?php

function university_post_types (): void
{
    // Event post type
    register_post_type('event', [
        'has_archive' => true, // Whatever keyword you register in post_type it's automaticaly a slug unless said otherwise
        'rewrite' => ['slug' => 'events'],
        'supports' => ['title', 'editor', 'excerpt'], // need to specify editor if want to use modern editor
        'public' => true, // Post type visible to editors and viewers of website
        'show_in_rest' => true,
        'labels' => [
            'name' => 'Events', // Element in sidebar
            'add_new' => 'Add New Event',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event',
        ],
        'menu_icon' => 'dashicons-calendar',
    ]);

    // Program post type
    register_post_type('program', [
        'has_archive' => true,
        'rewrite' => ['slug' => 'programs'],
        'supports' => ['title', 'editor'],
        'public' => true,
        'show_in_rest' => true,
        'labels' => [
            'name' => 'Programs',
            'add_new' => 'Add New Program',
            'add_new_item' => 'Add New Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All Programs',
            'singular_name' => 'Program',
        ],
        'menu_icon' => 'dashicons-awards',
    ]);

    // Professor post type
    register_post_type('professor', [
        'supports' => ['title', 'editor', 'thumbnail'],
        'public' => true,
        'show_in_rest' => true,
        'labels' => [
            'name' => 'Professors',
            'add_new' => 'Add New Professor',
            'add_new_item' => 'Add New Professor',
            'edit_item' => 'Edit Professors',
            'all_items' => 'All Professors',
            'singular_name' => 'Professor',
        ],
        'menu_icon' => 'dashicons-welcome-learn-more',
    ]);

    // Campus post type
    register_post_type('campus', [
        'has_archive' => true, // Whatever keyword you register in post_type it's automaticaly a slug unless said otherwise
        'rewrite' => ['slug' => 'campuses'],
        'supports' => ['title', 'editor', 'excerpt'], // need to specify editor if want to use modern editor
        'public' => true, // Post type visible to editors and viewers of website
        'show_in_rest' => true,
        'labels' => [
            'name' => 'Campuses', // Element in sidebar
            'add_new' => 'Add New Campus',
            'add_new_item' => 'Add New Campus',
            'edit_item' => 'Edit Campus',
            'all_items' => 'All Campuses',
            'singular_name' => 'Campus',
        ],
        'menu_icon' => 'dashicons-location-alt',
    ]);
}

// Create new post type
add_action('init', 'university_post_types');