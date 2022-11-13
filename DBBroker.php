<?php

$host = "localhost";
$db = "shop";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_errno){
    exit("Connection failed: " . $conn->connect_errno);
}

?>