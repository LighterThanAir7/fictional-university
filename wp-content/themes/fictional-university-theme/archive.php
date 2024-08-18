<?php

get_header();
page_banner([
    'title' => get_the_archive_title(),
    'subtitle' => get_the_archive_description(),
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
    echo '
    <div class="post-item">
        <h2 class="headline headline--medium headline--post-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>
        <div class="metabox">
            <p>Posted by '.get_the_author_posts_link().' on '.get_the_time('j/n/y').' in '.get_the_category_list(', ').'</p>
        </div>
        <div class="generic-content">';
            the_excerpt();
            echo '
            <p><a class="btn btn--blue" href="'.get_the_permalink().'">Continue reading &raquo;</a></p>
        </div> 
    </div>';
}

    echo paginate_links();

    echo '
</div>';

get_footer();