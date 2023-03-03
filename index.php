<?php

require_once "utilities.php";

if (is_authenticated()) {
    header('Location: dashboard.php');
} else {
    header('Location: login.php');
}