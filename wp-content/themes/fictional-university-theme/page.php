<?php

get_header();

while (have_posts()) {
    the_post();

    page_banner([
        'title' => 'Hello there this is the title',
        'subtitle' => 'Hi, this is the subtitle'
    ]);

    echo '
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