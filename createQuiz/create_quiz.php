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
</head>

<body>
    <h1>Create a quiz</h1>
    <form action="../routes/quizzes/create.php" method="post">
        <input type="text" name="title" placeholder="quiz title">
        <textarea name="descr" cols="30" rows="10" placeholder="quiz description"></textarea>
        <div>
            <ul id="questions"></ul>
            <button id="addQuestion">add question</button>
        </div>
        <button type="submit">create</button>
    </form>
    <script>
        <?php include('create_quiz.js'); ?>
    </script>
</body>

</html>