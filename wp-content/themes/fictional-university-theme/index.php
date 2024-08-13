<?php

get_header();

echo '
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(' . get_theme_file_uri('/images/ocean.jpg') . ');"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">Welcome to our blog</h1>
      <div class="page-banner__intro">
        <p>Keep up with our latest news</p>
      </div>
    </div>  
</div>

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
</div>

';

get_footer();