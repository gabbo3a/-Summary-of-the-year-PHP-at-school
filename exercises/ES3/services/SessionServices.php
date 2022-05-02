<?php 

namespace SessionServices;
include_once 'services/connection.php';          use connection;
include_once 'services/DBservices.php';          use DBservices;
include_once 'components/PopUps/ErrorPopup.php'; use ErrorPopup;

function sessionCheck() {
    // Check session is started
    if (!isset($_COOKIE['PHPSESSID'])) {
        ErrorPopup\ErrorPopup("Non sei loggato contollo sessione");
        return false;
    }
    return true;
}

function sessionUserSetUp($obj) {
    session_start();  // Start the session if good login

    // Set session data
    if(isset($obj)) {
        $userData = DBservices\getUserDataByEmail($obj);    // query
        $_SESSION['email']      =  $userData['email'];
        $_SESSION['name']       =  $userData['name'];
        $_SESSION['name']       =  $userData['name'];
        $_SESSION['gender']     =  $userData['gender'];
        $_SESSION['provice']    =  $userData['provice'];
        $_SESSION['fevColor']   =  $userData['fevColor'];
        $_SESSION['birthDate']  =  $userData['birthDate'];
        $_SESSION['tel']        =  $userData['tel'];
        
        // Redirect on home
        header("Refresh:0, url=index.php?nextpage=home");
    }
}

function sessionUserUnset($obj) {
    session_unset();
}












