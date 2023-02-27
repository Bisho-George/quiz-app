<?php

require_once "../../database/functions/users_functions.php";

// error_log(print_r($_POST, TRUE), 0);

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Make sure username, email and password are not empty
if (empty($username) || empty($email) || empty($password)) {
  header("Location: ../../register.php?error=emptyFields&username=" . $username . "&email=" . $email);
  // Stop the script
  exit();
}

// Make sure the email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header("Location: ../../register.php?error=invalidEmail&username=" . $username);
  // Stop the script
  exit();
}

// Make sure the user does not already exist
if (username_exists($username)) {
  header("Location: ../../register.php?error=usernameTaken&email=" . $email);
  // Stop the script
  exit();
}

// Make sure the email does not already exist
if (email_exists($email)) {
  header("Location: ../../register.php?error=emailTaken&username=" . $username);
  // Stop the script
  exit();
}

// Create the new user
insert_user($username, $email, $password);

ini_set( 'session.cookie_httponly', 1 );
session_start();

$_SESSION["username"] = $username;

header("Location: ../../dashboard.php");
exit();