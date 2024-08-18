<?php

echo '
<div class="event-summary">
    <a class="event-summary__date t-center" href="'.get_the_permalink().'">
        <span class="event-summary__month">';

        $event_date = new DateTime(get_field('event_date'));
        echo $event_date->format('M');

        echo '
        </span>
        <span class="event-summary__day">'.$event_date->format('d').'</span>
    </a>
    <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny">
            <a href="'.get_the_permalink().'">'.get_the_title().'</a>
        </h5>
        <p>';

            if (has_excerpt()) {
                echo get_the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 12);
            }

            echo '
            <a href="'.get_the_permalink().'" class="nu gray">Learn more</a>
        </p>
    </div>
</div>';