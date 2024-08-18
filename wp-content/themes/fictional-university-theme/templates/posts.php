<?php

echo '
<div class="event-summary">
    <a class="event-summary__date event-summary__date--beige t-center" href="'.get_the_permalink().'">
        <span class="event-summary__month">'.get_the_time("M").'</span>
        <span class="event-summary__day">'.get_the_time("d").'</span>
    </a>
    <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny">
            <a href="'.get_the_permalink().'">'.get_the_title().'</a>
        </h5>
        <p>';

            // If has handmade excerpt
            if (has_excerpt()) {
                echo get_the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 12);
            }

            echo '
            <a href="'.get_the_permalink().'" class="nu gray">Read more</a>
        </p>
    </div>
</div>';
