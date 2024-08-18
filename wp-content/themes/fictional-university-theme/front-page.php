<?php

get_header();

echo '
<div class="page-banner">
    <div class="page-banner__bg-image"
         style="background-image: url(' . get_theme_file_uri("/images/library-hero.jpg") . ');"></div>
    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re
            interested in?</h3>
        <a href="'.get_post_type_archive_link("program").'" class="btn btn--large btn--blue">Find Your Major</a>
    </div>
</div>
<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>';

            // Custom query to get 2 latest posts
            $today = date('Ymd');
            $homepage_events = new WP_Query([
                'posts_per_page' => 2, // -1 shows all items, we want 2 most rapidly aproaching
                'post_type' => 'event',
                'meta_key' => 'event_date',
                'orderby' => 'meta_value_num', // rand = random, title, post_date, meta_value... if it's number use meta_value_num
                'order' => 'ASC',
                'meta_query' => [ // Filter out events which have already happpened = FINE GRAINED CONTROL WITH META QUERIES
                    [
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'DATE' // numeric because we are comparing two numbers, or use DATE
                    ]
                ]
            ]);

            while ($homepage_events->have_posts()) {
                $homepage_events->the_post();
                get_template_part("templates/event");
                wp_reset_postdata();
            }

            echo '
            <p class="t-center no-margin"><a href="'.get_post_type_archive_link('event').'" class="btn btn--blue">View All Events</a></p>
        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>';

            // Custom query to get latest 2 posts
            $homepage_posts = new WP_Query([
                'posts_per_page' => 2
            ]);

            while ($homepage_posts->have_posts()) {
                $homepage_posts->the_post();
                get_template_part("templates/posts");
            }

            echo '
            <p class="t-center no-margin"><a href="'.site_url("/blog").'" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
    </div>
</div>

<div class="hero-slider">
    <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
            <div class="hero-slider__slide"
                 style="background-image: url(' . get_theme_file_uri("/images/bus.jpg") . ');">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">Free Transportation</h2>
                        <p class="t-center">All students have free unlimited bus fare.</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="hero-slider__slide"
                 style="background-image: url(' . get_theme_file_uri("/images/apples.jpg") . ');">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                        <p class="t-center">Our dentistry program recommends eating apples.</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="hero-slider__slide"
                 style="background-image: url(' . get_theme_file_uri("/images/bread.jpg") . ');">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">Free Food</h2>
                        <p class="t-center">Fictional University offers lunch plans for those in need.</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
    </div>
</div>';

get_footer();