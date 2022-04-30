<?php // Simple API for check free email (AJAX)

namespace freeEmail;
include_once './connection.php';  use connection;

extract(connection\getConn());

// if email null parameter
if (!isset($_GET['email'])) echo json_encode(array('result' => 'undefined'));

// else
$email = $_GET['email'];
$sql = "SELECT COUNT(*) FROM users WHERE email = '$email';";
$result = (int) $conn->query($sql)->fetch_assoc()["COUNT(*)"];

if($result !== 1) echo json_encode(array('result' => true)); // free
else echo json_encode(array('result' => false)); // not free