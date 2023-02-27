<?php

function redirect($url) {
    header('Location: '.$url);
    exit();
}

function is_authenticated()
{
    session_start();

    if (!isset($_SESSION['username'])) return FALSE;

    return username_exists($_SESSION['username']);
}
