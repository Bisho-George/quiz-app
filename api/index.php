<?php

require __DIR__ . '/' . 'vendor/autoload.php';

$router = new AltoRouter();

$router->map('POST', '/login', function () {
    include(__DIR__ . '/' . 'routes/auth/login.php');
});

$router->map('POST', '/register', function () {
    include(__DIR__ . '/' . 'routes/auth/register.php');
});


$router->map('POST', '/create', function () {
    include(__DIR__ . '/' . 'routes/quizzes/create.php');
});

$router->map('POST', '/' . 'quiz/[i:id]', function ($id) {
});

$match = $router->match();

if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    echo '404';
}
