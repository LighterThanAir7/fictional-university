<?php

get_header();
page_banner();

while (have_posts()) {
    the_post(); // Keep track of which post we are working with

    echo '   
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="'.site_url("/blog").'">
                    <i class="fa fa-home" aria-hidden="true"></i> Blog Home
                </a>
                <span class="metabox__main">Posted by '.get_the_author_posts_link().' on '.get_the_time('j/n/y').' in '.get_the_category_list(', ').'</span>
            </p>
        </div>
        <div class="generic-content">
           ' . get_the_content() . '
        </div>
    </div>';
}

get_footer();