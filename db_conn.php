<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u105275922_chess";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
