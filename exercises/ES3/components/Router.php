<?php namespace Router; ?>

<?php function Router() {
    // Where were you ? (Simple routing with $_REQUEST)
    $lastPageReq = isset($_REQUEST['lastpage']) ? $_REQUEST['lastpage'] : '';
    $nextPageReq = isset($_REQUEST['nextpage']) ? $_REQUEST['nextpage'] : '';

    // cycle 
    $isLogged = true;
    $noLoggedPages = array("register", "login", "freeEmail");
    foreach ($noLoggedPages as $noPage) {
        if($noPage == $nextPageReq) {
            $isLogged = false;
            // Non mi fa distriggere la sessione 😭
            // unset($_COOKIE['PHPSESSID']); // print_r($_COOKIE);
            break;
        }
    }
 
    // Return utils data
    return array(
        "isLogged" => $isLogged,
        "lastPageReq" => $lastPageReq, 
        "nextPageReq" => $nextPageReq 
    );
} ?>


