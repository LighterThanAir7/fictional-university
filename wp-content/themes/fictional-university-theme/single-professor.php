<?php

get_header();
page_banner();

while (have_posts()) {
    the_post(); // Keep track of which post we are working with
    echo '
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