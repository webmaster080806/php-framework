<?php

// Load bootstrap to apply configuration
include('config/bootstrap.php');

// Process URL into Application routing parameters
$route = new route();

// Start session to track user
session_start();

// Intitalize Flash Message
$_SESSION['flashMessage'] = null;


// User security check
defined('APP_AUTH_TYPE') or
    die ("Configuration Setting: APP_AUTH_TYPE is not set.");
if ( 0 !== APP_AUTH_TYPE && !isset($_SESSION['username']) && 'auth' != $route->getController() ) {
     $_SESSION = 0;
     session_destroy();
     session_start();
     header ( 'Location: ' . APP_DOC_ROOT . '/auth/login' );
}

// Route request to desired controller
switch ( $route->getController() ) {

    case 'auth':
        include( APP_CONTROLLER . '/authController.php');
        break;
        
    case 'blog':
        include( APP_CONTROLLER . '/blogController.php');
        break;

    case 'home':
        include( APP_CONTROLLER . '/homeController.php');
        break;

    default:
        include( APP_CONTROLLER . '/homeController.php');
        break;
}
