<?php

require_once("param.inc.php");
global $host;
global $user;
global $dbpw;
global $db;
$conn = new mysqli($host, $user, $dbpw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Connection failed: $conn";
} 
?>
