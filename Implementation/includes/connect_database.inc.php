<?php

$conn = new mysqli('localhost', 'root', '', 'LostObjects');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Connection failed: $conn";
} 
?>
