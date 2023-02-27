<?php

require_once  __DIR__."/../connection.php";

function email_exists($email)
{
    global $conn;

    $query = "SELECT * FROM users WHERE email = '$email';";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) > 0;
}

    global $conn;

    $query = "SELECT * FROM users;";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function insert_user($username, $email, $password)
{
    global $conn;

    $query = "INSERT INTO users (username, email, passwd) VALUES ('$username', '$email', '$password');";
    $result = mysqli_query($conn, $query);

    return $result;
}
