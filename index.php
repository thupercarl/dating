<?php

//this is my controller for the dating project
ini_set('display_errors',1);
error_reporting(E_ALL);

//Start a session
session_start();

//require autoload file
require_once('vendor/autoload.php');

//instantiate fat-free
$f3 = Base::instance();

//define default route
$f3->route('GET /', function(){
    $_SESSION = array();
    //display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /personal', function(){
    //var_dump($_POST);
    //if the form has been submitted, add the data to session
    //and send the user to the next order form

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['phone'] = $_POST['phone'];
        header('location: profile');
    }

    //Display the personal_info page
    $view = new Template();
    echo $view->render('views/personal_info.html');
});

$f3->route('GET|POST /profile', function(){
    //if the form has been submitted, add the data to session
    //and send the user to the next order form

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //var_dump($_POST);
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seeking'] = $_POST['seeking'];
        $_SESSION['biography'] = $_POST['biography'];
        header('location: interests');
    }

    //Display the profile_info page
    $view = new Template();
    echo $view->render('views/profile.html');
});

$f3->route('GET|POST /interests', function(){

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //var_dump($_POST);

        //data validation goes here
        $_SESSION['indoor'] = implode(', ', $_POST['indoor']);
        $_SESSION['outdoor'] = implode(', ', $_POST['outdoor']); //Takes array and converts into delimited string
        header('location: summary');
    }
    //Display the profile page
    $view = new Template();
    echo $view->render('views/interests.html');
});

$f3->route('GET /summary', function(){
    //Display the summary page
    var_dump($_SESSION);
    $view = new Template();
    echo $view->render('views/summary.html');
});

//run fat-free
$f3->run();