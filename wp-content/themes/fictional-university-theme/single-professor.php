<?php

get_header();

while (have_posts()) {
    the_post(); // Keep track of which post we are working with

    echo '
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(';

        $page_banner_img = get_field('page_banner_background_image');
        echo $page_banner_img["sizes"]["page_banner"];
        echo ');">
    
        </div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">' . get_the_title() . '</h1>
            <div class="page-banner__intro">
                <p>'; echo the_field('page_banner_subtitle').'</p>
            </div>
        </div>
    </div>
    
    <div class="container container--narrow page-section"> 
        <div class="generic-content">
            <div class="row group">
                <div class="one-third">
                    '.get_the_post_thumbnail(null, "professor_portrait").'
                </div>
                <div class="two-thirds">
                    '.get_the_content().'
                </div>
            </div>
        </div>';

        $related_programs = get_field('related_programs');

        if ($related_programs) {
            echo '
            <hr class="section-break">
            <h3 class="headline headline--medium">Subject(s) Taught</h3>
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