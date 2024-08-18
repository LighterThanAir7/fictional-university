<?php

get_header();
page_banner([
    'title' => 'Past Events',
    'subtitle' => 'Recap of our past events.',
]);

// More custom made titles for the archives
// - using get_the_archive_title(); now for simplicity

$title = "";
if (is_category()) {
    $title = single_cat_title("", false);
}

if (is_author()) {
    $title = "Posts by ".get_the_author();
}

if (is_year()) {
    $title = "Posts by year";
}

if (is_month()) {
    $title = "Posts by month";
}

if (is_day()) {
    $title = "Posts by day";
}

echo '
<div class="container container--narrow page-section">';

$today = date('Ymd');
$past_events = new WP_Query([
    'paged' => get_query_var('paged', 1), // Which page of results should this be, depending on the number in URL, 2nd argument 1 is fallback page number
    'posts_per_page' => 1,
    'post_type' => 'event',
    'meta_key' => 'event_date',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => [
        [
            'key' => 'event_date',
            'compare' => '<=',
            'value' => $today,
            'type' => 'DATE' // numeric because we are comparing two numbers, or use DATE
        ]
    ]
]);

while ($past_events->have_posts()) {
    $past_events->the_post();
    get_template_part('templates/event');
}

echo paginate_links([
    'total' => $past_events->max_num_pages,
]);

echo '
</div>';

get_footer();