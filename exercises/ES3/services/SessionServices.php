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
        // print_r( $userData);
        $_SESSION['email']      =  $userData['email'];
        $_SESSION['username']   =  $userData['username'];

        switch ($userData['gender']) {
            case 'm': $_SESSION['gender'] = 'male';   break;
            case 'f': $_SESSION['gender'] = 'female'; break;
            case 'o': $_SESSION['gender'] = 'other';  break;
        }

        $_SESSION['province']   =  $userData['province'];
        $_SESSION['fevColor']   =  $userData['fevColor'];


        $date = explode( '-', $userData['birthDate']);
        $_SESSION['birthDate']  = "$date[2]/$date[1]/$date[0]";

        $_SESSION['tel']        =  $userData['tel'];
        
        // Redirect on home
        header("Refresh:0, url=index.php?nextpage=home");
    }
}

function sessionUserUnset($obj) {
    session_unset();
}