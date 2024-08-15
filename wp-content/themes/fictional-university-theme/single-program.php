<?php

get_header();

while (have_posts()) {
    the_post(); // Keep track of which post we are working with

    echo '
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(' . get_theme_file_uri('/images/ocean.jpg') . ');"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">' . get_the_title() . '</h1>
            <div class="page-banner__intro">
                <p>DON\'T FORGET TO REPLACE ME LATER</p>
            </div>
        </div>  
    </div>
    
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="'.get_post_type_archive_link('program').'">
                    <i class="fa fa-home" aria-hidden="true"></i> All Programs
                </a>
                <span class="metabox__main">'.get_the_title().'</span>
            </p>
        </div>
        <div class="generic-content">'.get_the_content().'</div>';

        $related_professors = new WP_Query([
            'posts_per_page' => -1,
            'post_type' => 'professor',
            'orderby' => 'title',
            'order' => 'ASC',
            'meta_query' => [
                [
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"'.get_the_ID().'"'
                ]
            ]
        ]);

        if ($related_professors->have_posts()) {
            echo '
            <hr class="section-break">
            <h3 class="headline headline--medium">'.get_the_title().' Professors</h3>
            <ul class="professor-cards">';
            while ($related_professors->have_posts()) {
                $related_professors->the_post();
                echo '
                <li class="professor-card__list-item">
                    <a class="professor-card" href="'.get_the_permalink().'">
                        <img class="professor-card__image" src="'.get_the_post_thumbnail_url(null, 'professor_landscape').'" alt="">
                        <span class="professor-card__name">'.get_the_title().'</span>
                    </a>
                </li>
                ';
            }
            echo '</ul>';
        }

        wp_reset_postdata();
        
        $today = date('Ymd');
        $homepage_events = new WP_Query([
            'posts_per_page' => 2,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => [
                // Events that are not in the past
                [
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                ], // If the array of related programs contains the ID number of current program post
                [
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"'.get_the_ID().'"'
                ]
            ]
        ]);

        if ($homepage_events->have_posts()) {
            echo '
            <hr class="section-break">
            <h3 class="headline headline--medium">Upcoming '.get_the_title().' Events</h3>';

            while ($homepage_events->have_posts()) {
                $homepage_events->the_post();
                echo '
            <div class="event-summary">
                <a class="event-summary__date t-center" href="' . get_the_permalink() . '">
                    <span class="event-summary__month">';

                $event_date = new DateTime(get_field('event_date'));
                echo $event_date->format('M');

                echo '
                    </span>
                    <span class="event-summary__day">' . $event_date->format('d') . '</span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny">
                        <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
                    </h5>
                    <p>';

                    if (has_excerpt()) {
                        echo get_the_excerpt();
                    } else {
                        echo wp_trim_words(get_the_content(), 12);
                    }

                        echo '
                        <a href="' . get_the_permalink() . '" class="nu gray">Learn more</a>
                    </p>
                </div>
            </div>';
            }
        }
    echo '
    </div>';
}

get_footer();