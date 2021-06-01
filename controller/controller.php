<?php

//Controller class for Dating site

/**
 * Class Controller
 * This class handles all index-related functions
 */
class Controller
{
    private $_f3; //router

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        //display the home page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personal()
    {
        //reinitialize session array
        $_SESSION = array();
        //var_dump($_POST);
        //if the form has been submitted, add the data to session
        //and send the user to the next order form


        $userGender = "";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $isPremium = $_POST['optin'];
            if(isset($_POST['optin']))
            {
                $_SESSION['member'] = new PremiumMember();
                $isPremium = true;
            }
            else
            {
                $_SESSION['member'] = new Member();
                $isPremium = false;
            }
            //var_dump($_POST);
            //die();
            $_SESSION['ispremium'] = $isPremium;

            $userGender = $_POST['gender'];
            $_SESSION['member']->setGender($userGender);

            //******************************************************START VALIDATION
            //******************************************************FIRST NAME
            $fname = $_POST['fname'];
            //If name is valid, store data
            if(Model::validName($fname)) {
                $_SESSION['member']->setFname($fname);
            }
            //Otherwise, set an error variable in the hive
            else {
                $this->_f3->set('errors["fname"]', 'Please enter a name');
            }
            //******************************************************LAST NAME
            $lname = $_POST['lname'];
            //If name is valid, store data
            if(Model::validName($lname)) {
                $_SESSION['member']->setLname($lname);
            }
            //Otherwise, set an error variable in the hive
            else {
                $this->_f3->set('errors["lname"]', 'Please enter a name');
            }
            //******************************************************AGE
            $age = $_POST['age'];
            //If age is valid, store data
            if(Model::validAge($age)) {
                $_SESSION['member']->setAge($age);
            }
            //Otherwise, set an error variable in the hive
            else {
                $this->_f3->set('errors["age"]', 'Please enter your age');
            }
            //******************************************************PHONE
            $phone = $_POST['phone'];
            //If phone number is valid, store data
            if(Model::validPhone($phone)) {
                $_SESSION['member']->setPhone($phone);
            }
            //Otherwise, set an error variable in the hive
            else {
                $this->_f3->set('errors["phone"]', 'Please enter a valid phone number (10 digits no dashes)');
            }
            //******************************************************END VALIDATION



            //******************************************************CHECK HIVE FOR ERRORS
            //If the error array is empty, redirect to profile page
            if (empty($this->_f3->get('errors'))) {
                header('location: profile');
            }
        }//END POST IF

        //add gender to hive
        $this->_f3->set('gender', DataLayer::getGender());
        $this->_f3->set('userGender', $userGender);
        //$this->_f3->set('isPremium', $isPremium);


        //Display the personal_info page
        $view = new Template();
        echo $view->render('views/personal_info.html');
    }

    function profile()
    {
        //if the form has been submitted, add the data to session
        //and send the user to the next order form

        $userSeeking = "";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($_POST);

            $userSeeking = $_POST['seeking'];
            $_SESSION['member']->setSeeking($userSeeking);


            //******************************************************START VALIDATION
            //******************************************************EMAIL
            $email = $_POST['email'];
            //If email is valid, store data
            if(Model::validEmail($email)) {
                $_SESSION['member']->setEmail($email);
            }
            //Otherwise, set an error variable in the hive
            else {
                $this->_f3->set('errors["email"]', 'Please enter a valid email address');
            }
            //******************************************************END VALIDATION



            //Grab state, seeking and biography data
            $state = $_POST['state'];
            $_SESSION['member']->setState($state);
            //$_SESSION['seeking'] = $_POST['seeking'];
            $bio = $_POST['biography'];
            $_SESSION['member']->setBio($bio);




            //******************************************************CHECK HIVE FOR ERRORS
            //If the error array is empty, redirect to interests page
            if (empty($this->_f3->get('errors'))) {
                header('location: interests');
            }
        }//END POST IF

        //add seeking to hive
        $this->_f3->set('seeking', DataLayer::getGender());
        $this->_f3->set('userSeeking', $userSeeking);

        //Display the profile_info page
        $view = new Template();
        echo $view->render('views/profile.html');
    }

    function interests()
    {
        $userIndoor = array();
        $userOutdoor = array();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($_POST);



            //******************************************************START VALIDATION
            //******************************************************OUTDOOR
            if (!empty($_POST['outdoor'])) {

                $userOutdoor = $_POST['outdoor'];
                //If array is valid, store data
                if (Model::validOutdoor($userOutdoor)) {
                    $_SESSION['member']->setOutDoorInterests(implode(', ', $userOutdoor));
                } //Otherwise, set an error variable in the hive
                else {
                    $this->_f3->set('errors["outdoor"]', 'Please select valid answers');
                }
            }
            //******************************************************INDOOR
            if (!empty($_POST['indoor'])) {

                $userIndoor = $_POST['indoor'];
                //If array is valid, store data
                if (Model::validIndoor($userIndoor)) {
                    $_SESSION['member']->setInDoorInterests(implode(', ', $userIndoor));
                } //Otherwise, set an error variable in the hive
                else {
                    $this->_f3->set('errors["indoor"]', 'Please select valid answers');
                }
            }
            //******************************************************END VALIDATION



            //******************************************************CHECK HIVE FOR ERRORS
            //If the error array is empty, redirect to summary page
            if (empty($this->_f3->get('errors'))) {
                header('location: summary');
            }
        }

        //add all array variables to hive
        $this->_f3->set('indoorArray',DataLayer::getIndoor());
        $this->_f3->set('userChoiceIn', $userIndoor);
        $this->_f3->set('outdoorArray',DataLayer::getOutdoor());
        $this->_f3->set('userChoiceOut', $userOutdoor);

        //Display the profile page
        $view = new Template();
        echo $view->render('views/interests.html');
    }

    function summary()
    {
        //Display the summary page
        //var_dump($_SESSION);
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}
