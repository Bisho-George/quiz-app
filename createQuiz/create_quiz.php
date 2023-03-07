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
    <form method="post" id="quiz-form">
        <input type="text" name="title" placeholder="quiz title">
        <textarea name="descr" cols="30" rows="10" placeholder="quiz description"></textarea>
        <div>
            <ul id="questions"></ul>
            <button type="button" id="addQuestion">add question</button>
        </div>
        <button type="submit">create</button>
        <div id="message"></div>
    </form>
    <script>
        <?php
        include('create_quiz.js');
        ?>
    </script>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data
    $title = $_POST['title'] ?? '';
    $descr = $_POST['descr'] ?? '';
    $questions = $_POST['questions'] ?? '';
    $answers = $_POST['answers'] ?? '';

    if (empty($title) || empty($descr) || empty($questions) || empty($answers)) {
        $response = array('success' => false, 'message' => 'All fields are required.');
    } else {
        // Perform further validation and processing as needed
        // ...
        $response = array('success' => true);
    }
    exit;
}
