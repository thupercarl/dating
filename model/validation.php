<?php

/* validation.php
 * validate data for the dating app
 *
 */
class Validation
{
    static function validName($name)
    {
        return ctype_alpha($name);//check if alphabetic
    }

    static function validAge($age)
    {
        if($age >= 18 && $age <= 118)
        {
            return true;
        }
        return false;
    }

    static function validPhone($phone)
    {
        return strLen(trim($phone)) == 10;
    }

    static function validEmail($email)
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

    static function validOutdoor($outdoor)
    {
        $validChoices = DataLayer::getOutdoor();

        //Make sure each selected choice is valid
        foreach ($outdoor as $activity) {
            if (!in_array($activity, $validChoices)) {
                return false;
            }
        }
        //all choices are valid
        return true;
    }

    static function validIndoor($indoor)
    {
        $validChoices = DataLayer::getIndoor();

        //Make sure each selected choice is valid
        foreach ($indoor as $activity) {
            if (!in_array($activity, $validChoices)) {
                return false;
            }
        }
        //all choices are valid
        return true;
    }
}


