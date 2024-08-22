<?php

function page_banner ($args = NULL): void
{
    if (!isset($args['title'])) {
        $args['title'] = get_the_title();
    }

    if (!isset($args['subtitle'])) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }

    if (!isset($args['image'])) {
        if (get_field('page_banner_background_image') && !is_archive() && !is_home()) {
            $args['image'] = get_field('page_banner_background_image')['sizes']['page_banner'];
        } else {
            $args['image'] = get_theme_file_uri('/images/ocean.jpg');
        }
    }

    echo '
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url('.$args["image"].')"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">'.$args['title'].'</h1>
            <div class="page-banner__intro">
                <p>'.$args['subtitle'].'</p>
            </div>
        </div>
    </div>';
}

function university_files ()
{
    wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ7HW6Fo6GPLA7iAFNANwH3uD7pQ_llto', array(), '', true);
    wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
}

// Loading CSS/JS/Fonts/Bootstrap
add_action("wp_enqueue_scripts", "university_files");

function university_features (): void
{
    /*register_nav_menu('header-menu', 'Header Menu');
    register_nav_menu('footer-menu-one', 'Footer Menu One');
    register_nav_menu('footer-menu-two', 'Footer Menu Two');*/
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professor_landscape', 400, 260, true); // crop values = true, false or array (left/right/center/top/bottom)... combined left top etc..
    add_image_size('professor_portrait', 480, 650, true);
    add_image_size('page_banner', 1500, 350, true);
}

// Generate appropriate title tag for each screen
add_action('after_setup_theme', 'university_features');

function university_adjust_queries ($query): void
{
    if (!is_admin() && is_post_type_archive('program') && is_main_query()) {
        $query->set('posts_per_page', '-1');
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }

    if (!is_admin() && is_post_type_archive('campus') && is_main_query()) {
        $query->set('posts_per_page', '-1');
    }

    if (!is_admin() && is_post_type_archive('event') && is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', [
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'DATE'
        ]);
    }
}

add_action('pre_get_posts', 'university_adjust_queries');

function university_map_key ($api)
{
    $api['key'] = 'AIzaSyDZ7HW6Fo6GPLA7iAFNANwH3uD7pQ_llto';
    return $api;
}
add_filter('acf/fields/google_map/api', 'university_map_key');