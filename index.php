<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once "users_functions.php";
require_once "questions_functions.php";
require_once "quizzes_functions.php";

var_dump(get_all_users());

echo '<br />';

var_dump(get_all_quizzes());

echo '<br />';

var_dump(get_all_questions());