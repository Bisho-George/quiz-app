<?php

require_once __DIR__.'/vendor/autoload.php';
require_once "database_connection.php";

echo "Hello";
// CRUD Operations

// Create Quiz
function createQuiz ($title, $description, $userId) {
    $sql = "INSERT INTO quiz (title, _description, username) VALUES ('$title', '$description', '$userId')";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

?>