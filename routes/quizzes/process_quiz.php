<?php


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
$title = $_POST['quiz.title'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if the desciption is not null or empty set it to the descr variable, otherwise set it to an empty string
    $descr = isset($_POST['quiz.description']) ? $_POST['quiz.description'] : '';
    // check if the title is not set or empty, redirect to the create quiz page with an error
    if (!isset($title)) {
        header('Location: create_quiz.php?error=emptyFields');
        exit();
    }



    // TODO: Read the questions and answers from the $_POST array and create the quiz in the database
    $questions = Array();
    error_log(print_r($_POST['quiz.questions'], true));
    for ($i = 0;$i < count($_POST['quiz.questions']);$i++) {
        array_push($questions, $_POST['quiz']['questions'][$i]);   
    }

    if (isset($_POST['quiz.questions'])) {
        error_log(print_r($_POST['quiz']['questions'], true));
    }
}
