<?php

get_header();
page_banner([
    'title' => 'All Programs',
    'subtitle' => 'There is something for everyone. Have a look around.',
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
<div class="container container--narrow page-section">
    <ul class="link-list min-list">';

    while (have_posts()) {
        the_post();
        echo '
        <li><a href="'.get_permalink().'">'.get_the_title().'</a></li>
        ';
    }
    echo '</ul>';
    echo paginate_links();
    echo '
</div>';

get_footer();