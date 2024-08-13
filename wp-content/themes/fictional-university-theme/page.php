<?php

get_header();

while (have_posts()) {
    the_post();

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

    <div class="container container--narrow page-section">';

    $parent_id = wp_get_post_parent_id(get_the_ID());

    if ($parent_id) {
        echo '
        <!--Show only if the current page being viewed is a child page-->
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="'.get_permalink($parent_id).'">
                    <i class="fa fa-home" aria-hidden="true"></i> Back to '.get_the_title($parent_id).'
                </a>
                <span class="metabox__main">' . get_the_title() . '</span>
            </p>
        </div>';
    }

    // If current page has children, returns array of children, if it doesn't return 0
    $is_parent_page = get_pages([
        'child_of' => get_the_ID(),
    ]);

    // If curret page has a parent || is if it is a parent
    if ($parent_id || $is_parent_page) {
        echo '
        <div class="page-links">
            <h2 class="page-links__title">
                <a href="' . get_permalink($parent_id) . '">' . get_the_title($parent_id) . '</a>
            </h2>
            <ul class="min-list">'; // If current page has a parent, do something...
            if ($parent_id) {
                $children_of = $parent_id;
            } else {
                $children_of = get_the_ID();
            }
            wp_list_pages([
                'title_li' => false, // small awkward title "Pages"
                'child_of' => $children_of,
            ]);
            echo '
            </ul>
        </div>';
    }

    echo '
    <div class="generic-content">
      ' . get_the_content() . '
    </div>
  </div>';
}

get_footer();

?>