<?php

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . "/utilities.php";

use AltoRouter;


// Routing

$router = new AltoRouter();

$router->map('GET', '/', function() {
    include('dashboard.php');
});

$router->map('GET', '/register', function() {
    include('register.php');
});

$router->map('GET', '/login', function() {
    include('login.php');
});

$router->map('GET', '/create', function() {
    include('createQuiz/create_quiz.php');
});

$router->map('POST', '/create', function() {
    
});

$router->map('POST', '/quiz/[i:id]', function($id) {
    
});

$match = $router->match();
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    echo '404';
}