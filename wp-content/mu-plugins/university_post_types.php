<?php

function university_post_types (): void
{
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
}

// Create new post type
add_action('init', 'university_post_types');