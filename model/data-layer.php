<?php

/* data-layer.php
 *Return data for the cupcakes app
 *
 */

// Get the indoor for the page
function getIndoor()
{
    return array("tv", "movies", "cooking", "boardgames", "puzzles", "reading", "playingcards", "videogames");
}

// Get the outdoor for the page
function getOutdoor()
{
    return array("hiking", "biking", "swimming", "collecting", "walking", "climbing");
}

function getGender()
{
    return array("male", "female");
}
