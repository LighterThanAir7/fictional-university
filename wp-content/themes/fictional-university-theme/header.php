<?php

echo '
<!DOCTYPE html>
<html '.get_language_attributes().'>
    <head>
        <meta charset="'.get_bloginfo('charset').'">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        '.wp_head(). '
    </head>

    <body class="'.implode( ' ', get_body_class()).'">
    <header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="'.site_url().'"><strong>Fictional</strong> University</a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">';

            /*wp_nav_menu([
                'theme_location' => 'header-menu',
            ]);*/


            $about_us_class = '';
            $blog_class = '';
            $event_class = '';
            $program_class = '';
            
            // If the current page is "About Us" or a child of "About Us"
            if (is_page('about-us') || wp_get_post_parent_id(0) === 13) {
                $about_us_class = ' class="current-menu-item"';
            }

            // If this is post type of post... do this
            if (get_post_type() === 'post') {
                $blog_class = ' class="current-menu-item"';
            }

            if (get_post_type() === 'event' || is_page('past-events')) {
                $event_class = ' class="current-menu-item"';
            }

            if (get_post_type() === 'program') {
                $program_class = ' class="current-menu-item"';
            }

            echo '
            <ul>
              <li'.$about_us_class.'><a href="' . site_url('/about-us') . '">About Us</a></li>
              <li'.$program_class.'><a href="'.site_url("/programs").'">Programs</a></li>
              <li'.$event_class.'><a href="'.site_url("/events"),'">Events</a></li>
              <li><a href="#">Campuses</a></li>
              <li'.$blog_class.'><a href="'.site_url("/blog").'">Blog</a></li>
            </ul>

          </nav>
          <div class="site-header__util">
            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </header>
';