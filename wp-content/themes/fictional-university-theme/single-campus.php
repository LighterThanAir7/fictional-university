<?php

get_header();
page_banner();

while (have_posts()) {
    the_post(); // Keep track of which post we are working with

    echo '    
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="'.get_post_type_archive_link('campus').'">
                    <i class="fa fa-home" aria-hidden="true"></i> All Campuses
                </a>
                <span class="metabox__main">'.get_the_title().'</span>
            </p>
        </div>
        <div class="generic-content">'.get_the_content().'</div>
        
        <div class="acf-map">';
            $map_location = get_field('map_location');
            $lat = $map_location['lat'];
            $lng = $map_location['lng'];

            echo '
            <div class="marker" data-lat="'.$lat.'" data-lng="'.$lng.'">
                <h3>'.get_the_title().'</h3>
                '.$map_location['address'].'
            </div>
            ';
        echo '</div>';

    $related_programs = new WP_Query([
        'posts_per_page' => -1,
        'post_type' => 'program',
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => [
            [
                'key' => 'related_campuses',
                'compare' => 'LIKE',
                'value' => '"'.get_the_ID().'"'
            ]
        ]
    ]);

    if ($related_programs->have_posts()) {
        echo '
        <hr class="section-break">
        <h3 class="headline headline--medium">Programs Available At This Campus</h3>
        <ul class="min-list link-list">';
        while ($related_programs->have_posts()) {
            $related_programs->the_post();
            echo '
                <li>
                    <a href="'.get_the_permalink().'">'.get_the_title().'</a>
                </li>
                ';
        }
        echo '</ul>';
    } echo '
    </div>';
}

get_footer();