<?php

$host = "localhost"; 
$user = "root";
$password = "";
$database = "supermarket";


global $conn;

$mysqli = new mysqli($host, $user, $password, $database);
$conn = mysqli_connect($host, $user, $password, $database);


?>