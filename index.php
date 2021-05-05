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
    //display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /personal', function(){
    //if the form has been submitted, add the data to session
    //and send the user to the next order form

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //var_dump($_POST);
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



        //TODO:TAILOR THIS TO INTERESTS PAGE
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seeking'] = $_POST['seeking'];
        $_SESSION['biography'] = $_POST['biography'];

        //data validation goes here
        $_SESSION['conds'] = implode(', ', $_POST['conds']);
        header('location: summary');
    }
    //Display the profile page
    $view = new Template();
    echo $view->render('views/interests.html');
});

//run fat-free
$f3->run();