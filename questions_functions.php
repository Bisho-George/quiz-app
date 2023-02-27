<?php

require_once 'database_connection.php';

function get_all_questions() {
    global $conn;

    $query = "SELECT * FROM questions;";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function insert_new_question($question, $question_type, $quiz_id) {
    global $conn;

    $query = "INSERT INTO questions (question, question_type, quiz_id) VALUES ('$question', '$question_type', $quiz_id);";
    $result = mysqli_query($conn, $query);

    return $result;
}