<?php

function redirect($url) {
    header('Location: '.$url);
    exit();
}

function is_authenticated()
{
    session_start();

    // Check if the user is logged in
    return (isset($_SESSION['username']));
}
