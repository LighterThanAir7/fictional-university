<?php

get_header();
page_banner([
    'title' => 'All Events',
    'subtitle' => 'See what is going on in our world.',
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

while (have_posts()) {
    the_post();
    get_template_part('templates/event');
}

    echo paginate_links();

    echo '
    <hr class="section-break">
    <p>Looking for a recap of past events? <a href="'.site_url("/past-events").'">Check our our past events archive.</a></p>
</div>';

get_footer();