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

// 
function getTableRelations($table) {
    extract(connection\getConn());   // Import DB connection

    $sql = "SELECT * 
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
            WHERE TABLE_SCHEMA = 'amara_db' 
                AND TABLE_NAME = '$table';";
    
    $result = $conn->query($sql); 
    
    $descriptors = array();
    while ($row = $result->fetch_assoc()) { // Extract data
        if ($row['REFERENCED_TABLE_NAME'] != NULL) {
            $d = array(
                "TABLE_NAME" => "$table", // troppo
                "COLUMN_NAME" => $row['COLUMN_NAME'],
                "REFERENCED_TABLE_NAME" => $row['REFERENCED_TABLE_NAME'],
                "REFERENCED_COLUMN_NAME" => $row['REFERENCED_COLUMN_NAME'],
            );
            array_push($descriptors, $d);
        }
    }
    
    // print_r($descriptors);
    // print_r($descriptors[0]['REFERENCED_TABLE_NAME'] === null);  
    return $descriptors;
}

// get all filedl meno quelli di relazione
function getFields($table) {
    extract(connection\getConn());   // Import DB connection

    $sql = "SELECT COLUMN_NAME 
            FROM INFORMATION_SCHEMA.COLUMNS 
            WHERE TABLE_NAME = '$table' AND TABLE_SCHEMA = 'amara_db';";
    $result = $conn->query($sql);

    $fields = array();
    while ($row = $result->fetch_assoc()) {
        $column = $row['COLUMN_NAME'];
        array_push($fields, "$table.$column");
    }  
    return $fields;
}


function getTableData() {
    extract(connection\getConn());  // Import DB connection

    $tableNames = getTables();
    $tableResults = array();

    foreach ($tableNames as $name) {
        $descriptors = getTableRelations($name);

        // Build query with dymamic inner join
        $part1 = NULL;
        $part2 = "";
    
        foreach ($descriptors as $desc) {
            // chacing tabelle gia inserite 🍆

            // Extract relations data 
            $table2 = $desc['REFERENCED_TABLE_NAME'];
            $foreign_key = $desc['COLUMN_NAME'];
            $primary_key = $desc['REFERENCED_COLUMN_NAME'];

            // Get fields each table 
            $fields = getFields($name);
            $fields_table2 = getFields($table2);
        
            // Add print field and reduce repete data
            foreach ($fields as $field) $part1 .=  "$field AS `$field`, ";
            foreach ($fields_table2 as $field) {
                if ($field !== "$table2.$primary_key") 
                    $part1 .=  "$field AS `$field`, ";
            }

            // Add relations
            $part2 .= "INNER JOIN $table2 ON $name.$foreign_key = $table2.$primary_key ";
        }
        
        // End build query
        if ($part1 === NULL)  $part1 = "SELECT * ";
        else $part1 = "SELECT " . substr($part1, 0, -2);
        $part1 .= " FROM `$name`";
        $part2 .= "LIMIT  2; ";
        $sql = $part1 . $part2;
        
        // Fetch result DB ALL table
        $table = array();
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) array_push($table, $row); // Extract data
        array_push($tableResults, $table);
    }

    // print_r("<pre>".print_r($tableResults, true)."</pre>");
    return array("tableNames" => $tableNames, "results" => $tableResults);
}


/*          
    print_r("$name => <br> ");
    // print_r($sql ."<br><br>");
    // continue; // break;
    //  print("<pre>".print_r($row , true)."</pre>");
*/

/*
    // completare tutto le relations
    SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'amara_db';
    SELECT * FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = 'amara_db';
    SELECT * FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = 'amara_db' AND TABLE_NAME = 'users';

    // Tipo di risposta 
    [2] => Array ( 
        [CONSTRAINT_CATALOG] => def 
        [CONSTRAINT_SCHEMA] => amara_db 
        [CONSTRAINT_NAME] => users_ibfk_1 
        [TABLE_CATALOG] => def 
        [TABLE_SCHEMA] => amara_db 
        [TABLE_NAME] => users 
        [COLUMN_NAME] => provice 
        [ORDINAL_POSITION] => 1 
        [POSITION_IN_UNIQUE_CONSTRAINT] => 1 
        [REFERENCED_TABLE_SCHEMA] => amara_db 
        [REFERENCED_TABLE_NAME] => provinces 
        [REFERENCED_COLUMN_NAME] => code ) 
    )
*/