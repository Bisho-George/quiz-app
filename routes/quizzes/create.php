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
error_log(print_r($_POST, true));
$username = $_SESSION['username'];


if (!isset($_POST['title'])) {
    echo "title is not set";
    exit();
}
$title = $_POST['title'];
if (empty($title)) {
    echo "Title is empty";
    exit();
}
if (!isset($_POST['descr'])) {
    echo "descr is not set";
    exit();
}
$descr = $_POST['descr'];
if (empty($descr)) {
    echo "descr is empty";
    exit();
}
$quiz_id = insert_quiz($title, $descr, $username);
if (!$quiz_id) {
    echo "Failed to insert quiz";
    exit();
}
if (!isset($_POST['questions'])) {
    echo "questions is not set";
    exit();
}
$questions = $_POST['questions'];
if (empty($questions)) {
    echo "questions is empty";
    exit();
} else {
    foreach ($questions as $question) {
        $title = $question['question'];

        $question_id = insert_question($title, $quiz_id);
        if (!isset($question['correct_answer'])) {
            echo "correct_answer is not set";
            exit();
        }
        $correct_answer = $question['correct_answer'];
        if (empty($question['correct_answer'])) {
            echo "correct_answer is empty";
            exit();
        }
        $answers = $question['answers'];

        foreach ($answers as $index => $answer) {
            insert_answer($answer, $question_id, $correct_answer == $index ? 1 : 0);
        }
    }
}
if (!isset($_POST['answers'])) {
    echo "answers is not set";
    exit();
}
$answers = $_POST['answers'];
if (empty($answers)) {
    echo "answers is empty";
    exit();
}

header('Location: ../../dashboard.php');
