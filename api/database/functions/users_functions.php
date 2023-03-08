<?php

require_once  __DIR__ . '/' . '../connection.php';

function email_exists($email)
{
    global $conn;

    $query = "SELECT * FROM users WHERE email = '$email';";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) > 0;
}

function username_exists($username)
{
    global $conn;
    
    $query = "SELECT * FROM users WHERE username = '$username';";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) > 0;
}

function select_all_users()
{
    global $conn;

    $query = "SELECT * FROM users;";
    $result = mysqli_query($conn, $query);
    
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function select_user_by_username_and_password($username, $password)
{
    global $conn;
    
    $query = "SELECT * FROM users WHERE username = '$username' AND passwd = '$password'";
    $result = mysqli_query($conn, $query);
    
    return mysqli_fetch_assoc($result);
}

function insert_user($username, $email, $password)
{
    global $conn;

    $query = "INSERT INTO users (username, email, passwd) VALUES ('$username', '$email', '$password');";
    $result = mysqli_query($conn, $query);

    return $result;
}
