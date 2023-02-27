<?php

error_log(print_r($_POST, true));

/*
(
    [title] => egypt
    [descr] => quiz about egypt
    [question-1] => what is capital?
    [question-1-type] => mcq
    [question-1-correct-answer] => question-1-answer-1
    [question-1-answer-1] => cairo
    [question-1-answer-2] => giza
    [question-1-answer-3] => alex
    [question-2] => egypt poor.
    [question-2-type] => tf
    [question-2-correct-answer] => question-2-answer-1
    [question-2-answer-1] => True
    [question-2-answer-2] => False
)
*/

$descr = isset($_POST['descr']) ? $_POST['descr'] : '';

if (!isset($_POST['title'])) {
    header('Location: create_quiz.php?error=emptyFields');
    exit();
}

$title = $_POST['title'];

// TODO: Read the questions and answers from the $_POST array and create the quiz in the database