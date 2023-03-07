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
        if (!isset($question['question'])) {
            echo "question is not set";
            exit();
        }

        if (empty($question['question'])) {
            echo "question is empty";
            exit();
        }

        $title = $question['question'];
        
        if (!isset($question['correct_answer'])) {
            echo "correct_answer is not set";
            exit();
        }

        if (empty($question['correct_answer'])) {
            echo "correct_answer is empty";
            exit();
        }

        $correct_answer = $question['correct_answer'];

        if (!isset($question['answers'])) {
            echo "answers is not set";
            exit();
        }

        if (empty($question['answers'])) {
            echo "answers is empty";
            exit();
        }

        if (count($question['answers']) < 2) {
            echo "answers is less than 2";
            exit();
        }

        $answers = $question['answers'];
        
        $question_id = insert_question($title, $quiz_id);

        foreach ($answers as $index => $answer) {
            if (empty($answer)) {
                echo "answer is empty";
                exit();
            }
            insert_answer($answer, $question_id, $correct_answer == $index ? 1 : 0);
        }
    }
}

header('Location: ../../dashboard.php');
