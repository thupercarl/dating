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
    if($age >= 18 && $age <= 118)
    {
        return true;
    }
    return false;
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
    //all choices are valid
    return true;
}

function validIndoor($indoor)
{
    $validChoices = getIndoor();

    //Make sure each selected choice is valid
    foreach ($indoor as $activity) {
        if (!in_array($activity, $validChoices)) {
            return false;
        }
    }
    //all choices are valid
    return true;
}
