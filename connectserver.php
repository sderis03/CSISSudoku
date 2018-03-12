<?php

$servername = "localhost";
$username = "CSIS604g";
$password = "1937";
$db = "CSIS604g";
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>