<?php

require_once "database/functions/users_functions.php";

function is_authenticated()
{
    session_start();

    if (!isset($_SESSION['username'])) return FALSE;

    return username_exists($_SESSION['username']);
}

$error_messsages = array(
    'emptyFields' => 'Please fill out all the fields',
    'invalidEmail' => 'Please enter a valid email address',
    'invalidUser' => 'Invalid username or password',
    'usernameTaken' => 'This usersname is used by another user, please try another',
    'emailTaken' => 'This email is used by another user, please try another'
);
