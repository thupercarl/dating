<?php

/* validation.php
 * validate data for the dating app
 *
 */

function validName($name)
{
    return ctype_alpha($name);//check if alphabetic
}

function validAge($age)
{
    return ctype_digit($age);
}

function validPhone($phone)
{
    return strLen(trim($phone)) == 10;
}

function validEmail($email)
{
    if(strpos($email, "@") && strpos($email,"."))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function validOutdoor($outdoor)
{
    $validChoices = getOutdoor();

    //Make sure each selected choice is valid
    foreach ($outdoor as $activity) {
        if (!in_array($activity, $validChoices)) {
            return false;
        }
    }
    return true;
}

function validIndoor($indoor)
{
    $validChoices = getOutdoor();

    //Make sure each selected choice is valid
    foreach ($indoor as $activity) {
        if (!in_array($activity, $validChoices)) {
            return false;
        }
    }
    return true;
}
