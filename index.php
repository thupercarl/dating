<?php

Header("Cache-Control: max-age=3000, must-revalidate");
//this is my controller for the dating project
ini_set('display_errors',1);
error_reporting(E_ALL);

//require autoload file
require_once('vendor/autoload.php');

//Start a session
session_start();

//instantiate fat-free
$f3 = Base::instance();
$con = new Controller($f3);

//define default route
$f3->route('GET /', function(){
    $GLOBALS['con']->home();
});

$f3->route('GET|POST /personal', function($f3){
    $GLOBALS['con']->personal();
});

$f3->route('GET|POST /profile', function($f3){
    $GLOBALS['con']->profile();
});

$f3->route('GET|POST /interests', function($f3){
    if(($_SESSION['ispremium']))
    {
        $GLOBALS['con']->interests();
    }
    else
    {
        $GLOBALS['con']->summary();
    }

});

$f3->route('GET /summary', function(){
    $GLOBALS['con']->summary();
});

//run fat-free
$f3->run();