<?php

require_once "database/functions/users_functions.php";

function is_authenticated()
{
    session_start();

    if (!isset($_SESSION['username'])) return FALSE;

    return username_exists($_SESSION['username']);
}
