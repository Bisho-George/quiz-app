<?php

require_once  __DIR__."/../connection.php";

function select_all_questions() {
    global $conn;

    $query = "SELECT * FROM questions;";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function insert_question($question, $quiz_id) {
    global $conn;

    $query = "INSERT INTO questions (question, quiz_id) VALUES ('$question', $quiz_id);";
    $result = mysqli_query($conn, $query);

    return mysqli_insert_id($conn);
}