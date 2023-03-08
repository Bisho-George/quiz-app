<?php

require_once  __DIR__."/../connection.php";

function insert_answer($answer, $question_id, $is_correct) {
    global $conn;

    $query = "INSERT INTO answers (answer, question_id, is_correct) VALUES ('$answer', $question_id, $is_correct);";
    $result = mysqli_query($conn, $query);

    return mysqli_insert_id($conn);
}