
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data
    $title = $_POST['title'] ?? '';
    $descr = $_POST['descr'] ?? '';
    $questions = $_POST['questions'] ?? '';
    $answers = $_POST['questions[${questionIndex}][answers]'] ?? '';

    if (empty($title) || empty($descr) || empty($questions) || empty($answers)) {
        $response = array('success' => false, 'message' => 'All fields are required.');
    } else {
        // Perform further validation and processing as needed
        // ...
        $response = array('success' => true);
    }
    exit;
}
