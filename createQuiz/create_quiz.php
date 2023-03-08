<?php

require_once __DIR__ . "/../utilities.php";

if (!is_authenticated()) {
    header('Location: /');
    exit();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a quiz</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <h1>Create a quiz</h1>
    <form method="post" id="quiz-form">
        <input type="text" name="title" placeholder="quiz title">
        <textarea name="descr" cols="30" rows="10" placeholder="quiz description"></textarea>
        <div>
            <ul id="questions"></ul>
            <button type="button" id="addQuestion">add question</button>
        </div>
        <button type="submit">create</button>
        <div class="message">
            <div class="alert alert-danger" id="error"></div>
            <div class="alert alert-success" id="success"></div>
        </div>
    </form>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js">
        <?php include('create_quiz.js'); ?>

    </script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
</body>

</html>