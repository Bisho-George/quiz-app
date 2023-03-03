<?php

require_once "../../database/functions/users_functions.php";

// error_log(print_r($_POST, TRUE), 0);

$username = $_POST["username"];
$password = $_POST["password"];

// Make sure username and password are not empty
if (empty($username) || empty($password)) {
    header("Location: ../../login.php?error=emptyFields&username=" . $username);
    // Stop the script
    exit();
}

$found_user = select_user_by_username_and_password($username, $password);

if (!$found_user) {
    header("Location: ../../login.php?error=invalidUser&username=" . $username);
    exit();
}

ini_set('session.cookie_httponly', 1);
session_start();

$_SESSION["username"] = $username;

header("Location: ../../dashboard.php");
exit();
