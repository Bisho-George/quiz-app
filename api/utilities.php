<?php

require_once __DIR__ . "/database/functions/users_functions.php";

function is_authenticated()
{
    session_start();

    if (!isset($_SESSION['username'])) return FALSE;

    return username_exists($_SESSION['username']);
}

function ensure_authenticated()
{
    if (!is_authenticated()) {
        json_response(array(
            "message" => "Not authenticated"
        ), 401);
    }
    return $_SESSION['username'];
}

function json_response($data, $status = 200)
{
    header('Content-Type: application/json');
    http_response_code($status);
    echo json_encode($data);
    exit();
}

function ensure_not_empty($value, $message)
{
  if (empty($value)) {
    json_response(array(
      "message" => $message
    ), 400);
    exit();
  }
}

function ensure_exists($obj, $value) {
    error_log(print_r($obj, true));
    if (!isset($obj[$value])) {
        json_response(array(
            "message" => "Missing $value"
        ), 400);
    }

    ensure_not_empty($obj[$value], "$value is empty");
    return $obj[$value];
}

function get_request_body()
{
    $body = file_get_contents('php://input');
    $body = json_decode($body, true);
    return $body;
}


$error_messsages = array(
    'emptyFields' => 'Please fill out all the fields',
    'invalidEmail' => 'Please enter a valid email address',
    'invalidUser' => 'Invalid username or password',
    'usernameTaken' => 'This usersname is used by another user, please try another',
    'emailTaken' => 'This email is used by another user, please try another'
);
