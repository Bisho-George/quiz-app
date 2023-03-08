<?php

require_once __DIR__ . '/' . '../../database/functions/users_functions.php';
require_once __DIR__ . '/' . '../../utilities.php';

$body = get_request_body();

$username = ensure_exists($body, "username");
$password = ensure_exists($body, "password");

$found_user = select_user_by_username_and_password($username, $password);

if (!$found_user) {
    json_response(array(
        "message" => "Incorrect username or password"
    ), 400);
    exit();
}

ini_set('session.cookie_httponly', 1);
session_start();

$_SESSION["username"] = $username;

json_response(array(
    "message" => "Login successful"
));
