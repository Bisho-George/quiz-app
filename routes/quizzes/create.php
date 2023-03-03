<?php

error_log(print_r($_POST, true));

require_once "../../utilities.php";

require_once "../../database/functions/quizzes_functions.php";
require_once "../../database/functions/questions_functions.php";
require_once "../../database/functions/answers_functions.php";

if (!is_authenticated()) {
    echo "You are not authenticated";
    exit();
}

$username = $_SESSION['username'];

$title = $_POST['title'];
$descr = $_POST['descr'];

$quiz_id = insert_quiz($title, $descr, $username);

$questions = $_POST['questions'];

foreach ($questions as $question) {
    $title = $question['question'];

    $question_id = insert_question($title, $quiz_id);

    $correct_answer = $question['correct_answer']; 
    
    if (!isset($question['answers']) || !is_array($question['answers'])) {
        echo "Invalid answers";
        exit();
    }

    $answers = $question['answers'];

    if (count($answers) < 2) {
        echo "Less than 2 answers";
        exit();
    }

    foreach ($answers as $index => $answer) {
        insert_answer($answer, $question_id, $correct_answer == $index ? 1 : 0);
    }
}

header('Location: ../../dashboard.php');