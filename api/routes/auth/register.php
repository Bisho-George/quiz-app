<?php

require_once __DIR__ . "/../../database/functions/users_functions.php";
require_once __DIR__ . "/../../utilities.php";

// error_log(print_r($_POST, TRUE), 0);

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Make sure username, email and password are not empty
ensure_not_empty($username, "Missing username");
ensure_not_empty($email, "Missing email");
ensure_not_empty($password, "Missing password");

// Make sure the email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  json_response(array(
    "message" => "Invalid email"
  ), 400);
}

// Make sure the user does not already exist
if (username_exists($username)) {
  json_response(array(
    "message" => "Username already exists"
  ), 400);
}

// Make sure the email does not already exist
if (email_exists($email)) {
  json_response(array(
    "message" => "Email already exists"
  ), 400);
}

// Create the new user
insert_user($username, $email, $password);

ini_set('session.cookie_httponly', 1);
session_start();

$_SESSION["username"] = $username;

json_response(array(
  "message" => "Registration successful"
));