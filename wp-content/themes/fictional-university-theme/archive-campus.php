<?php

get_header();
page_banner([
    'title' => 'Our Campuses',
    'subtitle' => 'We have several conviniently located campuses.',
]);

echo '
<div class="container container--narrow page-section">
    <div class="acf-map">';

    while (have_posts()) {
        the_post();

        $map_location = get_field('map_location');
        $lat = $map_location['lat'];
        $lng = $map_location['lng'];

        echo '
        <div class="marker" data-lat="'.$lat.'" data-lng="'.$lng.'">
            <h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
            '.$map_location['address'].'
        </div>
        ';
    }
echo '</div>
</div>';

get_footer();