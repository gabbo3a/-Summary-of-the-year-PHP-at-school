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
            // session_destroy(); 
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


