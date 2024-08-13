<?php

function greeting ($name, $color): void
{
    echo '<p>Hi, my name is '.$name.' and my favourite color is '.$color.'.</p>';
}

greeting('John', 'red');
greeting('Jane', 'blue');

$blog_name = get_bloginfo('name');
$tagline = get_bloginfo('description');

echo '
    <h1>'.$blog_name.'</h1>
    <p>'.$tagline.'</p>
';