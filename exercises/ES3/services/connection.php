<?php namespace connection; use mysqli?>

<?php
    // Roba pazza senza senso
    function getConn() {

        // Data for connection db
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "amara_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname) or die(mysqli_error());
        return compact('conn');
    }
