<?php 

namespace DBservices;
include_once 'services/connection.php';  use connection;


// Login / Register
function register($obj) {
    // Import DB connection
    extract(connection\getConn());

    // Build query
    $sql = "INSERT INTO `users`(`id`, `email`, `name`, `surname`, `gender`, `provice`, `fevColor`, `birthDate`, `tel`, `password`) 
    VALUES (
        NULL,
        '{$obj['email']}'    ,
        '{$obj['name']}'     ,
        '{$obj['surname']}'  ,
        '{$obj['gender']}'   ,
        '{$obj['provice']}'  ,
        '{$obj['favColor']}' ,
        '{$obj['birthDate']}',
        '{$obj['tel']}'      ,
        SHA2('{$obj['password']}', 256)
    )";

    // Insert user
    $conn->query($sql);
    $id_user = $conn->insert_id;

    // Add leanguages user_leanguages
    foreach ($obj['languagesCodes'] as $code) {
        $sql = "
            INSERT INTO `users_languages` (`id`, `id_user`, `code_language`) 
            VALUES (NULL, '$id_user','$code')";
        $conn->query($sql);
    }

    // var_dump($user_id);
    // var_dump($obj['languagesCodes']);
    // var_dump($obj);
}

function login($obj) {
    // Import DB connection
    extract(connection\getConn()); 

    // Build query
    $sql = "SELECT COUNT(*) FROM users WHERE email ='{$obj['email']}' AND password = SHA2('{$obj['password']}', 256)";
    $isLogged = (int) $conn->query($sql)->fetch_assoc()['COUNT(*)']; // Is logged ?
    
    return $isLogged;
}

function getUserDataByEmail($obj){
    // Import DB connection
    extract(connection\getConn()); 

    // Build query
    $sql = "SELECT * FROM users WHERE email ='{$obj['email']}'";
    $user = $conn->query($sql)->fetch_assoc(); // Extract data
    return $user;
}

function logout() {
    // Disable session 
    session_start();
    setcookie('PHPSESSID', '', -3600, '/');
    session_destroy();

    // Go to home
    header("Refresh:0, url=index.php?nextpage=login");
}

// Database page
function getTables() {
    extract(connection\getConn());   // Import DB connection

    $sql = "SHOW TABLES";
    $result = $conn->query($sql); 
    $tables = array();
    
    while ($row = $result->fetch_assoc()) array_push($tables, $row["Tables_in_amara_db"]); // Extract data
    return $tables;
}

function getTableData() {
    extract(connection\getConn());  // Import DB connection

    /*
        // completare tutto le relations
        SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'amara_db';
        SELECT * FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = 'amara_db';
        SELECT * FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = 'amara_db' AND TABLE_NAME = 'users';
    */

    $tableNames = getTables();
    $tableResults = array();
    // print_r($tableNames);

    foreach ($tableNames as $name) {
        $result = $conn->query("SELECT * FROM `$name` LIMIT  5");
        $table = array();

        // Fetch result DB ALL table
        while ($row = $result->fetch_assoc()) array_push($table, $row); // Extract data  
        array_push($tableResults, $table);

    }

    return array("tableNames" => $tableNames, "results" => $tableResults);
}