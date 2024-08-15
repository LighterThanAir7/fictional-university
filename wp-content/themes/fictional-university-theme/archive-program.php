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
        <h1 class="page-banner__title">All Programs</h1>
        <div class="page-banner__intro">
            <p>There is something for everyone. Have a look around.</p>
        </div>
    </div>  
</div>

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