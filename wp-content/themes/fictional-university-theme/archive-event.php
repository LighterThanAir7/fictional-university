<?php

get_header();

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
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(' . get_theme_file_uri('/images/ocean.jpg') . ');"></div>
    <div class="page-banner__content container container--narrow">
        <!--<h1 class="page-banner__title">.$title.</h1>-->
        <h1 class="page-banner__title">All Events</h1>
        <div class="page-banner__intro">
            <p>See what is going on in our world</p>
        </div>
    </div>  
</div>

<div class="container container--narrow page-section">';

while (have_posts()) {
    the_post();
    echo '
    <div class="event-summary">
        <a class="event-summary__date t-center" href="'.get_the_permalink().'">
            <span class="event-summary__month">'.get_the_time("M").'</span>
            <span class="event-summary__day">'.get_the_time("d").'</span>
        </a>
        <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny">
                <a href="'.get_the_permalink().'">'.get_the_title().'</a>
            </h5>
            <p>'.wp_trim_words(get_the_content(), 20).'
                <a href="'.get_the_permalink().'" class="nu gray">Read more</a>
            </p>
        </div>
    </div>
    ';
}

    echo paginate_links();

    echo '
</div>';

get_footer();