<?php

//this is my controller for the dating project
ini_set('display_errors',1);
error_reporting(E_ALL);

//Start a session
session_start();

//require autoload file
require_once('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validation.php');

//instantiate fat-free
$f3 = Base::instance();

//define default route
$f3->route('GET /', function(){
    $_SESSION = array();
    //display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});//**********************************************************************************************************END ROUTE

$f3->route('GET|POST /personal', function($f3){
    //var_dump($_POST);
    //if the form has been submitted, add the data to session
    //and send the user to the next order form

    if($_SERVER['REQUEST_METHOD'] == 'POST') {



        //******************************************************START VALIDATION
        //******************************************************FIRST NAME
        $fname = $_POST['fname'];
        //If name is valid, store data
        if(validName($fname)) {
            $_SESSION['fname'] = $fname;
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["fname"]', 'Please enter a name');
        }
        //******************************************************LAST NAME
        $lname = $_POST['lname'];
        //If name is valid, store data
        if(validName($lname)) {
            $_SESSION['lname'] = $lname;
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["lname"]', 'Please enter a name');
        }
        //******************************************************AGE
        $age = $_POST['age'];
        //If age is valid, store data
        if(validAge($age)) {
            $_SESSION['age'] = $age;
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["age"]', 'Please enter your age');
        }
        //******************************************************PHONE
        $phone = $_POST['phone'];
        //If phone number is valid, store data
        if(validPhone($phone)) {
            $_SESSION['phone'] = $phone;
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["email"]', 'Please enter a valid email address');
        }
        //******************************************************END VALIDATION



        //Grab gender data
        $_SESSION['gender'] = $_POST['gender'];



        //******************************************************CHECK HIVE FOR ERRORS
        //If the error array is empty, redirect to profile page
        if (empty($f3->get('errors'))) {
            header('location: profile');
        }
    }//END POST IF



    //Display the personal_info page
    $view = new Template();
    echo $view->render('views/personal_info.html');
});//**********************************************************************************************************END ROUTE

$f3->route('GET|POST /profile', function($f3){
    //if the form has been submitted, add the data to session
    //and send the user to the next order form

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //var_dump($_POST);



        //******************************************************START VALIDATION
        //******************************************************EMAIL
        $email = $_POST['email'];
        //If email is valid, store data
        if(validEmail($email)) {
            $_SESSION['email'] = $email;
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["email"]', 'Please enter a valid email address');
        }
        //******************************************************END VALIDATION



        //Grab state, seeking and biography data
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seeking'] = $_POST['seeking'];
        $_SESSION['biography'] = $_POST['biography'];



        //******************************************************CHECK HIVE FOR ERRORS
        //If the error array is empty, redirect to interests page
        if (empty($f3->get('errors'))) {
            header('location: interests');
        }
    }//END POST IF



    //Display the profile_info page
    $view = new Template();
    echo $view->render('views/profile.html');
});//**********************************************************************************************************END ROUTE

$f3->route('GET|POST /interests', function($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //var_dump($_POST);



        //******************************************************START VALIDATION
        //******************************************************OUTDOOR
        $outdoor = $_POST['outdoor'];
        //If array is valid, store data
        if(!empty($outdoor) && validOutdoor($outdoor)) {
            $_SESSION['outdoor'] = implode(', ', $_POST['outdoor']);
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["outdoor"]', 'Please select valid answers');
        }
        //******************************************************INDOOR
        $indoor = $_POST['indoor'];
        //If array is valid, store data
        if(!empty($indoor) && validIndoor($indoor)) {
            $_SESSION['indoor'] = implode(', ', $_POST['indoor']);
        }
        //Otherwise, set an error variable in the hive
        else {
            $f3->set('errors["indoor"]', 'Please select valid answers');
        }
        //******************************************************END VALIDATION



        //******************************************************CHECK HIVE FOR ERRORS
        //If the error array is empty, redirect to summary page
        if (empty($f3->get('errors'))) {
            header('location: summary');
        }
    }
    //Display the profile page
    $view = new Template();
    echo $view->render('views/interests.html');
});//**********************************************************************************************************END ROUTE

$f3->route('GET /summary', function(){
    //Display the summary page
    //var_dump($_SESSION);
    $view = new Template();
    echo $view->render('views/summary.html');
});//**********************************************************************************************************END ROUTE

//run fat-free
$f3->run();