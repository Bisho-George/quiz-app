<?php

require_once __DIR__ . "/" . "../../utilities.php";
require_once __DIR__ . "/" . "../../database/functions/quizzes_functions.php";
require_once __DIR__ . "/" . "../../database/functions/questions_functions.php";
require_once __DIR__ . "/" . "../../database/functions/answers_functions.php";

$username = ensure_authenticated();

$body = get_request_body();

$title = ensure_exists($body, 'title');
$descr = ensure_exists($body, 'descr');
$questions = ensure_exists($body, 'questions');

$quiz_id = insert_quiz($title, $descr, $username);

if (!$quiz_id) {
    json_response(array(
        "message" => "Failed to insert quiz"
    ), 500);
}

foreach ($questions as $question) {
    $question_title = ensure_exists($question, 'question');
    $correct_answer = ensure_exists($question, 'correct_answer');
    $answers = ensure_exists($question, 'answers');

    if (count($answers) < 2) {
        json_response(array(
            "message" => "Question must have at least 2 answers"
        ), 400);
    }

    $question_id = insert_question($title, $quiz_id);

    foreach ($answers as $index => $answer) {
        ensure_not_empty($answer, "answer is empty");
        insert_answer($answer, $question_id, $correct_answer == $index ? 1 : 0);
    }
}

json_response(array(
    "message" => "Quiz created successfully",
    "quiz_id" => $quiz_id
), 200);
