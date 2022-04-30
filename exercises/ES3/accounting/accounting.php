<?php namespace accounting; ?>

<?php

    // stato delle app gestioto con cookie

    // tracking last page function
    function setLastPage($lastPage) {
        setcookie('lastpage', $lastPage, time() + (86400 * 30), "/"); // mettere time
    }

    // tracking next page function
    function setNextPage($nextpage) {
        setcookie('nextpage', $nextpage, time() + (86400 * 30), "/");
    }

    // mettere spiegazione
?>