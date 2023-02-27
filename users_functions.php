<?php

function get_all_users() {
    global $conn;

    $query = "SELECT * FROM users;";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function create_new_user($username, $email, $password) {
    global $conn;

    $query = "INSERT INTO users (username, email, passwd) VALUES ('$username', '$email', '$password');";
    $result = mysqli_query($conn, $query);

    return $result;
}
