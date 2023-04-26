<?php

$host = "localhost";
$dbname = "frantic1_bus_ticketing";
$username = "frantic1_brian";
$password = "Kiplangat@1";

$conn = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($conn->connect_errno) {
    die("Connection error: " . $conn->connect_error);
}

return $conn;

?>