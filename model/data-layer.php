<?php

/* data-layer.php
 *Return data for the cupcakes app
 *
 */
class DataLayer
{
// Get the indoor for the page
    static function getIndoor()
    {
        return array("tv", "movies", "cooking", "boardgames", "puzzles", "reading", "playingcards", "videogames");
    }

// Get the outdoor for the page
    static function getOutdoor()
    {
        return array("hiking", "biking", "swimming", "collecting", "walking", "climbing");
    }

    static function getGender()
    {
        return array("male", "female");
    }
}

