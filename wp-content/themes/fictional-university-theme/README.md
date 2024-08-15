# Websites
- https://codex.wordpress.org/
- https://developer.wordpress.org/
- https://developer.wordpress.org/resource/dashicons/
- https://developer.wordpress.org/reference/functions/register_post_type/

# Functions
- have_posts();
- the_post();
- the_permalink(); (sometimes needs rebuilding in settings)
- the_title();
- the_content();
- get_the_title();
- get_the_content();
- get_the_permalink(): (sometimes needs rebuilding in settings)
- get_header();
- get_footer();
- wp_head();
- add_action();
  - add_action('init', 'university_post_types');
  - // Generate appropriate title tag for each screen
    add_action('after_setup_theme', 'university_features');
- wp_enqueue_style();
- get_stylesheet_uri();
- wp_enqueue_script();
- wp_footer();
- get_theme_file_uri();
- get_the_content();
- get_the_ID(); ID of the current Page/Post that is being viewed
- wp_get_post_parent_id(); (if it doesn't have a prent, returns 0, otherwise ID)
- wp_list_pages(); (takes in associative array, outputing on screen, by default uses Alphabetical ordering, can use custom order with parameter 'sort_column' => 'menu_order' which can be set in wp-admin screen with order parameter within page attributes)
- get_pages(); (just returns pages in memory)
- get_language_attributes();
- language_attributes();
- get_bloginfo(); (<body class="'.implode( ' ', get_body_class()).'">)
- bloginfo();
- register_nav_menu();
- wp_nav_menu();
  - wp_nav_menu([
    'theme_location' => 'header-menu',
    ]);
- the_excerpt();
- get_the_excerpt(); (small preview of blog)
- get_the_author_posts_link(); (returns a link to author of blog, can be changed in admin panel users nickname / display name publicly as)
- get_the_time('format...');
- get_the_category_list(', '); (separator in case there is multiple categories)
- is_category(); (is it in category archive)
- is_author(); (is it in author archive)
- single_cat_title();
  - $title = single_cat_title("", false);
- get_the_author(); (gets author of current post)
- the_archive_title(); (does all archiving for us, but we don't have as much control)
- is_year();
- is_month();
- is_day();
- get_the_archive_description(); (pulls data from users biography details or categories description)
- get_post_type();
- register_post_type();
- get_post_type_archive_link();
- get_field();
- the_field();
- is_main_query(); (makes sure that query taking place is not custom query)
- is_admin(); (is in admin panel)
- is_post_type_archive('type here') (checks if post type is of specified type)
- paginate_links() (works only on default WP queries that are tied to the current URL or manipulating query, needs different approach for custom queries)
  - echo paginate_links([
    'total' => $past_events->max_num_pages,
    ]);
- get_query_var(); (get information about current URL)
- wp_reset_postdata();
- add_theme_support('post-thumbnails');
- get_the_post_thumbnail();
- the_post_thumbnail();

# TEMPLATE FILES

- index.php
- page.php
- single.php
- footer.php
- header.php
- style.css
- screenshot.png
- front-page.php
- archive.php

# MU-PLUGINS folder
- 

# LOGIC
- functions.php - Behind the scenes File
- site_url()

# HOOKS
- wp_enqueue_scripts (load JS files)
- wp_enqueue_style (load CSS files)
- after_setup_theme (adding features to theme)
  - 'title-tag'
- wp_reset_postdata(); (good habit to use I guess?)
- init (in add_action)
- add_action('pre_get_posts', 'university_adjust_queries');

# CUSTOM QUERIES
- new WP_Query();
  - $homepage_posts = new WP_Query([
    'posts_per_page' => '2',
    'category_name' => 'awards'
    'post_type' => 'post' / 'page'
    ...
    ]);

## Whenever we register new post type wp looks for single-(that post type).php, also we need to tell it that it supports archiving inside wp-content, mu-plugins

# PLUGINS
- Advanced Custom Fields (ACF)
- CMB2 (Custom Metaboxes 2)
- Manual Image Crop
- Regenerate Thumbnails

# VERY IMPORTANT TIPS
- Use custom queries when you want to do something that is NOT related to current behaviour of URL, try to use default query with slight adjustments to it (easier pagination...)
- When using custom queries it's possible to set up pagination but requires extra steps
  - echo paginate_links([
    'total' => $past_events->max_num_pages,
    ]);
- Loading css/js is not the same for frontend and admin part, use different hooks wp_admin_enqueue...
- wp_reset_postdata() (resets global post objects and the returns of functions like get_id, get_title etc.. it resets all of that back to DEFAULT URL BASED QUERY)
  - so.. whenever you are running multiple custom querries on a single page, you will want to use wp_reset_postdata() between them