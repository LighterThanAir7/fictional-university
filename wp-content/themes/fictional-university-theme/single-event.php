<?php

get_header();

while (have_posts()) {
    the_post(); // Keep track of which post we are working with

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
    
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="'.get_post_type_archive_link('event').'">
                    <i class="fa fa-home" aria-hidden="true"></i> Events Home
                </a>
                <span class="metabox__main">'.get_the_title().'</span>
            </p>
        </div>
        <div class="generic-content">'.get_the_content().'</div>';

        $related_programs = get_field('related_programs');

        if ($related_programs) {
            echo '
            <hr class="section-break">
            <h3 class="headline headline--medium">Related Programs(s)</h3>
            <ul class="link-list min-list">';

                foreach ($related_programs as $program) {
                    echo '<li><a href="'.get_the_permalink($program).'">'.get_the_title($program).'</a></li>';
                }
            echo '     
            </ul>';
        }
        echo '
       
    </div>';
}

get_footer();