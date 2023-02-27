<?php

require_once 'env.php';

$host = "localhost";
$user = $_ENV["DB_USERNAME"];
$password = $_ENV['DB_PASSWORD'];
$db_name = "quiz";

// Create connection
$conn = mysqli_connect($host, $user, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    error_log("Connected successfully", 0);
}
