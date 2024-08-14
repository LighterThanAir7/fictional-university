<?php

// Custom query to get latest 2 posts

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

if ($homepage_events->have_posts()) {
    while ($homepage_events->have_posts()) {
        $homepage_events->the_post();
        echo '
        <div class="event-summary">
            <a class="event-summary__date t-center" href="'.get_the_permalink().'">
                <span class="event-summary__month">';

                $event_date = new DateTime(get_field('event_date'));
                echo $event_date->format('M');

                echo '
                </span>
                <span class="event-summary__day">'.$event_date->format('d').'</span>
            </a>
            <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny">
                    <a href="'.get_the_permalink().'">'.get_the_title().'</a>
                </h5>
                <p>';

                    if (has_excerpt()) {
                        echo get_the_excerpt();
                    } else {
                        echo wp_trim_words(get_the_content(), 12);
                    }

                    echo '
                    <a href="'.get_the_permalink().'" class="nu gray">Learn more</a>
                </p>
            </div>
        </div>';
    }
    wp_reset_postdata();
} else {
    echo '<p>No events found.</p>';
}