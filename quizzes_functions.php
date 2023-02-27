<?php

function get_all_quizzes() {
    global $conn;

    $query = "SELECT * FROM quizzes;";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function insert_new_quiz($title, $descr, $username) {
    global $conn;

    $query = "INSERT INTO quizzes (title, descr, username) VALUES ('$title', '$descr', '$username');";
    $result = mysqli_query($conn, $query);

    return $result;
}
